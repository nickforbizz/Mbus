@extends('admin.layouts.app')
@section('title')
<title>Mbus: Passanger</title>
@stop('title')
@section('content')

<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard/Users/Passanger</li>
			</ol>
		</div><!--/.row-->

		<div class="row container" style="margin:10px">
            <div class="panel panel-default col-md-12">
                            <div class="panel-heading">
                                Available Passangers
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
										@foreach(App\Models\Passanger::where('status', '1')->get() as $passanger)
										 <tr class="tb_data" data-id='{{$passanger->id}}'>
											 <td>{{$passanger->id}}</td>
											 <td>{{$passanger->username}}</td>
											 <td>{{$passanger->fname}}</td>
											 <td>{{$passanger->lname}}</td>
											 <td>{{$passanger->email}}</td>
											 <td>{{$passanger->contact->mobile_number}}</td>
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

		@component('utils.default',["title"=>"Edit Passanger"])

		@endcomponent

</div><!--/.row-->
@endsection

@section('bottom-scripts')

<script>



	$(document).ready(function(){
        // get update
		$(document).on("click",".tb_data", function () {
			var passanger_id = $(this).attr("data-id");
			$.ajax({
				url:'/getPassanger/' + passanger_id,
				method: 'get',
				success: function (data) {
                    console.log(data);

					$("#edit").html('');
					$("#edit").html(`
                        @component('utils.views.modal_data',["code"=>"Passanger"])

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
				url:"{{url('/updatePassanger')}}",
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
