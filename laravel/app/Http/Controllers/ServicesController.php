<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function getAllData()
    {
        try {
            $data = Service::with(["transactions", "nurse"])->get();
            return ApiResponse::success($data, "Success To Get All Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function getSingleData($id)
    {
        try {
            $data = Service::where("service_id", $id)->with([])->get();
            return ApiResponse::success($data, "Success To Get Single Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function createData(Request $request)
    {
        try {
            $validated = $request->validate([
                'service_name' => "required|string",
                'description' => "sometimes|integer|nullable",
                'price' => "required|integer",
                'duration' => "required|integer",
                'burse_id' => "required|integer",
            ]);

            $data = Service::create($validated);

            return ApiResponse::success($data, "Success To Get Create Data");

        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function updateData(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'service_name' => "sometimes|string",
                'description' => "sometimes|integer|nullable",
                'price' => "sometimes|integer",
                'duration' => "sometimes|integer",
                'nurse_id' => "sometimes|integer",
            ]);

            $data = Service::where("service_id", $id)->update($validated);
            return ApiResponse::success($data, "Success To Get Update Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function deleteData($id)
    {
        try {
            $data = Service::where("service_id", $id)->delete();
            return ApiResponse::success($data, "Success To Get Delete Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
}
