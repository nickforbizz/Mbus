@extends('layouts.app')
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
				<form action="" class="form" id="update_form">
					<h3 class="pl-2">Add a maitenance</h3>
					{{csrf_field() }}
					<div class="line"></div>
						
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
								<tr class="tb_bus" data-id='{{$maitenance->id}}'>
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
        
</div><!--/.row-->

@stop('content')


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
