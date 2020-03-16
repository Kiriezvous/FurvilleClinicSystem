<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    public function scopeMightAlsoLike($query){
        return $query->inRandomOrder()->paginate(4);
    }


    //Import Export
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'products';

    protected $fillable = [
        'image', 'product_name', 'product_quantity', 'category_id', 'product_description', 'product_price'
    ];

    public function product(){
        return $this->belongsTo('App\Categories', 'category_id');
    }

    public function suborder(){
        return $this->belongsTo('App\SubOrder', 'product_id');
    }
}
