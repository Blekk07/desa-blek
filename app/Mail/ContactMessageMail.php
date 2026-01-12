<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageModel;

    public function __construct(ContactMessage $messageModel)
    {
        $this->messageModel = $messageModel;
    }

    public function build()
    {
        $to = env('CONTACT_EMAIL', 'desa@desa-maju.go.id');

        return $this->to($to)
                    ->subject("Pesan Kontak Baru: {$this->messageModel->subject}")
                    ->view('emails.contact_message')
                    ->with(['messageModel' => $this->messageModel]);
    }
}
