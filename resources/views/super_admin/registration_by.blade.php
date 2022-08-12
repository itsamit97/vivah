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
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#registrationBy">Add Registration By</a>
		</div>
		<!-- Start Bride Groom Gender Table ----------->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Registration By</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead">
                            <tr>
                                <th>id</th>
                                <th>registration_by</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@php $i = 1 @endphp 
                            @foreach($registrationByData as $key=>$value)
                            <tr>
                            	<th>{{$i}}</th>
                                <th>{{$value->registration_by}}</th>
                                <th><a href="{{route('destroy_registration_by',['id'=>$value->id])}}" onclick="return confirm('Are You Sure Destroy This  Bride Groom Genders?')" class='fa fa-trash'></a></th>
                            </tr>
                               @php $i++ @endphp 
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
		<!--------- Start Regstration By Form  -->
		<!--Start  Bright Groom Modal -->
		<div class="modal" id="registrationBy">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Registration By</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<!-- Modal body -->
					<div class="modal-body">
						<form action="{{route('registration_by')}}" method="post">
							{{csrf_field()}}
							<div class="form-group">
							  <label for="Bride_groom">Regstration By:</label>
							  <input type="text" class="form-control" id="registration_by" placeholder="Enter Registration By Ex.father,Son,Brother,Self" name="registration_by" required="">
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
		<!-- End Regstration By Form  -->
	</div>
	<!-- End of Main Content -->
@stop