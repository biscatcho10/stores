<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Translatable;

    protected $table = 'brands';

    protected $fillable = ['is_active', 'photo'];

    // protected $hidden = ['translations'];

    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $casts = ['is_active' => 'boolean'];

    public function getActive()
    {
        if (app()->getLocale() == "ar") {
            return  $this->is_active  == 0 ?  'غير مفعل'   : 'مفعل';
        } else {
            return  $this->is_active  == 0 ?  'Not Active' : 'Active';
        }
    }

    public function scopeActive($q)
    {
        return $q->where('is_active', 1);
    }

    public function getPhotoAttribute($val){
        return ($val != null) ? asset('assets/images/brands/'.$val) : "" ;
    }

    public function products(){
        return $this->hasMany(Product::class, 'brand_id');
    }
}
