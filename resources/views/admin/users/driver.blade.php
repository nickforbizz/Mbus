@extends('admin.layouts.app')
@section('title')
<title>Mbus: Driver</title>
@stop('title')
@section('content')

<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard/Users/Driver</li>
			</ol>
		</div><!--/.row-->

		<div class="row container" style="margin:10px">
			<div class="col-lg-12">
				<h1 class="page-header">Add Driver</h1>
			</div>
			<div class="col-sm-10">
                <form method="post" id="driver_regestration" autocomplete="on">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="user_id">User:</label>
                        <select name="user_id" class="form-control" id="user_id" required>
                            <option selected disabled>Select User</option>
                            @foreach (\App\Models\User::where('status', 1)->get() as $user)
                            <option value="{{ $user->id }}">{{ $user->username }}</option>

                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="salary_id">Salary:</label>
                        <select name="salary_id" class="form-control" id="salary_id" required>
                            <option selected disabled>Select Salary</option>
                            @foreach (\App\Models\Salary::where('status', 1)->get() as $sal)
                            <option value="{{ $sal->id }}">{{ $sal->total_salary }}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="shift_time">Shift Time:</label>
                        <select name="shift_id" class="form-control" id="shift_time" required>
                            <option selected disabled>Select Shift</option>
                            @foreach (\App\Models\Shift::where('status', 1)->get() as $shift)
                            <option value="{{ $shift->id }}">{{ $shift->shift_time }}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="date_employed">Date Employed:</label>
                        <input type="date" name="date_employed" class="form-control" id="date_employed">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="bus_id">Bus:</label>
                        <select name="bus_id" class="form-control" id="bus_id" required>
                            <option selected disabled>Select Bus</option>
                            @foreach (\App\Models\Bus::where('status', 1)->get() as $bus)
                            <option value="{{ $bus->id }}">{{ $bus->bus_number }}</option>

                            @endforeach
                        </select>
                    </div>

                    <br>
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

            <div class="panel panel-default col-md-12">
                            <div class="panel-heading">
                                Available Drivers
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#id</th>
                                                <th>username</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Mobile </th>
                                                <th>Bus Number </th>
                                            </tr>
                                        </thead>
                                        <tbody>
										@foreach(App\Models\Driver::where('status', '1')->get() as $driver)
										 <tr class="tb_data" data-id='{{$driver->id}}'>
											 <td>{{$driver->id}}</td>
											 <td>{{$driver->user->username}}</td>
											 <td>{{$driver->user->fname}}</td>
											 <td>{{$driver->user->lname}}</td>
											 <td>{{$driver->user->email}}</td>
											 <td>{{$driver->user->contact->mobile_number}}</td>
											 <td>{{$driver->bus->bus_number}}</td>
										 </tr>
										@endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
		</div>



		</div><!--/.row-->

		@component('utils.default',["title"=>"Edit Driver"])

		@endcomponent

</div><!--/.row-->
@endsection

@section('bottom-scripts')

<script>



	$(document).ready(function(){
        // get update
		$(document).on("click",".tb_data", function () {
			var driver_id = $(this).attr("data-id");
			$.ajax({
				url:'/getDriver/' + driver_id,
				method: 'get',
				success: function (data) {
                    // console.log(data);

					$("#edit").html('');
					$("#edit").html(`
                        @component('utils.views.modal_data',["code"=>"driver"])

		                @endcomponent
                    `);
					$("#myModal").modal();
				},
				error: function (err) {console.log(err);}
			})
		});
		// Update
		$("#update").on("submit", function (event) {
			event.preventDefault();
			$.ajax({
				url:"{{url('/updateDriver')}}",
				method: 'post',
				data: $("#update").serializeArray(),
				success: function (data) {
                    if (data.code == 0) {
                        $("#edit").html(`<div class="text-center"> <h3>Driver  Updated.</h3> <p>Bye</p></div>`)
                    } else {
                        $("#edit").html(`<div class="text-center"> <h3>Error Updating...</h3> <p>Bye</p></div>`);
                    }
					$("#myModal").modal();
				},error: function (data) {
					$("#edit").html(`<div class="text-center"> <h3>Error Updating...</h3> <p>Bye</p></div>`);
					console.log(data);

				}
			})
		});
        // Regester
		$('#driver_regestration').on('submit',function(event){
				event.preventDefault();
				filters = {'confirm_password':true };

					$.ajax({
						url: "{{ url('/registerDriver')}}",
						method: 'post',
						data: $('#driver_regestration').serializeArray(),
						success: function (data) {
                            if (data.code == 0) {
                                $("#edit").html(`<div class="text-center"> <h3>Driver  Updated.</h3> <p>Bye</p></div>`);
                                $('#submit_btn').hide();
                            } else {
                                $("#edit").html(`<div class="text-center"> <h3>Error Updating...</h3> <p>Bye</p></div>`);
                                $('#submit_btn').hide();

                            }
                            $("#myModal").modal();
							$('#driver_regestration')[0].reset();
						},
						error: function (data) {
							console.log(data);
							alert("Error Making Request")

						}
					}) // ajax ends
	        });

	});

</script>
@endsection
