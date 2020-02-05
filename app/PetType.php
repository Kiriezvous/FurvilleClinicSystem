<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetType extends Model
{
    public function breed(){
        return $this->hasMany('App\Breed', 'id');
    }
}
