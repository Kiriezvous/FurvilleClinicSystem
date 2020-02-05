<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_type', 'description',
    ];
    public function categories(){
        return $this->hasMany('App\Products', 'category_id');
    }
}
