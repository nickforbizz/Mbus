@extends('layouts.app')
@section('title')
<title>Mbus: View User</title>
@stop('title')
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
				<h1 class="page-header">User</h1>
			</div>
		</div><!--/.row-->
        <div class="row" style="margin:10px">
		<div class="panel panel-default">
                            <div class="panel-heading">
                                DataTables Advanced Tables
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
                                                <th>First Name</th>
                                                <th>Email</th>
                                                <th>Mobile </th>
                                            </tr>
                                        </thead>
                                        <tbody>
										@foreach(App\Models\User::where('status', '1')->get() as $user)
										 <tr class="tb_users" data-id='{{$user->id}}'>
											 <td>{{$user->id}}</td>
											 <td>{{$user->username}}</td>
											 <td>{{$user->fname}}</td>
											 <td>{{$user->lname}}</td>
											 <td>{{$user->email}}</td>
											 <td>{{$user->contact->mobile_number}}</td>
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

    $(document).on("click",".tb_users", function () {
        var user_id = $(this).attr("data-id");

        window.location = '{{ url("/users/assignRole") }}/'+user_id
        
    });


})



</script>


@endsection('bottom-scripts')
