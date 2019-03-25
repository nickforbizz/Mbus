@extends('admin.layouts.app')


@section('title')
<title>Mbus: Edit Bus</title>
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
		<li class="active">Dashboard/bus/Edit Bus</li>
	</ol>
</div>
<!--/.row-->

<div class="row">
	@php
	$bus = App\Models\Bus::find($id)
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
					<h3 class="pl-2">Bus Info</h3>
					<div class="line"></div>
						<input type="hidden" name="bus_id" value="{{$bus->id}}">
                        <div class="row">
				<div class="form-group col-md-4">
					<label for="bus_number">Bus Number:</label>
					<input type="text" name="bus_number" class="form-control" value="{{$bus->bus_number}}" id="bus_number" required>
				</div>
				<div class="form-group col-md-4">
					<label for="capacity">Capacity:</label>
					<input type="text" name="capacity" class="form-control" value="{{$bus->capacity}}" id="capacity" required>
				</div>
				<div class="form-group col-md-4">
					<label for="model">Model:</label>
					<input type="text" name="model" class="form-control" value="{{$bus->model}}" id="model">
				</div>

				<div class="form-group col-md-6">
					<label for="owner">Owner:</label>
					<input type="owner" name="owner" class="form-control" value="{{$bus->owner}}" id="owner" required>
				</div><br>
					{{csrf_field() }}
				<div class="form-group ">
						<p><code id="response"></code></p>
				</div>
				</div>
                <div class="col-lg-12">
                    <h3 class="pl-1">Maintenance Info</h3>
                </div>
                <hr>
				<input type="hidden" name="maintenance_id"  value="{{$bus->maintenance_id}}" required>
				<div class="form-group">
					<select name="maintenance_id" id="maintenance" class="form-control" required>
						<option selected disabled="disabled">Select Maintenance</option>
						@foreach(\App\Models\Maintenance::where('status','1')->get() as $maintenance)
							<option value="{{$bus->maintenance_id}}">{{$bus->maintenance->title}}</option>
						@endforeach
					</select>
				</div>

				<div class="col-md-12">
					<button type="submit" class="btn btn-info">Submit</button>
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
				url:"{{ url('/updateBus')}}",
				method: 'post',
				data: $("#update_form").serializeArray(),
				success: function (data) {
					console.log(data);
					if(data.code==0){
						window.location="{{ url('/view_bus')}}";
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
