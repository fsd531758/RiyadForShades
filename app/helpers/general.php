<?php

use App\Models\Permission;

function createdAtFormat($model)
{
    return date('d/m/Y - h:i A', strtotime($model));
}

function updatedAtFormat($model)
{
    return date('d/m/Y - h:i A', strtotime($model));
}

function permissionName()
{
    $permissions = Permission::all();
    $data = [];
    foreach ($permissions as $permission) {
        $data [] = $permission->name;
    }
    return implode(',', $data);
}

function settings(){
    $setting = \App\Models\Setting::first();
    if ($setting)
        return $setting;
    return '';
}
