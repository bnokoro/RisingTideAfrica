<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $fillable = ['name'];

      public function mentee() 
    {
        return $this->hasMany('App\Mentee');
    }

}
