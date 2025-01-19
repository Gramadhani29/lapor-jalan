<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


// User routes

Route::get('/user', [ReportController::class, 'index'])->name('user.index');
Route::get('/user/{id}', [ReportController::class, 'show'])->name('user.show');
Route::get('/report/create', [ReportController::class, 'create'])->name('report.create');
Route::post('/report/store', [ReportController::class, 'store'])->name('report.store');
Route::get('/report/{id}', [ReportController::class, 'show'])->name('report.show');
Route::delete('/report/{id}', [ReportController::class, 'destroy'])->name('report.destroy');


// Admin routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/report/{id}', [AdminController::class, 'show'])->name('admin.report.show');
Route::post('/admin/report/{id}/update', [AdminController::class, 'update'])->name('admin.report.update');
Route::get('/admin/report/{id}/download', [AdminController::class, 'downloadPDF'])->name('admin.report.download');
