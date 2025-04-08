<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\UserApiController;

// ✅ Throttled Register & Login (5 per minute per IP)
Route::middleware('throttle:5,1')->group(function () {
    Route::post('/register', [AuthApiController::class, 'register']);
    Route::post('/login', [AuthApiController::class, 'login']);
});

// ✅ Proteksi endpoint dengan Sanctum (must be logged in)
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/users', [UserApiController::class, 'index']);
    Route::post('/logout', [AuthApiController::class, 'logout']);
});
