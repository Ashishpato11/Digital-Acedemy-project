<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard (){
       
        if(Auth::user()->role === 'admin'){
            return redirect()->route('admin.dashboard');
        }
        if(Auth::user()->role === 'instructor'){
            return redirect()->route('instructor.dashboard');
        }

           return view('dashboard');
    } 
     
    public function UserProfile(){
        $id = Auth::user()->id;
        $userData = User::find($id);
                 return view('user.user_profile',compact('userData'));
    }   
    
    public function UserProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->interest = $request->interest;
        $data->facebook = $request->facebook;
        $data->instagram = $request->instagram;
        $data->twiter = $request->twiter;
        $data->linkdin = $request->linkdin;

        if ($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();
          
        return redirect()->back()->with('success','Profile Updated succesfully !!');

    }
    public function UserUpdatePassword(Request $request){
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

 
     public function UserRegister(){
        return view('auth.register');
     }
     public function UserLogin(){
        return view('auth.login');
     }
     public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

