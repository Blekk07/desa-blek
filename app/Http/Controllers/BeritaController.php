<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::published()->latest('published_at')->paginate(6);
        $recentBeritas = Berita::published()->latest('published_at')->limit(5)->get();
        return view('berita.index', compact('beritas', 'recentBeritas'));
    }

    public function show(Berita $berita)
    {
        // Ensure the berita is published or user is admin/author
        if (is_null($berita->published_at) && auth()->id() !== $berita->user_id && auth()->user()?->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        
        $recentBeritas = Berita::published()
            ->where('id', '!=', $berita->id)
            ->latest('published_at')
            ->limit(5)
            ->get();
        
        return view('berita.show', compact('berita', 'recentBeritas'));
    }
}
