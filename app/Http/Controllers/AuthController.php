<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Penduduk;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use App\Models\EmailOtp;
use App\Mail\VerifyOtpMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

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
     * Show the form to request a password reset link.
     */
    public function showRequestForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Send a password reset link to the given user.
     */
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', __($status));
        }

        return back()->withErrors(['email' => __($status)]);
    }

    /**
     * Show the password reset form for the given token.
     */
    public function showResetForm($token)
    {
        $email = request('email');
        return view('auth.reset-password', compact('token', 'email'));
    }

    /**
     * Reset the given user's password.
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', __($status));
        }

        return back()->withErrors(['email' => [__($status)]]);
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

        $user = User::where('nik', $credentials['nik'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();

            return $user->role === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('user.dashboard');
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
            'no_kk' => 'nullable|string|size:16',
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

            'pendidikan_terakhir' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'status_kependudukan' => 'nullable|in:Tetap,Pendatang,Pindah',

            'no_telepon' => 'nullable|string|max:15',
        ]);

        // Buat user
        $user = User::create([
            'name' => $validated['nama_lengkap'],
            'nik' => $validated['nik'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
            'is_verified' => false,
        ]);

        // Buat penduduk
        Penduduk::create([
            'nik' => $validated['nik'],
            'no_kk' => $validated['no_kk'] ?? null,
            'nama_lengkap' => $validated['nama_lengkap'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan',
            'agama' => $validated['agama'],
            'alamat' => $validated['alamat_lengkap'],
            'rt' => $validated['rt'],
            'rw' => $validated['rw'],
            'status_perkawinan' => $validated['status_perkawinan'],

            'pendidikan_terakhir' => $validated['pendidikan_terakhir'] ?? null,
            'pekerjaan' => $validated['pekerjaan'] ?? null,
            'status_kependudukan' => $validated['status_kependudukan'] ?? 'Tetap',

            'no_telepon' => $validated['no_telepon'] ?? null,
        ]);

        // Generate OTP code
        $otp_code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        
        // Save OTP to database
        EmailOtp::create([
            'user_id' => null,
            'email' => $validated['email'],
            'code' => $otp_code,
            'expires_at' => Carbon::now()->addMinutes(15),
            'used' => false,
        ]);

        // Send OTP email
        Mail::to($validated['email'])->send(new VerifyOtpMail($otp_code, $validated['nama_lengkap']));

        // Store pending user ID in session
        session(['pending_user_id' => $user->id]);

        return redirect()->route('verify.form')->with('success', 'Registrasi berhasil! Silakan verifikasi email Anda dengan kode OTP yang telah dikirim.');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // ==============
    // GOOGLE SSO
    // ==============
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user && $user->nik && Penduduk::where('nik', $user->nik)->exists()) {
                if (!$user->provider) {
                    $user->update([
                        'provider' => 'google',
                        'provider_id' => $googleUser->getId(),
                        'avatar' => $googleUser->getAvatar(),
                    ]);
                }

                Auth::login($user);

                return $user->role === 'admin'
                    ? redirect()->route('admin.dashboard')
                    : redirect()->route('user.dashboard');
            }

            if ($user) {
                session([
                    'google_user' => [
                        'user_id' => $user->id,
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
                ->with('error', 'Terjadi kesalahan saat login dengan Google.');
        }
    }

    public function showGoogleRegistrationForm()
    {
        if (!session('google_user')) {
            return redirect()->route('login')
                ->with('error', 'Sesi login Google tidak ditemukan.');
        }

        $googleUser = session('google_user');

        return view('auth.register-google', compact('googleUser'));
    }

    public function completeGoogleRegistration(Request $request)
    {
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

        $googleUser = session('google_user');

        if (!$googleUser) {
            return redirect()->route('login')
                ->with('error', 'Sesi login Google tidak ditemukan.');
        }

        if (isset($googleUser['user_id'])) {
            $user = User::find($googleUser['user_id']);
            $user->update([
                'name' => $validated['nama_lengkap'],
                'nik' => $validated['nik'],
                'provider' => $googleUser['provider'],
                'provider_id' => $googleUser['provider_id'],
                'avatar' => $googleUser['avatar'],
                'is_verified' => true,
            ]);
        } else {
            $user = User::create([
                'name' => $validated['nama_lengkap'],
                'nik' => $validated['nik'],
                'email' => $googleUser['email'],
                'password' => bcrypt(Str::random(16)),
                'role' => 'user',
                'provider' => $googleUser['provider'],
                'provider_id' => $googleUser['provider_id'],
                'avatar' => $googleUser['avatar'],
                'is_verified' => true,
            ]);
        }

        Penduduk::create([
            'nik' => $validated['nik'],
            'no_kk' => $validated['no_kk'] ?? null,
            'nama_lengkap' => $validated['nama_lengkap'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan',
            'agama' => $validated['agama'],
            'alamat' => $validated['alamat_lengkap'],
            'rt' => $validated['rt'],
            'rw' => $validated['rw'],
            'status_perkawinan' => $validated['status_perkawinan'],
            'pendidikan_terakhir' => $validated['pendidikan_terakhir'] ?? null,
            'pekerjaan' => $validated['pekerjaan'] ?? null,
            'status_kependudukan' => $validated['status_kependudukan'] ?? 'Tetap',
            'nama_ayah' => $validated['nama_ayah'] ?? null,
            'nama_ibu' => $validated['nama_ibu'] ?? null,
            'no_telepon' => $validated['no_telepon'] ?? null,
        ]);

        session()->forget('google_user');

        Auth::login($user);

        return redirect('/dashboard')
            ->with('success', 'Registrasi berhasil! Selamat datang di Sistem Informasi Desa.');
    }

    /**
     * Show email verification form
     */
    public function showVerifyForm()
    {
        if (!session('pending_user_id')) {
            return redirect()->route('login');
        }

        return view('auth.verify-email-otp');
    }

    /**
     * Send OTP (resend)
     */
    public function sendOtp(Request $request)
    {
        $user_id = session('pending_user_id');
        if (!$user_id) {
            return redirect()->route('login');
        }

        $user = User::find($user_id);
        if (!$user) {
            return redirect()->route('login');
        }

        // Generate new OTP code
        $otp_code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        
        // Create new OTP entry
        EmailOtp::create([
            'user_id' => null,
            'email' => $user->email,
            'code' => $otp_code,
            'expires_at' => Carbon::now()->addMinutes(15),
            'used' => false,
        ]);

        // Send OTP email
        Mail::to($user->email)->send(new VerifyOtpMail($otp_code, $user->name));

        return back()->with('success', 'Kode OTP baru telah dikirim ke email Anda.');
    }

    /**
     * Verify OTP code
     */
    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:6',
        ]);

        $user_id = session('pending_user_id');
        if (!$user_id) {
            return redirect()->route('login');
        }

        $user = User::find($user_id);
        if (!$user) {
            return redirect()->route('login');
        }

        // Find matching OTP
        $otp = EmailOtp::where('email', $user->email)
            ->where('code', $request->code)
            ->where('used', false)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$otp) {
            return back()->withErrors(['code' => 'Kode OTP tidak valid atau sudah expired.']);
        }

        // Mark OTP as used
        $otp->update(['used' => true]);

        // Mark user as verified
        $user->update(['is_verified' => true]);

        // Clear session
        session()->forget('pending_user_id');

        // Login user
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Email terverifikasi! Selamat datang di Sistem Informasi Desa.');
    }
}
