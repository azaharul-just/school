@extends('admin.admin_master')

@section('admin')
    

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Data Table : Student Assign Subject</h3>
                  <a href="{{route('assign.subject.add')}}" style="float: right" class="btn btn-rounded btn-success mb-5">Add Assign subject</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead class="thead-light">
							<tr>
								<th width="5%">Sl</th> 
								<th>Assign Subject</th> 
								<th width="25%">Action</th> 
							</tr>
						</thead>
						<tbody>
                            @foreach ($allData as $key=>$assign)
                            <tr>
								<td width="5%">{{$key+1}}</td> 
								<td>{{ $assign['student_class']['name'] }}</td> 
								<td width="25%"> 
                                    <a href="{{route('assign.subject.edit', $assign->class_id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('assign.subject.details', $assign->class_id)}}" class="btn btn-success">Details</a>
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