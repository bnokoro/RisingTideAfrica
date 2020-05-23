<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

     public function mentor() 
    {
        return $this->hasMany('App\Mentor');
    }

    
     public function mentee() 
    {
        return $this->hasMany('App\Mentee');
    }
}
