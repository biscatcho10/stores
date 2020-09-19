<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use Translatable;

    protected $table = 'tags';

    protected $fillable = ['slug'];

    protected $hidden = ['translations'];

    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

}
