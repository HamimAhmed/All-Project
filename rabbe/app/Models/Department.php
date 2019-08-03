<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [''];

    public $timestamps = false;

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function faculties(){
        return $this->hasMany(Faculty::class);
    }

}
