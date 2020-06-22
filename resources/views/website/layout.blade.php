<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>UDEMA | Modern Educational</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="/website/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="/website/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="/website/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="/website/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="/website/img/apple-touch-icon-144x144-precomposed.png">

    <!-- BASE CSS -->
    <link href="/website/css/bootstrap.min.css" rel="stylesheet">
    <link href="/website/css/style.css" rel="stylesheet">
	<link href="/website/css/vendors.css" rel="stylesheet">
	<link href="/website/css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

	@yield('styles')

    <!-- YOUR CUSTOM CSS -->
    <link href="/website/css/custom.css" rel="stylesheet">

</head>

<body>

	<div id="page">

	<header class="header menu_2">
		<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
		<div id="logo">
			<a href="/"><img src="/website/img/logo.png" width="149" height="42" data-retina="true" alt=""></a>
		</div>
		<ul id="top_menu">
		@if(!auth()->check())
			<li><a href="{{route('login')}}" class="login">Login</a></li>
			@else
			<li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
									</li>

									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


								   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									   @csrf
								   </form>
							   </div>
			@endif
			<li><a href="#0" class="search-overlay-menu-btn">Search</a></li>
			<li class="hidden_tablet"><a href="{{route('dashboard.home')}}" class="btn_1 rounded">Admission</a></li>
		</ul>
		<!-- /top_menu -->
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>

@include('Website.nav')

		<!-- Search Menu -->
		<div class="search-overlay-menu">
			<span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>
			<form role="search" id="searchform" method="get">
				<input value="" name="q" type="search" placeholder="Search..." />
				<button type="submit"><i class="icon_search"></i>
				</button>
			</form>
		</div><!-- End Search Menu -->
	</header>
	<!-- /header -->

	<main>
@yield('content')
	</main>
	<!-- /main -->

	<footer>
		<div class="container margin_120_95">
			<div class="row">
				<div class="col-lg-5 col-md-12 p-r-5">
					<p><img src="/website/img/logo.png" width="149" height="42" data-retina="true" alt=""></p>
					<p>Mea nibh meis philosophia eu. Duis legimus efficiantur ea sea. Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu. Nihil facilisi indoctum an vix, ut delectus expetendis vis.</p>
					<div class="follow_us">
						<ul>
							<li>Follow us</li>
							<li><a href="https//www.fb.com/udema"><i class="ti-facebook"></i></a></li>
							<li><a href="https//www.twitter.com/udema"><i class="ti-twitter-alt"></i></a></li>
							<li><a href="https//www.google.com/udema"><i class="ti-google"></i></a></li>
							<li><a href="https//www.pinterest.com/udema"><i class="ti-pinterest"></i></a></li>
							<li><a href="https//www.instagram.com/udema"><i class="ti-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 ml-lg-auto">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="{{route('dashboard.home')}}">Admission</a></li>
						<li><a href="{{route('about')}}">About</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
						<li><a href="{{route('register')}}">Register</a></li>
						<li><a href="{{route('posts.index')}}">News &amp; Events</a></li>
						<li><a href="{{route('contact')}}">Contacts</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://61280932400"><i class="ti-mobile"></i> + 61 23 8093 3400</a></li>
						<li><a href="mailto:info@udema.com"><i class="ti-email"></i> info@udema.com</a></li>
					</ul>
					<div id="newsletter">
					<h6>Newsletter</h6>
					<div id="message-newsletter"></div>
					<form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
						<div class="form-group">
							<input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
							<input type="submit" value="Submit" id="submit-newsletter">
						</div>
					</form>
					</div>
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-md-8">
					<ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div id="copy">© 2020 Udema</div>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	</div>
	<!-- page -->

	<!-- COMMON SCRIPTS -->
    <script src="/website/js/jquery-2.2.4.min.js"></script>
    <script src="/website/js/common_scripts.js"></script>
	@yield('scripts')
    <script src="/website/js/main.js"></script>
	<script src="/website/assets/validate.js"></script>

</body>
</html>
