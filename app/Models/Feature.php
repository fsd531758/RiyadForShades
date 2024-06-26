<?php

namespace App\Models;

use App\Traits\Files\HasFile;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory, Translatable, HasFile;


    protected $table = 'features';

    protected $guarded = [];

    // protected $appends = ['image'];

    public $translatedAttributes = ['title','description'];

    public $timestamps = true;


   // Scopes start
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
   // Scopes end

    // accessors & Mutator start
    // public function getImageAttribute()
    // {
    //     $image = $this->file()->first();
    //     return $image->path;
    // }

    public function getActive()
    {
        return $this->status == 1 ? __('words.active') : __('words.inactive');
    }
    // accessors & Mutator end
}
