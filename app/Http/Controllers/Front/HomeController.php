<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\TrackingRequest;
use App\Models\Category;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\Property;
use App\Models\Service;
use App\Models\Statistic;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Team::get();
        $features = Service::get();
        $about_page = Page::where('identifier', 'about')->first();
        $mission_page = Page::where('identifier', 'mission')->first();
        $vision_page = Page::where('identifier', 'vision')->first();
        $goals_page = Page::where('identifier', 'how_we_are')->first();
        $video_page = Page::where('identifier', 'chalange')->first();
        $partners = Partner::get();
        $testimonial_page = Page::where('identifier', 'testimonial')->first();
        $testimonials = Testimonial::get();
        $news_page = Page::where('identifier', 'team')->first();
        $news = Property::get();
        $categories=Category::get();
        return view('front.index', compact(
            'sliders',
            'features',
            'about_page',
            'mission_page',
            'vision_page',
            'goals_page',
            'video_page',
            'partners',
            'testimonial_page',
            'testimonials',
            'news_page',
            'news',
            'categories'
        ));
    }
}
