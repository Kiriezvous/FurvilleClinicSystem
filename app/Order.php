<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function suborder(){
        return $this->belongsTo('App\SubOrder', 'order_id');
    }
}
