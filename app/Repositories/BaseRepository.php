<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

abstract class BaseRepository implements RepositoryContract
{
    /**
     * The repository model.
     *
     * @var Model
     */
    public $model;
    /**
     * The query builder.
     *
     * @var Builder
     */
    protected $query;
    /**
     * Alias for the query limit.
     *
     * @var int
     */
    protected $take;
    /**
     * Array of related models to eager load.
     *
     * @var array
     */
    protected $with = [];
    /**
     * Array of one or more where clause parameters.
     *
     * @var array
     */
    protected $wheres = [];
    /**
     * Array of one or more where in clause parameters.
     *
     * @var array
     */
    protected $whereIns = [];
    /**
     * Array of one or more ORDER BY column/value pairs.
     *
     * @var array
     */
    protected $orderBys = [];
    /**
     * Array of scope methods to call on the model.
     *
     * @var array
     */
    protected $scopes = [];

    protected $objectName = 'name';

    protected $objectType = null;

    protected $authUser;

    /**
     * BaseRepository constructor.
     */
    public function __construct($authUser = null)
    {
        $this->makeModel();

        // set auth user
        $this->authUser = $authUser;
        if ($this->authUser == null) {
            $this->authUser = auth()->user();
        }
    }

    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    abstract public function model();

    /**
     * @return Model|mixed
     * @throws GeneralException
     */
    public function makeModel()
    {
        $model = app()->make($this->model());
        if (!$model instanceof Model) {
            throw new GeneralException("Class {$this->model()} must be an instance of " . Model::class);
        }
        return $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function count(): int
    {
        return $this->get()->count();
    }

    protected function getData(
        $query,
        $limit = 10,
        $offset = 0,
        $orderBy = [],
        $orderType = []
    ) {
        if ($limit > 0) {
            $query->skip($offset)->take($limit);
        }
        if (defined("\\" . get_class($this->model) . '::ORDERABLE_COLUMNS')) {
            for ($i = 0; $i < count($orderBy); $i++) {
                if (in_array($orderBy[$i], $this->model::ORDERABLE_COLUMNS)) {
                    $query->orderBy($orderBy[$i], $orderType[$i]);
                } else {
                    throw ValidationException::withMessages(['sortBy' => ['Cột sắp xếp lỗi']]);
                }
            }
        } else {
            for ($i = 0; $i < count($orderBy); $i++) {
                $query->orderBy($orderBy[$i], $orderType[$i]);
            }
        }
        return $query->get();
    }

    protected function deletedByUser($id, $objectType)
    {
        $object = $this->model->find($id);
        $userId = auth()->id();
        if ($object != null && $object->deleted_at == null) {
            $object->deleted_by = $userId;
            $object->deleted_at = Carbon::now();
            return true;
        }
        return false;
    }

    public function deleteById($id): bool
    {
        $obj = $this->model->find($id);
        if ($obj != null) {
            try {
                if ($obj->delete()) {
                    return true;
                }
                return false;
            } catch (\Exception $e) {
                return false;
            }
        }
        return false;
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        try {
            if ($this->model->getFillable() && in_array('user_id', $this->model->getFillable())) {
                $data['user_id'] = auth()->id();
            }
            return $this->model->create($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function where($column, $value, $operator = '=')
    {
        $this->wheres[] = compact('column', 'value', 'operator');
        return $this;
    }

    public function whereIn($column, $values)
    {
        $values = is_array($values) ? $values : [$values];
        $this->whereIns[] = compact('column', 'values');
        return $this;
    }

    public function with($relations)
    {
        if (is_string($relations)) {
            $relations = func_get_args();
        }
        $this->with = $relations;
        return $this;
    }

    public function paginate($limit = 25, array $columns = ['*'], $pageName = 'page', $page = null)
    {
        $this->newQuery()->eagerLoad()->setClauses()->setScopes();
        $models = $this->query->paginate($limit, $columns, $pageName, $page);
        $this->unsetClauses();
        return $models;
    }

    public function newQuery()
    {
        $this->query = $this->model->newQuery();
        return $this;
    }


    protected function unsetClauses()
    {
        $this->wheres = [];
        $this->whereIns = [];
        $this->scopes = [];
        $this->take = null;
        return $this;
    }

    protected function eagerLoad()
    {
        foreach ($this->with as $relation) {
            $this->query->with($relation);
        }
        return $this;
    }

    /**
     * Set clauses on the query builder.
     *
     * @return $this
     */
    protected function setClauses()
    {
        foreach ($this->wheres as $where) {
            $this->query->where($where['column'], $where['operator'], $where['value']);
        }
        foreach ($this->whereIns as $whereIn) {
            $this->query->whereIn($whereIn['column'], $whereIn['values']);
        }
        foreach ($this->orderBys as $orders) {
            $this->query->orderBy($orders['column'], $orders['direction']);
        }
        if (isset($this->take) and !is_null($this->take)) {
            $this->query->take($this->take);
        }
        return $this;
    }

    protected function setScopes()
    {
        foreach ($this->scopes as $method => $args) {
            $this->query->$method(...$args);
        }
        return $this;
    }

    public function updateById($id, array $data, array $options = [])
    {
        $this->unsetClauses();
        $model = $this->getById($id);
        $model->update($data, $options);
        return $model;
    }
}