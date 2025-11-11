<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact-us', function () {
    return view('contact');
});

Route::get('/verify-email', [AuthController::class, 'showVerifyForm'])->name('verify.form');
Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('send.otp');
Route::post('/verify-email', [AuthController::class, 'verify'])->name('verify.otp');

// Route untuk guest
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::get('/auth/{provider}', [AuthController::class, 'redirect'])->name('sso.redirect');
    Route::get('/auth/{provider}/callback', [AuthController::class, 'callback'])->name('sso.callback');
    Route::get('/forgot-password', [AuthController::class, 'showRequestForm'])->name('forgot_password.email_form');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('forgot_password.send_link');
    Route::get('/password-reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password-reset', [AuthController::class, 'resetPassword'])->name('password.update');
});

// Route untuk auth
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/myprofile', function () {
        return view('myprofile');
    })->name('myprofile');

    // Admin routes
    Route::middleware(['cekRole:admin'])->group(function () {
        Route::get('/verifikasi', function () {
            return view('admin.verifikasi');
        })->name('admin.verifikasi');
        Route::get('/seleksi', function () {
            return view('admin.seleksi');
        })->name('admin.seleksi');
        Route::get('/pengumuman', function () {
            return view('admin.pengumuman');
        })->name('admin.pengumuman');
        Route::get('/laporan', function () {
            return view('admin.laporan');
        })->name('admin.laporan');
    });

    // User routes - PERBAIKI ROUTE PENGADUAN DI SINI
    Route::middleware(['cekRole:user'])->group(function () {
        Route::get('/biodata', function () {
            return view('user.biodata');
        })->name('user.biodata');
        Route::get('/dokumen', function () {
            return view('user.dokumen');
        })->name('user.dokumen');
        Route::get('/status', function () {
            return view('user.status');
        })->name('user.status');
        
        // ✅ ROUTE PENGADUAN YANG BENAR
        Route::get('/pengaduan', [PengaduanController::class, 'indexUser'])->name('user.pengaduan');
        Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
        Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store'); // POST ke /pengaduan, BUKAN /pengaduan/create
        Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');
    });
});