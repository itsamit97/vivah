@extends('layout.super_admin_master')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">{{ucwords(str_replace("_", " ",request()->segment(count(request()->segments()))))}}</h1>
	</div>
	<!-- Start Bride Registration Table -&& Search -Search Email Bar---------->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-sm-6">
                         <h6 class="m-0 font-weight-bold text-primary">Bride Registration </h6>
                    </div>
                    <div class="col-sm-5" style="text-align:right">
                        <form action="{{route('bride_search')}}" method="post">
                            {{csrf_field()}}
                            <input type="text" class="form-control" name="search_email" required="">
                    </div>  
                    <div class="col-sm-1" >      
                            <button type="submit" name="submit" class="btn btn-sm btn-primary">Search</button>
                        </form>
                    </div>
                </div>  
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead">
                            <tr>
                                <th>id</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Bride Profile Id</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@php $i = 1 @endphp 
                            @foreach($brideRegistrationData as $key=>$value)
                            <tr>
                            	<th>{{$i}}</th>
                                <th>{{$value->email}}</th>
                                <th>{{$value->show_password}}</th>
                                <th>{{$value->bride_profile_id}}</th>
                                <th>{{$value->role}}</th>
                            </tr>
                               @php $i++ @endphp 
                            @endforeach
                        
                        </tbody>
                    </table>
                    {!! $brideRegistrationData->links() !!}
                </div>
            </div>
        </div>
	<!--------- End Bride Registration Table --------->
</div>
	<!-- End of Main Content -->
@stop