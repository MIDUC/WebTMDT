<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $repository;

    protected $mapper = null;


    public function doStore(array $data, $fields) // ✅ Nhận array thay vì Request
    {
        try {
            $result = $this->repository->create($data);

            if (!$result) {
                return response()->json(['message' => 'Tạo mới thất bại!'], 500);
            }

            return response()->json([
                'message' => 'Tạo mới thành công!',
                'data' => $result
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Tạo mới thất bại!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
