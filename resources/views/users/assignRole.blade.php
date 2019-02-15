@extends('layouts.app')


@section('title')
<title>Mbus: Edit User</title>
@stop('title')

@section('content')

@section('styles')
<style>


</style>
@endsection('styles')

<div class="row">
	<ol class="breadcrumb">
		<li><a href="#">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Assign Role</li>
	</ol>
</div>
<!--/.row-->
		
<div class="row"> 
	@php
	$user = App\Models\User::find($id)
	@endphp
	
	<div class="wrapper">
    
        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     
                    </div>
                </div>
            </nav>
			<div class="row">
				<form action="" class="form" id="update_form">
					<h3 class="pl-2">Personal Info</h3>
					<div class="line"></div>
						<input type="hidden" name="user_id" value="{{$user->id}}">
					<div class="form-group col-md-4">
					<label for="fname">fname:</label>
					<input type="text" name="fname" class="form-control" id="fname" value="{{$user->fname}}" >
					</div>
					<div class="form-group col-md-4">
						<label for="lname">lname:</label>
						<input type="text" name="lname" class="form-control" id="lname" value="{{$user->lname}}"  >
					</div>
					<div class="form-group col-md-4">
						<label for="sname">sname:</label>
						<input type="text" name="sname" class="form-control" value="{{$user->sname}}"  id="sname">
					</div>
					
					<div class="form-group col-md-6">
						<label for="username">username:</label>
						<input type="text" name="username" class="form-control" value="{{$user->username}}"  id="username">
					</div>
					<div class="form-group col-md-6">
						<label for="email">email:</label>
						<input type="email" name="email" class="form-control" id="email" value="{{$user->email}}"  >
					</div>
					<div class="form-group col-md-6">
						<label for="national_id">National id:</label>
						<input type="text" name="national_id" class="form-control" id="national_id" min="7" value="{{$user->national_id}}" >
					</div>
					<div class="form-group col-md-6">
						<label for="age">age:</label>
						<input type="text" name="age" class="form-control" id="age" value="{{$user->age}}">
					</div>
					<div class="form-group col-md-6">
						<label for="gender">gender:</label>
						<select name="gender" class="form-control" id="gender">
							<option disabled="disabled">{{$user->gender}}</option>
							<option value="Male"> <strong>Male</strong> </option>
							<option value="Female"><strong>Female</strong> </option>
							<option value="Other"> <strong>Other</strong></option>
						</select>
						
					</div>
					<div class="form-group col-md-6">
						<label for="marital_status">marital_status:</label>
						<input type="text" name="marital_status" class="form-control" id="marital_status" value="{{$user->marital_status}}">
					</div>

					<h3 class="pl-2">Contact Info</h3>
					<div class="line"></div>

					<div class="form-group col-md-6">
						<label for="mobile_number">mobile_number:</label>
						<input type="text" name="mobile_number" class="form-control" value="{{$user->contact->mobile_number}}"  id="mobile_number">
					</div>
					<div class="form-group col-md-6">
						<label for="telephone_number">telephone_number:</label>
						<input type="telephone_number" name="telephone_number" class="form-control" id="telephone_number" value="{{$user->contact->telephone_number}}"  >
					</div>
					<div class="form-group col-md-6">
						<label for="address">Address :</label>
						<input type="text" name="address" class="form-control" id="address" min="7" value="{{$user->contact->address}}" >
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-success">Update</button>
					</div>
				</form>

			</div>
      
            <div class="line"></div>

           
        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p class="p-4" id="modal_text">Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
			

</div>
<!--/.row-->
@endsection


@section('bottom-scripts')
	<script>
		$("#update_form").on("submit", function (event) {
			event.preventDefault();
			
			$.ajax({
				url:"{{ url('/updateUser')}}",
				method: 'post',
				data: $("#update_form").serializeArray(),
				success: function (data) {
					console.log(data);
					$('#user_regestration')[0].reset();
					if(data.code==0){
						window.location="{{ url('/user')}}";
					}else{
						$('#modal_text').html("");
						$('#modal_text').append(JSON.stringify(data.errors) );
					}
					
				},
				error: function (data) {
					$('#modal_text').html("");
					$('#modal_text').append(JSON.stringify(data) );
					// console.log(data);
					// alert("Error Making Request")
					
				}

			});
			$("#myModal").modal();
		})
	</script>
@endsection