@extends('layout.super_admin_master')
@section('content')

		<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h5 class="h3 mb-0 text-gray-800">{{ucwords(str_replace("_", " ",request()->segment(count(request()->segments()))))}}</h5>
			  @if (count($errors) > 0)
               <div class = "alert alert-primary">
                  <ul>
                     @foreach ($errors->all() as $error)
                        <li class="text -center text-blue">{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
              @endif
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal" data-target="#myModal">Create Profile</a>
		</div>
		<!-- Start Super admin Profile  Table ----------->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-black">
                            <tr>
                                <th>id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Profile</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@php $i = 1 @endphp 
                            @foreach($adminProfile as $key=>$value)
                            <tr>
                            	<th>{{$i}}</th>
                                <th>{{$value->first_name}}</th>
                                <th>{{$value->last_name}}</th>
                                <th><img src="{{asset('profiles/'.$value->profile)}}" style="height: 40px;width:40px; border-radius:50%" ></th>
                                <th><a href="" data-toggle="modal" data-target="#updateModal" onClick="UpdateSelfProfile({{$value}})">Update Profile</a></th>
                            </tr>
                               @php $i++ @endphp 
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
		<!--------- End Profile  Table --------->
		<!-- ========Admin Profile======= -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Super Admin Profile</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{route('create_profile')}}" method="post" enctype='multipart/form-data'>
                            {{csrf_field()}}
                            <div class="form-group"> 
                              <label for="first_name">First Name:</label>
                              <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name">
                            </div>

                            <div class="form-group"> 
                              <label for="last_name">Last Name:</label>
                              <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name">
                            </div>

                            <div class="form-group"> 
                              <label for="profile">Profile:</label>
                              <input type="file" class="form-control" id="profile" placeholder="Enter Marital Status" name="profile" >
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

        <!-- =============================Update Profile====================== -->

        <div class="modal" id="updateModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Super Admin Profile</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{route('update_profile')}}" method="post" enctype='multipart/form-data'>
                            {{csrf_field()}}
                            <div class="form-group"> 
                              <label for="first_name">First Name:</label>
                              <input type="text" class="form-control" id="e_first_name" placeholder="Enter Marital Status" name="first_name">
                            </div>

                            <div class="form-group"> 
                              <label for="last_name">Last Name:</label>
                              <input type="text" class="form-control" id="e_last_name" placeholder="Enter Last Name" name="last_name">
                            </div>

                            <div class="form-group"> 
                              <label for="last_name">Email:</label>
                              <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email">
                            </div>

                            <div class="form-group"> 
                              <label for="last_name">Password:</label>
                              <input type="text" class="form-control" id="e_password" placeholder="Enter Password" name="password">
                            </div>

                            <div class="form-group"> 
                              <label for="profile">Profile:</label>
                              <input type="file" class="form-control" id="e_profile" name="profile" >
                              @if(isset($value))
                              <img src="{{asset('profiles/'.$value->profile)}}" style="height: 40px;width:40px; border-radius:50%" />
                              @endif
                            </div>
                            <div class="form-group"> 
                              <input type="hidden" class="form-control" id="e_hidden_id"  name="admin_profile_id">
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
    </div>

	<script type="text/javascript">
		function UpdateSelfProfile(value){
            // console.log(value);
               $("#email").val(value.email); 
            $("#e_password").val(value.show_password);
			$("#e_hidden_id").val(value.id);
			$("#e_first_name").val(value.first_name);
			$("#e_last_name").val(value.last_name);
			$("#e_profile").val(value.profile); 
          

		}
	</script>
















@stop