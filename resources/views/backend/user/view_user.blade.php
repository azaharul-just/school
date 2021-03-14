@extends('admin.admin_master')

@section('admin')
    

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Data Table : User Lists</h3>
                  <a href="{{route('users.add')}}" style="float: right" class="btn btn-rounded btn-success mb-5">Add User</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Sl</th>
								<th>Role</th>
								<th>Name</th>
								<th>Email</th>
								<th>Action</th> 
							</tr>
						</thead>
						<tbody>
                            @foreach ($allData as $key=>$user)
                            <tr>
								<td width="5%">{{$key+1}}</td>
								<td>{{$user->usertype}}</td>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td width="25%"> 
                                    <a href="" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
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