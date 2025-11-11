<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function indexUser()
    {
        $pengaduan = Pengaduan::where('user_id', auth()->id())
                            ->orderBy('created_at', 'desc')
                            ->get();
        
        return view('user.pengaduan', compact('pengaduan'));
    }

    public function create()
    {
        return view('user.pengaduan_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // ISI KEDUA KOLOM dengan nilai yang sama
        Pengaduan::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'isi' => $request->deskripsi, // Isi kolom isi juga
            'status' => 'pending'
        ]);

        return redirect()->route('user.pengaduan')
                        ->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::where('user_id', auth()->id())
                            ->where('id', $id)
                            ->firstOrFail();
        
        return view('user.pengaduan_show', compact('pengaduan'));
    }
}