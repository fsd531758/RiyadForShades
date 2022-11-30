<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDataTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['title', 'description'];

    // accessors & Mutator start
    public function getTitleAttribute($val)
    {
        return $this->attributes['title'] = ucwords($val);
    }

    public function getDescriptionAttribute($val)
    {
        return $this->attributes['description'] = ucfirst($val);
    }
    // accessors & Mutator end

}
