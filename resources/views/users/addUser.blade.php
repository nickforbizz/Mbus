@extends('layouts.app')
@section('title')
<title>Mbus: Add User</title>
@stop('title')
@section('content')

<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row container" style="margin:10px">
			<div class="col-lg-12">
				<h1 class="page-header">Add user</h1>
			</div>
			<div class="col-sm-10">
			<form method="post" id="user_regestration">
			<div class="row">
				<div class="form-group col-md-4">
					<label for="fname">fname:</label>
					<input type="text" name="fname" class="form-control" id="fname" required>
				</div>
				<div class="form-group col-md-4">
					<label for="lname">lname:</label>
					<input type="text" name="lname" class="form-control" id="lname" required>
				</div>
				<div class="form-group col-md-4">
					<label for="sname">sname:</label>
					<input type="text" name="sname" class="form-control" id="sname">
				</div>
				
				<div class="form-group col-md-6">
					<label for="username">username:</label>
					<input type="text" name="username" class="form-control" id="username">
				</div>
				<div class="form-group col-md-6">
					<label for="email">email:</label>
					<input type="email" name="email" class="form-control" id="email" required>
				</div>
				<div class="form-group col-md-6 ">
					<label for="pwd">Password:</label>
					<input type="password" name="password" class="form-control" id="pwd"  min="5" required>
				</div>
				<div class="form-group col-md-6 ">
					<label for="c_pwd">Confirm Password:</label>
					<input type="password" name="confirm_password" class="form-control" id="c_pwd"  min="5" required>
				</div>
				<div class="form-group col-md-6">
					<label for="national_id">National id:</label>
					<input type="text" name="national_id" class="form-control" id="national_id" min="7" required>
				</div>
				<div class="form-group col-md-6">
					<label for="age">age:</label>
					<input type="text" name="age" class="form-control" id="age">
				</div>
				<div class="form-group col-md-6">
					<label for="gender">gender:</label>
					<input type="text" name="gender" class="form-control" id="gender">
				</div>
				<div class="form-group col-md-6">
					<label for="marital_status">marital_status:</label>
					<input type="text" name="marital_status" class="form-control" id="marital_status">
				</div>
				<div class="form-group col-md-6">
					<label for="mobile_number">mobile_number:</label>
					<input type="text" name="mobile_number" class="form-control" id="mobile_number">
				</div>
				<div class="form-group col-md-6">
					<label for="telephone_number">telephone_number:</label>
					<input type="text" name="telephone_number" class="form-control" id="telephone_number">
				</div>
				<div class="form-group col-md-6">
					<label for="address">address:</label>
					<input type="text" name="address" class="form-control" id="address">
				</div> <br>
					{{csrf_field() }}
				<div class="form-group ">
						<p><code id="response"></code></p>
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-info">Submit</button>
				</div>
				</div>
			</form>
			</div>
		</div><!--/.row-->
        
        
</div><!--/.row-->
@endsection

@section('bottom-scripts')

<script>



	$(document).ready(function(){


		$('#user_regestration').on('submit',function(event){
				event.preventDefault();
				filters = {'confirm_password':true };
				// check password
				if ($("#pwd").val() === $("#c_pwd").val()) {

					form_data = $('#user_regestration').find(":input").filter(function (i, item) {
						return !filters[item.name];
					}).serializeArray();
					console.log(form_data);


					$.ajax({
						url: "{{ url('/registerUser')}}",
						method: 'post',
						data: form_data,
						success: function (data) {
							console.log(data);
							$('#user_regestration')[0].reset();
							if(data.code==0){
								window.location="{{ url('/user')}}";
							}else{
								$('#response').html("");
								$('#response').append(JSON.stringify(data.errors) );
							}
							
						},
						error: function (data) {
							console.log(data);
							alert("Error Making Request")
							
						}
					}) // ajax ends
					
				}else{
					alert("Password did not match");
				}


		});
	});

</script>
@endsection
