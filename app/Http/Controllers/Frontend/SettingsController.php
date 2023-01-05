<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $data = Setting::first();
        $data['logo'] = asset($data->logo);
        $data['background'] = asset($data->background);
        return $data;
    }
}
