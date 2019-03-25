@extends('admin.layouts.app')
@section('title')
<title>Mbus: Add Bus</title>
@stop('title')
@section('content')

<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard/Bus/addBus</li>
			</ol>
		</div><!--/.row-->

		<div class="row container" style="margin:10px">
			<div class="col-lg-12">
                <h3 class="pl-1">Add Bus Info</h3>
				<div class="line"></div>
			</div>
			<div class="col-sm-10">
			<form method="post" id="bus_registration">
			<div class="row">
				<div class="form-group col-md-4">
					<label for="bus_number">Bus Number:</label>
					<input type="text" name="bus_number" class="form-control" id="bus_number" required>
				</div>
				<div class="form-group col-md-4">
					<label for="capacity">Capacity:</label>
					<input type="text" name="capacity" class="form-control" id="capacity" required>
				</div>
				<div class="form-group col-md-4">
					<label for="model">Model:</label>
					<input type="text" name="model" class="form-control" id="model">
				</div>

				<div class="form-group col-md-6">
					<label for="owner">Owner:</label>
					<input type="owner" name="owner" class="form-control" id="owner" required>
				</div>
                <div class="col-lg-12 col-md-12 col-sm-12">
					<h3 class="pl-1">Maintenance Info</h3>
					<div class="line"></div>
                </div>
				<div class="form-group col-md-6">
					<label for="title">Maintenance Title:</label>
                    <select name="maintenance_id" id="title" class="form-control" required>
                        <option disabled="disabled" selected>Select field</option>
						@foreach(\App\Models\Maintenance::where('status', '1')->get()  as $maintain)
                        <option value="{{$maintain->id}}">{{$maintain->title}}</option>
						@endforeach
                        <!-- <option value="Weakly">Weakly</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Yearly">Yearly</option> -->
                    </select>
				</div>
					{{csrf_field() }}

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


		$('#bus_registration').on('submit',function(event){
				event.preventDefault();
                $.ajax({
                    url: "{{ url('/registerBus')}}",
                    method: 'post',
                    data: $('#bus_registration').serializeArray(),
                    success: function (data) {
                        console.log(data);
                        $('#bus_registration')[0].reset();
                        if(data.code==0){
                            window.location="{{ url('/bus/view_bus')}}";
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
	});

</script>
@endsection
