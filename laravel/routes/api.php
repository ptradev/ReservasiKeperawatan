<?php

use App\Http\Controllers\NurseController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

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