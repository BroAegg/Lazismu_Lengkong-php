<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDonationController;
use App\Http\Controllers\Admin\AdminProgramController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminReportController;
use Illuminate\Support\Facades\Route;

// ══════════════════════════════════════════════════════
// PUBLIC ROUTES
// ══════════════════════════════════════════════════════

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/kalkulator-zakat', [KalkulatorController::class, 'index'])->name('kalkulator');
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::get('/program/{slug}', [ProgramController::class, 'show'])->name('program.show');
Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
Route::get('/donasi/{slug}', [DonasiController::class, 'show'])->name('donasi.show');

// Static Pages
Route::get('/tentang-kami', [HalamanController::class, 'tentangKami'])->name('tentang-kami');
Route::get('/kontak', [HalamanController::class, 'kontak'])->name('kontak');
Route::get('/bantuan', [HalamanController::class, 'bantuan'])->name('bantuan');
Route::get('/kebijakan-privasi', [HalamanController::class, 'kebijakanPrivasi'])->name('kebijakan-privasi');
Route::get('/syarat-ketentuan', [HalamanController::class, 'syaratKetentuan'])->name('syarat-ketentuan');

// ══════════════════════════════════════════════════════
// AUTH ROUTES (Guest Only)
// ══════════════════════════════════════════════════════

Route::middleware('guest')->group(function () {
    Route::get('/masuk', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/masuk', [AuthController::class, 'login'])->name('login.attempt');
    Route::get('/daftar', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/daftar', [AuthController::class, 'register'])->name('register.store');
    Route::get('/lupa-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/lupa-password', [AuthController::class, 'sendResetLink'])->name('password.email');
});

// ══════════════════════════════════════════════════════
// AUTHENTICATED ROUTES
// ══════════════════════════════════════════════════════

Route::middleware('auth')->group(function () {
    Route::post('/keluar', [AuthController::class, 'logout'])->name('logout');

    // User Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Account
    Route::get('/akun', [AkunController::class, 'index'])->name('akun');
    Route::put('/akun', [AkunController::class, 'update'])->name('akun.update');
    Route::put('/akun/password', [AkunController::class, 'updatePassword'])->name('akun.password');

    // Donation (authenticated)
    Route::post('/donasi', [DonasiController::class, 'store'])->name('donasi.store');
    Route::get('/donasi/sukses/{invoice}', [DonasiController::class, 'success'])->name('donasi.success');

    // ══════════════════════════════════════════════════
    // ADMIN ROUTES (Staff Only)
    // ══════════════════════════════════════════════════

    Route::prefix('admin')->name('admin.')->middleware(['role:kepala_kantor,administrasi,fund_rising,staff_pelayanan', 'log.activity'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Donation Management
        Route::get('/donasi', [AdminDonationController::class, 'index'])->name('donations.index');
        Route::get('/donasi/{id}', [AdminDonationController::class, 'show'])->name('donations.show');
        Route::put('/donasi/{id}/verify', [AdminDonationController::class, 'verify'])->name('donations.verify');

        // Program Management
        Route::resource('program', AdminProgramController::class)->except(['show']);

        // User Management (Kepala Kantor & Administrasi)
        Route::middleware('role:kepala_kantor,administrasi')->group(function () {
            Route::resource('users', AdminUserController::class)->except(['show']);
        });

        // Reports (Kepala Kantor & Administrasi)
        Route::middleware('role:kepala_kantor,administrasi')->group(function () {
            Route::get('/laporan', [AdminReportController::class, 'index'])->name('reports.index');
            Route::get('/laporan/pdf', [AdminReportController::class, 'exportPdf'])->name('reports.pdf');
        });
    });
});
