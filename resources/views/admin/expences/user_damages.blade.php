@extends('admin.layouts.app')
@section('title')
<title>Mbus: Damages</title>
@stop('title')
@section('content')

<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard/Expences/Damages</li>
			</ol>
		</div><!--/.row-->

		<div class="row container" style="margin:10px">
			<div class="col-lg-12">
				<h1 class="page-header">Add Damage</h1>
			</div>
			<div class="col-sm-10">
			<form id="damage">
			<div class="row">
				<div class="form-group col-md-4">
					<label for="category">Type of Damage:</label>
					<input type="text" name="category" class="form-control" id="category" required>
				</div>
				<div class="form-group col-md-4">
					<label for="d_cost">Damage Cost:</label>
					<input type="text" name="d_cost" class="form-control" id="d_cost" required>
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
					Damages
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>#id</th>
									<th>Type</th>
									<th>Cost</th>
								</tr>
							</thead>
							<tbody>
							@foreach(App\Models\UserDamage::where('status', '1')->get() as $damage)
								<tr class="tb_damage" data-id='{{$damage->id}}'>
									<td>{{$damage->id}}</td>
									<td>{{$damage->category}}</td>
									<td>{{$damage->costs}}</td>
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

		  <!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog" style="dislay:none">
		<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title h-modal" >Modal Header</h4>
			</div>
			<form id="update_data" class="form">
			<div class="modal-body">
				<div id="edit">
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

</div><!--/.row-->
@endsection

@section('bottom-scripts')

<script>



	$(document).ready(function(){
		// post data
		$('#damage').on('submit',function(event){
			event.preventDefault();
				$.ajax({
					url: "{{ url('/exp')}}",
					method: 'post',
					data: $('#damage').serializeArray(),
					success: function (data) {
						console.log(data);
						$('#damage')[0].reset();
						if(data.code==0){
							// window.location="{{ url('/user')}}";
							// modal here
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
		});

		// get update
		$(document).on("click",".tb_damage", function () {
		var damage_id = $(this).attr("data-id");
		$.ajax({
			url:'/getDamage' + damage_id,
			method: 'get',
			success: function (data) {

				$("#edit").html('');
				$("#edit").html(`
					<input type="hidden" name="damage_id" value="${data.id}">
					<div class="form-group col-md-12">
						<label for="title">Title:</label>
						<input type="text" name="utitle" class="form-control" value="${data.category}"  id="title" required>
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
	$("#update_data").on("submit", function (event) {
		event.preventDefault();
		$.ajax({
			url:"{{url('/updateDamage')}}",
			method: 'post',
			data: $("#update_data").serializeArray(),
			success: function (data) {
				$("#edit").html(`<div class="text-center"> <h3>Damage Update.</h3> <p>Bye</p></div>`)
			},error: function (data) {
				$("#edit").html(`<div class="text-center"> <h3>Error Updating...</h3> <p>Bye</p></div>`);
				console.log(data);

			}
		})
	})

	});
	// Doc end



</script>
@endsection
