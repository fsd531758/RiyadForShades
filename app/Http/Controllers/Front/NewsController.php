<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Property;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index(){
        $news = Property::get();

        return view('front.news.index',compact('news'));
    }
    public function news($id)
    {
        $news_details = Property::findOrFail($id);
        $news = Property::get();
        return view('front.news.details', compact('news_details','news'));
    }
}
