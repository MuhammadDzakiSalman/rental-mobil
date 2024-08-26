<?php

use App\Models\Transaction;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransactionController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

$router->aliasMiddleware('role', CheckRole::class);

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('auth.register')->middleware('guest');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['role:user'])->group(function () {
    Route::get('/history', [TransactionController::class, 'userTransactions'])->name('history.index');
    Route::post('/car/rent/{id}', [CarController::class, 'rentCar'])->name('rent-car');
});

Route::middleware(['role:owner,admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('cars', CarController::class);
    Route::get('/transaksi', [TransactionController::class, 'show'])->name('transaksi.index');
    Route::post('/transactions/{transaction}/confirm', [TransactionController::class, 'confirm'])->name('transactions.confirm');
    Route::post('/transactions/{transaction}/reject', [TransactionController::class, 'reject'])->name('transactions.reject');
    Route::post('/transactions/{transaction}/finish', [TransactionController::class, 'finish'])->name('transactions.finish');
});
Route::middleware(['role:user,admin,owner'])->group(function () {
    Route::get('/ganti-password', [UserController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/ganti-password', [UserController::class, 'updatePassword'])->name('password.update');
});
Route::middleware(['role:owner'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('transaksi/download', [LaporanController::class, 'downloadPDF']);
});

Route::get('/', [CarController::class, 'showCars'])->name('home.index');
Route::get('/car/detail/{id}', [CarController::class, 'show'])->name('detail');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
