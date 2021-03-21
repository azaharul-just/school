<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentSubject;

class StudentSubjectController extends Controller
{
    public function ViewStudentSubject(){
        $data['allData'] = StudentSubject::all();
        return view('backend.setup.student_subject.view_student_subject',$data);
    }

    public function AddStudentSubject(){
        return view('backend.setup.student_subject.add_student_subject');
    }

    public function StoreStudentSubject(Request $request){
        $validatedData = $request->validate([
            'name' =>'required|unique:student_subjects,name',
            ]);
        
        $data = new StudentSubject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message'=>'Student Subject Inserted Successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('student.subject.view')->with($notification);
    }

    public function EditStudentSubject($id){
        $editData = StudentSubject::find($id);
        //echo $editData;
        return view('backend.setup.student_subject.edit_student_subject',compact('editData'));
    }

    public function UpdateStudentSubject(Request $request, $id){
        $data = StudentSubject::find($id);
        $validatedData = $request->validate([
            'name' =>'required|unique:student_subjects,name,'.$data->id,
            ]);
       
        $data->name = $request->name;
        $data->update();

        $notification = array(
            'message'=>'Student Subject Update Successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('student.subject.view')->with($notification);

    }


    public function DeleteStudentSubject($id){
        $data = StudentSubject::find($id); 
        $data->delete();

        $notification = array(
            'message'=>'Student Subject Deleted Successfully',
            'alert-type'=>'danger',
        );

        return redirect()->route('student.subject.view')->with($notification);

    }

    
}
