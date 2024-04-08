<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Course;
use App\Models\Section;

class InstructorController extends Controller
{
    
    public function InstructorDashboard(){
        $instructorId = Auth::id();
        
        // Retrieve the count of courses associated with the logged-in teacher
        $courseCount = User::findOrFail($instructorId)->course()->count();
        
        return view('Instructor.instructor_dashboard', compact('courseCount'));
    }
    
    public function InstructorRegister(){
        return view('Instructor.instructor_register');
    }
   
  public function InstructorLogout(Request $request){
            
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');


  }
  public function InstructorProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('instructor.instructor_profile',compact('profileData'));
}    
    public function InstructorProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->qualification = $request->qualification;
        $data->gender = $request->gender;
        $data->skill = $request->skill;
        $data->workexperience = $request->workexperience;
        $data->facebook = $request->facebook;
        $data->instagram = $request->instagram;
        $data->twiter = $request->twiter;
        $data->linkdin = $request->linkdin;

        if ($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/instruct_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/instruct_images'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();
          
        return redirect()->back()->with('success','Profile Updated succesfully !!');

    }
          public function InstructorUpdatePassword(Request $request){
            $request->validate([
                'old_password'=>'required',
                'new_password'=>'required',
                'confirm_password'=>'required|same:new_password',
                
              ]);
               //match password
               if(!Hash::Check($request->old_password, auth::user()->password))
               {
                    return back()->with('error','old password Does not match !!');
                 }
                 /// upadate the new passord
                 User::whereId(auth()->user()->id)->update([
                 'password' =>  Hash::make($request->new_password)
                 ]);

                    return back()->with('success','Password changes succesfully');
          }

          /////////// course///
          public function index()
            {
                // Get the ID of the currently logged-in teacher
                $instructorId = Auth::id();
            
                // Retrieve only the courses associated with the logged-in teacher
                $courses = Course::where('user_id', $instructorId)->latest()->paginate(6);
            
                return view('instructor.course.list', compact('courses'));
            }
           
             public function create(){
                $data = [];
                $categories = Category::orderBy('title','ASC')->get();
                // $instructor= User::where('role','=','instructor')->get();
                $data['categories'] = $categories;
                // $data['instructor'] = $instructor;
               return view('instructor.course.create', $data);
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
           
           $course->related_course = (!empty($request->related_course)) ? implode(',',$request->related_course) : '';
           $course->user_id = Auth::user()->id;
           $course->save();
           $notification = array(
              'message' => 'Course Created Successfully',
               'alert-type' => 'success'
     
            );
             return redirect('instructor/course/list')->with($notification);
  

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
              return view ('instructor.course.edit',$data ,['course' => $course]);
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
            //    $course->user_id = $request->user;
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
               return redirect('instructor/course/list')->with($notification);
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

     public function screate($id){
       
          $courses = Course::with('sections')->find($id);
          $sections = Section::all();

          $data['courses'] = $courses ;
          $data['sections'] = $sections ;
          return view('instructor.course.section.create',$data);
  }
  public function sstore(Request $request){
    $request->validate([
        'title'=>'required',
       ]);
    $section = new Section ;
    $section->title = $request->title;
    $section->course_id = $request->course_id;
               
    $section->save();
    $notification = array(
     'message' => 'Section Added Successfully',
      'alert-type' => 'success'

   );
   return redirect()->route('instructor.course.section.create', ['id' => $request->course_id])->with($notification);
}
public function sedit($id){
  $section = Section::find($id);

  if (!$section) {
      // Handle the case where the section doesn't exist
      abort(404); // Or any other appropriate action
  }

  $courses = Course::with('sections')->find($section->course_id);
  $sections = Section::all();
  $data['courses'] = $courses;
  $data['sections'] = $sections;
  $data['section'] = $section;
  $data['sectionId'] = $id;
  
  return view('instructor.course.section.edit', $data);
}
public function supdate(Request $request, $id){
  $section = Section::find($id);
 
  $section->title = $request->title;
  $section->course_id = $request->course_id;
  $section->save();

  $notification = array(
      'message' => 'Section updated successfully',
      'alert-type' => 'success'
  );

  return redirect()->route('instructor.course.section.create', ['id' => $request->course_id])->with($notification);
}
public function sdelete($id)
{
    // Find the section by its ID
    $section = Section::find($id);
    $notification = array(
        'message' => 'Section Deleted Successfully!!',
         'alert-type' => 'success'

      );
    // Check if the section exists
    if ($section) {
        // Delete the section
        $section->delete();

        // Redirect back with success message
        return redirect()->back()->with($notification);
    } 
}
}
