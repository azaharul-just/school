@extends('admin.admin_master')

@section('admin')

<!-- Jquery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
 <!-- Main content -->
 
 <section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Add Student  </h4> 
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form method="POST" action="{{route('student.registration.store')}}" enctype="multipart/form-data"> 
                @csrf 
                    <div class="row">
                        <div class="col-md-12">


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Student Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input id="name" type="text" name="name" class="form-control" required> 
                                        </div> 
                                        
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Father's Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input id="fname" type="text" name="fname" class="form-control" required> 
                                        </div> 
                                       
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Mother's Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input id="mname" type="text" name="mname" class="form-control" required> 
                                        </div> 
                                         
                                    </div> 
                                </div>
                            </div>
                             {{-- first row end --}}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Mobile <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input id="mobile" type="text" name="mobile" class="form-control" required> 
                                        </div> 
                                        
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Address <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input id="address" type="text" name="address" class="form-control" required> 
                                        </div> 
                                       
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Gender <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="gender" id="gender" class="form-control" aria-invalid="false" required>
                                                <option value="" selected disabled>Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option> 
                                            </select>
                                        </div>
                                         
                                    </div> 
                                </div>
                            </div>
                            {{-- Second row end --}}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Religion <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="religion" id="religion" class="form-control" aria-invalid="false" required>
                                                <option value="" selected disabled>Select religion</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Hindu">Hindu</option> 
                                                <option value="Christan">Christan</option>
                                            </select>
                                        </div>
                                       
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Date of Birth <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input id="dob" type="date" name="dob" class="form-control" required > 
                                        </div> 
                                       
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Discount <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input id="discount" type="text" name="discount" class="form-control" required > 
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
                                                <option value="{{$class->id}}">{{$class->name}}</option>
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
                                                <option value="{{$group->id}}">{{$group->name}}</option>
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
                                                <option value="{{$year->id}}">{{$year->name}}</option>
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
                                                <option value="{{$shift->id}}">{{$shift->name}}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                       
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>User Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                        <input type="file" name="image" id="image" class="form-control" required> 
                                        </div> 
                                       
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <img id="showImage" src="{{url('upload/no_image.jpg')}}" height="100px" width="120px">
                                    </div> 
                                </div>
                                 
                            </div> 
                            {{-- Fifth row end --}}


                        </div>  
                    </div>  
                   <div class="text-xs-right"> 
                       <input type="submit" class="btn btn-rounded btn-info" value="Add Student">
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