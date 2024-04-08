<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\Section;
use app\Models\Lesson;

class Course extends Model
{
    use HasFactory;

    public function category(){
        return $this ->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id')->where('role','=' ,'instructor');
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    
}
