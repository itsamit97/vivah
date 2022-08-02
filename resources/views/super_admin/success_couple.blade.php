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
		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#successCouple">Add Success Couple</a>
	</div>
	<!-- Start successCouple Table ----------->
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
                                <th>Brid Groom Name</th>
                                <th>wedding Year</th>
                                <th>Cuccess Couple</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@php $i = 1 @endphp 
                            @foreach($successCoupleData as $key=>$value)
                            <tr>
                            	<th>{{$i}}</th>
                                <th>{{$value->bride_name}}-{{$value->groom_name}}</th>
                                <th>{{$value->wedding_year}}</th>

                                <td><img src="{{asset('success_couple_profiles/'.$value->success_couple)}}" style="height: 40px;width:40px; border-radius:50%"></td>
                      
                                <th><a href="{{route('destroy_success_couple',['id'=>$value->id])}}" onclick="return confirm('Are You Sure Destroy This successCouple?')" class='fa fa-trash'></a></th>
                            </tr>
                               @php $i++ @endphp 
                            @endforeach
                        
                        </tbody>
                    </table>
                    {!! $successCoupleData->links() !!}
                </div>
            </div>
        </div>
	<!--------- End successCouple Table --------->
       
		
		<!--Start  successCoupleData Modal -->
		<div class="modal" id="successCouple">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Success Couple</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<!-- Modal body -->
					<div class="modal-body">
						<form action="{{route('success_couple')}}" method="post" enctype='multipart/form-data'>
							{{csrf_field()}}
							<div class="form-group">
							  <label for="Bride_groom">Success Couple:</label>
							  <input type="file" class="form-control" id="success_couple" placeholder="Enter Success Groom Name" name="success_couple" required="">
							</div>

							<div class="form-group">
							  <label for="Bride_groom">Wedding Year:</label>
							  <input type="text" class="form-control" name="wedding_year" value="10/24/1984" />
							</div>

							<div class="form-group">
							  <label for="Bride_groom">Bride Name:</label>								
							  <input type="text" class="form-control" id="bride_name" placeholder="Enter Success Bride Name" name="bride_name" required="">
							</div>

							<div class="form-group">
							  <label for="Bride_groom">Groom Name:</label>								
							  <input type="text" class="form-control" id="groom_name" placeholder="Enter Success Groom Name" name="groom_name" required="">
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
		<!-- End successCouple model -->
	</div>
	<!-- End of Main Content -->
@stop