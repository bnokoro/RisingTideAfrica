<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'middle_name', 'email', 'category_id', 'day_choosen', 'time_choosen', 'mentee_id', 'session_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function mentee()
    {
        return $this->belongsTo(Mentee::class);
    }

}
