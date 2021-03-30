@extends('admin.admin_master')

@section('admin') 
		<!-- Main content -->
		<section class="content">
		  <div class="row"> 

{{-- Searching Box Start--}}
			<div class="col-12"> 
				<div class="box bb-3 border-info">
					<div class="box-header">
						<h4 class="box-title">Student <strong>Search</strong></h4>
					</div>
					<div class="box-body">
						<form action="{{route('student.year.class.wise')}}" method="GET"> 
							<div class="row"> 
								<div class="col-md-4">
									<div class="form-group">
										<h5>Year  </h5>
										<div class="controls">
											<select name="year_id" id="year_id" class="form-control" required aria-invalid="false">
												<option value="" selected disabled>Select Year</option>
												@foreach ($years as $year)
												<option value="{{$year->id}}" {{(@$year_id == $year->id)?"selected":" "}}>{{$year->name}}</option>
												@endforeach 
											</select>
										</div>
										
									</div> 
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<h5>Class </h5>
										<div class="controls">
											<select name="class_id" id="class_id" class="form-control" required aria-invalid="false">
												<option value="" selected disabled>Select Class</option>
												@foreach ($classes as $class)
												<option value="{{$class->id}}" {{(@$class_id == $class->id)?"selected":" "}}>{{$class->name}}</option>
												@endforeach 
											</select>
										</div>
									
									</div> 
								</div> 

								<div class="col-md-4" style="padding-top: 25px">
									<input type="submit" name="search" class="btn btn-rounded btn-dark mb-5" name="search"  value="Search">
								</div>
							</div> 
						</form>  
					</div>
				</div>
			</div>
 {{-- Searching Box End--}}



			<div class="col-12"> 
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Data Table : Student Lists</h3>
                  <a href="{{route('student.registration.add')}}" style="float: right" class="btn btn-rounded btn-success mb-5">Add Student</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">  
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th> 
								<th>Name</th> 
								<th>ID</th> 
								<th>Roll</th> 
								<th>Year</th> 
								<th>Class</th> 
								<th>Image</th> 
								@if (Auth::user()->role == "Admin")
								<th>Code</th>  
								@endif 
								<th width="25%">Action</th> 
							</tr>
						</thead>
						<tbody>
                            @foreach ($allData as $key=>$value)
                            <tr>
								<td width="5%">{{$key+1}}</td> 
								<td>{{$value['student']['name']}}</td> 
                                <td>{{$value['student']['id_no']}}</td> 
								<td>{{$value->roll}}</td> 
								<td>{{$value['student_year']['name']}}</td>
								<td>{{$value['student_class']['name']}}</td>
								<td>
									<img src="{{ (!empty($value['student']['image'])) ? url('upload/student_images/'.$value['student']['image']):url('upload/no_image.jpg')}}" height="50px" width="50px">
								</td>
								<td>{{$value['student']['code']}}</td>
								<td width="25%"> 
                                    <a href="{{route('student.year.edit',$value->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('student.year.delete',$value->id)}}" class="btn btn-danger" id="delete" >Delete</a>
                                </td> 
							</tr>  
                            @endforeach
							 
						</tbody>
						<tfoot>
							 
						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 

			  <!-- /.box -->          
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
  
@endsection 