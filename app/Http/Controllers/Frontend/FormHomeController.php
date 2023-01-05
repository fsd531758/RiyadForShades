<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;

class FormHomeController extends Controller
{
    public function index()
    {
        $data = Page::where('identifier', 'form_home')->first();
        $data['image'] = asset($data->image);
        return $data;
    }
}
