<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
// typing all names of each column in the table in $fillable variable
    protected $fillable = ['name', 'image', 'short_description', 'long_description', 'price', 'category_id'];

// for adding new attribute to the table using $appends variable
    protected $appends = ['total_duration'];
// connecting the tables and its relations
    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'course_id');
    }

// for appending the new attribute to the table and summation f the whole duration time of all lessons
    public function setTotalDurationAttribute()
    {
        $course->lessons->sum('duration');
    }
    public function ScopeEnrolled($query)
    {
        $query->where(['course_id'=>$this->id,'user_id'=>auth()->user()->id]);
    }
    public function getTotalReviewPercentage($rate)
    {
        $review = $this->reviews()->where('rate',$rate);
        $reviews = $this->reviews->count();

        $count_reviews = $review->count();
        if ($reviews != 0)
        $percentage = ($count_reviews / $reviews ) * 100 ;
        else
            $percentage = 0 ;

        $data = ['percentage'=>$percentage ,'count_reviews'=>$count_reviews];

        return $data;
    }

    public function isEnrolled()
    {
        if (!auth()->check()) return false;
        $user_id = auth()->user();
        $conditions = ['course_id'=>$this->id,'user_id'=>$user_id,'is_confirmed'=>1];
        $course_enrolled = CourseEnroll::where($conditions)->first();
        if ($course_enrolled) return true;
        return false;
    }


}
