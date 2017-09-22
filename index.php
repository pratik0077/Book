<?php
   session_start();

   if(isset($_SESSION['type']) && $_SESSION['type']=='student'){
        header('location: /newBookExchange/user/student.php');
   }
   else if(isset($_SESSION['type']) && $_SESSION['type']=='admin'){
        header('location: /newBookExchange/admin/admin_home.php');
   }
   else{
       //header('location: ../index.php');
   }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>UIU Book Exchange</title>
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/patros.css" >
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
	</head>

	<body data-spy="scroll">
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html"><img src="images/uiulogo.png" alt="company logo" /></a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right custom-menu">
						<li class="active"><a href="#home">Home</a></li>
						<li><a href="resource.php">Resources</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#services">Services</a></li>
						<li><a href="#meet-team">Team</a></li>
						<!-- <li><a href="#portfolio1">Portofolio</a></li> -->
						<li><a href="#contact">Contact</a></li>
						
						<li><a href="signUp.php">Log In</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Header Carousel -->
		<header id="home" class="carousel slide">
			<ul class="cb-slideshow">
				<li><span>image1</span>
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="text-center"><h3>Searching For Books???</h3></div>
							</div>
						</div>
						<h4>Welcome to UIU Book Exchange</h4>
					</div>
				</li>
				<li><span>image2</span>
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="text-center"><h3>You are in right place!</h3></div>
							</div>
						</div>
						<h4>Welcome to UIU Book Exchange</h4>
					</div>
				</li>
				<li><span>image3</span>
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="text-center"><h3>Books from Diffrent Departments</h3></div>
							</div>
						</div>
						<h4>Welcome to UIU Book Exchange</h4>
					</div>
				</li>
				<li><span>Image 04</span>
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="text-center"><h3>BSCSE, BSEEE, BBA, BSECO etc. </h3></div>
							</div>
						</div>
						<h4>Welcome to UIU Book Exchange</h4>
					</div>
				</li>
				<li><span>Image 05</span>
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="text-center"><h3>Sign Up now!!!</h3></div>
							</div>
						</div>
						<h4>Welcome to UIU Book Exchange</h4>
					</div>
				</li>
				<li><span>Image 06</span>
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="text-center"><h3>And get your books</h3></div>
							</div>
						</div>
						<h4>Welcome to UIU Book Exchange</h4>
					</div>
				</li>
			</ul>
			<div class="intro-scroller">
				<a class="inner-link" href="#about">
					<div class="mouse-icon" style="opacity: 1;">
						<div class="wheel"></div>
					</div>
				</a> 
			</div>          
		</header>
			
		<!-- Page Content -->
		<section id="about">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10">
						<div class="text-center">
							<h2>About Us</h2>
							<img class="img-responsive displayed" src="images/short.png" alt="Company about"/>
							<div class="row">
								<div class="col-md-12">
									<p>
									About Us
