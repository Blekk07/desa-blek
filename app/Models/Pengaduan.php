<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'kategori',
        'tanggal_waktu_kejadian',
        'lokasi_kejadian',
        'kecamatan',
        'desa',
        'uraian_kejadian',
        'prioritas',
        'deskripsi',
        'isi', // Tambahkan isi juga
        'lampiran',
        'status'
    ];

    protected $casts = [
        'tanggal_waktu_kejadian' => 'datetime',
        'lampiran' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}