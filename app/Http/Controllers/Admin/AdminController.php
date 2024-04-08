<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Course;


class AdminController extends Controller
{
    public function AdminDashboard(){

         $course = Course::count();
         $user = User::where('role' ,'=','user')->count();
         $instructor = User::where('role' ,'=','instructor')->count();

        return view('admin.admin_dashboard', compact('course','user','instructor'));
    }
    //end method
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
    //end method

    public function AdminLogin(){
        return view('admin.admin_login');
    }

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile',compact('profileData'));
    }
    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        if ($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();
       $notification = array(
         'message' => 'Admin Profile Updated Successfully',
          'alert-type' => 'success'

       );
        return redirect()->back()->with($notification);
        
    }
    public function AdminChangePassword(){
       
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password',compact('profileData'));
    }


    public function AdminUpdatePassword(Request $request){
       $request->validate([
         'old_password'=>'required',
         'new_password'=>'required',
         'confirm_password'=>'required|same:new_password',
         
       ]);
              //match password
              if(!Hash::Check($request->old_password, auth::user()->password))
              {
                $notification = array(
                    'message' => 'old password Does not match !!',
                     'alert-type' => 'error'
                  );
                   return back()->with($notification);
                }
                /// upadate the new passord
                User::whereId(auth()->user()->id)->update([
                'password' =>  Hash::make($request->new_password)
                ]);
                $notification = array(
                    'message' => 'Password Change Successfully!!',
                     'alert-type' => 'success'
           
                  );
                   return back()->with($notification);
    }
            //------------------ add edit delete show store for teacher in admin
               
                public function AdminInstructorList(){
                    $data['getRecord'] = User::where('role','=','instructor')->latest()->paginate(5);
                    return view('admin.instruct.instructor_list',$data);
                }
                public function AdminInstructorShow($id){
                    $data = User::find($id);
                    return view('admin.instruct.instructor_show',compact('data'));

                }
                public function AdminInstructorDelete($id){
                    $data = User::find($id);
                   $data->delete();
                   $notification = array(
                    'message' => 'User Deleted Successfully!!',
                     'alert-type' => 'success'
           
                  );
                   return back()->with($notification);
                }
           //---------------- end of teacher show and delete

        // ---------------------add  delete show store for student in admin
        public function AdminUserList(){
            $data['getUser'] = User::where('role','=','user')->latest()->paginate(5);
              return view('admin.user.user_list',$data);
        }
        public function AdminUserShow($id){
            $data = User::find($id);
            return view('admin.user.user_show',compact('data'));

        }

        public function AdminUserDelete($id){
            $data = User::find($id);
                   $data->delete();
                   $notification = array(
                    'message' => 'User Deleted Successfully!!',
                     'alert-type' => 'success'
           
                  );
                   return back()->with($notification);
        }

}

