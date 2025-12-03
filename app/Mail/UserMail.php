<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserConfirmedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $extraData;



    public function __construct($user, $extraData = [])
    {
        $this->user = $user;
        $this->extraData = $extraData;
    }




    public function build()
    {
        return $this->subject('การยืนยันข้อมูลสำเร็จ')->view('emails.user_confirmed')->with(['extraData' => $this->extraData,]);
    }
}
