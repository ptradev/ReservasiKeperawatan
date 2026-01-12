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
            $data = Service::with(['nurse'])->get();
            return ApiResponse::success($data, "Success To Get All Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function getSingleData($id)
    {
        try {
            $data = Service::where("service_id", $id)->with(['nurse'])->get();
            return ApiResponse::success($data, "Success To Get Single Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function createData(Request $request)
    {
        try {
            $validated = $request->validate([
                'service_name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|integer|min:0',
                'duration' => 'required|integer|min:1',
                'nurse_id' => 'required|exists:nurses,nurse_id',
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
                'service_name' => 'sometimes|string|max:255',
                'description' => 'nullable|string',
                'price' => 'sometimes|integer|min:0',
                'duration' => 'sometimes|integer|min:1',
                'nurse_id' => 'sometimes|exists:nurses,nurse_id',
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
