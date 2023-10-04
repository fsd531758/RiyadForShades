<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    private $contact_us_request;



    public function __construct(ContactForm $contact_us_request)
    {
        $this->middleware(['permission:read-contact_requests'])->only('index', 'show');
        $this->middleware(['permission:delete-contact_requests'])->only('destroy');
        $this->middleware(['permission:reply-contact_requests'])->only('reply');
        $this->contact_us_request = $contact_us_request;
    }

    public function index()
    {
        try {
            $contact_us_requests = $this->contact_us_request->latest('id')->get();
            // return $contact_us_requests->service;
            return view('admin.contact_requests.index', compact('contact_us_requests'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }


    public function show(ContactForm $contact_request)
    {
        return view('admin.contact_requests.show', compact('contact_request'));
    }


    public function destroy(ContactForm $contact_request)
    {
        try {
            $contact_request->delete();
            return redirect()->route('contact_requests.index')->with(['success' => __('message.deleted_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }


    // public function reply(ContactUs $contact_request)
    // {
    //     return view('admin.contact_requests.reply', compact('contact_request'));
    // }

    // public function send_mail(Request $request)
    // {
    //     try {
    //         $contact = $this->contact_us_request->find($request->id);
    //         $request_data = $request->only(['subject', 'message']);

    //         Mail::to($contact->email)->send(new ReplyMail($request_data));
    //         return redirect()->route('contact_requests.index')->with(['success' => __('words.msg_reply')]);
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with(['error' => __('message.something_wrong')]);
    //     }
    // }
}
