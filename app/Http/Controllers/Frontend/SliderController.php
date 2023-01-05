<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;

class SliderController extends Controller
{
    public function index()
    {
        $data = Page::where('identifier', 'main_slider')->first();
        $data['image'] = asset($data->image);
        return $data;
    }
}
