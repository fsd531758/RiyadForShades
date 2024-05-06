<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Page;
use App\Models\Service;
use App\Models\Slider;

class HomeController extends Controller
{
    // private $contact;

    // public function __construct(Contact $contact)
    // {
    //     $this->contact = $contact;
    // }

    public function index()
    {
        $slider = Slider::paginate(6);
        $about = Page::where('identifier', 'about')->first();
        $services = Service::paginate(6);
        $advantages = Feature::paginate(3);
        // $contacts       = $this->contact->active()->get();

        return view('frontend.index', compact(
            'slider',
            'about',
            'services',
            'advantages',
            // 'contacts',
        ));
    }
}
