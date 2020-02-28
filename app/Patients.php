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

    public function diagnosis(){
        return $this->hasMany('App\Diagnosis', 'patient_id');
    }

    public function records(){
        return $this->hasMany('App\Records', 'pet_name');
    }


    //Import Export
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'patients';

    protected $fillable = [
        'pet_type', 'pet_name', 'user_id', 'gender', 'blood_type', 'weight', 'height', 'image'
    ];
}
