@extends('admin.layouts.loguser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 panel col-md-offset-2" style="padding:30px">
            <div class="card">
                <div class="card-header">
                   <h3>{{ __('Register') }}</h3> <hr>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registerGuest') }}">
                        {{ csrf_field() }}
                        <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="fname">fname:</label>
                                    <input type="text" name="fname" placeholder="Your fname" class="form-control" id="fname" required>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="lname">lname:</label>
                                    <input type="text" name="lname" placeholder="Your lname" class="form-control" id="lname" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="username">username:</label>
                                    <input type="text" name="username" placeholder="Your username" class="form-control" id="username" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">email:</label>
                                    <input type="email" name="email" placeholder="Your email" class="form-control" id="email" required>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="pwd">Password:</label>
                                    <input type="password" name="password" placeholder="Your password" class="form-control" id="pwd"  min="5" required>
                                </div>
                                {{-- <div class="form-group col-md-6 ">
                                    <label for="c_pwd">Confirm Password:</label>
                                    <input type="password" name="confirm_password" class="form-control" id="c_pwd"  min="5" required>
                                </div> --}}

                                <div class="form-group col-md-6">
                                    <label for="age">age:</label>
                                    <input type="number" name="age" placeholder="Your age" class="form-control" id="age">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="gender">gender:</label>
                                    <input list="genders" name="gender" placeholder="Your gender" class="form-control" id="gender">
                                    <datalist id="genders">
                                        <option value="Male">
                                        <option value="Female">
                                    </datalist>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mobile_number">mobile_number:</label>
                                    <input type="number" name="mobile_number"  class="form-control" placeholder="+254" id="mobile_number">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address">address:</label>
                                    <input type="text" name="address" placeholder="Your address" class="form-control" id="address">
                                </div> <br>
                                    {{csrf_field() }}
                                <div class="form-group ">
                                        <p><code id="response"></code></p>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                                </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('bottom-scripts')

<script>



	// $(document).ready(function(){


	// 	$('#user_regestration').on('submit',function(event){
	// 			event.preventDefault();
	// 			filters = {'confirm_password':true };
	// 			// check password
	// 			if ($("#pwd").val() === $("#c_pwd").val()) {

	// 				form_data = $('#user_regestration').find(":input").filter(function (i, item) {
	// 					return !filters[item.name];
	// 				}).serializeArray();
	// 				console.log(form_data);


	// 				$.ajax({
	// 					url: "{{ url('/registerUser')}}",
	// 					method: 'post',
	// 					data: form_data,
	// 					success: function (data) {
	// 						console.log(data);
	// 						$('#user_regestration')[0].reset();
	// 						if(data.code==0){
	// 							window.location="{{ url('/user')}}";
	// 						}else{
	// 							$('#response').html("");
	// 							$('#response').append(JSON.stringify(data.errors) );
	// 						}

	// 					},
	// 					error: function (data) {
	// 						console.log(data);
	// 						alert("Error Making Request")

	// 					}
	// 				}) // ajax ends

	// 			}else{
	// 				alert("Password did not match");
	// 			}


	// 	}); //user_regestration
	// });

</script>
@endsection
