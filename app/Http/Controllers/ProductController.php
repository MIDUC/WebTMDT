<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }
    // 1. Lấy danh sách sản phẩm (Listing)
    public function listing(Request $request)
    {
        // Lấy các tham số lọc và phân trang
        $limit = $request->input('limit', 10);
        $page = $request->input('page', 1);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderType = $request->input('orderType', 'desc');

        // Gọi repository để lấy danh sách
        $query = $this->repository->newQuery();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $result = $query->paginate($limit, ['*'], 'page', $page);

        return response()->json($result);
    }

    // 2. Thêm sản phẩm mới (Store)
    public function store(Request $request)
    {
        Log::info('Request data:', $request->all());
        $data = $request->all(); // Chuyển đổi Request thành mảng
        $result = $this->repository->create($data);

        return $result;
    }

    // 3. Cập nhật sản phẩm (Update)
    public function update(Request $request, $id)
    {
        // Lấy dữ liệu đầu vào
        $data = $request->only(['name', 'price', 'description']); // Chỉ lấy các trường cần thiết

        // Gọi repository để cập nhật
        $result = $this->repository->updateById($id, $data);

        if (!$result) {
            return response()->json(['error' => 'Cập nhật thất bại!'], 500);
        }

        return response()->json([
            'message' => 'Cập nhật thành công!',
            'data' => $result
        ]);
    }

    // 4. Xóa sản phẩm (Delete)
    public function delete($id)
    {
        // Gọi repository để xóa
        $isDeleted = $this->repository->deleteById($id);

        if (!$isDeleted) {
            return response()->json(['error' => 'Xóa thất bại!'], 500);
        }

        return response()->json(['message' => 'Xóa thành công!']);
    }
    public function detail($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        return response()->json($product);
    }

}