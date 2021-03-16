@extends('admin.admin_master')

@section('admin')

<!-- Jquery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
 <!-- Main content -->
 
 <section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Update Password</h4> 
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form method="POST" action="{{route('profile.password.update',$editData->id)}}"> 
                @csrf 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Current Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input id="current_password" type="password" name="oldpassword" class="form-control" > 
                                </div> 
                                @error('oldpassword')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 
                        </div>  
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>New Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input id="password" type="password" name="password" class="form-control" > 
                                </div> 
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 
                        </div>  
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Confirm Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" > 
                                </div> 
                                @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 
                        </div>  
                    </div> 
                      
                   <div class="text-xs-right"> 
                       <input type="submit" class="btn btn-rounded btn-info" value="Update Password">
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

 






@endsection 