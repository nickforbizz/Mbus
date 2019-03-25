@extends('admin.layouts.app')
@section('title')
<title>Mbus: Employee</title>
@stop('title')
@section('content')

<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard/Users/Employee</li>
			</ol>
		</div><!--/.row-->

		<div class="row container" style="margin:10px">
			<div class="col-lg-12">
				<h1 class="page-header">Add Employee</h1>
			</div>
			<div class="col-sm-10">
			<form method="post" id="emp_reg" autocomplete="on">
			<div class="row">
				<div class="form-group col-md-4">
                    <label for="user_id">User:</label>
                    <input list="user_id" name="user_id" class="form-control" placeholder="select user" required>

                    <datalist id="user_id">
                        @foreach (\App\Models\User::where('status', 1)->get() as $user)
                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                        @endforeach
                    </datalist>
				</div>
				<div class="form-group col-md-4">
                    <label for="salary_id">Salary:</label>

                    <input list="salary_id" name="salary_id" class="form-control" placeholder="select Salary" required>

                    <datalist id="salary_id">
                        @foreach (\App\Models\Salary::where('status', 1)->get() as $sal)
                        <option value="{{ $sal->id }}">Salary: {{ $sal->total_salary }}</option>
                        @endforeach
                    </datalist>
				</div>
				<div class="form-group col-md-4">
                    <label for="shift_time">Shift Time:</label>

                    <input list="shift_time" name="shift_id" class="form-control" placeholder="select Shift" required>

                    <datalist id="shift_time">
                        @foreach (\App\Models\Shift::where('status', 1)->get() as $shift)
                        <option value="{{ $shift->id }}">Shift: {{ $shift->shift_time }}</option>
                        @endforeach
                    </datalist>
				</div>

				<div class="form-group col-md-6">
					<label for="date_employed">Date Employed:</label>
					<input type="date" name="date_employed" class="form-control" id="date_employed">
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
                                Available Employees
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
                                            </tr>
                                        </thead>
                                        <tbody>
										@foreach(App\Models\Employee::where('status', '1')->get() as $employee)
										 <tr class="tb_data" data-id='{{$employee->id}}'>
											 <td>{{$employee->id}}</td>
											 <td>{{$employee->user->username}}</td>
											 <td>{{$employee->user->fname}}</td>
											 <td>{{$employee->user->lname}}</td>
											 <td>{{$employee->user->email}}</td>
											 <td>{{$employee->user->contact->mobile_number}}</td>
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

		@component('utils.default',["title"=>"Edit Employee"])

		@endcomponent

</div><!--/.row-->
@endsection

@section('bottom-scripts')

<script>



	$(document).ready(function(){
        // get update
		$(document).on("click",".tb_data", function () {
			var employee_id = $(this).attr("data-id");
			$.ajax({
				url:'/getEmployee/' + employee_id,
				method: 'get',
				success: function (data) {
                    // console.log(data);

					$("#edit").html('');
					$("#edit").html(`
                        @component('utils.views.modal_data',["code"=>"employee"])

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
				url:"{{url('/updateEmployee')}}",
				method: 'post',
				data: $("#update").serializeArray(),
				success: function (data) {
                    if (data.code == 0) {
                        $("#edit").html(`<div class="text-center"> <h3>Employee  Updated.</h3> <p>Bye</p></div>`)
                        $("#submit_btn").hide();
                    } else {
                        $("#edit").html(`<div class="text-center"> <h3>Error Updating...</h3> <p>Bye</p></div>`);
                        $("#submit_btn").hide();

                    }
					$("#myModal").modal();
				},error: function (data) {
					$("#edit").html(`<div class="text-center"> <h3>Error Updating...</h3> <p>Bye</p></div>`);
                    $("#submit_btn").hide();
                    console.log(data);

				}
			})
		});
        // Regester
		$('#emp_reg').on('submit',function(event){
            event.preventDefault();
            filters = {'confirm_password':true };

                $.ajax({
                    url: "{{ url('/registerEmployee')}}",
                    method: 'post',
                    data: $('#emp_reg').serializeArray(),
                    success: function (data) {
                        if (data.code == 0) {
                            $("#edit").html(`<div class="text-center"> <h3>Driver  Updated.</h3> <p>Bye</p></div>`);
                            $('#submit_btn').hide();
                        } else {
                            $("#edit").html(`<div class="text-center"> <h3>Error Updating...</h3> <p>Bye</p></div>`);
                            $('#submit_btn').hide();

                        }
                        $("#myModal").modal();
                        $('#emp_reg')[0].reset();
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
