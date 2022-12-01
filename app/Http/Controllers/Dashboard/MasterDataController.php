<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\MasterDataRequest;
use App\Models\MasterData;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    private $data;

    public function __construct(MasterData $data)
    {
        $this->data = $data;
    }

    public function index()
    {
        try {
            $masters = $this->data->latest('id')->get();
            return view('admin.masterData.index',compact('masters'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }


    public function create()
    {
        return view('admin.masterData.create');
    }


    public function store(MasterDataRequest $request)
    {
        try {
            $requested_data = $request->except(['_token','file']);
            $data = $this->data->create($requested_data);
            $data->uploadFile();
            return redirect()->route('master-data.index')->with(['success'=>__('message.created_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }


    public function show($id)
    {
        try {
            $data = $this->data->find($id);
            return view('admin.masterData.show',compact('data'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }


    public function edit($id)
    {
        try {
            $data = $this->data->find($id);
            return view('admin.masterData.edit',compact('data'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }


    public function update(MasterDataRequest $request, $id)
    {
        try {
            $data = $this->data->find($id);
            $requested_data = $request->except(['_token','file']);
            $data->updateFile();
            $data->update($requested_data);

            return redirect()->route('master-data.index')->with(['success'=>__('message.updated_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }


    public function destroy($id)
    {
        try {
            $data = $this->data->find($id);
            $data->deleteFile();
            $data->delete();
            return redirect()->route('master-data.index')->with(['success' => __('message.deleted_successfully')]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => __('message.something_wrong')]);
        }
    }
}
