<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignSubject; 
use App\Models\StudentSubject;
use App\Models\StudentClass;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubject(){
        //$data['allData'] = AssignSubject::all();
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject',$data);
    }

    public function AddAssignSubject(){
        $data['subjects'] = StudentSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject',$data);
    }

    public function StoreAssignSubject(Request $request){
        $countSubject = count($request->subject_id);

        if ($countSubject != NULL) {
            for ($i=0; $i < $countSubject ; $i++) { 
                $data = new AssignSubject();
                $data->class_id = $request->class_id;
                $data->subject_id = $request->subject_id[$i];
                $data->full_mark = $request->full_mark[$i];
                $data->pass_mark = $request->pass_mark[$i];
                $data->subjective_mark = $request->subjective_mark[$i];
                $data->save();

            }
        }

        $notification = array(
            'message'=>'Assign Subject Inserted Successfuly',
            'alert-type'=>'success'
        );

        return redirect()->route('assign.subject.view')->with($notification);


    }

    public function EditAssignSubject($id){ 
        //$data['editData'] = AssignSubject::find($id); 
        $data['editData'] = AssignSubject::where('class_id',$id)->orderBy('subject_id','asc')->get();
        $data['subjects'] = StudentSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.edit_assign_subjec',$data);
    }

    public function UpdateAssignSubject(Request $request,$id){   
        if ($request->subject_id == NULL) {

            $notification = array(
                'message'=>'You do not select Subject, please select any!',
                'alert-type'=>'error'
            ); 
            return redirect()->route('assign.subject.edit',$id)->with($notification);
            
        }else{
            $countClass = count($request->subject_id);
            AssignSubject::where('class_id',$id)->delete();
            if ($countClass != NULL) {
                for ($i=0; $i < $countClass ; $i++) { 
                    $fee_amount = new AssignSubject();
                    $fee_amount->class_id = $request->class_id;
                    $fee_amount->subject_id = $request->subject_id[$i];
                    $fee_amount->full_mark = $request->full_mark[$i];
                    $fee_amount->pass_mark = $request->pass_mark[$i];
                    $fee_amount->subjective_mark = $request->subjective_mark[$i];
                    $fee_amount->save();
    
                }
            }
    
            $notification = array(
                'message'=>'Data Updated Successfuly',
                'alert-type'=>'success'
            );
    
            return redirect()->route('assign.subject.view')->with($notification);
        }
    }


    public function DetailsAssignSubject($id){
        $data['details'] = AssignSubject::where('class_id',$id)->orderBy('subject_id','asc')->get();
        return view('backend.setup.assign_subject.details_assign_subject',$data);
    }




}
