@extends('admin.layouts.app')
@section('title')
<title>Mbus:  Bus Maintenance</title>
@stop('title')



@section('content')

		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard/Bus/Maintenance</li>
			</ol>
			<div class="col-lg-12 pl-2">
				<h1 class="page-header">Bus Maintenance</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="maitenance col-sm-12 col-md-12">
				<form class="form" id="add_maintenance">
					<div class=""> <b>Add Maitenance</b></div>
					<div class="line"></div>
					{{csrf_field() }}

					<div class="form-group col-md-4">
						<label for="title">Title:</label>
						<input type="text" name="title" class="form-control"  id="title" required>
					</div>
					<div class="form-group col-md-4">
						<label for="costs">Cost:</label>
						<input type="text" name="costs" class="form-control"  id="costs" required>
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
					<h3 class="pl-2"> Available Maintenance </h3>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>#id</th>
									<th>title</th>
									<th>costs</th>
								</tr>
							</thead>
							<tbody>
							@foreach(\App\Models\Maintenance::where('status', '1')->get() as $maitenance)
								<tr class="tb_maintain" data-id='{{$maitenance->id}}'>
									<td>{{$maitenance->id}}</td>
									<td>{{$maitenance->title}}</td>
									<td>{{$maitenance->costs}}</td>
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



		  <!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog" style="dislay:none">
		<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title h-modal" >Modal Header</h4>
			</div>
			<form id="update_Maintain" class="form">
			<div class="modal-body">
				<div id="editMaintain">
				<p class="p-4" id="modal_text">Some text in the modal.</p>
				</div>
			</div>
			</form>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

		</div>
 	 </div>

</div><!--/.row-->

@stop('content')


@section('bottom-scripts')
	<script>

	$(document).ready(function() {
		// get update
		$(document).on("click",".tb_maintain", function () {
			var bus_id = $(this).attr("data-id");
			$.ajax({
				url:'/getMaintenance' + bus_id,
				method: 'get',
				success: function (data) {

					$("#editMaintain").html('');
					$("#editMaintain").html(`
						<input type="hidden" name="maintenance_id" value="${data.id}">
						<div class="form-group col-md-12">
							<label for="title">Title:</label>
							<input type="text" name="utitle" class="form-control" value="${data.title}"  id="title" required>
						</div>
						{{csrf_field() }}
						<div class="form-group col-md-12">
							<label for="costs">Cost:</label>
							<input type="text" name="ucosts" class="form-control"  id="costs" value="${data.costs}"  required>
						</div>
						<div class="form-group col-md-12">
							<input type="submit" name="submit" class="btn btn-large btn-success">
						</div>
					`);
					$("#myModal").modal();
				},
				error: function (err) {console.log(err);}
			})
		});
		// Update
		$("#update_Maintain").on("submit", function (event) {
			event.preventDefault();
			$.ajax({
				url:"{{url('/updateMaintenance')}}",
				method: 'post',
				data: $("#update_Maintain").serializeArray(),
				success: function (data) {
					$("#editMaintain").html(`<div class="text-center"> <h3>Maintenance Update.</h3> <p>Bye</p></div>`)
				},error: function (data) {
					$("#editMaintain").html(`<div class="text-center"> <h3>Error Updating...</h3> <p>Bye</p></div>`);
					console.log(data);

				}
			})
		})


		$(document).on("click",".maintenance_get", function () {
			var maintenance_id = $(this).attr("data-id");

		});


	});

	$("#add_maintenance").on("submit", function (event) {
		event.preventDefault();

		$.ajax({
			url:"{{ url('/addMaintenance')}}",
			method: 'post',
			data: $("#add_maintenance").serializeArray(),
			success: function (data) {
				console.log(data);
				$('#add_maintenance')[0].reset();
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
