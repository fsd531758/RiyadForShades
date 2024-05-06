<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index()
    {
        return view('frontend.contact');
    }

    public function store(ContactRequest $request)
    {
        $data = $request->all();
        $contact = new ContactForm($data);
        $contact->save();

        //start send email to admin
        $user_email = CONTACT_MAIL;
        $user_name = $contact->name;
        $subject = 'New Message';

        Mail::send('mail.contact_admin', [
            'user_email' => $user_email,
            'user_name' => $user_name,
            'result' => $contact,

        ], function ($message) use ($user_email, $user_name, $subject) {
            $message->from(env('MAIL_FROM_ADDRESS'));
            $message->to($user_email, $user_name)->subject($subject);
        });
        //end send email to admin

        return redirect()->back()->with(['success' => __('message.sent_successfully')]);
    }
}