<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\UserRegister;

class SetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $register;

    /**
     * Create a new message instance.
     */
    public function __construct(UserRegister $register)
    {
        $this->register = $register;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'ตั้งรหัสผ่านสำหรับเข้าใช้งานระบบ'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.set_password',
            with: [
                'name' => $this->register->firstname . ' ' . $this->register->lastname,
                'token' => $this->register->password_set_token,
                'url' => url('/ตั้งรหัสผ่านใหม่?token=' . $this->register->password_set_token),
            ]
        );
    }

    /**
     * Attachments (ถ้าไม่มีไฟล์แนบ ให้ปล่อยว่าง)
     */
    public function attachments(): array
    {
        return [];
    }
}
