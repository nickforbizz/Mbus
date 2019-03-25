@extends('admin.layouts.app')
@section('title')
<title>Mbus: Tickets</title>
@stop('title')
@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Dashboard/Users/Tickets</li>
    </ol>
</div><!--/.row-->

<div class="row container" style="margin:10px">


    <div class="panel panel-default col-md-12">
        <div class="panel-heading">
            Tickets
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Ticket Number</th>
                            <th>Route Name</th>
                            <th>Bus Number</th>
                            <th>Amount -Ksh </th>
                            <th>date Booked </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach(App\Models\Ticket::where('status', '1')->get() as $ticket)
                        <tr class="tb_data" data-id='{{$ticket->id}}'>
                            <td>{{$ticket->id}}</td>
                            <td>{{$ticket->ticket_number}}</td>
                            <td>{{$ticket->busroute->name}}</td>
                            <td>{{$ticket->bus->bus_number}}</td>
                            <td>{{$ticket->amount}}</td>
                            <td>{{$ticket->created_at->format(' Y M ')}}</td>
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

@component('utils.default',["title"=>"Edit Ticket"])

@endcomponent

@endsection

@section('bottom-scripts')

<script>



	$(document).ready(function(){
        // get update
		$(document).on("click",".tb_data", function () {
			var ticket_id = $(this).attr("data-id");
			$.ajax({
				url:'/getTicket/' + ticket_id,
				method: 'get',
				success: function (data) {
                    console.log(data);

					$("#edit").html('');
					$("#edit").html(`
                        @component('utils.views.modal_data',["code"=>"ticket"])

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
				url:"{{url('/updateTicket')}}",
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
