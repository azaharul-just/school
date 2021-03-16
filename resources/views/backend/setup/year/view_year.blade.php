@extends('admin.admin_master')

@section('admin')
    

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Data Table : Student Year Lists</h3>
                  <a href="{{route('student.year.add')}}" style="float: right" class="btn btn-rounded btn-success mb-5">Add Student Year</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">Sl</th> 
								<th>Name</th> 
								<th width="25%">Action</th> 
							</tr>
						</thead>
						<tbody>
                            @foreach ($allData as $key=>$student)
                            <tr>
								<td width="5%">{{$key+1}}</td> 
								<td>{{$student->name}}</td> 
								<td width="25%"> 
                                    <a href="{{route('student.year.edit',$student->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('student.year.delete',$student->id)}}" class="btn btn-danger" id="delete" >Delete</a>
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