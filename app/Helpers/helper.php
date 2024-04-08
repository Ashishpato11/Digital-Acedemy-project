<?php
use App\Models\Category;
use App\Models\Course;
use App\Models\User;

 function getCategories(){
   return Category::orderBy('title','ASC')
   ->with('course')
   
   ->get();
 }

 function getCourses(){
  
    return Course::orderBy('title','ASC')
    ->where('status',1)
    ->paginate('6');
  }


  function getInstructor(){
    return User::where('role','=','instructor')
    ->take('5')
    ->get();
  }
?>