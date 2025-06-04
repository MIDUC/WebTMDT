<?php

namespace App\Repositories;

/**
 * Interface RepositoryContract.
 */
interface RepositoryContract
{

    public function create(array $data);

    public function deleteById($id);

    public function getById($id);

    public function paginate($limit = 25, array $columns = ['*'], $pageName = 'page', $page = null);

    public function updateById($id, array $data, array $options = []);

    public function where($column, $value, $operator = '=');

    public function whereIn($column, $value);

    public function with($relations);
}
