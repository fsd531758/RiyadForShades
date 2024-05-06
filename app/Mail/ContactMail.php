<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $file = $this->contact->file()->first();
        if ($file) {
            $path = $file->getRawOriginal('path');
            return $this->subject('New Contact From Website')->view('mail.mail_request')->attach('uploads/' . $path);
        }

        return $this->subject('New Contact From Website')->view('mail.mail_request');
    }
}
