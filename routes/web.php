<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\HelpController; // <-- Tambahkan ini

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact-us', function () {
    return view('contact');
});

// Email verification
Route::get('/verify-email', [AuthController::class, 'showVerifyForm'])->name('verify.form');
Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('send.otp');
Route::post('/verify-email', [AuthController::class, 'verify'])->name('verify.otp');

// Guest Routes
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

// Authenticated Routes
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/myprofile', fn() => view('myprofile'))->name('myprofile');

    // ========== ADMIN ==========
    Route::middleware(['cekRole:admin'])->group(function () {

        Route::get('/verifikasi', fn() => view('admin.verifikasi'))->name('admin.verifikasi');
        Route::get('/seleksi', fn() => view('admin.seleksi'))->name('admin.seleksi');
        Route::get('/pengumuman', fn() => view('admin.pengumuman'))->name('admin.pengumuman');
        Route::get('/laporan', fn() => view('admin.laporan'))->name('admin.laporan');

        // CRUD Penduduk
        Route::resource('penduduk', PendudukController::class)->names([
            'index' => 'admin.penduduk.index',
            'create' => 'admin.penduduk.create',
            'store' => 'admin.penduduk.store',
            'show' => 'admin.penduduk.show',
            'edit' => 'admin.penduduk.edit',
            'update' => 'admin.penduduk.update',
            'destroy' => 'admin.penduduk.destroy',
        ]);
    });

    // ========== USER ==========
    Route::middleware(['cekRole:user'])->group(function () {

        Route::get('/biodata', fn() => view('user.biodata'))->name('user.biodata');
        Route::get('/dokumen', fn() => view('user.dokumen'))->name('user.dokumen');
        Route::get('/status', fn() => view('user.status'))->name('user.status');

        /** PENGADUAN USER */
        Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
        Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
        Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
        Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');

        /** PROFIL DESA */
        Route::get('/profile-desa', fn() => view('user.profile-desa'))->name('user.profile-desa');

        /** PENGAJUAN SURAT */
        Route::get('/pengajuan-surat', fn() => view('user.pengajuan-surat'))->name('user.pengajuan-surat');
        Route::post('/pengajuan-surat/submit', function () {
            // proses submit surat disini
        })->name('user.pengajuan-surat.submit');

        /** HELP PAGE */
        Route::get('/help', [HelpController::class, 'help'])->name('help');
    });
});
