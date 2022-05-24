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
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#myModal">Bright Groom Fill</a>
		</div>
		<!-- Start Bride Groom Table ----------->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead">
                            <tr>
                                <th>id</th>
                                <th>Bride Groom</th>
                                <th>Gender</th>
                                <!-- <th>Delete</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        	@php $i = 1 @endphp 
                            @foreach($brideGroomGenders as $key=>$value)
                            <tr>
                            	<th>{{$i}}</th>
                                <th>{{$value->bride_groom}}</th>
                                <th>{{$value->gender}}</th>
                            </tr>
                               @php $i++ @endphp 
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
		<!--------- End Bride Groom Table --------->
		<!--Start  Bright Groom Modal -->
		<div class="modal" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Bride Groom</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<!-- Modal body -->
					<div class="modal-body">
						<form action="{{route('bride_groom')}}" method="post">
							{{csrf_field()}}
							<div class="form-group">
							  <label for="Bride_groom">Bride Groom:</label>
							  <input type="text" class="form-control" id="Bride_groom" placeholder="Enter BrideGroom Ex.Son,Brother,Self" name="bride_groom" required="">
							</div>
							<div class="form-group">
							  <label for="pwd">Gender:</label>
							  <input type="text" class="form-control" id="gender" placeholder="Enter Gender" name="gender"  required="">
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