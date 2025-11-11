<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Penduduk;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('nik', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'nik' => 'NIK atau password tidak sesuai.',
        ])->onlyInput('nik');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'nik' => 'required|string|size:16|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'alamat_lengkap' => 'required|string',
        'jenis_kelamin' => 'required|in:L,P',
        'status_kependudukan' => 'nullable|in:Tetap,Pendatang,Pindah',
    ]);

    // Buat user
    $user = User::create([
        'name' => $request->nama_lengkap,
        'nik' => $request->nik,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'user',
    ]);

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

    return redirect()->route('login')->with('success', 'Registrasi berhasil! Silahkan login.');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
