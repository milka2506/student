<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    protected $fillable = [
       'student_id','maths','science','history','term','total'
    ];

    public function getFromDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student','student_id');
    }
}