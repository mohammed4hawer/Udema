<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseEnroll extends Model
{
    protected $fillable = ['user_id','course_id', 'is_confirmed'];
}
