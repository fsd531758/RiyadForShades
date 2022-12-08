<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Statistic;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about_page = Page::where('identifier', 'about')->first();
        $mission_page = Page::where('identifier', 'mission')->first();
        $vision_page = Page::where('identifier', 'vision')->first();
        $goals_page = Page::where('identifier', 'how_we_are')->first();
        $partners = Partner::get();
        $testimonial_page = Page::where('identifier', 'testimonial')->first();
        $testimonials = Testimonial::get();

        return view('front.about', compact('about_page', 'mission_page', 'vision_page', 'goals_page', 'partners','testimonial_page','testimonials'));
    }
}
