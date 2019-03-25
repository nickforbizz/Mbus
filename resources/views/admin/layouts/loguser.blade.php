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
	<link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/sidebarSimple/style.css') }}">

    @yield('styles')
    @yield('top-scripts')
</head>
<body>
	<div class="main">

    @yield('content')

	</div>	<!--/.main-->

	<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script>
            $(document).ready(function() {

				$('#sidebarCollapse').on('click', function () {
					$('#sidebar').toggleClass('active');
				});
			});

        </script>
    @yield('bottom-scripts')

</body>
</html>


