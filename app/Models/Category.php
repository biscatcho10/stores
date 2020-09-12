<?php

namespace App\Models;


use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use Translatable;

    protected $table = 'categories';

    protected $fillable = ['parent_id', 'slug', 'is_active'];

    protected $hidden = ['translations'];

    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $casts = ['is_active' => 'boolean'];

}
