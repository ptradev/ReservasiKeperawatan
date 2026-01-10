<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function getAllData()
    {
        try {
            $data = Transaction::with(["service", "patient"])->get();
            return ApiResponse::success($data, "Success To Get All Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function getSingleData($id)
    {
        try {
            $data = Transaction::where("transaction_id", $id)->with([])->get();
            return ApiResponse::success($data, "Success To Get Single Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function createData(Request $request)
    {
        try {
            $validated = $request->validate([
                'patient_id' => "required|integer|exist:patients,patient_id",
                'service_id' => "required|integer|exist:services,service_id",
                'reservation_date' => "required|date",
                'payment_method' => "required|in:cash,cashless",
                'status' => "required|in:waiting,approved,completed,cancelled",
            ]);

            $data = Transaction::create($validated);

            return ApiResponse::success($data, "Success To Get Create Data");

        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function updateData(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'patient_id' => "sometimes|integer|exist:patients,patient_id",
                'service_id' => "sometimes|integer|exist:services,service_id",
                'reservation_date' => "sometimes|date",
                'payment_method' => "sometimes|in:cash,cashless",
                'status' => "sometimes|in:waiting,approved,completed,cancelled",
            ]);

            $data = Transaction::where("transaction_id", $id)->update($validated);
            return ApiResponse::success($data, "Success To Get Update Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function deleteData($id)
    {
        try {
            $data = Transaction::where("transaction_id", $id)->delete();
            return ApiResponse::success($data, "Success To Get Delete Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
}
