@extends('admin.admin_master')

@section('admin')

<!-- Jquery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
 <!-- Main content -->
 
 <section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Add Assign Subject </h4> 
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form method="POST" action="{{route('store.assign.subject')}}"> 
                    @csrf 
                    <div class="row">
                        <div class="col-md-12">

                            <div class="add_item"> 
                                <div class="form-group">
                                    <h5>Select Class<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="class_id" id="select" class="form-control" aria-invalid="false">
                                            <option value="" selected disabled>Select Class</option>
                                            @foreach ($classes as $class)
                                            <option value="{{$class->id}}">{{$class->name}}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                    {{-- @error('usertype')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror --}}
                                </div>
                            

                                <div class="row">
                                    <div class="col-md-4">


                                        <div class="form-group">
                                            <h5>Select Subject<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="subject_id[]" id="select" class="form-control" aria-invalid="false">
                                                    <option value="" selected disabled>Select Subjects</option>
                                                    @foreach ($subjects as $subject)
                                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                            {{-- @error('fee_category_id')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror --}}
                                        </div> 
                                        
                                    </div> 
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <h5>Full Mark <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                            <input id="name" type="text" name="full_mark[]" class="form-control" > 
                                            </div> 
                                            {{-- @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror --}}
                                        </div> 
                                    </div>  
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <h5>Pass Mark<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                            <input id="name" type="text" name="pass_mark[]" class="form-control" > 
                                            </div> 
                                            {{-- @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror --}}
                                        </div> 
                                    </div>  
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <h5>Subjective Mark <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                            <input id="name" type="text" name="subjective_mark[]" class="form-control" > 
                                            </div> 
                                            {{-- @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror --}}
                                        </div> 
                                    </div>  
                                    <div class="col-md-2" style="padding-top: 25px"> 
                                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span> 
                                    </div> 
                                </div>  
                            </div>
                        </div>  
                    </div>    

                        <div class="text-xs-right"> 
                            <input type="submit" class="btn btn-rounded btn-info" value="Assign Subject">
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



   <div style="visibility: hidden">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row"> 
                    <div class="col-md-4">


                        <div class="form-group">
                            <h5>Select Subject<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="subject_id[]" id="select" class="form-control" aria-invalid="false">
                                    <option value="" selected disabled>Select Subjects</option>
                                    @foreach ($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                    @endforeach 
                                </select>
                            </div>
                            {{-- @error('fee_category_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div> 
                        
                    </div> 
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Full Mark <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input id="name" type="text" name="full_mark[]" class="form-control" > 
                            </div> 
                            {{-- @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div> 
                    </div>  
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Pass Mark <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input id="name" type="text" name="pass_mark[]" class="form-control" > 
                            </div> 
                            {{-- @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div> 
                    </div>  
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Subjective Mark <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input id="name" type="text" name="subjective_mark[]" class="form-control" > 
                            </div> 
                            {{-- @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror --}}
                        </div> 
                    </div>  
                     
                    <div class="col-md-2" style="padding-top: 25px"> 
                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span> 
                            <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span> 
                    </div>  

                </div> 
            </div>
        </div>
   </div>



   <script type="text/javascript">
        $(document).ready(function(){
            var counter = 0;
            $(document).on("click",".addeventmore",function(){
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click",".removeeventmore",function(){
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1;
            });
        });

   </script>


 

@endsection 