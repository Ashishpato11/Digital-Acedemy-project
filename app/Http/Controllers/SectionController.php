<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Section;

class SectionController extends Controller
{
    public function create($id){
       
        $courses = Course::with('sections')->find($id);
        $sections = Section::all();

        $data['courses'] = $courses ;
        $data['sections'] = $sections ;
        return view('admin.course.section.create',$data);
    }

    public function store(Request $request){
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
       return redirect()->route('admin.course.section.create', ['id' => $request->course_id])->with($notification);
    }

    public function edit($id){
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
        
        return view('admin.course.section.edit', $data);
    }
    
    public function update(Request $request, $id){
        $section = Section::find($id);
       
        $section->title = $request->title;
        $section->course_id = $request->course_id;
        $section->save();
    
        $notification = array(
            'message' => 'Section updated successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('admin.course.section.create', ['id' => $request->course_id])->with($notification);
    }
    public function delete($id)
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
