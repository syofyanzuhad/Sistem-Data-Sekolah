<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name'
    ];

    public function student() {
        return $this->hasMany(\App\Student::class);
    }

    public function teacher() {
        return $this->hasMany(\App\Teacher::class, 'cities_id');
    }

}
