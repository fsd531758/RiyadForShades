<?php

namespace App\Jobs;

use App\Mail\NewsLetterMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NewsLetterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data , $mail_body;

    public function __construct($data,$mail_body)
    {
        $this->data = $data;
        $this->mail_body = $mail_body;
    }

    public function handle()
    {
        foreach ($this->data as $_data){
            Mail::to($_data->email)->send(new NewsLetterMail($this->mail_body));
        }
    }
}
