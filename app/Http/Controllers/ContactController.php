<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessageMail;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show(Request $request)
    {
        return view('contact');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $msg = ContactMessage::create($data);

        try {
            Mail::send(new ContactMessageMail($msg));
        } catch (\Exception $e) {
            // Log & continue — we don't want to crash the user flow
            logger()->error('Failed to send contact email: '.$e->getMessage());
        }

        return back()->with('success', 'Terima kasih, pesan Anda telah dikirim. Kami akan menghubungi Anda segera.');
    }
}
