<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('title')
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/css/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('assets/css/dataTables/dataTables.responsive.css') }}" rel="stylesheet">  
	<link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">  
	<link rel="stylesheet" href="{{ asset('assets/sidebarSimple/style.css') }}">
	
	<!--Custom Font-->
	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
    <![endif]-->
    
    @yield('styles')
    @yield('top-scripts')
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="{{ url('/') }}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="{{ url('/about') }}"><em class="fa fa-calendar">&nbsp;</em> About</a></li>
			<li><a href="{{ url('/contact') }}"><em class="fa fa-calendar">&nbsp;</em> Contact</a></li>
            <!-- busses -->
			<li class="parent"><a data-toggle="collapse" href="#sub-item-bus">
				<em class="fa fa-navicon">&nbsp;</em> Bus <span data-toggle="collapse" href="#sub-item-bus" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-bus">
					<li><a class="" href="{{ url('bus/view_bus') }}">
						<span class="fa fa-arrow-right">&nbsp;</span> View All
					</a></li>
					<li><a class="" href="{{ url('/bus/add') }}">
						<span class="fa fa-arrow-right">&nbsp;</span> Add
					</a></li>
					<li><a class="" href="{{ url('/bus/maintenance') }}">
						<span class="fa fa-arrow-right">&nbsp;</span>  Bus Maintenance
					</a></li>
				</ul>
			</li>
			<!-- users -->
            <li class="parent "><a data-toggle="collapse" href="#sub-item-user">
				<em class="fa fa-navicon">&nbsp;</em> User <span data-toggle="collapse" href="#sub-item-user" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-user">
					<li><a class="" href="{{ url('users/user') }}">
						<span class="fa fa-arrow-right">&nbsp;</span> View All
					</a></li>
					<li><a class="" href="{{ url('users/user/add') }}">
						<span class="fa fa-arrow-right">&nbsp;</span> Add
					</a></li>
				</ul>
			</li>

            
			<li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        
        @yield('content')

	</div>	<!--/.main-->
	
	<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/chart.min.js') }}"></script>
	<script src="{{ asset('assets/js/chart-data.js') }}"></script>
	<script src="{{ asset('assets/js/easypiechart.js') }}"></script>
	<script src="{{ asset('assets/js/easypiechart-data.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- DataTables JavaScript -->
    <script src="{{ asset('assets/js/dataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
				$('#sidebarCollapse').on('click', function () {
					$('#sidebar').toggleClass('active');
				});
			});
			
        </script>
    @yield('bottom-scripts')

</body>
</html>