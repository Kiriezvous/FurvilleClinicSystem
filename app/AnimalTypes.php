<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalTypes extends Model
{
    public function dog_breed(){
        return $this->hasMany('App\Dogs', 'animal_type');
    }

    public function cat_breed(){
        return $this->hasMany('App\Cats', 'animal_type');
    }

    public function pets(){
        return $this->hasMany('App\Pets', 'animal_type');
    }
}
