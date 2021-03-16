@extends('admin.admin_master')

@section('admin')

<!-- Jquery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
 <!-- Main content -->
 
 <section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Update Student Class </h4> 
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form method="POST" action="{{route('student.class.update',$editData->id)}}"> 
                @csrf 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h5>Class Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input id="name" type="text" name="name" value="{{$editData->name}}" class="form-control" > 
                                </div> 
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 
                        </div>  
                    </div>  
                   <div class="text-xs-right"> 
                       <input type="submit" class="btn btn-rounded btn-info" value="Update Class">
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