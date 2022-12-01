<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $setting;

    public function __construct(Setting $setting)
    {
        $this->middleware(['permission:read-settings'])->only('index');
        $this->middleware(['permission:create-settings'])->only('create');
        $this->middleware(['permission:update-settings'])->only('edit');
        $this->setting = $setting;
    }

    public function index()
    {
        try {
            $setting = $this->setting->first();
            return view('admin.setting.index',compact('setting'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }


    public function create()
    {
        return view('admin.setting.create');
    }


    public function store(SettingRequest $request)
    {
        try {
            $requested_setting = $request->except(['_token','logo']);
            $setting = $this->setting->create($requested_setting);
            $setting->uploadFile();
            return redirect()->route('settings.index')->with(['success'=>__('message.created_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function update(SettingRequest $request, $id)
    {
        try {
            $setting = $this->setting->find($id);
            $requested_setting = $request->except(['_token','logo']);
            $setting->updateFile();
            $setting->update($requested_setting);

            return redirect()->route('settings.index')->with(['success'=>__('message.updated_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }
}
