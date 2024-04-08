<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request){
      $categories = Category::latest();
      if(!empty($request->get('keyword'))){
         $categories = $categories->where('title','like','%'.$request->get('keyword').'%');
      }

        $categories = $categories->paginate(5);
        $data['categories'] = $categories ;
        return view('admin.category.list',compact('categories'));
    }

    public function create(){
       return view('admin.category.create');
    }
    
    public function store(Request $request){
         //validate data
         $request->validate([
            'title'=> 'required',
            'photo' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
           ]);
          $photoName = time().'.'.$request->photo->extension();
          $request->photo->move(public_path('upload/category'),$photoName);
        
           $category = new Category ;
           $category->photo = $photoName;
           $category->title = $request->title;
           $category->status = $request->status;
           
           $category->save();
           $notification = array(
            'message' => 'Category Created Successfully',
             'alert-type' => 'success'
   
          );
           return redirect('admin/category/list')->with($notification);
           
        }

        public function edit($id){
             $category = Category::where('id',$id)->first();
            if (empty($category)){
               
               return redirect()->route('admin.category.list');
            }
            
              return view ('admin.category.edit',['category' => $category]);
        } 

       public function update(Request $request ,$id){
         
       //validate data
       $request->validate([
         'title'=> 'required',
         'photo' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        
        $category = Category::where('id',$id)->first();
       
        if(isset($request->photo)){
         $photoName = time().'.'.$request->photo->extension();
         $request->photo->move(public_path('upload/category'),$photoName);
         $category->photo = $photoName;
        }
       
                     
                     if($category->status = $request->status){
                        $category->status = 1;
                  }
                  else {
                     $category->status = 0;
                  }
        $category->title = $request->title;
        
       
        $category->save();
        $notification = array(
         'message' => 'Category Updated Successfully !!',
          'alert-type' => 'success'

       );
        return redirect('admin/category/list')->with($notification);
        
     }
         
        public function destory ($id){
         $category = Category::where('id',$id)->first();
         $category->delete();
         $notification = array(
            'message' => 'Category Deleted Successfully!!',
             'alert-type' => 'success'
   
          );
           return back()->with($notification);
        }

}
