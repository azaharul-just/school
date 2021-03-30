@extends('admin.admin_master')

@section('admin')

<!-- Jquery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
 <!-- Main content -->
 
 <section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Promotion Student  </h4>
         <h6>You can only change (Promotion):<span class="text-danger"> Year, Class, Group, Shift, Discount</span> </h6>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form method="POST" action="{{route('update.promotion.student.registration',$editData->student_id)}}" enctype="multipart/form-data"> 
                @csrf 

                <input type="hidden" name="id" value="{{$editData->id}}">
                    <div class="row">
                        <div class="col-md-12">


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Student Name  </h5>
                                        <div class="controls">
                                        <input disabled id="name" type="text" name="name" value="{{$editData['student']['name']}}" class="form-control" required> 
                                        </div> 
                                        
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Father's Name  </h5>
                                        <div class="controls">
                                        <input disabled id="fname" type="text" name="fname" value="{{$editData['student']['fname']}}" class="form-control" required> 
                                        </div> 
                                       
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Mother's Name  </h5>
                                        <div class="controls">
                                        <input disabled id="mname" type="text" name="mname" value="{{$editData['student']['mname']}}" class="form-control" required> 
                                        </div> 
                                         
                                    </div> 
                                </div>
                            </div>
                             {{-- first row end --}}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Mobile  </h5>
                                        <div class="controls">
                                        <input disabled id="mobile" type="text" name="mobile" value="{{$editData['student']['mobile']}}" class="form-control" required> 
                                        </div> 
                                        
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Address  </h5>
                                        <div class="controls">
                                        <input disabled id="address" type="text" name="address" value="{{$editData['student']['address']}}" class="form-control" required> 
                                        </div> 
                                       
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Gender  </h5>
                                        <div class="controls">
                                            <select disabled name="gender" id="gender" class="form-control" aria-invalid="false" required>
                                                <option value="" selected disabled>Select Gender</option>
                                                <option value="Male"  {{$editData['student']['gender'] == "Male"?"selected":""}} >Male</option>
                                                <option value="Female" {{$editData['student']['gender'] == "Female"?"selected":""}}>Female</option> 
                                            </select>
                                        </div>
                                         
                                    </div> 
                                </div>
                            </div>
                            {{-- Second row end --}}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Religion  </h5>
                                        <div class="controls">
                                            <select disabled name="religion" id="religion" class="form-control" aria-invalid="false" required>
                                                <option value="" selected disabled>Select religion</option>
                                                <option value="Islam" {{$editData['student']['religion'] == "Islam"?"selected":""}}>Islam</option>
                                                <option value="Hindu" {{$editData['student']['religion'] == "Hindu"?"selected":""}}>Hindu</option> 
                                                <option value="Christan" {{$editData['student']['religion'] == "Christan"?"selected":""}}>Christan</option>
                                            </select>
                                        </div>
                                       
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Date of Birth  </h5>
                                        <div class="controls">
                                        <input disabled id="dob" type="date" name="dob" value="{{$editData['student']['dob']}}" class="form-control" required > 
                                        </div> 
                                       
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Discount <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input id="discount" type="text" name="discount" value="{{$editData['discount']['discount']}}" class="form-control" required > 
                                        </div> 
                                       
                                    </div> 
                                </div>
                            </div> 
                            {{-- Third row end --}} 

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Class <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="class_id" id="class_id" class="form-control" required aria-invalid="false">
                                                <option value="" selected disabled>Select Class</option>
                                                @foreach ($classes as $class)
                                                <option value="{{$class->id}}" {{($editData->class_id == $class->id)?"selected":""}}>{{$class->name}}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                       
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Group <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="group_id" id="group_id" class="form-control" required aria-invalid="false">
                                                <option value="" selected disabled>Select Group</option>
                                                @foreach ($groups as $group)
                                                <option value="{{$group->id}}" {{($editData->group_id == $group->id)?"selected":""}}>{{$group->name}}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                         
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Year <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="year_id" id="year_id" class="form-control" required aria-invalid="false">
                                                <option value="" selected disabled>Select Year</option>
                                                @foreach ($years as $year)
                                                <option value="{{$year->id}}" {{($editData->year_id == $year->id)?"selected":""}}>{{$year->name}}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                        
                                    </div> 
                                </div>
                                 
                            </div> 
                            {{-- Fourth row end --}}

                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Shift <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="shift_id" id="shift_id" class="form-control" required aria-invalid="false">
                                                <option value="" selected disabled>Select Class</option>
                                                @foreach ($shifts as $shift)
                                                <option value="{{$shift->id}}" {{($editData->shift_id == $shift->id)?"selected":""}}>{{$shift->name}}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                       
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>User Image  </h5>
                                        <div class="controls">
                                        <input disabled type="file" name="image" id="image" class="form-control"> 
                                        </div> 
                                       
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <img id="showImage" src="{{ (!empty($editData['student']['image'])) ? url('upload/student_images/'.$editData['student']['image']):url('upload/no_image.jpg')}}"  height="100px" width="120px">
                                    </div> 
                                </div>
                                 
                            </div> 
                            {{-- Fifth row end --}}


                        </div>  
                    </div>  
                   <div class="text-xs-right"> 
                       <input type="submit" class="btn btn-rounded btn-info" value="Update Student">
                   </div>
               </form>

           </div>
           <!-- /.col -->
         </div>
         <!-- /.row -->
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->

   </section>

 


 
<!-- After select image show, Don't forget add jquery cdn that is above this file -->
<script type="text/javascript">
	$(document).ready(function(){
			$('#image').change(function(e){
					var reader = new FileReader();
					reader.onload = function(e){
						$('#showImage').attr('src',e.target.result);
					}
					reader.readAsDataURL(e.target.files['0']);
			});
	});
</script>



@endsection 