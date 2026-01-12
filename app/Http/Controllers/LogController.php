<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function getALlData()
    {
        try {
            return ApiResponse::success(Log::orderByDesc()->get());
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }
}
