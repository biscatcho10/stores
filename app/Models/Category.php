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

    public function scopeParent($q)
    {
        return $q->whereNull('parent_id');
    }

    public function scopeChild($query)
    {
        return $query->whereNotNull('parent_id');
    }

    public function getActive()
    {
        if (app()->getLocale() == "ar") {
            return  $this->is_active  == 0 ?  'غير مفعل'   : 'مفعل';
        } else {
            return  $this->is_active  == 0 ?  'Active' : 'Not Active';
        }
    }

    public function _parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
}
