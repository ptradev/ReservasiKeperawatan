<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Nurse;
use Exception;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    public function getAllData()
    {
        try {
            $data = Nurse::with(["services"])->get();
            return ApiResponse::success($data, "Success To Get All Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function getSingleData($id)
    {
        try {
            $data = Nurse::where("nurse_id", $id)->with(["services"])->get();
            return ApiResponse::success($data, "Success To Get Single Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function createData(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => "required|string",
                'phone' => "required|integer",
                'address' => "required|string",
                'specialization' => "required",
                'status' => "required",
            ]);

            $data = Nurse::create($validated);

            return ApiResponse::success($data, "Success To Get Create Data");

        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function updateData(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => "required|string",
                'phone' => "required|integer",
                'address' => "required|string",
                'specialization' => "required",
                'status' => "required",
            ]);

            $data = Nurse::where("nurse_id", $id)->update($validated);
            return ApiResponse::success($data, "Success To Get Update Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function deleteData($id)
    {
        try {
            $data = Nurse::where("nurse_id", $id)->delete();
            return ApiResponse::success($data, "Success To Get Delete Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
}
