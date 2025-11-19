<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Filter berdasarkan role
        if ($request->has('role') && $request->role != '') {
            $query->where('role', $request->role);
        }

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%");
            });
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(10);

        // Statistik
        $totalUsers = User::count();
        $adminCount = User::where('role', 'admin')->count();
        $userCount = User::where('role', 'user')->count();
        $verifiedCount = User::where('is_verified', true)->count();

        return view('admin.users.index', compact(
            'users',
            'totalUsers',
            'adminCount',
            'userCount',
            'verifiedCount'
        ));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:users,nik',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,user',
            'status' => 'required|in:active,inactive',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Buat user data
        $userData = [
            'name' => $validated['name'],
            'nik' => $validated['nik'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'status' => $validated['status'],
            'is_verified' => true, // Auto-verify untuk admin create
        ];

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '_' . $validated['nik'] . '.' . $avatar->getClientOriginalExtension();
            
            // Simpan ke folder public/assets/images/user
            $avatar->move(public_path('assets/images/user'), $avatarName);
            $userData['avatar'] = $avatarName;
        } else {
            // Default avatar
            $userData['avatar'] = 'avatar-default.jpg';
        }

        User::create($userData);

        return redirect()->route('admin.users.index')
                        ->with('success', 'User berhasil ditambahkan!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $penduduk = Penduduk::where('nik', $user->nik)->first();
        
        return view('admin.users.show', compact('user', 'penduduk'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,user',
            'status' => 'required|in:active,inactive',
            'is_verified' => 'sometimes|boolean',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists and not default
            if ($user->avatar && $user->avatar != 'avatar-default.jpg') {
                $oldAvatarPath = public_path('assets/images/user/' . $user->avatar);
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }
            
            $avatar = $request->file('avatar');
            $avatarName = time() . '_' . $user->id . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('assets/images/user'), $avatarName);
            $validated['avatar'] = $avatarName;
        }

        // Handle checkbox boolean
        $validated['is_verified'] = $request->has('is_verified') ? true : false;

        $user->update($validated);

        return redirect()->route('admin.users.index')
                        ->with('success', 'User berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent deleting own account
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                            ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri!');
        }

        // Cek jika user memiliki data terkait
        if ($user->pengajuanSurat()->exists() || $user->pengaduan()->exists()) {
            return redirect()->route('admin.users.index')
                            ->with('error', 'User tidak dapat dihapus karena memiliki data terkait!');
        }

        // Delete avatar if exists and not default
        if ($user->avatar && $user->avatar != 'avatar-default.jpg') {
            $avatarPath = public_path('assets/images/user/' . $user->avatar);
            if (file_exists($avatarPath)) {
                unlink($avatarPath);
            }
        }

        $user->delete();

        return redirect()->route('admin.users.index')
                        ->with('success', 'User berhasil dihapus!');
    }

    public function resetPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.users.show', $id)
                        ->with('success', 'Password berhasil direset!');
    }

    public function updateStatus($id)
    {
        $user = User::findOrFail($id);
        
        $user->update([
            'status' => $user->status == 'active' ? 'inactive' : 'active'
        ]);

        return redirect()->route('admin.users.index')
                        ->with('success', 'Status user berhasil diubah!');
    }
}