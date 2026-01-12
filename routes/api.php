<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


Route::prefix("/auth")->group(function () {
    Route::post("/login", [AuthController::class, "login"]);
    Route::get("/refresh", [AuthController::class, "refresh"]);
    Route::post("/register", [AuthController::class, "register"]);
});

Route::middleware("jwt.auth")->group(function () {
    Route::prefix("/auth")->group(function () {
        Route::get("/me", [AuthController::class, "me"]);
        Route::delete("/logout", [AuthController::class, "logout"]);
    });

    Route::get("/patients", [PatientController::class, "getAllData"]);
    Route::get("/patients/{id}", [PatientController::class, "getSingleData"]);
    Route::post("/patients", [PatientController::class, "createData"]);
    Route::patch("/patients/{id}", [PatientController::class, "updateData"]);
    Route::delete("/patients/{id}", [PatientController::class, "deleteData"]);

    Route::get("/nurses", [NurseController::class, "getAllData"]);
    Route::get("/nurses/{id}", [NurseController::class, "getSingleData"]);
    Route::post("/nurses", [NurseController::class, "createData"]);
    Route::patch("/nurses/{id}", [NurseController::class, "updateData"]);
    Route::delete("/nurses/{id}", [NurseController::class, "deleteData"]);

    Route::get("/services", [ServicesController::class, "getAllData"]);
    Route::get("/services/{id}", [ServicesController::class, "getSingleData"]);
    Route::post("/services", [ServicesController::class, "createData"]);
    Route::patch("/services/{id}", [ServicesController::class, "updateData"]);
    Route::delete("/services/{id}", [ServicesController::class, "deleteData"]);

    Route::get("/transactions", [TransactionController::class, "getAllData"]);
    Route::get("/transactions/{id}", [TransactionController::class, "getSingleData"]);
    Route::post("/transactions", [TransactionController::class, "createData"]);
    Route::patch("/transactions/{id}", [TransactionController::class, "updateData"]);
    Route::delete("/transactions/{id}", [TransactionController::class, "deleteData"]);
});
