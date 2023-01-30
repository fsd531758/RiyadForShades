<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use App\Traits\Files\HasFile;
use App\Traits\Files\HasFiles;
class Product extends Model
{
    // use Translatable, HasFactory;

    // public $translatedAttributes = [
    //     'title','description',
    // ];
    // protected $fillable = ['image','category_id','price','stock','featured','sku'];

    use HasFactory, Translatable, HasFile, HasFiles;

    protected $table = 'portfolios';

    protected $guarded = [];

    protected $appends = ['image'];

    public $translatedAttributes = ['title', 'description'];

    public $timestamps = true;

    // relations start
    public function category(){
        return $this->belongsTo(Category::class);
    }
    // relations end

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
