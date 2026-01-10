<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PatientController;
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
});
