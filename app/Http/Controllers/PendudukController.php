<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index(Request $request)
    {
        $query = Penduduk::query();

        // Filter berdasarkan pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nik', 'like', "%{$search}%")
                  ->orWhere('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('no_kk', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan jenis kelamin
        if ($request->has('jenis_kelamin') && $request->jenis_kelamin != '') {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        // Filter berdasarkan RT/RW
        if ($request->has('rt') && $request->rt != '') {
            $query->where('rt', $request->rt);
        }
        if ($request->has('rw') && $request->rw != '') {
            $query->where('rw', $request->rw);
        }

        $penduduk = $query->orderBy('nama_lengkap', 'asc')->paginate(10);

        // Statistik
        $totalPenduduk = Penduduk::count();
        $lakiLaki = Penduduk::where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan = Penduduk::where('jenis_kelamin', 'Perempuan')->count();
        $totalKK = Penduduk::distinct('no_kk')->count('no_kk');

        return view('admin.penduduk.index', compact(
            'penduduk',
            'totalPenduduk',
            'lakiLaki',
            'perempuan',
            'totalKK'
        ));
    }

    public function create()
    {
        return view('admin.penduduk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string|size:16|unique:penduduks,nik',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
            'agama' => 'required|string',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pekerjaan' => 'required|string',
            'status_kependudukan' => 'required|in:Tetap,Pendatang,Pindah',
            'no_kk' => 'nullable|string|size:16',
            'pendidikan_terakhir' => 'nullable|string',
            'nama_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:15',
            'keterangan' => 'nullable|string'
        ]);

        Penduduk::create($validated);

        return redirect()->route('admin.penduduk.index')
                        ->with('success', 'Data penduduk berhasil ditambahkan!');
    }

    public function show($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view('admin.penduduk.show', compact('penduduk'));
    }

    public function edit($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view('admin.penduduk.edit', compact('penduduk'));
    }

    public function update(Request $request, $id)
    {
        $penduduk = Penduduk::findOrFail($id);

        $validated = $request->validate([
            'nik' => 'required|string|size:16|unique:penduduks,nik,' . $id,
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
            'agama' => 'required|string',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pekerjaan' => 'required|string',
            'status_kependudukan' => 'required|in:Tetap,Pendatang,Pindah',
            'no_kk' => 'nullable|string|size:16',
            'pendidikan_terakhir' => 'nullable|string',
            'nama_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'no_telepon' => 'nullable|string|max:15',
            'keterangan' => 'nullable|string'
        ]);

        $penduduk->update($validated);

        return redirect()->route('admin.penduduk.index')
                        ->with('success', 'Data penduduk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();

        return redirect()->route('admin.penduduk.index')
                        ->with('success', 'Data penduduk berhasil dihapus!');
    }
}
