<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'index']);

Route::get('/daftar-ruangan', [Controller::class, 'daftarRuangan']);

Route::get('/booking', [Controller::class, 'booking']);

Route::get('/status', [Controller::class, 'status'])->middleware('auth');

Route::get('/admin/bookings', [Controller::class, 'AdminBooking'])->middleware('admin');

Route::post('bookings/{booking}/approve', [Controller::class, 'approveBooking'])->name('bookings.approve');

Route::post('bookings/{booking}/reject', [Controller::class, 'rejectBooking'])->name('bookings.reject');

Route::get('/sesi', [LoginController::class, 'index'])->name('login');

Route::post('/sesi/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/admin', [LoginController::class, 'dashboard'])->middleware('admin');

Route::resource('/admin/dashboard/akun', UsersController::class)->middleware('admin');

Route::resource('/admin/dashboard', AdminController::class)->middleware('admin');

Route::resource('/bookings', BookingsController::class)->middleware('auth');

