<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     public function getAllData()
    {
        try {
            $data = User::with([])->get();
            return ApiResponse::success($data, "Success To Get All Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function getSingleData($id)
    {
        try {
            $data = User::where("user_id", $id)->with([])->get();
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
                'email' => "required|string|email",
                'password' => "required|string",
                
            ]);

            $validated["password"] = Hash::make($validated["password"]);

            $data = User::create($validated);

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
                'email' => "sometimes|string|email",
                'password' => "sometimes|string",
            ]);

            if($validated["password"] ?? false ) $validated["password"] = Hash::make($validated["password"]);
            $data = User::where("user_id", $id)->update($validated);
            return ApiResponse::success($data, "Success To Get Update Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function deleteData($id)
    {
        try {
            $data = User::where("user_id", $id)->delete();
            return ApiResponse::success($data, "Success To Get Delete Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
}
