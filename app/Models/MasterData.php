<?php

namespace App\Models;

use App\Traits\Files\HasFile;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterData extends Model implements TranslatableContract
{
    use HasFactory, Translatable, HasFile;

    protected $table = 'master_data';

    protected $guarded =[];

    public $translatedAttributes = ['title', 'content'];

    public $timestamps =true;
}
