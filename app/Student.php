<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nik', 'name', 'photo', 'address', 'classes_id', 'supervisor_id', 'cities_id'
    ];

    public function classes() {
        return $this->belongsTo(\App\Classes::class, 'classes_id');
    }

    public function teacher() {
        return $this->belongsTo(\App\Teacher::class, 'teacher_id');
    }

    public function city() {
        return $this->belongsTo(\App\City::class, 'city_id');
    }
}
