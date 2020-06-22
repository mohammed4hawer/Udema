<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name', 'image', 'description'];

    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id');
    }

    public function FullDate()
    {
        $date = \Carbon\Carbon::parse($this->created_at)->format('d/m/y');
        return $date;
    }

}
