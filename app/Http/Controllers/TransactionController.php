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
            $data = Transaction::with(['patient', 'service'])->get();
            return ApiResponse::success($data, "Success To Get All Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function getSingleData($id)
    {
        try {
            $data = Transaction::where("transaction_id", $id)->with(['patient', 'service'])->get();
            return ApiResponse::success($data, "Success To Get Single Data");
        } catch (Exception $e) {
            return ApiResponse::error("Internal Server Error", 500, $e);
        }
    }
    public function createData(Request $request)
    {
        try {
            $validated = $request->validate([
                'patient_id' => 'required|exists:patients,patient_id',
                'service_id' => 'required|exists:services,service_id',
                'reservation_date' => 'required|date|after_or_equal:today',
                'payment_method' => 'required|in:cash,transfer,qris',
                'status' => 'required|in:pending,paid,cancelled',
                'notes' => 'nullable|string',
                'paid_at' => 'nullable|date',
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
                'patient_id' => 'sometimes|exists:patients,patient_id',
                'service_id' => 'sometimes|exists:services,service_id',
                'reservation_date' => 'sometimes|date|after_or_equal:today',
                'payment_method' => 'sometimes|in:cash,transfer,qris',
                'status' => 'sometimes|in:pending,paid,cancelled',
                'notes' => 'nullable|string',
                'paid_at' => 'nullable|date',
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
