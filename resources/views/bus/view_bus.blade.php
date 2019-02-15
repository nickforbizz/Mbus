@extends('layouts.app')

@section('content')

<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bus</h1>
			</div>
		</div><!--/.row-->
        <div class="row" style="margin:10px">
		<div class="panel panel-default">
                            <div class="panel-heading">
                               
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#id</th>
                                                <th>Bus Number</th>
                                                <th>Capacity</th>
                                                <th>Model</th>
                                                <th>Owner</th>
                                                <th>Maintenance </th>
                                            </tr>
                                        </thead>
                                        <tbody>
										@foreach(App\Models\Bus::where('status', '1')->get() as $bus)
										 <tr class="tb_bus" data-id='{{$bus->id}}'>
											 <td>{{$bus->id}}</td>
											 <td>{{$bus->bus_number}}</td>
											 <td>{{$bus->capacity}}</td>
											 <td>{{$bus->model}}</td>
											 <td>{{$bus->owner}}</td>
											 <td>{{$bus->maintenance->title}}</td>
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
@endsection

@section('bottom-scripts')


<script>

$(document).ready(function() {

    $(document).on("click",".tb_bus", function () {
        var bus_id = $(this).attr("data-id");

        window.location = '{{ url("/bus/edit") }}/'+bus_id
        
    });


})



</script>


@endsection('bottom-scripts')
