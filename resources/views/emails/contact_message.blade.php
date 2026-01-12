<div style="font-family: Inter, sans-serif; color: #111; line-height:1.5;">
    <h2>Pesan Kontak Baru</h2>
    <p><strong>Nama:</strong> {{ $messageModel->name }}</p>
    <p><strong>Email:</strong> {{ $messageModel->email }}</p>
    <p><strong>Subjek:</strong> {{ $messageModel->subject ?? '-' }}</p>
    <hr>
    <p>{{ nl2br(e($messageModel->message)) }}</p>

    <p style="font-size:12px; color:#666;">Dikirim pada {{ $messageModel->created_at }}</p>
</div>
