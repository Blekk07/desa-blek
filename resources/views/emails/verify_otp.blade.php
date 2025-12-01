<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Kode Verifikasi</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; background:#f6f6f6; padding:20px;">
  <div style="max-width:600px;margin:0 auto;background:#fff;padding:24px;border-radius:8px;">
    <h3 style="color:#111;">Halo {{ $userName ?: 'Pengguna' }},</h3>
    <p style="color:#333;">Terima kasih telah mendaftar. Gunakan kode verifikasi di bawah ini untuk mengaktifkan akun Anda:</p>
    <div style="margin:20px 0;text-align:center;">
      <div style="display:inline-block;padding:18px 26px;background:#111;color:#fff;font-size:1.6rem;border-radius:6px;letter-spacing:4px;">{{ $code }}</div>
    </div>
    <p style="color:#666;font-size:0.95rem;">Kode ini akan kadaluarsa dalam 15 menit. Jika Anda tidak membuat akun, abaikan email ini.</p>
    <p style="color:#666;font-size:0.9rem;margin-top:20px;">Salam,<br>Tim Desa Bangah</p>
  </div>
</body>
</html>
