@extends('admin.layouts.app')
@section('title')
<title>Mbus: Trip</title>
@stop('title')
@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Dashboard/Users/Trip</li>
    </ol>
</div><!--/.row-->

<div class="row container" style="margin:10px">
    <div class="col-lg-12">
        <h1 class="page-header">Add Trip</h1>
    </div>
        <div class="col-sm-10">
            <form method="post" id="add_trip" autocomplete="on">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="bus_id">Bus:</label>
                    <select name="bus_id" class="form-control" id="bus_id" required>
                        <option selected disabled>Select bus</option>
                        @foreach (\App\Models\Bus::where('status', 1)->get() as $bus)
                        <option value="{{ $bus->id }}">{{ $bus->bus_number }}</option>

                        @endforeach
                    </select>

                </div>
                <div class="form-group col-md-4">
                    <label for="busroute_id">Bus route:</label>
                    <select name="busroute_id" class="form-control" id="busroute_id" required>
                        <option selected disabled>Select Bus route</option>
                        @foreach (\App\Models\Busroute::where('status', 1)->get() as $bsroute)
                        <option value="{{ $bsroute->id }}">{{ $bsroute->name }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="driver_id">Driver :</label>
                    <select name="driver_id" class="form-control" id="driver_id" required>
                        <option selected disabled>Select driver</option>
                        @foreach (\App\Models\Driver::where('status', 1)->get() as $driver)
                        <option value="{{ $driver->id }}">{{ $driver->User->username }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="conductor_id">Conductor :</label>
                    <select name="conductor_id" class="form-control" id="conductor_id" required>
                        <option selected disabled>Select conductor</option>
                        @foreach (\App\Models\Conductor::where('status', 1)->get() as $conductor)
                        <option value="{{ $conductor->id }}">{{ $conductor->User->username }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="timespan">Timespan</label>
                    <input type="number" name="timespan" class="form-control" placeholder="Enter time taken">
                </div>
                <div class="form-group col-md-4">
                    <label for="tripStarts">tripStarts</label>
                    <input type="number" name="tripStarts" class="form-control" placeholder="Enter time Started">
                </div>

                <br>
                    {{csrf_field() }}

                <div class="col-md-12">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
                </div>
            </form>
        </div>
    <div class="panel panel-default col-md-12">
        <div class="panel-heading">
            Available Trips
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Bus Number</th>
                            <th>Route Name</th>
                            <th>Driver Name</th>
                            <th>Conductor Name</th>
                            <th>Period </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach(App\Models\Trip::where('status', '1')->get() as $trip)
                        <tr class="tb_data" data-id='{{$trip->id}}'>
                            <td>{{$trip->id}}</td>
                            <td>{{$trip->bus->bus_number}}</td>
                            <td>{{$trip->busroute->name}}</td>
                            <td>{{$trip->driver->User->username}}</td>
                            <td>{{$trip->conductor->User->username}}</td>
                            <td>{{$trip->timespan}}</td>
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

@component('utils.default',["title"=>"Edit Trip"])

@endcomponent

@endsection

@section('bottom-scripts')

<script>



	$(document).ready(function(){
        // get update
		$(document).on("click",".tb_data", function () {
			var trip_id = $(this).attr("data-id");
			$.ajax({
				url:'/getTrip/' + trip_id,
				method: 'get',
				success: function (data) {
                    console.log(data);

					$("#edit").html('');
					$("#edit").html(`
                        @component('utils.views.modal_data',["code"=>"trip"])

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
				url:"{{url('/updateTrip')}}",
				method: 'post',
				data: $("#update").serializeArray(),
				success: function (data) {
                    $("#submit_btn").show();

                    console.log(data);

                    if (data.code == 0) {
                        $("#edit").html(`<div class="text-center"> <h3>Passanger  Updated.</h3> <p>Bye</p></div>`)
                        $("#submit_btn").hide();
                    } else {
                        $("#edit").html(`<div class="text-center"> <h3>Error Updating...</h3> <p>Bye</p></div>`);
                        $("#submit_btn").hide();

                    }
					$("#myModal").modal();
				},error: function (data) {
					$("#edit").html(`<div class="text-center"> <h3>ERROR Updating...</h3> <p>Bye</p></div>`);
                    $("#submit_btn").hide();
                    console.log(data);

				}
			})
		});

    });
</script>
@endsection