I've always loved books. Its beautiful thing to lose yourself in a book; authentic characters, mysterious places and a well-written story that sentence after sentence won't let you stop reading.
As a mum of 2 (soon to be 3) young children any shopping trip can be 'eventful', let alone entering a book store looking for a 'mum' book. Sorry Thomas and Dora! Add this to my part-time job, studying at TAFE and running a household, the nights became my chance to pursue my love of reading.
Devouring a book every 2 days and paying full price simply didn't make sense – I love books and I love sharing them with family and friends so why not continue sharing the stories with other book lovers? This started the thought process and I began researching second hand book stores but again, with young children it's never easy to find what you're after and within THEIR time frame. What about book exchange websites? I love the concept of updating your bookcase without it costing the earth but the websites I could find had a limited selection and most wouldn't deliver to Australia.
Ultimately this served as my inspiration for Book Exchange... a web-based, local, book exchange system whereby all book lovers who are not only time but money poor can share their love of books. Book Exchange not only offers book lovers a place to exchange books they've read and enjoyed but a chance to catch up using our Book Chat forum – a community of book lovers! It is a place where everyone can discuss and share their stories, interests, books, recommendations and authors.<!-- <span class="color-elements">essentially unchanged.</span> -->
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="services">
			<div class="orangeback">
				<div class="container">
					<div class="text-center homeport2"><h2>Services</h2></div>
					<div class="row">
						<div class="col-md-12 homeservices1">
							<div class="col-md-3 portfolio-item">
								<div class="text-center">
									<a href="javascript:void(0);">
									<span class="fa-stack fa-lg">
									  <i class="fa fa-circle fa-stack-2x"></i>
									  <i class="fa fa-line-chart fa-stack-1x"></i>
									</span>
									</a>
									<h3><a href="#">Strategy</a></h3>
									<p>This is a platform where students can find, share or rent their necessery educational books.</p>
								</div>
							</div>
							<div class="col-md-3 portfolio-item">
								<div class="text-center">
									<a href="javascript:void(0);">
									<span class="fa-stack fa-lg">
									  <i class="fa fa-circle fa-stack-2x"></i>
									  <i class="fa fa-users fa-stack-1x"></i>
									</span>
									</a>
									<h3><a href="#">User Friendly</a></h3>
									<p>This site is easy to use. And also secure. </p>
								</div>
							</div>
							<div class="col-md-3 portfolio-item">
								<div class="text-center">
									<a href="javascript:void(0);">
									<span class="fa-stack fa-lg">
									  <i class="fa fa-circle fa-stack-2x"></i>
									  <i class="fa fa-code fa-stack-1x"></i>
									</span>
									</a>
									<h3><a href="#">Free</a></h3>
									<p>No service charge and no more paying for books...</p>
								</div>
							</div>
							<div class="col-md-3 portfolio-item">
								<div class="text-center">
									<a href="javascript:void(0);">
									<span class="fa-stack fa-lg">
									  <i class="fa fa-circle fa-stack-2x"></i>
									  <i class="fa fa-cogs fa-stack-1x"></i>
									</span>
									</a>
									<h3><a href="#">Flexibility</a></h3>
									<p>You can use this from anywhere as long as you have internet connection. :)</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- <section id="bloghome">
			<div class="container">
				<div class="text-center"><h2>Latest Blog Posts</h2>
					<img class="img-responsive displayed" src="images/short.png" alt="about">
				</div>
				<div class="row">
					<div class="col-md-12 homeport1">
						<div class="col-md-4 col-sm-12 col-xs-12 portfolio-item">
							<figure class="effect-oscar">
								<img src="images/blog1.jpg" alt="img09" class="img-responsive" />
								<figcaption>
									<h2>Blog Post Long Title</h2>
									<a href="#">View more</a>
								</figcaption>           
							</figure>
							<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet.</p>
							<div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom">Read More</a></div>
						</div>
						<div class="col-md-4 col-sm-12 col-xs-12 portfolio-item">
							<figure class="effect-oscar">
								<img src="images/blog2.jpg" alt="img09" class="img-responsive"/>
								<figcaption>
									<h2>Blog Post Long Title</h2>
									<a href="#">View more</a>
								</figcaption>           
							</figure>
							<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet.</p>
							<div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom">Read More</a></div>
						</div>
						<div class="col-md-4 col-sm-12 col-xs-12 portfolio-item">
							<figure class="effect-oscar">
								<img src="images/blog3.jpg" alt="img09" class="img-responsive"/>
								<figcaption>
									<h2>Blog Post Long Title</h2>
									<a href="#">View more</a>
								</figcaption>           
							</figure>
							<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet.</p>
							<div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom">Read More</a></div>
						</div>
					</div>
				</div>
			</div>
		</section> -->

		<section id="meet-team">
			<div class="container">
				<div class="text-center">
				<h2>Team Members</h2>
				<img class="img-responsive displayed" src="images/short.png" alt="about">
				</div>
				<div class="row teamspace">
					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="team-member">
							<!-- <div class="team-img">
								<img class="img-responsive" src="images/person1.jpg" alt="">
							</div>
							<div class="team-info">
								<h3>Christian Peri</h3>
								<span>Co-Founder</span>
							</div>
							<p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
							<ul class="social-icons">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul> -->
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="team-member">
							<div class="team-img">
								<img class="img-responsive" src="images/person1.jpg" alt="">
							</div>
							<div class="team-info">
								<h3>Taslimur Rahaman</h3>
								<span>Project Manager & Designer</span>
							</div>
							<p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
							<ul class="social-icons">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="team-member">
							<div class="team-img">
								<img class="img-responsive" src="images/person2.jpg" alt="">
							</div>
							<div class="team-info">
								<h3>Nasirul Amin</h3>
								<span>Co-Designer</span>
							</div>
							<p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
							<ul class="social-icons">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3">
						<div class="team-member">
							<!-- <div class="team-img">
								<img class="img-responsive" src="images/person1.jpg" alt="">
							</div>
							<div class="team-info">
								<h3>Loreto Andas</h3>
								<span>Developer</span>
							</div>
							<p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater</p>
							<ul class="social-icons">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul> -->
						</div>
					</div>
				</div>
			</div>
		</section>


		<!-- <section id="portfolio1">
		<div class="container">
		<div class="row">
			<div class="text-center">
			<h2>Portfolio</h2>
			<img class="img-responsive displayed" src="images/short.png" alt="about">
			</div>

			<ul class="filter nav nav-pills">
			  <li data-value="all" ><a class="active" href="#">All</a></li>
			  <li data-value="development"><a href="#">Development</a></li>
			  <li data-value="webdesign"><a href="#">Web Design</a></li>
			  <li data-value="mobileapps"><a href="#">Mobile Apps</a></li>
			</ul>
 
			<ul class="port2">
			  <li data-type="development" data-id="id-1" class="port3">
				<a href="#" id="development1"><img src="images/port1.jpg" alt=""></a></li>
			  <li data-type="webdesign" data-id="id-2" class="port3">
				<a href="#" id="webdesign1"><img src="images/port2.jpg" alt=""></a>
			  </li>
			  <li data-type="mobileapps" data-id="id-3" class="port3">
				<a href="#" id="mobileapps1"><img src="images/port3.jpg" alt=""></a>
			  </li>
				<li data-type="development" data-id="id-4" class="port3">
				<a href="#" id="development2"><img src="images/port4.jpg" alt=""></a>
			  </li>
			  <li data-type="webdesign" data-id="id-5" class="port3">
				<a href="#" id="webdesign2"><img src="images/port5.jpg" alt=""></a>
			  </li>
			  <li data-type="mobileapps" data-id="id-6" class="port3">
				<a href="#" id="mobileapps2"><img src="images/port6.jpg" alt=""></a>
			  </li>
			</ul>
		  </div> 
		</div>
		</section> -->

		<div id="location">
			<div class="row prodmap">
				<div id="map-canvas-holder" class="map_holder" style="height: 400px;"></div>
			</div>
		</div>
