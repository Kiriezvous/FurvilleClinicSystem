<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function bloodtypes(){
        return $this->belongsTo('App\BloodTypes', 'blood_type');
    }

    public function pettype(){
        return $this->belongsTo('App\PetType', 'pet_type');
    }

}
