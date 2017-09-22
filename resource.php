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
					<a class="navbar-brand" href="#"><img src="images/logo.png" alt="company logo"/></a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right custom-menu">
						<li ><a href="index.php">Home</a></li>
						<li class="active"><a href="resource.php">Resources</a></li>
						<li><a href="index.php#about">About</a></li>
						<li><a href="index.php#services">Services</a></li>
						<li><a href="index.php#meet-team">Team</a></li>
						<!-- <li><a href="#portfolio1">Portofolio</a></li> -->
						<li><a href="index.php#contact">Contact</a></li>
						
						<li><a href="signUp.php">Log In</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Page Content -->
		<section class="container blog">
            <div class="row">
                <!-- Blog Column -->
                <div class="col-md-12">
                    <h1 class="page-header sidebar-title">
                        Books List
                    </h1>
                
                        
                    <!-- </div> -->
                    <?php
                        include("connect.php"); 

                        //books show
                        
                        $sqlBook = "SELECT * FROM book";
                                $resultBook = $conn->query($sqlBook);
                                $rowB = mysqli_fetch_assoc($resultBook);
                                $i = 0;
                        
                    while($rowB != NULL){
                       echo "<div class='row blogu'>
                       <div class='col-sm-4 col-md-4 '>
                            <div class='blog-thumb'>
                                <a href='#''>
                                    <img class='img-responsive' src='images/blog-photo";echo ++$i;echo ".jpg' alt='photo'>
                                </a>
                            </div>
                        </div>
                        <div class='col-sm-4 col-md-4'>
                            <h2 class='blog-title'>
                                <a href='#''>"; echo $rowB['title']; echo "</a>
                            </h2>
                            <p><i class='fa fa-calendar-o'></i>  August 28, 2013 
                                <span class='comments-padding'></span>
                                <i class='fa fa-comment'></i> 0 comments
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
                        </div>
                        </div>
                        <hr>";
                        
                        $rowB = mysqli_fetch_assoc($resultBook);

                    }
                        $conn = null;



                       ?>
                    <!-- </div> -->
                
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
						<div class="pull-right">Designed by <a href="http://www.atis.al">ATIS</a></div>
					</div>
				</div>
			</div>
		</footer>


        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>


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

    </body>
</html>