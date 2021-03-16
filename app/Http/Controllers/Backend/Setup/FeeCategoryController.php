<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function ViewFeeCat(){
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_cat',$data);
    }

    public function Fee_Cat_Add(){
        return view('backend.setup.fee_category.add_fee_cat');
    }

    public function Fee_Cat_Store(Request $request){
        $validatedData = $request->validate([
            'name' =>'required|unique:fee_categories,name',
            ]);
        
        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message'=>'Student Fee Category Inserted Successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('fee.category.view')->with($notification);
    }

    public function Fee_Cat_Edit($id){
        $editData = FeeCategory::find($id);
        //echo $editData;
        return view('backend.setup.fee_category.edit_fee_cat',compact('editData'));
    }

    public function Fee_Cat_Update(Request $request, $id){
        $data = FeeCategory::find($id);
        $validatedData = $request->validate([
            'name' =>'required|unique:fee_categories,name,'.$data->id,
            ]);
       
        $data->name = $request->name;
        $data->update();

        $notification = array(
            'message'=>'Student Fee Category Update Successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('fee.category.view')->with($notification);

    }

    public function Fee_Cat_Delete($id){
        $data = FeeCategory::find($id); 
        $data->delete();

        $notification = array(
            'message'=>'Student Fee Deleted Successfully',
            'alert-type'=>'danger',
        );

        return redirect()->route('fee.category.view')->with($notification);

    }
}
