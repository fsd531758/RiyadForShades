<?php

namespace App\Models;

use App\Traits\Files\HasFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Gallery extends Model
{
    use HasFactory, HasFile;

    protected $table = 'galleries';

    protected $guarded = [];

    protected $appends = ['image'];


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
        $image = $this->file;
        return $image->path;
    }

    public function getActive()
    {
        return $this->status == 1 ? __('words.active') : __('words.inactive');
    }
    // accessors & Mutator end
}
