@extends('layout.super_admin_master')
@section('content')


	<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">{{ucwords(str_replace("_", " ",request()->segment(count(request()->segments()))))}}</h1>
		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#myModal">Fill Religion</a>
	</div>
	<!-- Start Religion Table ----------->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead">
                            <tr>
                                <th>id</th>
                                <th>Religion</th>
                                <!-- <th>Delete</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        	@php $i = 1 @endphp 
                            @foreach($religionTableData as $key=>$value)
                            <tr>
                            	<th>{{$i}}</th>
                                <th>{{$value->religion}}</th>
                            </tr>
                               @php $i++ @endphp 
                            @endforeach
                        
                        </tbody>
                    </table>
                    {!! $religionTableData->links() !!}
                </div>
            </div>
        </div>
	<!--------- End Religion Table --------->
	<!--Start  Religion  Modal -->
	<div class="modal" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Religion:</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
					<form action="{{route('religion')}}" method="post">
						{{csrf_field()}}
						<div class="form-group"> 
						  <label for="marital_status">Religion:</label>
						  <input type="text" class="form-control" id="religion" placeholder="Enter Religion" name="religion" required="">
						</div>
					
						<div class="checkbox">
						  <label><input type="checkbox" name="remember"> Remember me</label>
						</div>
						<!-- </form> -->
						<!-- </div> -->
						<!-- Modal footer -->
						<div class="modal-footer">
						  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

						  <button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End bootsrap model -->
</div>
	<!-- End of Main Content -->
@stop