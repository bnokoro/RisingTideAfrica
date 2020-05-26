<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
 protected $fillable = [
        'first_name', 'last_name', 'phone', 'middle_name', 'email',  'category_id', 'day_choosen', 'time_choosen', 'mentee_id'
    ];

     public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
