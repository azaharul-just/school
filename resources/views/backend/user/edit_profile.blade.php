@extends('admin.admin_master')

@section('admin')

<!-- Jquery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
 <!-- Main content -->
 
 <section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Update User</h4> 
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form method="POST" action="{{route('profile.store',$editData->id)}}" enctype="multipart/form-data"> 
                @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="name" value="{{$editData->name}}" id="name" class="form-control" > 
                                </div> 
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="email" name="email" value="{{$editData->email}}" id="name" class="form-control" > 
                                </div> 
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 
                        </div> 
                    </div> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Mobile <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="mobile" value="{{$editData->mobile}}" id="name" class="form-control" > 
                                </div> 
                                @error('mobile')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Address <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="address" value="{{$editData->address}}" id="name" class="form-control" > 
                                </div> 
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 
                        </div> 
                    </div> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Select Gender<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="gender" id="select" class="form-control" aria-invalid="false">
                                        <option value="" selected disabled>Select Your Gender</option>
                                        <option value="Male" {{$editData->gender == "Male" ? "selected":" "}}>Male</option>
                                        <option value="Female" {{$editData->gender == "Female" ? "selected":" "}}>Female</option> 
                                    </select>
                                </div>
                                @error('gender')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="file" name="image" value="{{$editData->image}}" id="image" class="form-control" > 
                                </div> 
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 

                            <div class="mb-3">
                                <img id="showImage" src="{{ (!empty($editData->image)) ? url('upload/user_images/'.$editData->image):url('upload/no_image.jpg')}}" height="120px" width="120px">
                            </div> 
                        </div> 
                    </div> 
                      
                   <div class="text-xs-right"> 
                       <input type="submit" class="btn btn-rounded btn-info" value="Submit">
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

    

		 
  <!-- /.content-wrapper -->
  
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