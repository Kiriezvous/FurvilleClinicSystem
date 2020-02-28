<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    public function patient(){
        return $this->belongsTo('App\Patients', 'patient_id');
    }

    public function doctor(){
        return $this->belongsTo('App\Doctor', 'doctor_attended');
    }

    public function record(){
        return $this->hasOne('App\Doctor', 'diagnosis_id');
    }
}
