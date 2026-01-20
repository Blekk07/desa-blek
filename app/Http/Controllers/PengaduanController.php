<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /** =========================
     *  USER AREA
     *  ========================= */
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
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tanggal_waktu_kejadian' => 'required|date_format:Y-m-d\TH:i',
            'lokasi_kejadian' => 'required|string|max:255',
            'uraian_kejadian' => 'required|string',
            'prioritas' => 'nullable|string|max:255',
            'lampiran' => 'nullable|array',
            'lampiran.*' => 'nullable|file|mimes:jpg,jpeg,png,mp4,avi,pdf,doc,docx,mp3,wav|max:10240'
        ]);

        // Process file uploads if any
        $lampiranPaths = [];
        if ($request->hasFile('lampiran')) {
            foreach ($request->file('lampiran') as $file) {
                $path = $file->store('pengaduan-lampiran', 'public');
                $lampiranPaths[] = $path;
            }
        }

        Pengaduan::create([
            'user_id' => auth()->id(),
            'judul' => $validated['judul'],
            'kategori' => $validated['kategori'],
            'tanggal_waktu_kejadian' => $validated['tanggal_waktu_kejadian'],
            'lokasi_kejadian' => $validated['lokasi_kejadian'],
            'uraian_kejadian' => $validated['uraian_kejadian'],
            'deskripsi' => $validated['uraian_kejadian'], // For backward compatibility
            'isi' => $validated['uraian_kejadian'], // For backward compatibility
            'lampiran' => !empty($lampiranPaths) ? $lampiranPaths : null,
            'prioritas' => $validated['prioritas'] ?? 'Sedang',
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


    /** =========================
     *  ADMIN AREA
     *  ========================= */
    public function adminIndex()
    {
        $pengaduan = Pengaduan::latest()->get();
        return view('admin.pengaduan.index', compact('pengaduan'));
    }

    public function adminShow($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    public function adminUpdateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,proses,selesai'
        ]);

        // Mapping status dari request ke ENUM MySQL
        $mapStatus = [
            'pending' => 'pending',
            'proses' => 'diproses',
            'selesai' => 'selesai'
        ];

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = $mapStatus[$request->status]; // aman & tidak error
        $pengaduan->save();

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui');
    }
}
