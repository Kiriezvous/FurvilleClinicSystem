<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //Import Export
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'categories';

    protected $fillable = [
        'category_type', 'description',
    ];
    public function categories(){
        return $this->hasMany('App\Products', 'category_id');
    }
}
