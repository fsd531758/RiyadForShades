<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsLetterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_body;

    public function __construct($mail_body)
    {
        $this->mail_body = $mail_body;
    }

    public function build()
    {
        return $this->subject('Mail From Queue')->view('mail.news_letter');
    }
}
