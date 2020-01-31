<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public function pets(){
        return $this->hasMany('App\Pets', 'id');
    }
}
