<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name', 'photo', 'job', 'address', 'cities_id', 'supervisor_id'
    ];

    public function classes() {
        return $this->belongsTo(\App\Classes::class, 'supervisor_id');
    }

    public function city() {
        return $this->belongsTo(\App\City::class, 'cities_id');
    }

}
