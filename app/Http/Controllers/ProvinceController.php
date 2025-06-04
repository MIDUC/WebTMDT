<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Province;
use App\Repositories\ProductRepository;
use App\Repositories\ProvinceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProvinceController extends Controller
{
    public function __construct(ProvinceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        $data = $request->only(Province::INSERT_FIELD);

        if (!is_array($data) || empty($data)) {
            return response()->json(['error' => 'Dữ liệu không hợp lệ'], 400);
        }

        $result = $this->repository->create($data);
        if (!$result) {
            return response()->json(['message' => 'Tạo mới thất bại!'], 500);
        }

        return response()->json([
            'message' => 'Tạo mới thành công!',
            'data' => $result
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(Province::INSERT_FIELD);

        $result = $this->repository->updateById($id, $data);

        if (!$result) {
            return response()->json(['error' => 'Cập nhật thất bại!'], 500);
        }

        return response()->json([
            'message' => 'Cập nhật thành công!',
            'data' => $result
        ]);
    }

    public function delete($id)
    {
        $isDeleted = $this->repository->deleteById($id);

        if (!$isDeleted) {
            return response()->json(['error' => 'Xóa thất bại!'], 500);
        }

        return response()->json(['message' => 'Xóa thành công!']);
    }


    public function listing(Request $request)
    {
        $limit = $request->input('limit', 10);
        $page = $request->input('page', 1);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderType = $request->input('orderType', 'desc');

        $query = $this->repository->newQuery();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        $result = $query->paginate($limit, ['*'], 'page', $page);

        return response()->json($result);
    }
}