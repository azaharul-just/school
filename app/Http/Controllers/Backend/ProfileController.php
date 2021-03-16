<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('backend.user.view_profile',compact('user'));
    }

    public function ProfileEdit(){
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('backend.user.edit_profile',compact('editData'));

    }

    public function ProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender; 

        if ($request->file('image')) {
    		$file = $request->file('image');

    		@unlink(public_path('upload/user_images/'.$data->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images'),$filename);
    		$data['image'] = $filename; 
    	}

    	$data->save();

    	$notification = array(
            'message'=>'Profile Update Successfully',
            'alert-type'=>'success'
        ); 
        return Redirect()->route('profile.view')->with($notification);  
    }

    public function PasswordView(){
        $id = Auth::user()->id;
        $editData = User::find($id); 

        return view('backend.user.edit_password',compact('editData'));

    }

    public function PasswordUpdate(Request $request){ 
        $validatedData = $request->validate([ 
            'oldpassword' => 'required',  
            'password' => 'required|confirmed',
        ]);  

        $hashedPassword = User::find(Auth::user()->id)->password; 
 
        $password = $request->oldpassword;
        
        if (Hash::check($password,$hashedPassword)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            //return redirect()->route('login')->with('success','Password Changed Successfully');

             $notification = array(
            'message'=>'Password Update Successfully',
            'alert-type'=>'success'
            );

            return Redirect()->route('login')->with($notification);


        }else{

             $notification = array(
            'message'=>'Current Password Invalid',
            'alert-type'=>'warning'
            );

            return Redirect()->back()->with($notification);
            //return redirect()->back()->with('success','Current Password Invalid'); 
        }

    }
}
