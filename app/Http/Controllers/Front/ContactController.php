<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        $setting = Setting::first();
        $contact_page = Page::where('identifier','contact')->first();
        return view('front.contact',compact('setting','contact_page'));
    }
    public function contact_post(ContactRequest $request)
    {
        $user_name = $request->name ;
        $user_email = $request->email;
        $user_phone = $request->phone;
        $user_message = $request->message;

        Contact::create($request->all());
        // Mail::send('mail.emailNotification', [
        //     'user_email'         =>  $user_email,
        //     'user_message'       =>  $user_message,
        //     'user_name'          =>  $user_name,
        //     'user_phone'         =>  $user_phone,

        // ], function ($message) use ($user_email, $user_name )
        // {
        //     $message->from($user_email);
        //     $message->to('fsd@marwan.tech', $user_name)->subject('visitor message');
        // });
        return response()->json(trans('site.sent_successully'));
    }

}
