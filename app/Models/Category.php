<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use App\Traits\Files\HasFile;
use App\Traits\Files\HasFiles;

class Category extends Model implements TranslatableContract
{

    use HasFactory, Translatable, HasFile, HasFiles;

    protected $table = 'categories';

    protected $guarded = [];

    protected $appends = ['image'];

    public $translatedAttributes = ['title'];

    public $timestamps = true;


    // Scopes start
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    // Scopes end

    // accessors & Mutator start
    public function getImageAttribute()
    {
        $image = $this->files->where('type', 'image')->first();
        return $image->path;
    }

    public function getActive()
    {
        return $this->status == 1 ? __('words.active') : __('words.inactive');
    }
    // accessors & Mutator end
}
