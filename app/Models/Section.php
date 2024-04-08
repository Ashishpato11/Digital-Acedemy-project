<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Course;
use app\Models\Lesson;

class Section extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }
}