<?php

use App\Mail\ContactMessageMail;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;

it('stores contact message and sends email', function () {
    Mail::fake();

    $data = [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'subject' => 'Pertanyaan',
        'message' => 'Halo, ini pesan testing.'
    ];

    $this->post(route('contact.store'), $data)
        ->assertSessionHas('success')
        ->assertRedirect();

    // DB record
    $this->assertDatabaseHas('contact_messages', [
        'email' => 'test@example.com',
        'subject' => 'Pertanyaan'
    ]);

    Mail::assertSent(ContactMessageMail::class, function ($mail) use ($data) {
        return $mail->messageModel->email === $data['email'];
    });
});
