<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProfileDesaController;
use App\Http\Controllers\BeritaController as PublicBeritaController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');


Route::get('/', function () {
    return view('welcome');
})->name('home');

use App\Http\Controllers\ContactController;

Route::get('/contact-us', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');

// Public profile and help pages (styled like contact page)
Route::get('/profile-desa', [ProfileDesaController::class, 'publicShow'])->name('profile-desa');
Route::get('/help', [\App\Http\Controllers\HelpController::class, 'publicHelp'])->name('help.public');

// Berita public listing
Route::get('/berita', [PublicBeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{berita}', [PublicBeritaController::class, 'show'])->name('berita.show');

// Public signed verification link for pengajuan surat (used by QR code)
Route::get('/pengajuan/verify/{id}', [PengajuanSuratController::class, 'verify'])->name('pengajuan.verify')->middleware('signed');

// TTD-style verification URL (format: /pengajuan/ttd?p=ID|USER_ID|ROLE|SIG)
Route::get('/pengajuan/ttd', [PengajuanSuratController::class, 'ttd'])->name('pengajuan.ttd');

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
    Route::get('/password-reset/{token}', [AuthController::class, 'showResetForm'])->where('token', '.*')->name('password.reset');
    Route::post('/password-reset', [AuthController::class, 'resetPassword'])->name('password.update');
});

// Authenticated Routes
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->role === 'admin') {
            return view('admin.dashboard');
        } else {
            // User Dashboard Stats
            $riwayat = \App\Models\Pengaduan::where('user_id', auth()->id())
                        ->latest()
                        ->limit(5)
                        ->get();
            
            // User's pengajuan surat stats
            $totalSurat = \App\Models\PengajuanSurat::where('user_id', auth()->id())->count();
            $suratPending = \App\Models\PengajuanSurat::where('user_id', auth()->id())
                            ->where('status', 'pending')->count();
            $suratDiproses = \App\Models\PengajuanSurat::where('user_id', auth()->id())
                            ->where('status', 'diproses')->count();
            $suratSelesai = \App\Models\PengajuanSurat::where('user_id', auth()->id())
                            ->where('status', 'selesai')->count();
            
            // Total pengaduan warga (global - untuk statistik desa)
            $totalPengaduan = \App\Models\Pengaduan::count();
            $pengaduanSelesai = \App\Models\Pengaduan::where('status', 'selesai')->count();
            
            // Total penduduk
            $totalPenduduk = \App\Models\Penduduk::count();
            
            return view('user.dashboard', compact(
                'riwayat',
                'totalSurat',
                'suratPending',
                'suratDiproses',
                'suratSelesai',
                'totalPengaduan',
                'pengaduanSelesai',
                'totalPenduduk'
            ));
        }
    })->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // PROFILE ROUTES
    Route::get('/myprofile', [ProfileController::class, 'index'])->name('myprofile');
    Route::put('/myprofile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/myprofile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // ========== ADMIN ROUTES ==========
    Route::middleware(['cekRole:admin'])->prefix('admin')->group(function () {
        
        // Admin Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

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

        // Admin Berita (CRUD + publish)
        Route::resource('berita', AdminBeritaController::class)->names([
            'index' => 'admin.berita.index',
            'create' => 'admin.berita.create',
            'store' => 'admin.berita.store',
            'show' => 'admin.berita.show',
            'edit' => 'admin.berita.edit',
            'update' => 'admin.berita.update',
            'destroy' => 'admin.berita.destroy',
        ]);
        Route::post('/berita/{berita}/publish', [AdminBeritaController::class, 'publish'])->name('admin.berita.publish');

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
            // User's pengajuan surat stats
            $riwayat = \App\Models\Pengaduan::where('user_id', auth()->id())
                        ->latest()
                        ->limit(5)
                        ->get();
            
            $totalSurat = \App\Models\PengajuanSurat::where('user_id', auth()->id())->count();
            $suratPending = \App\Models\PengajuanSurat::where('user_id', auth()->id())
                            ->where('status', 'pending')->count();
            $suratDiproses = \App\Models\PengajuanSurat::where('user_id', auth()->id())
                            ->where('status', 'diproses')->count();
            $suratSelesai = \App\Models\PengajuanSurat::where('user_id', auth()->id())
                            ->where('status', 'selesai')->count();
            
            // Total pengaduan warga (global - untuk statistik desa)
            $totalPengaduan = \App\Models\Pengaduan::count();
            $pengaduanSelesai = \App\Models\Pengaduan::where('status', 'selesai')->count();
            
            // Total penduduk
            $totalPenduduk = \App\Models\Penduduk::count();
            
            return view('user.dashboard', compact(
                'riwayat',
                'totalSurat',
                'suratPending',
                'suratDiproses',
                'suratSelesai',
                'totalPengaduan',
                'pengaduanSelesai',
                'totalPenduduk'
            ));
        })->name('user.dashboard');

        // PENGADUAN USER
        Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
        Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
        Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
        Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');

        // PROFIL DESA
        Route::get('/profile-desa', [ProfileDesaController::class, 'show'])->name('user.profile-desa');

        // PENGAJUAN SURAT
        Route::get('/pengajuan-surat', [PengajuanSuratController::class, 'index'])->name('user.pengajuan-surat.index');
        Route::get('/pengajuan-surat/create', [PengajuanSuratController::class, 'create'])->name('user.pengajuan-surat.create');
        Route::post('/pengajuan-surat', [PengajuanSuratController::class, 'store'])->name('user.pengajuan-surat.store');
        Route::get('/pengajuan-surat/{id}', [PengajuanSuratController::class, 'show'])->name('user.pengajuan-surat.show');
        Route::get('/pengajuan-surat/{id}/print', [PengajuanSuratController::class, 'print'])->name('user.pengajuan-surat.print');

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