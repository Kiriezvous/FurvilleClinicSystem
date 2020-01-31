<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BreedCharacteristics extends Model
{
    public function dogs(){
        return $this->hasMany('App\Dogs', 'characteristic_type');
    }

    public function cats(){
        return $this->hasMany('App\Cats', 'characteristic_type');
    }
}
