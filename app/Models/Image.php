<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['product_id', 'photo', 'updated_at', 'created_at'];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getPhotoAttribute($val){
        return ($val != null) ? asset('assets/images/products/'.$val) : "" ;
    }
}
