@extends('layout.super_admin_master')
@section('content')


	<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">{{ucwords(str_replace("_", " ",request()->segment(count(request()->segments()))))}}</h1>
		  @if (count($errors) > 0)
	       <div class = "alert alert-primary">
	          <ul>
	             @foreach ($errors->all() as $error)
	                <li class="text -center text-blue">{{ $error }}</li>
	             @endforeach
	          </ul>
	       </div>
	      @endif
		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#maritalStatus">Add Marital Status</a>
	</div>
	<!-- Start Marital Status Table ----------->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Marital Status</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead">
                            <tr>
                                <th>id</th>
                                <th>Bride Groom</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@php $i = 1 @endphp 
                            @foreach($maritalStatusTableData as $key=>$value)
                            <tr>
                            	<th>{{$i}}</th>
                                <th>{{$value->marital_status}}</th>
                                <th><a href="{{route('destroy_marital_status',['id'=>$value->id])}}" onclick="return confirm('Are You Sure Destroy This Marital Status?')" class='fa fa-trash'></a></th>
                            </tr>
                               @php $i++ @endphp 
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	<!--------- End Marital Status Table --------->
	<!--Start  marital_Status Modal -->
	<div class="modal" id="maritalStatus">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Marital Status</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
					<form action="{{route('marital_status')}}" method="post">
						{{csrf_field()}}
						<div class="form-group"> 
						  <label for="marital_status">Marital Status:</label>
						  <input type="text" class="form-control" id="marital_status" placeholder="Enter Marital Status" name="marital_status" required="">
						</div>
					
						<div class="checkbox">
						  <label><input type="checkbox" name="remember"> Remember me</label>
						</div>
						<div class="modal-footer">
						  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

						  <button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End marital_Status model -->
</div>
	<!-- End of Main Content -->
@stop