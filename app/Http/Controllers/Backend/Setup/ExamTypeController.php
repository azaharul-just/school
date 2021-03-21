<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function ViewExamType(){
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type',$data);
    }

    public function AddExamType(){
        return view('backend.setup.exam_type.add_exam_type');
    }

    public function StoreExamType(Request $request){
        $validatedData = $request->validate([
            'name' =>'required|unique:exam_types,name',
            ]);
        
        $data = new ExamType();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message'=>'Student Exam Type Inserted Successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('exam.type.view')->with($notification);
    }

    
    public function EditExamType($exam){
        $editData = ExamType::find($exam);
        //echo $editData;
        return view('backend.setup.exam_type.edit_exam_type',compact('editData'));
    }

    public function UpdateExamType(Request $request, $id){
        $data = ExamType::find($id);
        $validatedData = $request->validate([
            'name' =>'required|unique:exam_types,name,'.$data->id,
            ]);
       
        $data->name = $request->name;
        $data->update();

        $notification = array(
            'message'=>'Student Exam Type Update Successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('exam.type.view')->with($notification);

    }

    public function DeleteExamType($id){
        $data = ExamType::find($id); 
        $data->delete();

        $notification = array(
            'message'=>'Student Exam Type Deleted Successfully',
            'alert-type'=>'danger',
        );

        return redirect()->route('exam.type.view')->with($notification);

    }


}
