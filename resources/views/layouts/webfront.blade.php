<!DOCTYPE html>
<html lang="en">
<head>
<title>Major</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Mombex The M-Bus">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('web_assets/styles/bootstrap-4.1.2/bootstrap.min.css') }}">
<link href="{{ asset('web_assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('web_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('web_assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('web_assets/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link href="{{ asset('web_assets/plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('web_assets/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('web_assets/styles/responsive.css') }}">
<!-- DataTables CSS -->
<link href="{{ asset('web_assets/dataTables4/datatables.min.css') }}" rel="stylesheet">

    @yield('top-styles')
<style>
    .tb_data{
        cursor: pointer;
    }
</style>
</head>
<body >

<div class="super_container">

	<!-- Header -->
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start">
						<div class="logo">
							<a href="#">
								<div>M-Bus</div>
								<div>@mobex</div>
							</a>
						</div>
						<nav class="main_nav">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li class="active"><a href="{{ url('/') }}">Home</a></li>
								<li><a href="{{ url('/about') }}">About us</a></li>
								<li><a href="{{url('/ticketing')}}">Ticket</a></li>
								<li><a href="{{ url('/blog') }}">News</a></li>
								<li><a href="{{ url('/contact') }}">Contact</a></li>
								<li><a  >test</a></li>
							</ul>
						</nav>
						<div class="header_extra d-flex flex-row align-items-center justify-content-start ml-auto">
							<div class="phone d-flex flex-row align-items-center justify-content-start"><i class="fa fa-phone" aria-hidden="true"></i><span>652-345 3222 11</span></div>
							<div class="book_button trans_200"><a href="{{ url('/ticketing') }}">Book Now</a></div>
						</div>
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu">
		<div class="background_image" style="background-image:url({{ asset('web_assets/images/menu.jpg') }})"></div>
		<div class="menu_content d-flex flex-column align-items-center justify-content-center">
			<ul class="menu_nav_list text-center">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><a href="{{ url('/about') }}">About us</a></li>
				<li><a href="{{ url('/ticketing') }}">Ticket</a></li>
				<li><a href="{{ url('/blog') }}">News</a></li>
				<li><a href="{{ url('/contact') }}">Contact</a></li>
			</ul>
			<div class="menu_review"><a href="{{ url('/ticketing') }}">Book Now</a></div>
		</div>
    </div>

    <div  style="margin-top: 120px;"></div>

    @yield('content')

    <div class="m-5"></div>

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="footer_content d-flex flex-md-row flex-column align-items-center align-items-start justify-content-start">
						<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                            document.write(new Date().getFullYear());
                            </script>
                            All rights reserved |
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            by <a href="https://engnz.com" target="_blank">Mombex</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </div>
						<div class="footer_logo">
							<div class="logo">
								<a href="#">
									<div>M-Bus</div>
									<div>@mobex</div>
								</a>
							</div>
						</div>
						<div class="button footer_button ml-md-auto"><a href="{{ url('/ticket') }}">book now</a></div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="{{ asset('web_assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('web_assets/styles/bootstrap-4.1.2/popper.js') }}"></script>
<script src="{{ asset('web_assets/styles/bootstrap-4.1.2/bootstrap.min.js') }}"></script>
<script src="{{ asset('web_assets/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('web_assets/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('web_assets/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('web_assets/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('web_assets/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('web_assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('web_assets/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('web_assets/plugins/progressbar/progressbar.min.js') }}"></script>
{{-- <script src="{{ asset('web_assets/plugins/colorbox/jquery.colorbox-min.js') }}"></script>  --}}
<script src="{{ asset('web_assets/plugins/parallax-js-master/parallax.min.js') }}"></script>
{{-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script> --}}
<script src="{{ asset('web_assets/js/custom.js') }}"></script>
<!-- DataTables JavaScript -->
<script src="{{ asset('web_assets/dataTables4/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/home.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    var nav_ul = $(".main_nav>ul>li");
    $(nav_ul).on('click', loopNav );
    function loopNav() {
        nav_ul.each(function(i, val) {
            console.log(val);

        });

    }
    // console.log(nav_ul);

});
</script>
@yield('bottom-scripts')
</body>
</html>
