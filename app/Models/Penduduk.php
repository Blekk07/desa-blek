<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Penduduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'no_kk',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat_lengkap',
        'rt',
        'rw',
        'status_perkawinan',
        'pendidikan_terakhir',
        'pekerjaan',
        'status_kependudukan',
        'nama_ayah',
        'nama_ibu',
        'no_telepon',
        'keterangan'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    // Accessor untuk mendapatkan umur
    public function getUmurAttribute()
    {
        if ($this->tanggal_lahir) {
            return Carbon::parse($this->tanggal_lahir)->age;
        }
        return null;
    }

    // Scope untuk filter berdasarkan jenis kelamin
    public function scopeByGender($query, $gender)
    {
        return $query->where('jenis_kelamin', $gender);
    }

    // Scope untuk filter berdasarkan RT/RW
    public function scopeByRtRw($query, $rt = null, $rw = null)
    {
        if ($rt) {
            $query->where('rt', $rt);
        }
        if ($rw) {
            $query->where('rw', $rw);
        }
        return $query;
    }

    // Mutator untuk menormalisasi NIK (hapus spasi)
    public function setNikAttribute($value)
    {
        $this->attributes['nik'] = preg_replace('/\s+/', '', $value);
    }

    // Mutator untuk menormalisasi No. KK (hapus spasi)
    public function setNoKkAttribute($value)
    {
        $this->attributes['no_kk'] = preg_replace('/\s+/', '', $value);
    }
}
