<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\User;
use App\Models\Course;

class CourseController extends Controller
{
  public function index(Request $request)
{
    // Start building the query to retrieve courses
    $courseQuery = Course::query();

    // Apply search filter if keyword is provided
    if (!empty($request->get('keyword'))) {
        $keyword = $request->get('keyword');
        $courseQuery->where('title', 'like', '%' . $keyword . '%');
    }

    // Retrieve the paginated courses
    $courses = $courseQuery->with(['category', 'user' => function ($query) {
        $query->where('role', '=', 'instructor'); // Assuming 'teacher' is the role for instructors
    }])->latest()->paginate(6);

    // Retrieve categories
    $categories = Category::withCount('course')->get();

    // Return the view with the data
    return view('admin.course.list', compact('courses', 'categories'));
}

    // public function index(Request $request){
    //     $course = Course::latest();
    //     if(!empty($request->get('keyword'))){
    //        $course = $course->where('title','like','%'.$request->get('keyword').'%');
    //     }
    //       $course = $course->paginate(6);
    //       $data['course'] = $course;

    //       $course = Course::with('category')->get();
    //       $category = Category::with('course')->get();

    //       $course = Course::with((['user' => function ($query) {
    //         $query->where('role', '=', 'instructor');
    //     }]))->get();
    //       $user= User::with('course')->get();

    //       return view('admin.course.list',$data , compact('course','category' ,'user'));
    //   }
    public function create(){
         $data = [];
         $categories = Category::orderBy('title','ASC')->get();
         $instructor= User::where('role','=','instructor')->get();
         $data['categories'] = $categories;
         $data['instructor'] = $instructor;
        return view('admin.course.create', $data);
    }

    public function store(Request $request){

         $request->validate([
          'title'=>'required',
          'short_description'=>'required',
          'description'=>'required',
          'outcomes'=>'required',
        //   'requirement'=>'required',
          'price'=>'required',
          'compare_price'=>'required',
          'level'=>'required',
        //   'thumbnail'=>'required',
        //   'category_id'=>'required',
        //   'user_id'=>'required',
         

         ]);
         $thumbnailName = time().'.'.$request->thumbnail->extension();
          $request->thumbnail->move(public_path('upload/course'),$thumbnailName);

         $course = new Course ;
         $course->title = $request->title;
         $course->short_description = $request->short_description;
         $course->description = $request->description;
         $course->outcomes = $request->outcomes;
         $course->requirements = $request->requirements;
         $course->level = $request->level;
         $course->language = $request->language;
         $course->certificate = $request->certificate;
         $course->thumbnail = $thumbnailName;
         $course->price = $request->price;
         $course->compare_price = $request->compare_price;
         $course->category_id = $request->category;
         $course->user_id = $request->user;
         $course->status = $request->status;
         $course->related_course = (!empty($request->related_course)) ? implode(',',$request->related_course) : '';
         $course->save();
         $notification = array(
            'message' => 'Course Created Successfully',
             'alert-type' => 'success'
   
          );
           return redirect('admin/course/list')->with($notification);


    }
    public function edit ($id){
      $data = [];
      $categories = Category::orderBy('title','ASC')->get();
      $instructor= User::where('role','=','instructor')->get();
      $relatedCourse = [];
       
      $data['categories'] = $categories;
      $data['instructor'] = $instructor;
     
      $course = Course::where('id',$id)->first();
      if (empty($course)){
         
         return redirect()->route('admin.course.list');
      }
       // fetch related products
       if($course->related_course != ''){
        $courseArray = explode(',',$course->related_course);

        $relatedCourse = Course::whereIn('id' , $courseArray)->get();
      }
      $data['relatedCourse'] = $relatedCourse;
        return view ('admin.course.edit',$data ,['course' => $course]);
    }

    public function update(Request $request ,$id){
      
      $request->validate([
        'title'=>'required',
        'short_description'=>'required',
        'description'=>'required',
        'outcomes'=>'required',
      //   'requirement'=>'required',
        'price'=>'required',
        'compare_price'=>'required',
        'level'=>'required',
      //   'thumbnail'=>'required',
      //   'category_id'=>'required',
      //   'user_id'=>'required',
       

       ]);
       
       $course = Course::where('id',$id)->first();
       
       if(isset($request->thumbnail)){
        $thumbnailName = time().'.'.$request->thumbnail->extension();
        $request->thumbnail->move(public_path('upload/course'),$thumbnailName);
        $course->thumbnail = $thumbnailName;
       }
       $course->title = $request->title;
         $course->short_description = $request->short_description;
         $course->description = $request->description;
         $course->outcomes = $request->outcomes;
         $course->requirements = $request->requirements;
         $course->level = $request->level;
         $course->certificate = $request->certificate;
         $course->language = $request->language;
         $course->price = $request->price;
         $course->compare_price = $request->compare_price;
         $course->category_id = $request->category;
         $course->user_id = $request->user;
         if($course->status = $request->status){
          $course->status = 1;
            }
            else {
              $course->status = 0;
            };
            $course->related_course = (!empty($request->related_course)) ? implode(',',$request->related_course) : '';
         $course->save();
         $notification = array(
            'message' => 'Course Updated Successfully',
             'alert-type' => 'success'
   
          );
           return redirect('admin/course/list')->with($notification);
    }
    public function destory ($id){
      $course= Course::where('id',$id)->first();
      $course->delete();
      $notification = array(
         'message' => 'Course Deleted Successfully!!',
          'alert-type' => 'success'

       );
        return back()->with($notification);
     }

     public function getCourse(Request $request){
      $tempCourse = [];
      if($request->term != ''){
        $course = Course::where('title','like','%'.$request->term.'%')->get();

        if($course != null){
          foreach ($course as $course){
            $tempCourse[] = array('id' => $course->id , 'text' => $course->title);
          }
        }
      }
         return response()->json([
          'tags' => $tempCourse,
          'status' => true
         ]);

     }
    
}
