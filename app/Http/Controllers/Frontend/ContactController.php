<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\ContactForm;
use Illuminate\Http\Request;

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
       return redirect()->back()->with(['success'=>('تم إستلام رسالتكم بنجاح وسيتم الرد عليكم في أقرب وقت')]);

    }
}
