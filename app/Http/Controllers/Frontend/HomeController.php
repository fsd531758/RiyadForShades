<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Page;
use App\Models\Service;
use App\Models\Advantage;

class HomeController extends Controller
{
    public function index()
    {
        //slider
        $slider = Slider::paginate(6);
       
        //about
        $about = Page::where('identifier','about')->first();
        //service
        $services = Service::paginate(6);

        //advantages
        // $advantages = Advantage::paginate(3);

        // return view('frontend.index', compact('slider', 'about', 'services', 'advantages'));
        return view('frontend.index', compact('slider', 'about', 'services'));
    }
}
