<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dogs extends Model
{
    public function animaltypes(){
        return $this->belongsTo('App\AnimalTypes', 'animal_type');
    }
}
