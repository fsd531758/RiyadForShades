<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    public function getNameAttribute($val){
        return $this->attributes['name'] = ucwords(str_replace('_','',$val));
    }
}
