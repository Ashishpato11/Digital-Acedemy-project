<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use App\Models\Section;


class HomeController extends Controller
{
    public function index (){
        return view('front.home');
    }





    public function singlecourse($id){
        $relatedCourse = [];
        $course = Course::with('sections')->find($id);
        if($course->related_course != ''){
            $courseArray = explode(',',$course->related_course);
    
            $relatedCourse = Course::whereIn('id' , $courseArray)->get();
          }
          
          $data['relatedCourse'] = $relatedCourse;
          $data['course'] = $course ;
        return view('front.singlecourse' , $data);
    }

    public function categorycourse($id){
        $category = Category::find($id);
        
        return view('front.categorycourse' , compact('category'));
    }

    public function singleinstructor($id){
        $instructor = User::where('id', $id)
                     ->where('role', 'instructor')
                     ->first();      
         return view('front.singleinstructor',compact('instructor'));

    }
   








    //shop Integration 
    public function shop(Request $request, $categoryTitle = null, $instructorName = null)
    {

    $course = Course::count();
    $categorySelected = '';
    $instructorArray = [];

    if(!empty($request->get('instructor'))){
        $instructorArray = explode(',',$request->get('instructor'));
    }


    $categories = Category::orderBy('title', 'ASC')->where('status', 1)->get();
    $instructors = User::where('role', '=', 'instructor')->get();

    // Start with all courses
    $courses = Course::where('status', 1);

    // Apply category filter if available
    if (!is_null($categoryTitle)) {
        $category = Category::where('title', $categoryTitle)->first();

        if (!is_null($category)) {
            $courses = $courses->where('category_id', $category->id);
            $categorySelected = $category->id;
        }
    }
       
    if (!empty($instructorArray)) {
        $courses = $courses->whereIn('user_id', $instructorArray);
    }
    
    // Apply price filter if available
    if ($request->get('price_max') != '' && $request->get('price_min') != '') {
        if ($request->get('price_max') == 300) {
            $courses = $courses->whereBetween('price', [intval($request->get('price_min')), 1000]);
        } else {
            $courses = $courses->whereBetween('price', [intval($request->get('price_min')), intval($request->get('price_max'))]);
        }    
}



    // Fetch all courses after applying filters
    
    if($request->get('sort')) {
        if ($request->get('sort') == 'latest'){
            $courses = $courses->orderBy('id','DESC');
        }
        else if ($request->get('sort') == 'price_asc'){
            $courses = $courses->orderBy('price','ASC');
        }
        else{
                $courses = $courses->orderBy('price','DESC');
        }
            
    }
    else{
        $courses = $courses->orderBy('price','DESC');
    }
    $courses = $courses->paginate(6);

    $data['categories'] = $categories;
    $data['courses'] = $courses;
    $data['course'] = $course;
    $data['instructors'] = $instructors;
    $data['categorySelected'] = $categorySelected;
    $data['instructorArray'] = $instructorArray;
    $data['priceMax'] = (intval($request->get('price_max')) == 0) ? 300: $request->get('price_max');
    $data['priceMin'] = intval($request->get('price_min'));
    $data['sort'] = $request->get('sort');
    
    return view('front.shop',   $data);
}

}
