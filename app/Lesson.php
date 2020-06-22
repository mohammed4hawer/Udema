<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['name', 'url', 'duration', 'course_id'];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

}
