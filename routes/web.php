<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDonationController;
use App\Http\Controllers\Admin\AdminProgramController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminSettingController;
use Illuminate\Support\Facades\Route;

// ══════════════════════════════════════════════════════
// PUBLIC ROUTES
// ══════════════════════════════════════════════════════

Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// Test HTML Reference (exact copy for comparison)
Route::get('/test-html', function () {
    return view('pages.test-html');
});

Route::get('/kalkulator-zakat', [KalkulatorController::class, 'index'])->name('kalkulator');
Route::get('/program', [ProgramController::class, 'index'])->name('program');
Route::get('/program/{slug}', [ProgramController::class, 'show'])->name('program.show');
Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
Route::get('/donasi/{slug}', [DonasiController::class, 'show'])->name('donasi.show');

// Donation submission (public - allows guest donations)
Route::post('/donasi', [DonasiController::class, 'store'])->name('donasi.store');
Route::get('/donasi/sukses/{invoice}', [DonasiController::class, 'success'])->name('donasi.success');

// Static Pages
Route::get('/tentang-kami', [HalamanController::class, 'tentangKami'])->name('tentang-kami');
Route::get('/kontak', [HalamanController::class, 'kontak'])->name('kontak');
Route::get('/bantuan', [HalamanController::class, 'bantuan'])->name('bantuan');
Route::get('/kebijakan-privasi', [HalamanController::class, 'kebijakanPrivasi'])->name('kebijakan-privasi');
Route::get('/syarat-ketentuan', [HalamanController::class, 'syaratKetentuan'])->name('syarat-ketentuan');

// ══════════════════════════════════════════════════════
// AUTHENTICATED ROUTES
// ══════════════════════════════════════════════════════

Route::middleware('auth')->group(function () {
    // User Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Management (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Account
    Route::get('/akun', [AkunController::class, 'index'])->name('akun');
    Route::put('/akun', [AkunController::class, 'update'])->name('akun.update');
    Route::put('/akun/password', [AkunController::class, 'updatePassword'])->name('akun.password');

    // ══════════════════════════════════════════════════
    // ADMIN ROUTES (Staff Only)
    // ══════════════════════════════════════════════════

    Route::prefix('admin')->name('admin.')->middleware('role:kepala_kantor,administrasi,fund_rising,staff_pelayanan')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Donation Management
        Route::get('/donasi', [AdminDonationController::class, 'index'])->name('donations.index');
        Route::get('/donasi/{id}', [AdminDonationController::class, 'show'])->name('donations.show');
        Route::put('/donasi/{id}/verify', [AdminDonationController::class, 'verify'])->name('donations.verify');
        Route::put('/donasi/{id}/reject', [AdminDonationController::class, 'reject'])->name('donations.reject');

        // Program Management
        Route::resource('program', AdminProgramController::class)->except(['show']);

        // User Management (Kepala Kantor & Administrasi Only)
        Route::middleware('role:kepala_kantor,administrasi')->group(function () {
            Route::resource('users', AdminUserController::class)->except(['show']);
        });

        // Reports (Kepala Kantor & Administrasi Only)
        Route::middleware('role:kepala_kantor,administrasi')->group(function () {
            Route::get('/laporan', [AdminReportController::class, 'index'])->name('reports.index');
            Route::get('/laporan/pdf', [AdminReportController::class, 'exportPdf'])->name('reports.pdf');
        });
        // Settings (Kepala Kantor & Administrasi Only)
        Route::middleware('role:kepala_kantor,administrasi')->group(function () {
            Route::get('/pengaturan', [AdminSettingController::class, 'index'])->name('settings.index');
            Route::post('/pengaturan', [AdminSettingController::class, 'update'])->name('settings.update');
        });
    });
});

// Laravel Breeze Authentication Routes
require __DIR__.'/auth.php';
