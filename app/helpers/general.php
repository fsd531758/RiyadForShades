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

function permissionName(){
    $permissions = Permission::all();
    foreach ($permissions as $permission)
    {
        $data = $permission->name;
    }
    return $data;
}
