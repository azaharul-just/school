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
                      Student Fee Type : <strong class="text-danger">{{$details['0']['student_class']['name']}}</strong>
                    </span>
                 </h3>
                  <a href="{{route('assign.subject.add')}}" style="float: right" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
				</div>
               
				<!-- /.box-header -->
				<div class="box-body"> 
					<div class="table-responsive">  
					  <table id="example1" class="table table-bordered table-striped"> 
						<thead class="thead-light">
							<tr>
								<th width="5%">Sl</th> 
                                <th>Subject</th> 
                                <th>Full Mark</th> 
                                <th>Pass Mark</th>  
                                <th>Subjective Mark</th> 
								 
							</tr>
						</thead>
						<tbody>
                            @foreach ($details as $key=>$detail)
                            <tr>
								<td width="5%">{{$key+1}}</td> 
                                <td  >{{$detail['student_subject']['name']}} </td> 
								<td >{{$detail->full_mark}} </td> 
                                <td  >{{$detail->pass_mark}} </td> 
                                <td  >{{$detail->subjective_mark}} </td> 
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