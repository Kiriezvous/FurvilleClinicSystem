<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    public function patient(){
        return $this->belongsTo('App\Patients', 'pet_name');
    }

    public function diagnosis(){
        return $this->belongsTo('App\Diagnosis', 'diagnosis_id');
    }
}
