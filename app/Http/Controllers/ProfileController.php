<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Penduduk;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Ambil data penduduk berdasarkan NIK user
        $penduduk = Penduduk::where('nik', $user->nik)->first();
        
        return view('myprofile', compact('user', 'penduduk'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_telepon' => 'nullable|string|max:15',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Update user data
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        
        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists and not default
            if ($user->avatar && $user->avatar != 'avatar-default.jpg' && file_exists(public_path('assets/images/user/' . $user->avatar))) {
                unlink(public_path('assets/images/user/' . $user->avatar));
            }
            
            $avatar = $request->file('avatar');
            $avatarName = time() . '_' . $user->id . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('assets/images/user'), $avatarName);
            $user->avatar = $avatarName;
        }
        
        $user->save();

        // Update data penduduk jika ada
        if ($request->has('update_penduduk')) {
            $penduduk = Penduduk::where('nik', $user->nik)->first();
            
            if ($penduduk) {
                $penduduk->update([
                    'nama_lengkap' => $validated['name'],
                    'no_telepon' => $validated['no_telepon'] ?? $penduduk->no_telepon,
                ]);
            }
        }

        return redirect()->route('myprofile')->with('success', 'Profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // Prevent password change for Google OAuth users
        if ($user->provider === 'google') {
            return back()->withErrors(['error' => 'User yang login dengan Google tidak dapat mengubah password.']);
        }

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Check if current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('myprofile')->with('success', 'Password berhasil diubah!');
    }
}