<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public function pettype(){
        return $this->belongsTo('App\PetType', 'animal_type');
    }
}
