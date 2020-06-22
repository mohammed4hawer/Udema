<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['comment', 'rate', 'user_id', 'course_id'];

    public function user()
    {
        return $this->belongsTo(User::Class, 'user_id');
    }
}
