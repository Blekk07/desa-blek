<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::where('user_id', auth()->id())
                            ->orderBy('created_at', 'desc')
                            ->get();
        
        return view('user.pengaduan.index', compact('pengaduan'));
    }

    public function create()
    {
        return view('user.pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Pengaduan::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'isi' => $request->deskripsi, 
            'status' => 'pending'
        ]);

        return redirect()->route('pengaduan.index')
                        ->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::where('user_id', auth()->id())
                            ->where('id', $id)
                            ->firstOrFail();
        
        return view('user.pengaduan.show', compact('pengaduan'));
    }
}
