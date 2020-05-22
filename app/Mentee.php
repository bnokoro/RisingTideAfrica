<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentee extends Model
{
     protected $fillable = [
        'first_name', 'last_name', 'phone', 'middle_name', 'email',  'category_id', 'stage_id', 'day_choosen', 'time_choosen'
    ];

      public function category()
    {
        return $this->belongsTo('App\Category');
    }

      public function stage()
    {
        return $this->belongsTo('App\Stage');
    }

}
