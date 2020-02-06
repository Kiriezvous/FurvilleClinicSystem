<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodTypes extends Model
{
    public function patients(){
        return $this->hasMany('App\Patients', 'blood_type');
    }
}
