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
		 .header-banner-place {
			width: 100%;
			padding: 40px 0;
			background: <?= empty($setting->color) ? '#00A7B3' : $setting->color ?>;
			overflow: hidden; } 
    </style>

</head>
<body onload="onload();">

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header class="clearfix">

			<div class="header-banner-place" style="padding-bottom: 1px;padding-top: 1px;">
				<div class="container-fluid">
					<a class="navbar-brand" href="index-2.html">
						{{-- <img src="{{ asset('assets/images/logo.png') }}" alt=""> --}}
						<img src="{{ empty($setting->logo) ? asset('assets/images/logo.png'): asset($setting->logo) }}" alt="">
						{{-- <p>Newspaper &amp; Editorial HTML5 Magazine</p> --}}
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
                            <video id="idle_video" width="1280" height="690" onended="onVideoEnded();" controls></video>
						</div>
						<!-- End About-box -->


					</div>

					<div class="col-lg-4 sidebar-sticky">
						
						<!-- Sidebar -->
						<div class="sidebar theiaStickySidebar">

							<div class="widget ">
								<div class="posts-block articles-box">
                                    

                                    @foreach ($info as $info)
                                    	<div class="news-post article-post">
	                                        <div class="row">
	                                            <div class="col-sm-12">
	                                                <h2><a href="#">{{ $info->title }}</a></h2>
	                                                <ul class="post-tags" style="padding-top: 18px;">
	                                                    <li ><i class="lnr lnr-user"></i>by <a href="#">{{ $info->user->name }}</a></li>
	                                                    <li><i class="lnr lnr-clock"></i>{{ $info->created_at }}</li>
	                                                </ul>
	                                                {!! $info->body !!}
	                                            </div>
	                                        </div>
	                                    </div>
                                    @endforeach
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
                        	<b>
                        		@foreach ($text as $text)
	                            	{{ $text->text }}.<span> </span>
	                            @endforeach
                        	</b>
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
        var video_list      = {!! json_encode($data, JSON_UNESCAPED_SLASHES) !!};
        var video_index     = 0;
        var video_player    = null;

        function onload(){
            console.log("body loaded");
            video_player        = document.getElementById("idle_video");
            video_player.setAttribute("src", video_list[video_index]);
            video_player.play();
        }

        function onVideoEnded(){
            console.log("video ended");
            if(video_index < video_list.length - 1){
                video_index++;
            }
            else{
                video_index = 0;
            }
            video_player.setAttribute("src", video_list[video_index]);
            video_player.play();
        }

		function clock() {
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
