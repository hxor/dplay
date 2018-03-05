<!doctype html>
<html lang="{{ app()->getLocale() }}" class="no-js">
<head>
	<title>{{ config('app.name', 'Laravel') }}</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="fonts.googleapis.com/cssc7df.css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('assets/css/modernmag-assets.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    
    <style>
        .clock {
          font-size: 4em;
        }
        marquee span { 
            margin-right: 100%; 
        } 
        marquee p { 
            white-space:nowrap;
            margin-right: 1000px; 
        } 
    </style>

</head>
<body>

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header class="clearfix">

			<div class="header-banner-place">
				<div class="container-fluid">
					<a class="navbar-brand" href="index-2.html">
						<img src="{{ asset('assets/images/logo.png') }}" alt="">
						<p>Newspaper &amp; Editorial HTML5 Magazine</p>
					</a>

					<div class="advertisement">
                        <div class="clock" style="color:white"></div>
					</div>
				</div>
			</div>
		</header>
		<!-- End Header -->

		<!-- content-section 
			================================================== -->
		<section id="content-section">
			<div class="container-fluid">

				<div class="row">
					<div class="col-lg-8">

						<!-- About-box -->
						<div class="about-box">
							<div class="title-section">
								<h1>About Us</h1>
							</div>
                            <video width="100%" height="100%" autoplay loop>
                              <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4" />
                              Your browser does not support the video tag.
                            </video>
						</div>
						<!-- End About-box -->


					</div>

					<div class="col-lg-4 sidebar-sticky">
						
						<!-- Sidebar -->
						<div class="sidebar theiaStickySidebar">

							<div class="widget ">
								<div class="posts-block articles-box">
                                    <div class="title-section">
                                        <h1>Category Layout 1</h1>
                                    </div>
							
							         <div class="news-post article-post">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h2><a href="single-post.html">New alternatives are more productive</a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="lnr lnr-user"></i>by <a href="#">John Doe</a></li>
                                                        <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                                                        <li><i class="lnr lnr-eye"></i>872 Views</li>
                                                    </ul>
                                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                </div>
                                            </div>
                                        </div>
							         <div class="news-post article-post">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h2><a href="single-post.html">New alternatives are more productive</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="lnr lnr-user"></i>by <a href="#">John Doe</a></li>
                                                    <li><a href="#"><i class="lnr lnr-book"></i><span>23 comments</span></a></li>
                                                    <li><i class="lnr lnr-eye"></i>872 Views</li>
                                                </ul>
                                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            </div>
                                        </div>
                                    </div>			

						          </div>
							</div>
                            
						</div>

					</div>
				</div>
			</div>
		</section>
		<!-- End content section -->

		<!-- footer 
			================================================== -->
		<footer>
			<div class="container-fluid">
                

				<div class="up-footer">
					<div class="row">
                        <marquee behavior="scroll" direction="left" style="color: white; font-size:28px">
                            <b>Hello, I am a StackOverflow user.<span> </span> And I Code the Web.</b>
                        </marquee>
					</div>
				</div>

				<div class="down-footer">
					
				</div>

			</div>
		</footer>
		<!-- End footer -->

	</div>
	<!-- End Container -->



	<!-- Login Modal -->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	        <div class="title-section">
	        	<h1>Login</h1>
	        </div>
			<form id="login-form">
				<p>Welcome! Login to your account.</p>
				<label for="username">Username or Email Address*</label>
				<input id="username" name="username" type="text">
				<label for="password">Password*</label>
				<input id="password" name="password" type="password">
				<button type="submit" id="submit-register">
					<i class="fa fa-paper-plane"></i> Login
				</button>
			</form>
	      	<p>Don't have account? <a href="register.html">Register Here</a></p>

	      </div>
	    </div>
	  </div>
	</div>
	<!-- End Login Modal -->

	<script src="{{ asset('assets/js/modernmag-plugins.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI&amp;sensor=false&amp;language=en"></script>
	<script src="{{ asset('assets/js/gmap3.min.js') }}"></script>
	<script src="{{ asset('assets/js/script.js') }}"></script>
    
    <script>
        function clock() {// We create a new Date object and assign it to a variable called "time".
        var time = new Date(),
            
            // Access the "getHours" method on the Date object with the dot accessor.
            hours = time.getHours(),
            
            // Access the "getMinutes" method with the dot accessor.
            minutes = time.getMinutes(),
    
    
        seconds = time.getSeconds();

        document.querySelectorAll('.clock')[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);
        
        function harold(standIn) {
            if (standIn < 10) {
            standIn = '0' + standIn
            }
            return standIn;
        }
        }
        setInterval(clock, 1000);
    </script>
	
</body>
</html>