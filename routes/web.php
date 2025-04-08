<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;

// Guest routes
Route::middleware(['web', 'guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'index']);
    Route::get('/auth/google/redirect', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

    Route::post('/login-submit', [AuthController::class, 'login'])->name('login_submit');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot_password');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'update'])->name('forgot_password.update');

    Route::post('/clear-login-required-session', function () {
        session()->forget('login_required');
        return response()->json(['status' => 'success']);
    })->name('clear_login_required_session');
});

// Authenticated routes (admin dan mahasiswa)
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/refresh-csrf', [AuthController::class, 'refreshCsrf'])->name('refresh-csrf');

    // Profile routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
    });

    // Books index (bisa diakses oleh admin dan mahasiswa)
    Route::prefix('books')->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('books.index');
    });
});

// Mahasiswa-only routes
Route::middleware(['mahasiswa'])->group(function () {
    // Route khusus mahasiswa lainnya, tambahkan di sini jika ada
});

// Admin-only routes
Route::middleware(['Admin','auth'])->group(function () {
    Route::prefix('admin/books')->group(function () {
        Route::get('/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/store', [BookController::class, 'store'])->name('books.store');
        Route::get('/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::put('/{book}/update', [BookController::class, 'update'])->name('books.update');
        Route::delete('/{book}/delete', [BookController::class, 'destroy'])->name('books.delete');
    });
    
    Route::prefix('admin/category')->middleware(['auth', 'Admin'])->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/load-data', [CategoryController::class, 'loadData'])->name('admin.category.load-data');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });
    

});
