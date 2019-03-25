@extends('admin.layouts.app')
@section('title')
<title>Mbus:  Salary</title>
@stop('title')



@section('content')

		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard/Expences/Salary</li>
			</ol>
			<div class="col-lg-12 pl-2">
				<h1 class="page-header">Salary</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="sal col-sm-12 col-md-12">
				<form class="form" id="add_sal">
					<div class=""> <b>Add Salary</b></div>
					<div class="line"></div>
					{{csrf_field() }}

					<div class="form-group col-md-4">
						<label for="basic_salary">Basic Salary:</label>
						<input type="text" name="basic_salary" class="form-control"  id="basic_salary" required>
					</div>
                    <div class="form-group col-md-4">
						<label for="Deduction">Deduction:</label>
                        <select name="deduct_id" id="Deduction" class="form-control" >
                            <option selected disabled="disabled">Select Deduction</option>
							@foreach(\App\Models\Deduction::where('status', '1')->get() as $deduct)
                            <option value="{{$deduct->id}}">{{$deduct->amount}}</option>
                            @endforeach
                        </select>
					</div>
					<div class="form-group col-md-4">
						<label for="category">Category:</label>
						<input type="text" name="category" class="form-control"  id="category" required>
					</div>
                    <div class="form-group col-md-4">
						<label for="damage">Damages:</label>
                        <select name="damage_id" id="damage" class="form-control" >
                            <option selected disabled="disabled">Select Damages</option>
							@foreach(\App\Models\UserDamage::where('status', '1')->get() as $user_damage)
                            <option value="{{$user_damage->id}}">{{$user_damage->costs}}</option>
                            @endforeach
                        </select>
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-info">Submit</button>
					</div>
				</form>
			</div>


		</div><!--/.row-->
        <div class="row" style="">
		   <div class="panel panel-default ml-2" style="margin:25px">
				<div class="panel-heading">
					<h3 class="pl-2"> Salary </h3>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>#id</th>
									<th>title</th>
									<th>Basic Salary</th>
									<th>deduction</th>
									<th>userDamages</th>
									<th>Total Salary</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
							@foreach(\App\Models\Salary::where('status', '1')->get() as $sal)
								<tr class="tb_data" data-id='{{$sal->id}}'>
									<td>{{$sal->id}}</td>
									<td>{{$sal->category}}</td>
									<td>{{$sal->basic_salary}}</td>
									<td>{{$sal->deduction->amount}}</td>
									<td>{{$sal->userDamage->costs}}</td>
									<td>{{$sal->total_salary}}</td>
									<td>{{$sal->created_at->format(' Y M')}}</td>
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


		@component('utils.default',["title"=>"Edit Salary"])

		@endcomponent

</div><!--/.row-->

@stop('content')


@section('bottom-scripts')
	<script>

	$(document).ready(function() {
		// get update
		$(document).on("click",".tb_data", function () {
			var bus_id = $(this).attr("data-id");
			$.ajax({
				url:'/getSalary/' + bus_id,
				method: 'get',
				success: function (data) {

					$("#edit").html('');


					$("#edit").html(`
                        @component('utils.views.modal_data',["code"=>"salary"])

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
				url:"{{url('/updateSal')}}",
				method: 'post',
				data: $("#update").serializeArray(),
				success: function (data) {
                    console.log(data);
                    if (data.code == -1) {
					    $("#edit").html(`<div class="text-center"> <h3>Error Updating...</h3> <p>Bye</p></div>`);
                    } else {
                        $("#edit").html(`<div class="text-center"> <h3>Salary  Updated.</h3> <p>Bye</p></div>`)
                    }

				},error: function (data) {
					$("#edit").html(`<div class="text-center"> <h3>Error Updating...</h3> <p>Bye</p></div>`);
					console.log(data);

				}
			})
		})
	});

	$("#add_sal").on("submit", function (event) {
		event.preventDefault();

		$.ajax({
			url:"{{ url('/addSal')}}",
			method: 'post',
			data: $("#add_sal").serializeArray(),
			success: function (data) {
				console.log(data);
				$('#add_sal')[0].reset();
				if(data.code==0){
					// call modal here
					// window.location="{{ url('/user')}}";
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

	})
	</script>
@endsection