<!-- 
		<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div class="wpb_gmaps_widget wpb_content_element">
                    <div class="wpb_wrapper">
                        <div class="wpb_map_wraper"> <iframe src="https://www.google.com/maps/embed?data=!4m5!3m4!1s0x0:0x91d851eada954844!8m2!3d23.7445213!4d90.3728492" width="100%" height="450" frameborder="0" style="border: 0px; pointer-events: none;" allowfullscreen=""></iframe> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->



		<section id="contact">
			<div class="container"> 
				<div class="row">
					<div class="col-md-12">
						<div class="col-lg-12">
							<div class="text-center color-elements">
							<h2>Contact Us</h2>
							</div>
						</div>
						<div class="col-lg-6 col-md-8">
							<form class="inline" id="contactForm" method="post" >
								<div class="row">
									<div class="col-sm-6 height-contact-element">
										<div class="form-group">
											<input type="text" name="first_name" class="form-control custom-labels" id="name" placeholder="FULL NAME" required data-validation-required-message="Please write your name!"/>
											<p class="help-block text-danger"></p>
										</div>
									</div>
									<div class="col-sm-6 height-contact-element">
										<div class="form-group">
											<input type="email" name="email" class="form-control custom-labels" id="email" placeholder="EMAIL" required data-validation-required-message="Please write your email!"/>
											<p class="help-block text-danger"></p>
										</div>
									</div>
									<div class="col-sm-12 height-contact-element">
										<div class="form-group">
											<input type="text" name="message" class="form-control custom-labels" id="message" placeholder="WHAT'S ON YOUR MIND" required data-validation-required-message="Please write a message!"/>
										</div>
									</div>
									<div class="col-sm-3 col-xs-6 height-contact-element">
										<div class="form-group">
											<input type="submit" class="btn btn-md btn-custom btn-noborder-radius" value="Send It"/>
										</div>
									</div>
									<div class="col-sm-3 col-xs-6 height-contact-element">
										<div class="form-group">
											<button type="button" class="btn btn-md btn-noborder-radius btn-custom" name="reset">RESET
											</button>
										</div>
									</div>
									<div class="col-sm-3 col-xs-6 height-contact-element">
										<div class="form-group">
											<div id="response_holder"></div>
										</div>
									</div>
									<div class="col-sm-12 contact-msg">
									<div id="success"></div>
									</div>
								</div>
							</form>
						</div>
						<div class="col-lg-5 col-md-3 col-lg-offset-1 col-md-offset-1">
							<div class="row">
								<div class="col-md-12 height-contact-element">
									<div class="form-group">
										<i class="fa fa-2x fa-map-marker"></i>
										<span class="text">LOCATION</span>
									</div>
								</div>
								<div class="col-md-12 height-contact-element">
									<div class="form-group">
										<i class="fa fa-2x fa-phone"></i>
										<span class="text">+8801923532423</span>
									 </div>
								 </div>
								<div class="col-md-12 height-contact-element">    
									<div class="form-group">
										<i class="fa fa-2x fa-envelope"></i>
										<span class="text">info@company.com</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="follow-us">
			<div class="container"> 
				<div class="text-center height-contact-element">
					<h2>FOLLOW US</h2>
				</div>
				<img class="img-responsive displayed" src="images/short.png" alt="short" />
				<div class="text-center height-contact-element">
					<ul class="list-unstyled list-inline list-social-icons">
						<li class="active"><a href="#"><i class="fa fa-facebook social-icons"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter social-icons"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus social-icons"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin social-icons"></i></a></li>
					</ul>
				</div>
			</div>
		</section>

		<footer id="footer">
			<div class="container">
				<div class="row myfooter">
					<div class="col-sm-6"><div class="pull-left">
					© Copyright Company 2015 | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a>
					</div></div>
					<div class="col-sm-6">
						<div class="pull-right">Designed by <a href="#">ATIS</a></div>
					</div>
				</div>
			</div>
		</footer>

		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Google Map -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQRXKQztKUX-U5RQ69KnuWdv8gJ4PcD1A&callback=initMap"></script>

		<!-- AIzaSyBQRXKQztKUX-U5RQ69KnuWdv8gJ4PcD1A -->
		<!-- Portfolio -->
		<script src="js/jquery.quicksand.js"></script>	    
	

		<!--Jquery Smooth Scrolling-->
		<script>
			$(document).ready(function(){
				$('.custom-menu a[href^="#"], .intro-scroller .inner-link').on('click',function (e) {
					e.preventDefault();

					var target = this.hash;
					var $target = $(target);

					$('html, body').stop().animate({
						'scrollTop': $target.offset().top
					}, 900, 'swing', function () {
						window.location.hash = target;
					});
				});

				$('a.page-scroll').bind('click', function(event) {
					var $anchor = $(this);
					$('html, body').stop().animate({
						scrollTop: $($anchor.attr('href')).offset().top
					}, 1500, 'easeInOutExpo');
					event.preventDefault();
				});

			   $(".nav a").on("click", function(){
					 $(".nav").find(".active").removeClass("active");
					$(this).parent().addClass("active");
				});

				$('body').append('<div id="toTop" class="btn btn-primary color1"><span class="glyphicon glyphicon-chevron-up"></span></div>');
					$(window).scroll(function () {
						if ($(this).scrollTop() != 0) {
							$('#toTop').fadeIn();
						} else {
							$('#toTop').fadeOut();
						}
					}); 
				$('#toTop').click(function(){
					$("html, body").animate({ scrollTop: 0 }, 700);
					return false;
				});

			});

		</script>

		<script>
		function gallery(){};

		var $itemsHolder = $('ul.port2');
		var $itemsClone = $itemsHolder.clone(); 
		var $filterClass = "";
		$('ul.filter li').click(function(e) {
		e.preventDefault();
		$filterClass = $(this).attr('data-value');
			if($filterClass == 'all'){ var $filters = $itemsClone.find('li'); }
			else { var $filters = $itemsClone.find('li[data-type='+ $filterClass +']'); }
			$itemsHolder.quicksand(
			  $filters,
			  { duration: 1000 },
			  gallery
			  );
		});

		$(document).ready(gallery);
		</script>


		<script type="text/javascript">
	$(document).ready(function(){
		inicializemap()

		$('#contactForm').on('submit', function(e){
			e.preventDefault();
			e.stopPropagation();

			// get values from FORM
			var name = $("#name").val();
			var email = $("#email").val();
			var message = $("#message").val();
			var goodToGo = false;
			var messgaeError = 'Request can not be send';
			var pattern = new RegExp(/^(('[\w-\s]+')|([\w-]+(?:\.[\w-]+)*)|('[\w-\s]+')([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);


			 if (name && name.length > 0 && $.trim(name) !='' && message && message.length > 0 && $.trim(message) !='' && email && email.length > 0 && $.trim(email) !='') {
				  if (pattern.test(email)) {
					 goodToGo = true;
				  } else {
					 messgaeError = 'Please check your email address';
					 goodToGo = false; 
				  }
			 } else {
			   messgaeError = 'You must fill all the form fields to proceed!';
			   goodToGo = false;
			 }

			 
			if (goodToGo) {
			   $.ajax({
				 data: $('#contactForm').serialize(),
				 beforeSend: function() {
				   $('#success').html('<div class="col-md-12 text-center"><img src="images/spinner1.gif" alt="spinner" /></div>');
				 },
				 success:function(response){
				   if (response==1) {
					 $('#success').html('<div class="col-md-12 text-center">Your email was sent successfully</div>');
					 window.location.reload();
				   } else {
					 $('#success').html('<div class="col-md-12 text-center">E-mail was not sent. Please try again!</div>');
				   }
				 },
				 error:function(e){
				   $('#success').html('<div class="col-md-12 text-center">We could not fetch the data from the server. Please try again!</div>');
				 },
				 complete: function(done){
				   console.log('Finished');
				 },
				 type: 'POST',
				 url: 'js/send_email.php', 
			   });
			   return true;
			} else {
			   $('#success').html('<div class="col-md-12 text-center">'+messgaeError+'</div>');
			   return false;
			}
			return false;
		});
	});

	var map = null;
	 var latitude;
	 var longitude;
	 function inicializemap(){
	   latitude = 23.744520; 
	   longitude = 90.372842;

	  var egglabs = new google.maps.LatLng(latitude, longitude);
	  var egglabs1 = new google.maps.LatLng(23.744520, 89.2296082);
	  var egglabs2 = new google.maps.LatLng(90.372842, 80.2296082 );


	  var image = new google.maps.MarkerImage('images/marker.png', new google.maps.Size(84,56), new google.maps.Point(0,0), new google.maps.Point(42,56));
	  var mapCoordinates = new google.maps.LatLng(latitude, longitude);
	  var mapOptions = {
	   backgroundColor: '#ffffff',
	   zoom: 18,
	   disableDefaultUI: true,
	   center: mapCoordinates,
	   mapTypeId: google.maps.MapTypeId.ROADMAP,
	   scrollwheel: true,
	   draggable: true, 
	   zoomControl: false,
	   disableDoubleClickZoom: true,
	   mapTypeControl: false,
	   styles: [
					{
						"featureType": "all",
						"elementType": "labels.text.fill",
						"stylers": [
							{
								"color": "#1f242f"
							}
						]
					},
					{
						"featureType": "all",
						"elementType": "labels.icon",
						"stylers": [
							{
								"hue": "#ff9d00"
							}
						]
					},
					{
						"featureType": "landscape.man_made",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#fef8ef"
							}
						]
					},
					{
						"featureType": "poi.medical",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"hue": "#ff0000"
							}
						]
					},
					{
						"featureType": "poi.park",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#c9d142"
							},
							{
								"lightness": "0"
							},
							{
								"visibility": "on"
							},
							{
								"weight": "1"
							},
							{
								"gamma": "1.98"
							}
						]
					},
					{
						"featureType": "road",
						"elementType": "geometry",
						"stylers": [
							{
								"weight": "1.00"
							}
						]
					},
					{
						"featureType": "road",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#d7b19c"
							},
							{
								"weight": "1"
							}
						]
					},
					{
						"featureType": "road.highway",
						"elementType": "geometry",
						"stylers": [
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "road.highway",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"weight": "4.03"
							}
						]
					},
					{
						"featureType": "road.highway",
						"elementType": "geometry.stroke",
						"stylers": [
							{
								"visibility": "off"
							},
							{
								"color": "#ffed00"
							}
						]
					},
					{
						"featureType": "road.highway.controlled_access",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "road.arterial",
						"elementType": "geometry",
						"stylers": [
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "road.local",
						"elementType": "geometry",
						"stylers": [
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "transit.line",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#cbcbcb"
							}
						]
					},
					{
						"featureType": "water",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#0b727f"
							}
						]
					}
				]
					  };

	  map = new google.maps.Map(document.getElementById('map-canvas-holder'),mapOptions);
	  marker = new google.maps.Marker({position: egglabs, raiseOnDrag: false, icon: image, map: map, draggable: false,  title: 'ATIS1'}); 
	  marker = new google.maps.Marker({position: egglabs1, raiseOnDrag: false, icon: image, map: map, draggable: false,  title: 'ATIS2'}); 
	  marker = new google.maps.Marker({position: egglabs2, raiseOnDrag: false, icon: image, map: map, draggable: false,  title: 'ATIS3'}); 
	  google.maps.event.addListener(map, 'zoom_changed', function() {
	   var center = map.getCenter();
	   google.maps.event.trigger(map, 'resize');
	   map.setCenter(center);
	  });
	 }

</script>


</body>
</html>




