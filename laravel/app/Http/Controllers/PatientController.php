<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Patient;
use Exception;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function getAllData()
    {
        try {
            $data = Patient::with(["transactions"])->get();
            return ApiResponse::success($data, "Success To Get All Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function getSingleData($id)
    {
        try {
            $data = Patient::where("patient_id", $id)->with(["transactions"])->first();
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
                'nik' => "required|integer",
                'phone' => "required|integer",
                'address' => "required|string",
                'birth_date' => "required",
                'gender' => "required",
            ]);

            $data = Patient::create($validated);

            return ApiResponse::success($data, "Success To Get Create Data");

        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function updateData(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => "sometimes|string",
                'nik' => "sometimes|integer",
                'phone' => "sometimes|integer",
                'address' => "sometimes|string",
                'birth_date' => "sometimes",
                'gender' => "sometimes",
            ]);

            $data = Patient::where("patient_id", $id)->update($validated);
            return ApiResponse::success($data, "Success To Update Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function deleteData($id)
    {
        try {
            $data = Patient::where("patient_id", $id)->delete();
            return ApiResponse::success($data, "Success To Get Delete Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
}
