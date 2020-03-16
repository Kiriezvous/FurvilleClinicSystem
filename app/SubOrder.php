<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubOrder extends Model
{
    public function products(){
        return $this->hasMany('App\Products', 'product_id');
    }

    public function orders(){
        return $this->hasMany('App\Order', 'order_id');
    }
}
