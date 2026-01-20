<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileDesa extends Model
{
    protected $fillable = [
        'nama_desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'alamat_kantor',
        'kepala_desa',
        'masa_jabatan_kepala',
        'sekretaris_desa',
        'bendahara_desa',
        'poskesdes',
        'pos_kamling',
        'kebakaran',
        'visi',
        'visi_deskripsi',
        'luas_wilayah',
        'sejarah_desa',
        'geografis',
        'logo',
    ];
}
