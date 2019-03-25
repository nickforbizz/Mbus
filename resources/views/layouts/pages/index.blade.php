@extends('layouts.webfront')
@section('content')
	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('web_assets/images/index.jpg') }}" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title"><h1>M-Bus</h1></div>
							<div class="home_text">In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Search Box -->

	<div class="search_box">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="search_box_container d-flex flex-row align-items-center justify-content-start">
						<div class="search_form_container">
							<form action="#" id="search_form" class="search_form">
								<div class="d-flex flex-lg-row flex-column align-items-center justify-content-start">
									<ul class="search_form_list d-flex flex-row align-items-center justify-content-start flex-wrap">
										<li class="search_dropdown d-flex flex-row align-items-center justify-content-start">
											<span>Check in</span>
											<i class="fa fa-chevron-down ml-auto" aria-hidden="true"></i>
											<ul>
												<li>Check in item 1</li>
												<li>Check in item 2</li>
												<li>Check in item 3</li>
												<li>Check in item 4</li>
												<li>Check in item 5</li>
											</ul>
										</li>
										<li class="search_dropdown d-flex flex-row align-items-center justify-content-start">
											<span>Check out</span>
											<i class="fa fa-chevron-down ml-auto" aria-hidden="true"></i>
											<ul>
												<li>Check out item 1</li>
												<li>Check out item 2</li>
												<li>Check out item 3</li>
												<li>Check out item 4</li>
												<li>Check out item 5</li>
											</ul>
										</li>
										<li class="search_dropdown d-flex flex-row align-items-center justify-content-start">
											<span>Guests</span>
											<i class="fa fa-chevron-down ml-auto" aria-hidden="true"></i>
											<ul>
												<li>1</li>
												<li>2</li>
												<li>3</li>
												<li>4</li>
												<li>5</li>
											</ul>
										</li>
										<li class="search_dropdown d-flex flex-row align-items-center justify-content-start">
											<span>Children</span>
											<i class="fa fa-chevron-down ml-auto" aria-hidden="true"></i>
											<ul>
												<li>1</li>
												<li>2</li>
												<li>3</li>
												<li>4</li>
												<li>5</li>
											</ul>
										</li>
										<li class="search_dropdown d-flex flex-row align-items-center justify-content-start">
											<span>Rooms</span>
											<i class="fa fa-chevron-down ml-auto" aria-hidden="true"></i>
											<ul>
												<li>1</li>
												<li>2</li>
												<li>3</li>
												<li>4</li>
												<li>5</li>
											</ul>
										</li>
									</ul>
									<button class="search_button">search</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Intro -->

	<div class="intro">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_title"><h1>Beach Hotel- More than a stay</h1></div>
						<div class="section_text">In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum.</div>
					</div>
				</div>
			</div>
			<div class="row intro_row">

				<!-- Intro Image -->
				<div class="col-lg-6">
					<div class="intro_image"><img src="{{ asset('web_assets/images/intro.jpg') }}" alt="https://unsplash.com/@papao03"></div>
				</div>

				<!-- Intro Content -->
				<div class="col-lg-6 intro_col">
					<div class="intro_content">
						<div class="quote"><img src="{{ asset('web_assets/images/quote.png') }}" alt=""></div>
						<div class="intro_text">
							<p>In vitae nisi aliquam, scelerisque leo a, volutpat sem. Vivamus rutrum dui fermentum eros hendrerit, id lobortis leo volutpat. Maecenas sollicitudin est in libero pretium interdum. Nullam volutpat dui sem, ac congue purus hendrerit, id lobortis leo luctus nec.</p>
						</div>
						<div class="intro_author d-flex flex-row align-items-center justify-content-start">
							<div class="author_image"><img src="{{ asset('web_assets/images/author_1.jpg') }}" alt="https://unsplash.com/@onurozkardes"></div>
							<div class="intro_author_content">
								<div class="intro_author_name">Michael Williams</div>
								<div class="intro_author_title">client</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Gallery -->

	<div class="gallery">
		<div class="gallery_slider_container">

			<!-- Gallery Slider -->
			<div class="owl-carousel owl-theme gallery_slider">

				<!-- Slide -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/gallery_1.jpg">
						<div class="background_image" style="background-image:url({{ asset('web_assets/images/gallery_1.jpg') }})"></div>
					</a>
					<div class="gallery_overlay trans_200 d-flex flex-column align-items-center justify-content-center"><div>+</div></div>
				</div>

				<!-- Slide -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/gallery_2.jpg">
						<div class="background_image" style="background-image:url({{ asset('web_assets/images/gallery_2.jpg') }})"></div>
					</a>
					<div class="gallery_overlay trans_200 d-flex flex-column align-items-center justify-content-center"><div>+</div></div>
				</div>

				<!-- Slide -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/gallery_3.jpg">
						<div class="background_image" style="background-image:url({{ asset('web_assets/images/gallery_3.jpg') }})"></div>
					</a>
					<div class="gallery_overlay trans_200 d-flex flex-column align-items-center justify-content-center"><div>+</div></div>
				</div>

				<!-- Slide -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/gallery_4.jpg">
						<div class="background_image" style="background-image:url({{ asset('web_assets/images/gallery_4.jpg') }})"></div>
					</a>
					<div class="gallery_overlay trans_200 d-flex flex-column align-items-center justify-content-center"><div>+</div></div>
				</div>

				<!-- Slide -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/gallery_5.jpg">
						<div class="background_image" style="background-image:url({{ asset('web_assets/images/gallery_5.jpg') }})"></div>
					</a>
					<div class="gallery_overlay trans_200 d-flex flex-column align-items-center justify-content-center"><div>+</div></div>
				</div>

			</div>
		</div>
	</div>



@stop
