@extends('admin.layouts.app')
@section('title')
<title>Mbus: Deductions</title>
@stop('title')
@section('content')

<div class="container">
    <div class="row">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Dashboard/Expences/Deductions</li>
            </ol>
        </div><!--/.row-->

        <div class="row container" style="margin:10px">
            <div class="col-lg-12">
                <h1 class="page-header">Add Deductions</h1>
            </div>

            <div class="col-sm-12 col-md-12">
                <form id="deductions">
                    <div class="row">
                    <div class="form-group col-md-4">
                        <label for="category">Type of Deductions:</label>
                        <input type="text" name="category" class="form-control" id="category" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="d_cost">Deductions Cost:</label>
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

            <div class="panel panel-default col-md-12 col-sm-12">
                <div class="panel-heading">
                    Deductions
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
                            @foreach(App\Models\Deduction::where('status', '1')->get() as $deductions)
                                <tr class="tb_deductions" data-id='{{$deductions->id}}' style="cursor:pointer">
                                    <td>{{$deductions->id}}</td>
                                    <td>{{$deductions->category}}</td>
                                    <td>{{$deductions->amount}}</td>
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
    </div>
    <!--/.row-->
</div>
@endsection

@section('bottom-scripts')

<script>



	$(document).ready(function(){
		// post data
		$('#deductions').on('submit',function(event){
			event.preventDefault();
				$.ajax({
					url: "{{ url('/exp_deduction')}}",
					method: 'post',
					data: $('#deductions').serializeArray(),
					success: function (data) {
						console.log(data);
						$('#deductions')[0].reset();
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
		$(document).on("click",".tb_deductions", function () {
		var deductions_id = $(this).attr("data-id");
		$.ajax({
			url:'/getdeductions' + deductions_id,
			method: 'get',
			success: function (data) {

				$("#edit").html('');
				$("#edit").html(`
					<input type="hidden" name="deductions_id" value="${data.id}">
					<div class="form-group col-md-12">
						<label for="title">Title:</label>
						<input type="text" name="utitle" class="form-control" value="${data.category}"  id="title" required>
					</div>
					{{csrf_field() }}
					<div class="form-group col-md-12">
						<label for="costs">Cost:</label>
						<input type="text" name="ucosts" class="form-control"  id="costs" value="${data.amount}"  required>
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
			url:"{{url('/updateDeductions')}}",
			method: 'post',
			data: $("#update_data").serializeArray(),
			success: function (data) {
                console.log(data);
                if (data.code == 0) {
				    $("#edit").html(`<div class="text-center"> <h3>Deductions Update.</h3> <p>Bye</p></div>`);
                } else {
				$("#edit").html(`<div class="text-center"> <h3>Error Updating...</h3> <p>Bye</p></div>`);

                }
			},error: function (data) {
				$("#edit").html(`<div class="text-center"> <h3>Error Updating...</h3> <p>Bye</p></div>`);
			}
		})
	})

	});
	// Doc end



</script>
@endsection
