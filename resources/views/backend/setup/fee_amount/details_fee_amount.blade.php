@extends('admin.admin_master')

@section('admin')
    

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">
                    <span>
                      Student Fee Type : <strong class="text-danger">{{$details['0']['fee_category']['name']}}</strong>
                    </span>
                 </h3>
                  <a href="{{route('fee.amount.add')}}" style="float: right" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
				</div>
               
				<!-- /.box-header -->
				<div class="box-body"> 
					<div class="table-responsive">  
					  <table id="example1" class="table table-bordered table-striped"> 
						<thead class="thead-light">
							<tr>
								<th width="5%">Sl</th> 
								<th>Class Name</th> 
								<th width="25%">Action</th> 
							</tr>
						</thead>
						<tbody>
                            @foreach ($details as $key=>$detail)
                            <tr>
								<td width="5%">{{$key+1}}</td> 
								<td>{{ $detail['student_class']['name']}}</td> 
								<td width="25%">{{$detail->amount}} </td> 
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