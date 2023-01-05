<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::paginate(9);
        return view('frontend.services', compact('services'));
    }

    // public function show($id)
    // {
    //     $data = Service::findOrFail($id);
    //     return $data;
    // }
}
