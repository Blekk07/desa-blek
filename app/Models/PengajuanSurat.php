<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jenis_surat',
        'nama_lengkap',
        'nik',
        'alamat',
        'rt',
        'rw',
        'no_telepon',
        'keperluan',
        'keterangan_tambahan',
        'status',
        'catatan_admin',
        'file_surat',
        'tanggal_selesai',
        // Fields untuk Surat Usaha
        'nama_usaha',
        'jenis_usaha',
        'alamat_usaha',
        // Fields untuk Surat Kelahiran
        'nama_anak',
        'jenis_kelamin_anak',
        'tempat_lahir_anak',
        'tanggal_lahir_anak',
        'nama_ayah',
        'nama_ibu',
        // Fields untuk Surat Kematian
        'nama_almarhum',
        'tanggal_meninggal',
        'tempat_meninggal',
        'sebab_meninggal',
        // Fields untuk Surat Pindah
        'alamat_tujuan',
        'alasan_pindah',
        // Jenis Surat Lainnya
        'jenis_lainnya',
        // File lampiran
        'lampiran_ktp',
        'lampiran_kk',
        'lampiran_pendukung'
    ];

    protected $casts = [
        'tanggal_selesai' => 'datetime',
        'lampiran_ktp' => 'json',
        'lampiran_kk' => 'json',
        'lampiran_pendukung' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Try to find related Penduduk by NIK (fallback data source)
    public function penduduk()
    {
        return $this->hasOne(\App\Models\Penduduk::class, 'nik', 'nik');
    }

    /**
     * Get a field value from the pengajuan, fallback to penduduk then user
     * Usage in blade: $pengajuan->getValue('pekerjaan')
     */
    public function getValue(string $key)
    {
        // direct value on pengajuan
        if (!empty($this->{$key})) {
            return $this->{$key};
        }

        // try penduduk relation
        // support common alternate field names between pengajuan and penduduk
        $alternate = [
            'alamat' => 'alamat_lengkap',
            'warga_negara' => 'kewarganegaraan',
            'kewarganegaraan' => 'warga_negara',
            'nama_lengkap' => 'nama_lengkap',
        ];

        if ($this->relationLoaded('penduduk')) {
            $p = $this->getRelation('penduduk');
        } else {
            $p = \App\Models\Penduduk::where('nik', $this->nik)->first();
        }
        if ($p) {
            // direct key on penduduk
            if (!empty($p->{$key})) {
                return $p->{$key};
            }
            // alternate key mapping
            if (isset($alternate[$key]) && !empty($p->{$alternate[$key]})) {
                return $p->{$alternate[$key]};
            }
        }

        // try user (common fields: name, email)
        if ($this->user && !empty($this->user->{$key})) {
            return $this->user->{$key};
        }

        return null;
    }

    // Accessor untuk status badge color
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => 'bg-warning',
            'diproses' => 'bg-primary',
            'selesai' => 'bg-success',
            'ditolak' => 'bg-danger',
            default => 'bg-secondary'
        };
    }

    // Accessor untuk status text
    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'pending' => 'Menunggu',
            'diproses' => 'Diproses',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak',
            default => 'Unknown'
        };
    }
}