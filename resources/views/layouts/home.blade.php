<!DOCTYPE html>
<html lang="en">
	<head>
    <title>Cryptorius</title>

	<!-- Mobile Specific Metas -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link type="image/x-icon" href="images/fav-icon.png" rel="icon">

    <!-- CSS -->
    

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animations.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
	<link href="{{ asset('css/intlTelInput.css')}}" rel="stylesheet">

	
	</head>
	<body>

		<!-- Start preloader -->
	
		<!-- End preloader -->

		<header class="header">
			<div class="container">
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-8 d-flex flex-center">
						<div class="logo">
							<a href="index.html"><img src="images/logo.png" alt="Cryptorius Logo"></a>
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-4">
						<div class="menu-toggle">
							<span></span>
						</div>
						<div class="main-menu">
							<div class="nav-menu text-right">
								<ul>
									<li class="active"><a href="index.html">Home</a></li>
									<li class="menu-dropdwon">
										<a href="javascript:void(0)">Pages</a>
										<ul>
											<li><a href="about.html">About</a></li>
											<li><a href="token-sale.html">Token Sale</a></li>
											<li><a href="blog-list.html">Blog Listing</a></li>
											<li><a href="blog-detail.html">Blog Detail</a></li>
											<li><a href="contact.html">Contact</a></li>
											<li><a href="faq.html">FAQ</a></li>
											<li><a href="404.html">404 Page</a></li>
										</ul>
									</li>
									<li><a href="feature.html">Feature</a></li>
									<li><a href="roadmap.html">Roadmap</a></li>
									<li><a href="team.html">Team</a></li>
									<li></li>
								</ul>
								@guest
							</div>
							<div class="login-box text-right">
								<a href="{{route('ingreso')}}" class="button">Ingreso</a>
							</div>
						</div>
								@else
							</div>
							<div class="login-box text-right">
								<a href="/admin" class="button">Mi Cuenta</a>
							</div>
						</div>
						@endguest
					</div>
				</div>
			</div>
		</header>



		<main class="main">
		
			@yield('content')
		</main>
	


		<footer class="footer purple relative pt-100" id="footer">
			<canvas id="footer-dots"></canvas>
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="section-heading text-center">
							<h6 class="sub-title text-uppercase wow fadeInUp">CONTACT</h6>
							<h2 class="title wow fadeInUp">Get In Touch</h2>
							<p class="wow fadeInUp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam.</p>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12">
						<ul class="contact-link wow fadeInUp">
							<li>
								<span class="contact-icon"><img src="images/mail.png" alt="Mail Icon"></span>
								<a href="mailto:info@example.com ">info@example.com </a>
							</li>
							<li>
								<span class="contact-icon"><img src="images/phone.png" alt="Phone Icon"></span>
								<a href="tel:+681234567890">(+68) 1234567890</a>
							</li>
							<li>
								<span class="contact-icon"><img src="images/telegram.png" alt="Telegram Icon"></span>
								<a href="#">Join us on Telegram</a>
							</li>
						</ul>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12">
						<form method="post" class="get-touch contactfrm wow fadeInUp">
						<div class="contactfrmmsg">Thank You! Your message has been sent.</div>
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6">
									<div class="form-group">
										<input type="text" name="text" class="form-control" placeholder="Your Name*" required="">
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6">
									<div class="form-group">
										<input type="text" name="text" class="form-control" placeholder="Your Email*" required="">
									</div>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12">
									<div class="form-group">
										<textarea class="form-control" placeholder="Your Message*"></textarea>
									</div>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 text-center">
									<button class="button">Send Message</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="copyright mt-100">
				<div class="container">
					<div class="row">
						<div class="col-xl-8 col-lg-8 col-md-9 order-r-2">
							<p>&#9400; Cryptorius all Rights Reserved. Designed By <a href="#" >TemplatesCoder.com</a></p>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-3 order-r-1">
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
		
		
         
		<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('js/animation.js') }}"></script>
		<script src="{{ asset('js/footer-canvas.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
		<script src="{{ asset('js/intlTelInput.js') }}"></script>
	
	@yield('js')
		
	</body>

</html>
