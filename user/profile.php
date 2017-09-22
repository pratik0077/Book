
<?php
	
	session_start();
	if(!empty($_SESSION['type']=='student')){
		//echo "hello";
	}else{
		header('location: ../index.php');
	}
	$u_id = $_SESSION['id'];
	include("../connect.php"); 
    $type = $_SESSION['type'];
    $query = "SELECT * FROM `student` WHERE type = 'student' AND id = '$u_id'";
    $result = $conn->query($query);
    include '../imageClass.php';
    $obj_image = new Image();
    $row = mysqli_fetch_assoc($result);
    //$data_image = $obj_image->$result;
    //$data = mysqli_fetch_assoc($data_image);
    $name = $row['name'];
    $id = $row['id'];
    $email = $row['email'];
    $type = $row['type'];

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
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="../css/patros.css" >
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
					<a class="navbar-brand" href="../index.html"><img src="../images/uiulogo.png" alt="company logo" /></a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right custom-menu">
						<li ><a href="student.php">Home</a></li>
						<li><a href="ask_for_book.php">Ask For Book</a></li>
						<li><a href="add_book.php">Add Books</a></li>
						<li><a href="book_request.php">Book Requests</a></li>
						<li><a href="user_activites.php">My Activities</a></li>
						<!-- <li><a href="#portfolio1">Portofolio</a></li> -->
						<li class="active"><a href="profile.php">Profile</a></li>
						
						<li><a href="../logout.php">Log Out</a></li>
					</ul>
				</div>
			</div>
		</nav>

		
		<section id="meet-team">
			<div class="container">
				<div class="text-center">
				
				<img class="img-responsive displayed" src="../images/short.png" alt="about">
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
					
					
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="team-member">
							<div class="team-img">
								<?php echo  '<img class="img-responsive" src="data:image;base64,' .$row['image'].'" alt="" >'?>
							</div>
							<div class="floatSection">
							<div style=" padding-left: 5px;  ">
							<center>
							<form action="" method="post" enctype="multipart/form-data">
							<div >
                  
			                  	<input type="file" class="buttonCustom buttonCustom2" name="image" />
			                  	<button type="submit" class="buttonCustom buttonCustom2" name="changeProfileImg">Upload</button>
			                </div>
							<div class="team-info">
								<h3><?php echo $row['name']; ?></h3>
								<h4><span>ID# <?php echo $row['id']; ?></span></h4>
								<span>Email: <?php echo $row['email']; ?></span>
							</div>
							<p></p>
							</form>
							</center>
							</div>
							<!-- <ul class="social-icons">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul> -->
						</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php

			if(isset($_POST['changeProfileImg']))
			{
				if(getimagesize($_FILES['image']['tmp_name']) == false){
					echo "<script>
                        alert('Please select an image.');
                        window.location.href='profile.php';
                    </script>";
				}
				else{
					$image = addslashes($_FILES['image']['tmp_name']);
			          //$image = addslashes($_FILES['image']['name']);
			        $image = file_get_contents($image);
			        $image = base64_encode($image);

			        $sql = "UPDATE `student` SET `image`= '$image' WHERE `id` = '$id'";

			        $res = $conn->query($sql);
		   			mysqli_close($conn);
		   			if(!$res) {
	                echo "<script>
	                        alert('Not uploaded.');
	                        window.location.href='profile.php';
	                    </script>";
            		}		
		            else{
		                echo "<script>
		                        alert('Image has been uploaded.');
		                        window.location.href='profile.php';
		                    </script>";    
		            }
		   			$conn = null;
	   			}
			}


		?>
		
		<section id="follow-us">
			<div class="container"> 
				<div class="text-center height-contact-element">
					<h2>FOLLOW US</h2>
				</div>
				<img class="img-responsive displayed" src="../images/short.png" alt="short" />
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
		<script src="../js/jquery.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="../js/bootstrap.min.js"></script>

		<!-- Google Map -->
		<script src="//maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=true&amp;libraries=places"></script>

		<!-- Portfolio -->
		<script src="../js/jquery.quicksand.js"></script>	    
	

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
				 url: '../js/send_email.php', 
			   });
			   return true;
			} else {
			   $('#success').html('<div class="col-md-12 text-center">'+messgaeError+'</div>');
			   return false;
			}
			return false;
		});
	});

	
	 

</script>


</body>
</html>




