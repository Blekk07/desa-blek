<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');


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

        // Google Registration Complete
    Route::get('/register/google/complete', [AuthController::class, 'showGoogleRegistrationForm'])
        ->name('register.google.complete');
    Route::post('/register/google/complete', [AuthController::class, 'completeGoogleRegistration'])
        ->name('register.google.store');

    Route::get('/forgot-password', [AuthController::class, 'showRequestForm'])->name('forgot_password.email_form');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('forgot_password.send_link');
    Route::get('/password-reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password-reset', [AuthController::class, 'resetPassword'])->name('password.update');
});

// Authenticated Routes
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // PROFILE ROUTES
    Route::get('/myprofile', [ProfileController::class, 'index'])->name('myprofile');
    Route::put('/myprofile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/myprofile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // ========== ADMIN ROUTES ==========
    Route::middleware(['cekRole:admin'])->prefix('admin')->group(function () {
        
        // Admin Dashboard
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

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

        // Admin Pengajuan Surat
        Route::get('/pengajuan-surat', [PengajuanSuratController::class, 'adminIndex'])->name('admin.pengajuan-surat.index');
        Route::get('/pengajuan-surat/{id}', [PengajuanSuratController::class, 'adminShow'])->name('admin.pengajuan-surat.show');
        Route::post('/pengajuan-surat/{id}/update-status', [PengajuanSuratController::class, 'updateStatus'])->name('admin.pengajuan-surat.update-status');
        Route::delete('/pengajuan-surat/{id}', [PengajuanSuratController::class, 'destroy'])->name('admin.pengajuan-surat.destroy');

        // Admin Pengaduan
        Route::get('/pengaduan', [PengaduanController::class, 'adminIndex'])->name('admin.pengaduan.index');
        Route::get('/pengaduan/{id}', [PengaduanController::class, 'adminShow'])->name('admin.pengaduan.show');
        Route::post('/pengaduan/{id}/status', [PengaduanController::class, 'adminUpdateStatus'])->name('admin.pengaduan.updateStatus');

        // Admin User Management - FIXED ROUTES
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
            Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
            Route::post('/', [UserController::class, 'store'])->name('admin.users.store');
            Route::get('/{id}', [UserController::class, 'show'])->name('admin.users.show');
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
            Route::put('/{id}', [UserController::class, 'update'])->name('admin.users.update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
            Route::post('/{id}/reset-password', [UserController::class, 'resetPassword'])->name('admin.users.reset-password');
            Route::post('/{id}/status', [UserController::class, 'updateStatus'])->name('admin.users.update-status');
        });

    });

    // ========== USER ROUTES ==========
    Route::middleware(['cekRole:user'])->group(function () {

        // User Dashboard
        Route::get('/user/dashboard', function () {
            return view('user.dashboard');
        })->name('user.dashboard');

        // PENGADUAN USER
        Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
        Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
        Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
        Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');

        // PROFIL DESA
        Route::get('/profile-desa', fn() => view('user.profile-desa'))->name('user.profile-desa');

        // PENGAJUAN SURAT
        Route::get('/pengajuan-surat', [PengajuanSuratController::class, 'index'])->name('user.pengajuan-surat.index');
        Route::get('/pengajuan-surat/create', [PengajuanSuratController::class, 'create'])->name('user.pengajuan-surat.create');
        Route::post('/pengajuan-surat', [PengajuanSuratController::class, 'store'])->name('user.pengajuan-surat.store');
        Route::get('/pengajuan-surat/{id}', [PengajuanSuratController::class, 'show'])->name('user.pengajuan-surat.show');

        // HELP PAGE
        Route::get('/help', [HelpController::class, 'help'])->name('help');

        // LAPORAN WARGA (USER) - HAPUS ATAU PERBAIKI
        // Route::post('/laporan/store', function (\Illuminate\Http\Request $request) {
        //     \App\Models\Laporan::create([
        //         'user_id' => auth()->id(),
        //         'judul' => $request->judul,
        //         'isi' => $request->isi,
        //         'status' => 'menunggu'
        //     ]);
        //     return redirect()->route('admin.laporan')
        //         ->with('success', 'Laporan berhasil dikirim ke Admin!');
        // })->name('user.laporan.store');

    });
});