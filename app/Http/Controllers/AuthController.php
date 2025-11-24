<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Penduduk;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request with NIK
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nik' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cari user berdasarkan NIK
        $user = User::where('nik', $credentials['nik'])->first();

        // Jika user ditemukan dan password cocok
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            
            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors([
            'nik' => 'NIK atau password yang Anda masukkan salah.',
        ])->withInput($request->except('password'));
    }

    /**
     * Show registration form
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle registration request with NIK
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:users,nik|unique:penduduks,nik',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'no_telepon' => 'nullable|string|max:15',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $validated['nama_lengkap'],
            'nik' => $validated['nik'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
            'is_verified' => false,
        ]);

        // Buat data penduduk
        Penduduk::create([
            'nik' => $validated['nik'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan',
            'agama' => $validated['agama'],
            'alamat' => $validated['alamat_lengkap'],
            'rt' => $validated['rt'],
            'rw' => $validated['rw'],
            'status_perkawinan' => $validated['status_perkawinan'],
            'no_telepon' => $validated['no_telepon'],
        ]);

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Registrasi berhasil! Selamat datang di Sistem Informasi Desa.');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // ==============================
    // REDIRECT GOOGLE
    // ==============================
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // ==============================
    // CALLBACK GOOGLE - UPDATED
    // ==============================
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Cek user berdasarkan email
            $user = User::where('email', $googleUser->getEmail())->first();

            // Jika user sudah ada dan sudah lengkap datanya (ada NIK dan data penduduk)
            if ($user && $user->nik && Penduduk::where('nik', $user->nik)->exists()) {
                // Update provider info jika belum ada
                if (!$user->provider) {
                    $user->update([
                        'provider' => 'google',
                        'provider_id' => $googleUser->getId(),
                        'avatar' => $googleUser->getAvatar(),
                    ]);
                }
                
                Auth::login($user);
                
                // Redirect berdasarkan role
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->route('user.dashboard');
                }
            }

            // Jika user sudah ada tapi belum lengkap data (belum ada NIK atau data penduduk)
            if ($user) {
                // Simpan data Google user ke session untuk proses registrasi
                session([
                    'google_user' => [
                        'user_id' => $user->id, // Simpan ID user yang sudah ada
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'avatar' => $googleUser->getAvatar(),
                        'provider' => 'google',
                        'provider_id' => $googleUser->getId(),
                    ]
                ]);
                
                return redirect()->route('register.google.complete')
                    ->with('info', 'Silakan lengkapi data diri Anda untuk melanjutkan.');
            }

            // Jika user baru (belum ada akun sama sekali)
            // Simpan data Google user ke session
            session([
                'google_user' => [
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'avatar' => $googleUser->getAvatar(),
                    'provider' => 'google',
                    'provider_id' => $googleUser->getId(),
                ]
            ]);

            return redirect()->route('register.google.complete')
                ->with('info', 'Silakan lengkapi data diri Anda untuk menyelesaikan registrasi.');

        } catch (\Exception $e) {
            return redirect()->route('login')
                ->with('error', 'Terjadi kesalahan saat login dengan Google. Silakan coba lagi.');
        }
    }

    // ==============================
    // FORM REGISTRASI GOOGLE - NEW
    // ==============================
    public function showGoogleRegistrationForm()
    {
        // Cek apakah ada data Google user di session
        if (!session('google_user')) {
            return redirect()->route('login')
                ->with('error', 'Sesi login Google tidak ditemukan. Silakan login kembali.');
        }

        $googleUser = session('google_user');
        
        return view('auth.register-google', compact('googleUser'));
    }

    // ==============================
    // SIMPAN REGISTRASI GOOGLE - NEW
    // ==============================
    public function completeGoogleRegistration(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:users,nik|unique:penduduks,nik',
            'no_kk' => 'nullable|string|size:16',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'agama' => 'required|string',
            'alamat_lengkap' => 'required|string',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pendidikan_terakhir' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'status_kependudukan' => 'nullable|in:Tetap,Pendatang,Pindah',
            'nama_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:15',
        ]);

        // Ambil data Google dari session
        $googleUser = session('google_user');
        
        if (!$googleUser) {
            return redirect()->route('login')
                ->with('error', 'Sesi login Google tidak ditemukan. Silakan login kembali.');
        }

        // Cek apakah user sudah ada berdasarkan email atau user_id
        if (isset($googleUser['user_id'])) {
            // User sudah ada, update saja
            $user = User::find($googleUser['user_id']);
            $user->update([
                'name' => $request->nama_lengkap,
                'nik' => $request->nik,
                'provider' => $googleUser['provider'],
                'provider_id' => $googleUser['provider_id'],
                'avatar' => $googleUser['avatar'],
                'is_verified' => true,
            ]);
        } else {
            // User baru, buat akun baru
            $user = User::create([
                'name' => $request->nama_lengkap,
                'nik' => $request->nik,
                'email' => $googleUser['email'],
                'password' => bcrypt(Str::random(16)), // Password random karena login via Google
                'role' => 'user',
                'provider' => $googleUser['provider'],
                'provider_id' => $googleUser['provider_id'],
                'avatar' => $googleUser['avatar'],
                'is_verified' => true, // Otomatis verified karena email Google
            ]);
        }

        // Buat data penduduk
        Penduduk::create([
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan',
            'agama' => $request->agama,
            'alamat' => $request->alamat_lengkap,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'status_perkawinan' => $request->status_perkawinan,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'pekerjaan' => $request->pekerjaan,
            'status_kependudukan' => $request->status_kependudukan ?? 'Tetap',
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'no_telepon' => $request->no_telepon,
        ]);

        // Hapus data Google dari session
        session()->forget('google_user');

        // Login user
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Registrasi berhasil! Selamat datang di Sistem Informasi Desa.');
    }

    // ==============================
    // FORGOT PASSWORD METHODS
    // ==============================
    public function showRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        // Implementasi forgot password
    }

    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        // Implementasi reset password
    }

    // ==============================
    // EMAIL VERIFICATION METHODS
    // ==============================
    public function showVerifyForm()
    {
        return view('auth.verify-email');
    }

    public function sendOtp(Request $request)
    {
        // Implementasi kirim OTP
    }

    public function verify(Request $request)
    {
        // Implementasi verifikasi OTP
    }

    // ==============================
    // SSO METHODS
    // ==============================
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        // Implementasi callback untuk provider lain
    }
}