<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $guarded = [''];

    public $timestamps = false;

    public function department(){
        return $this->belongsTo(Department::class);
    }

}
