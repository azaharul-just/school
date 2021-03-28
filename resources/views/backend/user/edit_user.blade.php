@extends('admin.admin_master')

@section('admin')
    
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
               <form method="POST" action="{{route('users.update',$editData->id)}}"> 
                @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Select role<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="role" id="role" class="form-control" aria-invalid="false">
                                        <option value="" selected disabled>Select Role</option>
                                        <option value="Admin" {{$editData->role == "Admin" ? "selected":" "}}>Admin</option>
                                        <option value="Operator" {{$editData->role == "Operator" ? "selected":" "}}>Operator</option> 
                                    </select>
                                </div>
                                @error('role')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
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
                    </div> 
                    <div class="row">
                           <div class="col-md-12">
                            <div class="form-group">
                                <h5>Email<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="email" name="email" value="{{$editData->email}}" id="email" class="form-control" > 
                                </div>
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
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
  
@endsection 