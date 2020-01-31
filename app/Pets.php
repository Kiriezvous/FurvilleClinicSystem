<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
    public function user(){
        return $this->belongsTo('App\User', 'id');
    }

    public function gender(){
        return $this->belongsTo('App\Gender', 'gender_id');
    }

    public function bloodtype(){
        return $this->belongsTo('App\BloodTypes', 'id');
    }

    public function measurement(){
        return $this->belongsTo('App\Measurements', 'id');
    }

    public function animaltype(){
        return $this->belongsTo('App\AnimalTypes', 'animal_type');
    }
}
