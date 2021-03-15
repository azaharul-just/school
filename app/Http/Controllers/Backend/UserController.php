<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView(){
        // $allData = User::all();
        // echo $allData;

        $data['allData'] = User::all();
        return view('backend.user.view_user',$data);


    }

    public function UserAdd(){
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request){
        $validateData = $request->validate([
            'email'=>'required|unique:users',
            'name'=>'required',
            'usertype'=>'required',
            'password'=>'required',
        ]);

        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'User added successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function UserEdit($id){
        $editData = User::find($id);
        return view('backend.user.edit_user',compact('editData'));
    }

    public function UserUpdate(Request $request, $id){
        $updateData = User::find($id);
        
        $updateData->name = $request->name;
        $updateData->email = $request->email;
        $updateData->usertype = $request->usertype; 
        //$updateData->update();

        $updateData->save();

        $notification = array(
            'message'=>'User update successfully',
            'alert-type'=>'info',
        );

        return redirect()->route('user.view')->with($notification);
         
    }

    public function UserDelete($id){
        $delete = User::find($id);
        $delete->delete();

        $notification = array(
            'message'=>'User Deleted successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('user.view')->with($notification);
    }
}
