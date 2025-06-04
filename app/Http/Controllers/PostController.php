<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        $data = $request->only(Post::INSERT_FIELD);

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
        $data = $request->only(Post::INSERT_FIELD);

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
        $query->with('ward.district.province');
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        $result = $query->paginate($limit, ['*'], 'page', $page);

        return response()->json($result);
    }

    public function getPostByUser(Request $request)
    {
        $limit = $request->input('limit', 10);
        $page = $request->input('page', 1);

        $query = $this->repository->newQuery();
        $query->where('user_id', $request->user_id);
        $query->with('ward.district.province');
        $result = $query->paginate($limit, ['*'], 'page', $page);

        return response()->json($result);
    }
}
