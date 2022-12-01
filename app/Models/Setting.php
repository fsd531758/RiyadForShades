<?php

namespace App\Models;

use App\Traits\Files\HasFile;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory, Translatable, HasFile;

    protected $table = 'settings';

    protected $guarded = [];

    public $translatedAttributes = ['website_title', 'address','copyrights'];

    public $timestamps = true;

    public function getLogoAttribute(){
        $logo = $this->file()->where('type','logo')->first();
        return $logo->path;
    }
}
