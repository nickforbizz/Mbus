@extends('layouts.webfront')

@section('content')
    	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container_2">
						<div class="section_title"><h1>Our Newsletter</h1></div>
					</div>
				</div>
			</div>
			<div class="row newsletter_row">

				<!-- Newsletter Content -->
				<div class="col-lg-6">
					<div class="newsletter_content">
						<div class="newsletter_text">
							<p>
                                To get more on the recent updates, to be notified of any changes in our business and to learn more of whats behind the business, kindly we advise you to subscribe to our newsletter which you will be able to receive periodically. <br>
                                Write your email and hit the subscribe button
                            </p>
						</div>
					</div>
				</div>

                <!-- Newsletter Form -->
                    <br>
                @if (session('alert'))
                    <p class="alert alert-success">{{ session('alert') }}</p>
                @endif
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                            <p class="text-center alert alert-danger">{{ $error }}</p>
                    @endforeach
                @endif
				<div class="col-lg-6 newsletter_col">
					<form  class="newsletter_form" id="newsletter_form">
						<input type="email" name="email" class="newsletter_input" placeholder="johndoe@example.com" required="required">
						<button type="submit" class="newsletter_button">subscribe</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Contact Map -->
				<div class="col-xl-6">
					<div class="contact_map_container">

						<!-- Contact Map -->
						<div class="contact_map">

							<!-- Google Map -->
							<div class="map">
								<div id="google_map" class="google_map">
									<div class="map_container">
										<div id="map"></div>
									</div>
								</div>
							</div>

						</div>

						<!-- Contact Info Box -->
						<div class="contact_info_box d-flex flex-column align-items-center justify-content-center">
							<ul class="contact_info_list">
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div class="contact_info_icon d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('web_assets/images/placeholder.png') }}" alt=""></div></div>
									<div class="contact_info_text">1481 Nairobi Mama Ngina Str, CA 931</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div><div class="contact_info_icon d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('web_assets/images/smartphone.png') }}" alt=""></div></div>
									<div class="contact_info_text">+53 345 7953 32453</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div><div class="contact_info_icon d-flex flex-column align-items-center justify-content-center"><img src="{{ asset('web_assets/images/mail.png') }}" alt=""></div></div>
									<div class="contact_info_text">mobex@gmail.com</div>
								</li>
							</ul>
						</div>

					</div>
				</div>

				<!-- Contact Form -->
				<div class="col-xl-6 contact_col">
					<div class="contact_form_container">
						<div class="section_title_container_2">
							<div class="section_title"><h1>Contact Info</h1></div>
							<div class="section_text">
                                Wanna raise an <b>ISSUE!</b> <br>
                                Leave a <b>COMPLAINT! </b><br>
                                Suggest some <b>RECOMMENDATIONS! </b> <br>
                                kindly enter your <b>Name, email</b> and the <b>Message</b> you want us to be notified and hit that <b><i>Send Message button</i></b>
                            </div>
						</div>
						<form  class="contact_form" id="contact_form">
							<div class="row contact_row">
								<div class="col-md-6"><input type="text" class="contact_input" name="contact_name" placeholder="Name" required="required"></div>
								<div class="col-md-6"><input type="email" name="contact_email" class="contact_input" placeholder="E-mail" required="required"></div>
							</div>
							<div><textarea class="contact_input contact_textarea" name="contact_msg" placeholder="Type Your Message Here...." required="required"></textarea></div>
							<input class="contact_button" type="submit" value="send message" />
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection
@section('bottom-scripts')
    <script>
    $(document).ready(function () {
        $("#contact_form").on("submit", function (event) {
            event.preventDefault();
            $.ajax({
                url: '/contactMessage',
                method: 'post',
                data: $("#contact_form").serializeArray(),
                success: function (contact_resp) {
                    $("#contact_form")[0].reset();
                    console.log(contact_resp);

                },
                error: function (contact_err) {
                    console.log(contact_err);

                }
            });// ajax
        });// contact form
        $("#newsletter_form").on("submit", function (event) {
            event.preventDefault();
            $.ajax({
                url: '/apply_newsletter',
                method: 'post',
                data: $("#newsletter_form").serializeArray(),
                success: function (contact_resp) {
                    $("#newsletter_form")[0].reset();
                    console.log(news_resp);

                },
                error: function (contact_err) {
                    console.log(news_err);

                }
            });// ajax
        });// contact form
    });// document


    </script>
@endsection
