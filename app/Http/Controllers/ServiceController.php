<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct(ServiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        $data = $request->only(Service::INSERT_FIELD);

        if (!is_array($data) || empty($data)) {
            return response()->json(['error' => 'Invalid data'], 400);
        }

        $result = $this->repository->create($data);
        if (!$result) {
            return response()->json(['message' => 'Creation failed!'], 500);
        }

        return response()->json([
            'message' => 'Created successfully!',
            'data' => $result
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(Service::INSERT_FIELD);

        $result = $this->repository->updateById($id, $data);

        if (!$result) {
            return response()->json(['error' => 'Update failed!'], 500);
        }

        return response()->json([
            'message' => 'Updated successfully!',
            'data' => $result
        ]);
    }

    public function delete($id)
    {
        $isDeleted = $this->repository->deleteById($id);

        if (!$isDeleted) {
            return response()->json(['error' => 'Deletion failed!'], 500);
        }

        return response()->json(['message' => 'Deleted successfully!']);
    }

    public function listing(Request $request)
    {
        $limit = $request->input('limit', 10);
        $page = $request->input('page', 1);

        $query = $this->repository->newQuery();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        $result = $query->paginate($limit, ['*'], 'page', $page);

        return response()->json($result);
    }
}
