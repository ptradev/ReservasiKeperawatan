<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string",
            "email" => "required|string|email",
            "password" => "required|string",
        ]);
        $validated["password"] = Hash::make($validated["password"]);

        $data = User::create($validated);

        return ApiResponse::success($data, "Succes to register");
    }

    public function login(Request $request)
    {
        try {
            $validated = $request->validate([
                "email" => "required|string|email",
                "password" => "required|string",
            ]);

            if (!$token = auth('api')->attempt($validated)) {
                return ApiResponse::error("Unauthorized", 401);
            }

            return ApiResponse::success(["token" => $token], "Login Success");

        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, "$e");
        }
    }
    public function refresh(Request $request)
    {
        try {

            $token = auth("api")->refresh();

            return ApiResponse::success(["token" => $token], "Login Success");

        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, "$e");
        }
    }
    public function logout(Request $request)
    {
        try {

            auth("api")->logout();

            return ApiResponse::success("Logout Success");

        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, "$e");
        }
    }
    public function me(Request $request)
    {
        try {

            $token = auth("api")->user();

            return ApiResponse::success($token);

        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, "$e");
        }
    }


}
