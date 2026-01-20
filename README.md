# Sistem Informasi Desa - Desa Maju Jaya

Link .env:https://docs.google.com/document/d/1d9yD0V1neFhr2DTU1QmsddVNOcyLheFBl5i05ad3Du8/edit?usp=sharing

Platform digital terintegrasi untuk manajemen data penduduk, pengajuan surat, dan pengaduan masyarakat di tingkat desa.

## 📋 Daftar Isi
- [Fitur Utama](#fitur-utama)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Instalasi](#instalasi)
- [Konfigurasi](#konfigurasi)
- [Fitur dan Implementasi](#fitur-dan-implementasi)
- [Struktur Database](#struktur-database)
- [API & Routes](#api--routes)
- [Panduan Penggunaan](#panduan-penggunaan)

## 🚀 Fitur Utama

### 1. **Sistem Autentikasi & Registrasi**
- Login dengan NIK dan password
- Registrasi dengan validasi data lengkap
- Integrasi Google Socialite untuk login mudah
- Email verification menggunakan OTP
- Role-based access control (User & Admin)

### 2. **Manajemen Data Penduduk**
- CRUD penduduk (Create, Read, Update, Delete)
- Pencarian dan filtering penduduk
- Export data penduduk
- Validasi NIK dan No. KK
- Field khusus: tempat lahir dengan dropdown kota+provinsi, pekerjaan dengan pilihan spesifik

### 3. **Pengajuan Surat Digital**
- 10 jenis surat: Domisili, Tidak Mampu, Usaha, KTP, KK, Kelahiran, Kematian, Pindah, SKCK, Lainnya
- Form dinamis yang berubah sesuai jenis surat
- Field spesifik untuk setiap jenis surat:
  - **Surat Usaha**: Nama usaha, jenis usaha, alamat usaha
  - **Surat Kelahiran**: Nama anak, jenis kelamin, tempat lahir, tanggal lahir, nama ayah/ibu
  - **Surat Kematian**: Nama almarhum, tanggal, tempat, sebab meninggal
  - **Surat Pindah**: Alamat tujuan, alasan pindah
- Upload file pendukung (KTP, KK, lampiran lainnya)
- Generate keperluan otomatis berdasarkan jenis surat
- Tracking status pengajuan (pending, diproses, selesai, ditolak)
- PDF generation dengan data terpopulasi dari user dan admin
- Model fallback untuk mengambil data dari Penduduk/User jika pengajuan kosong

### 4. **Pengaduan Masyarakat**
- Form terstruktur dengan section Detail Laporan dan Lampiran Pendukung
- Field: kategori, prioritas, tanggal/waktu kejadian, lokasi, kecamatan, desa, uraian detail
- Multiple file upload support
- Status tracking
- Admin review dan response

### 5. **Profil Desa**
- Dashboard informasi desa dinamis
- Statistik real-time:
  - Jumlah penduduk (dari database)
  - Jumlah kepala keluarga
  - Jumlah dusun
  - Luas wilayah
- Data pemerintahan desa
- Visi & misi
- Kontak darurat

### 6. **Admin Panel**
- Dashboard dengan statistik
- Manajemen penduduk
- Review pengajuan surat
- Review pengaduan
- Validasi data dan approval workflow

## 💻 Teknologi yang Digunakan

- **Framework**: Laravel 12.x
- **Database**: MySQL 8.x
- **Frontend**: Bootstrap 5, Blade templating
- **Auth**: Laravel Socialite (Google), Email OTP
- **PDF Generation**: barryvdh/laravel-dompdf
- **File Storage**: Laravel Storage (public disk)
- **Validation**: Laravel Form Request Validation
- **Additional**: Laravel Pest (testing)

## 📦 Instalasi

### Prerequisites
- PHP 8.2+
- Composer
- MySQL 8.0+
- Node.js & npm (untuk assets)

### Setup Langkah demi Langkah

1. **Clone Repository**
```bash
git clone https://github.com/Blekk07/desa-blek.git
cd desa-blek
```

2. **Install Dependencies**
```bash
composer install
npm install
```

3. **Setup Environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Konfigurasi Database**
Edit `.env`:
```env
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desa_blek
DB_USERNAME=root
DB_PASSWORD=
```

5. **Jalankan Migration & Seeding**
```bash
php artisan migrate
php artisan db:seed
```

6. **Setup File Storage**
```bash
php artisan storage:link
```

7. **Konfigurasi Google Socialite** (Optional)
Edit `.env`:
```env
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
```

8. **Clear Cache**
```bash
php artisan config:cache
php artisan view:clear
php artisan cache:clear
```

9. **Jalankan Development Server**
```bash
php artisan serve
npm run dev
```

Aplikasi akan berjalan di: `http://localhost:8000`

## ⚙️ Konfigurasi

### Google Socialite
Konfigurasi di `config/services.php`:
```php
'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('GOOGLE_REDIRECT_URI'),
],
```

### File Upload
- Folder: `storage/app/public/`
- Path: `public/storage/` (accessible via URL)
- Max file size: 5MB per file
- Supported: PDF, JPG, JPEG, PNG

### Email Configuration
Edit `.env` untuk setup SMTP:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=noreply@desablek.com
```

## 🎯 Fitur dan Implementasi

### Registrasi Pengguna
**File**: `resources/views/auth/register.blade.php`, `app/Http/Controllers/AuthController.php`

- Form 3-step:
  1. Data Diri (NIK, Nama, TTL, Jenis Kelamin, Agama)
  2. Data Alamat & Status (Alamat, RT/RW, Status Kawin, Kependudukan, Pendidikan, Pekerjaan)
  3. Akun Login (Email, Password)
- Pekerjaan: Dropdown dengan opsi (Pelajar/Mahasiswa, Belum/Tidak Bekerja, Petani, Pedagang, Wiraswasta, Karyawan Swasta, PNS, TNI/Polri, Ibu Rumah Tangga, Lainnya)
- Tempat Lahir: Dropdown dinamis dengan daftar kota per provinsi (via `LocationHelper`)
- Validasi NIK 16 digit unik
- Email OTP verification (15 menit expiry)

### Registrasi Google
**File**: `resources/views/auth/register-google.blade.php`

- Sama dengan registrasi normal tapi dengan data pre-filled dari Google
- Pekerjaan & Tempat Lahir menggunakan komponen yang sama
- Otomatis verifikasi email

### Pengajuan Surat
**File**: 
- View: `resources/views/user/pengajuan_surat/create.blade.php`
- Controller: `app/Http/Controllers/PengajuanSuratController.php`
- Model: `app/Models/PengajuanSurat.php`

#### Field Dinamis per Jenis Surat
```javascript
fieldMap = {
  'Surat Domisili': [data pemohon, alamat, upload KTP/KK],
  'Surat Tidak Mampu': [data pemohon, upload KTP/KK, lampiran umum],
  'Surat Usaha': [data usaha + lampiran bukti],
  'Surat Kelahiran': [data anak + data orang tua],
  'Surat Kematian': [data almarhum + sebab meninggal],
  'Surat Pindah': [alamat tujuan + alasan pindah],
  ...dst
}
```

#### Fitur Upload
- Multiple file support
- Store di: `storage/app/public/pengajuan-surat/`
- JSON columns: `lampiran_ktp`, `lampiran_kk`, `lampiran_pendukung`
- Validation: PDF, JPG, JPEG, PNG (max 5MB)

#### PDF Generation
**File**: `resources/views/pdfs/pengajuan_surat.blade.php`

- Header resmi desa
- Fallback data accessor: $pengajuan->getValue('field_name')
- Cek: pengajuan → penduduk (via NIK) → user
- Per-jenis conditional blocks untuk field spesifik
- Generic extras table untuk data tambahan

### Pengaduan Masyarakat
**File**:
- Views: `resources/views/user/pengaduan/`
- Controller: `app/Http/Controllers/PengaduanController.php`
- Model: `app/Models/Pengaduan.php`

#### Struktur Form
**Detail Laporan**:
- Kategori pengaduan
- Prioritas (tinggi/sedang/rendah)
- Tanggal & waktu kejadian
- Lokasi kejadian
- Kecamatan & desa
- Uraian detail kejadian

**Lampiran Pendukung**:
- Multiple file upload
- Stored: `storage/app/public/pengaduan-lampiran/`
- JSON column: `lampiran` (array of paths)

#### Status Workflow
- Pending → Admin Review
- Accepted/Rejected dengan catatan admin
- User bisa lihat status & response dari admin

### Profil Desa
**File**: 
- Controller: `app/Http/Controllers/ProfileDesaController.php`
- View: `resources/views/user/profile-desa.blade.php`

#### Data Dinamis
```php
$totalPenduduk = Penduduk::distinct('nik')->count();
$totalKeluarga = Penduduk::whereNotNull('no_kk')->distinct('no_kk')->count();
$totalDusun = Penduduk::distinct('desa')->whereNotNull('desa')->count();
```

#### Info Desa (Hardcoded, bisa ke DB)
- Nama desa, kecamatan, kabupaten, provinsi, kode pos
- Kepala desa, sekretaris desa, bendahara desa
- Visi & misi
- Kontak darurat (Poskesdes, Pos Kamling, Kebakaran)

## 📊 Struktur Database

### Tabel Utama

#### `users` table
```
id, name, email, password, nik, role, provider, provider_id, avatar, 
is_verified, email_verified_at, created_at, updated_at
```

#### `penduduks` table
```
id, nik, no_kk, nama_lengkap, tempat_lahir, tanggal_lahir, jenis_kelamin,
agama, alamat, rt, rw, status_perkawinan, pendidikan_terakhir, pekerjaan,
status_kependudukan, nama_ayah, nama_ibu, no_telepon, desa, keterangan,
created_at, updated_at
```

#### `pengajuan_surats` table
```
id, user_id, jenis_surat, nama_lengkap, nik, alamat, rt, rw, no_telepon,
keperluan, keterangan_tambahan,
[Surat Usaha] nama_usaha, jenis_usaha, alamat_usaha,
[Surat Kelahiran] nama_anak, jenis_kelamin_anak, tempat_lahir_anak, tanggal_lahir_anak,
                  nama_ayah, nama_ibu,
[Surat Kematian] nama_almarhum, tanggal_meninggal, tempat_meninggal, sebab_meninggal,
[Surat Pindah]   alamat_tujuan, alasan_pindah,
[Lainnya]        jenis_lainnya,
[Lampiran]       lampiran_ktp (json), lampiran_kk (json), lampiran_pendukung (json),
status, catatan_admin, file_surat, tanggal_selesai,
created_at, updated_at
```

#### `pengaduans` table
```
id, user_id, kategori, prioritas, tanggal_waktu_kejadian, 
lokasi_kejadian, kecamatan, desa, uraian_kejadian,
lampiran (json), status, catatan_admin,
created_at, updated_at
```

#### `email_otps` table
```
id, user_id, email, code, expires_at, used, created_at, updated_at
```

### Migrations
- `2025_11_11_164311_create_penduduk_table.php` — Penduduk base
- `2025_11_12_075305_create_pengajuan_surat_table.php` — Pengajuan surat base
- `2025_11_09_190344_create_pengaduans_table.php` — Pengaduan base
- `2025_12_03_000001_update_pengaduans_table_for_structured_form.php` — Pengaduan fields
- `2025_12_04_000000_add_missing_columns_to_pengajuan_surats_table.php` — Pengajuan surat fields
- `2025_12_04_000001_add_desa_to_penduduks_table.php` — Penduduk desa field

## 🛣️ API & Routes

### Public Routes
```
GET  /                          — Landing page
GET  /register                  — Registration form
POST /register                  — Register user
GET  /login                     — Login form
POST /login                     — Login user
POST /logout                    — Logout user
GET  /auth/google              — Google login redirect
GET  /auth/google/callback     — Google callback
GET  /forgot-password          — Forgot password form
POST /forgot-password          — Send reset link
GET  /reset-password/{token}   — Reset password form
POST /reset-password           — Reset password
GET  /register/google/complete — Complete Google registration
POST /register/google/complete — Store Google registration
GET  /verify-email             — Verify email OTP form
POST /verify-otp               — Verify OTP code
POST /resend-otp               — Resend OTP
```

### User Routes (Protected - `auth`, `cekRole:user`)
```
GET    /dashboard                          — User dashboard
GET    /profile-desa                       — Village profile
GET    /pengajuan-surat                    — List pengajuan
GET    /pengajuan-surat/create             — Create form
POST   /pengajuan-surat                    — Store pengajuan
GET    /pengajuan-surat/{id}               — Detail pengajuan
GET    /pengajuan-surat/{id}/print         — Print/PDF pengajuan
GET    /pengaduan                          — List pengaduan
GET    /pengaduan/create                   — Create form
POST   /pengaduan                          — Store pengaduan
GET    /pengaduan/{id}                     — Detail pengaduan
GET    /myprofile                          — User profile
POST   /myprofile/update                   — Update profile
GET    /help                               — Help page
```

### Admin Routes (Protected - `auth`, `cekRole:admin`)
```
GET    /admin/dashboard                    — Admin dashboard
GET    /admin/penduduk                     — List penduduk
GET    /admin/penduduk/create              — Create form
POST   /admin/penduduk                     — Store penduduk
GET    /admin/penduduk/{id}                — Detail penduduk
GET    /admin/penduduk/{id}/edit           — Edit form
PUT    /admin/penduduk/{id}                — Update penduduk
DELETE /admin/penduduk/{id}                — Delete penduduk
GET    /admin/pengajuan-surat              — List pengajuan (all users)
GET    /admin/pengajuan-surat/{id}         — Detail & approve/reject
GET    /admin/pengaduan                    — List pengaduan (all users)
GET    /admin/pengaduan/{id}               — Detail & review
```

## 📖 Panduan Penggunaan

### Untuk User Baru

1. **Registrasi**
   - Klik "Daftar" di halaman login
   - Isi data diri lengkap (3 step form)
   - Gunakan opsi pekerjaan dari dropdown
   - Pilih tempat lahir dari dropdown kota+provinsi
   - Verifikasi email dengan OTP (cek email)
   - Login dengan email/password atau Google

2. **Pengajuan Surat**
   - Dashboard → Pengajuan Surat → Ajukan Surat Baru
   - Pilih jenis surat (form akan otomatis update)
   - Isi field yang sesuai dengan jenis surat
   - Upload file pendukung (KTP, KK, dll)
   - Klik "Ajukan"
   - Lihat status pengajuan di list pengajuan

3. **Buat Pengaduan**
   - Dashboard → Pengaduan → Lapor Pengaduan
   - Isi detail laporan (kategori, lokasi, waktu, uraian)
   - Upload foto/dokumen pendukung
   - Klik "Lapor"
   - Track status pengaduan

4. **Profil Desa**
   - Lihat statistik penduduk & info desa
   - Lihat pemerintahan desa & visi misi
   - Lihat kontak darurat

### Untuk Admin

1. **Login Admin**
   - Username: NIK admin
   - Password: password admin

2. **Manajemen Penduduk**
   - Admin → Penduduk → Manage
   - Tambah, edit, atau hapus data penduduk
   - Export data penduduk

3. **Verifikasi Pengajuan Surat**
   - Admin → Pengajuan Surat
   - Klik pengajuan untuk review
   - Lihat detail & dokumen user
   - Approve/Reject dengan catatan
   - Sistem akan update status ke user

4. **Review Pengaduan**
   - Admin → Pengaduan
   - Klik pengaduan untuk review
   - Lihat detail, kategori, & dokumen
   - Berikan response/catatan admin
   - Update status pengaduan

## 🔐 Keamanan

- Password hashing dengan bcrypt
- Email verification dengan OTP (15 menit)
- Role-based access control (RBAC)
- CSRF protection (Laravel default)
- SQL injection prevention (Eloquent ORM)
- File upload validation (type, size)
- NIK uniqueness validation
- Google Socialite with secure redirect

## 🧪 Testing

```bash
php artisan test
php artisan test --filter=AuthTest
```

## 📝 Notes

- Semua file upload disimpan di `storage/app/public/`
- Pastikan folder storage sudah writable: `chmod -R 755 storage/`
- Clear cache setelah deploy: `php artisan config:cache && php artisan view:clear`
- Untuk production, gunakan `.env` dengan config yang sesuai

## 📄 License

MIT License - Open Source Project

## 👥 Contributors

- Development Team

---

**Last Updated**: December 5, 2025
