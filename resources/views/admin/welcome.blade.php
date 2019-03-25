@extends('admin.layouts.app')

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
                <h1 class="page-header">Dashboardd </h1>
                {{Auth::guard('admin')->user() }}
			</div>
		</div><!--/.row-->


</div><!--/.row-->
@endsection
