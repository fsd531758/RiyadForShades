<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
class AboutController extends Controller
{
    public function index()
    {
        //about
        $about = Page::where('identifier','about')->first();
        return view('frontend.about', compact('about'));
    }
}
