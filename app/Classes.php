<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'class'
    ];

    public function student() {
        return $this->hasMany(\App\Student::class);
    }

    public function teacher() {
        return $this->hasMany(\App\Teacher::class, 'supervisor_id');
    }

}
