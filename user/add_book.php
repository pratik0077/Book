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
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $id = $row['id'];
    $email = $row['email'];
    $type = $row['type'];

?>
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
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="../css/signUpStyle.css">
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
                    <li><a href="student.php">Home</a></li>
                    <li><a href="ask_for_book.php">Ask For Book</a></li>
                    <li  class="active"><a href="add_book.php">Add Books</a></li>
                    <li><a href="book_request.php">Book Requests</a></li>
                    <li><a href="user_activites.php">My Activities</a></li>
                    <!-- <li><a href="#portfolio1">Portofolio</a></li> -->
                    <li ><a href="profile.php">Profile</a></li>
                        

                    <li><a href="../logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <section class="container blog">
    		<div class="form">
    		<div id="login" >   
          	<h1 class="tab">Add Book here:</h1>
    		<form action="" method="post" enctype="multipart/form-data">
    			<!-- <div class = "top-row"> -->


    				<div class="field-wrap"  style=" height: 7%; ">
	    				<label>
	    					Title <span class="req">*</span>
	    				</label>
    					<input type="text" name = "title" required autocomplete="off" />
    				</div>
    			<!-- </div> -->


    			<!-- <div class = "top-row"> -->
    				<div class="field-wrap"  style=" height: 7%; ">
	    				<label>
	    					ISBN 
	    				</label>
    					<input type="text" name = "ISBN" required autocomplete="off" />
    				</div>
    			<!-- </div> -->


    				<div class="field-wrap"  style=" height: 7%; ">
	    				<label>
	    					Edition <span class="req">*</span>
	    				</label>
    					<input type="text" name = "Edition" required autocomplete="off" />
    				</div>


    				<div class="field-wrap"  style=" height: 7%; ">
	    				<label>
	    					Status <span class="req">*</span>
	    				</label>
    					<input type="text" name = "Status" required autocomplete="off" />
    				</div>


    				<div class="field-wrap"  style=" height: 7%; ">
	    				<label>
	    					Quantity <span class="req">*</span>
	    				</label>
    					<input type="text" name = "Quantity" required autocomplete="off" />
    				</div>


    				<div class="field-wrap"  style=" height: 7%; ">
	    				<label>
	    					Price <span class="req">*</span>
	    				</label>
    					<input type="text" name = "Price" required autocomplete="off" />
    				</div>

    			<!-- <div class = "top-row"> -->
    				
    			<!-- </div> -->


    			<!-- <div class = "top-row"> -->
    				<div class="field-wrap"  style=" height: 7%; ">
	    				<label>
	    					Category <span class="req">*</span>
	    				</label>
    					<input type="text" name = "Category" required autocomplete="off" />
    				</div>
    			<!-- </div> -->


    			<!-- <div class = "top-row"> -->
    				<div class="field-wrap"  style=" height: 7%; ">
	    				<label>
	    					Author <span class="req">*</span>
	    				</label>
    					<input type="text" name = "Author" required autocomplete="off" />
    				</div>
    			<!-- </div> -->


    			<!-- <div class = "top-row"> -->
    				<div class="field-wrap"  style=" height: 7%; ">
	    				<label>
	    					Publisher <span class="req">*</span>
	    				</label>
    					<input type="text" name = "Publisher" required autocomplete="off" />
    				</div>
    			<!-- </div> -->
    				<div class="field-wrap"  style=" height: 7%; ">
    				<select name="exchange">
					  <option value="">Select Exchange type:</option>
					  <option value="donet">donet</option>
					  <option value="exc">Exchange</option>
					  <option value="rent">rent</option>
					  <option value="pay">pay</option>
					</select>
					</div>

					<div class="field-wrap"  style=" height: 7%; ">
	    				<label>
	    					Name of Book <i>(if Exchange selected*)</i>
	    				</label>
    					<input type="text" name = "bookToExchange" autocomplete="off" />
    				</div>

    				<div class="field-wrap"  style=" height: 7%; ">
	    				<label>
	    					Payment <i>(if pay type selected*)</i> 
	    				</label>
    					<input type="text" name = "payRate" autocomplete="off" />
    				</div>

    				<div class="field-wrap"  style=" height: 7%; ">
	    				<label>
	    					Time lenth (in month) of Rent <i>(if rent is selected*)</i> 
	    				</label>
    					<input type="text" name = "rentTime" autocomplete="off" />
    				</div>

	    			<div class="field-wrap"  style=" height: 7%; ">
	                 	<input type="file" name="image" />
	                </div>


    			<!-- <div class = "top-row"> -->


    					<input  style=" height: 8%; " type="submit" name="savebtn" class="button button-block" value="Save it"/>
    				
    			<!-- </div>  -->
    		</form>
    		</div>
    		
    	</div>
    </section>

    
    <?php

    	include('../connect.php');

    	if(isset($_POST['savebtn']))
    	{
    		if(getimagesize($_FILES['image']['tmp_name']) == false)
    			$image = "no Image";
    		else{
    		$image = addslashes($_FILES['image']['tmp_name']);
          //$image = addslashes($_FILES['image']['name']);
          	$image = file_get_contents($image);
          	$image = base64_encode($image);
          }
          
         	$timestamp = time()+3600*6;
			$dt = gmdate("Y/m/d H:i:s",$timestamp);
            
          

          //echo $dt;
			if($_POST['exchange'] == 'donet'){
        	$sql = "INSERT INTO `book`( `title`, `ISBN`, `quantity`, `price`, `status`, `edition`, `owner_id`, `image`, `time`, `exchange_type`, `Author`, `Categore`, `Publisher`) VALUES ('".$_POST['title']."', '".$_POST['ISBN']."', '".$_POST['Quantity']."', '".$_POST['Price']."', '".$_POST['Status']."','".$_POST['Edition']."', '$id', '$image','$dt', '".$_POST['exchange']."')";
        	}
        	else if($_POST['exchange'] == 'exc'){
        		$sql = "INSERT INTO `book`( `title`, `ISBN`, `quantity`, `price`, `status`, `edition`, `owner_id`, `image`, `time`, `exchange_type`, `bookToExchange`,  `Author`, `Categore`, `Publisher`) VALUES ('".$_POST['title']."', '".$_POST['ISBN']."', '".$_POST['Quantity']."', '".$_POST['Price']."', '".$_POST['Status']."','".$_POST['Edition']."', '$id', '$image','$dt','".$_POST['exchange']."')";
        	}
        	else if($_POST['exchange'] == 'pay')
        	{
        		$sql = "INSERT INTO `book`(`title`, `ISBN`, `quantity`, `price`, `status`, `edition`, `owner_id`, `image`, `time`, `exchange_type`, `bookToExchange`, `payment`,  `Author`, `Categore`, `Publisher`) VALUES ('".$_POST['title']."', '".$_POST['ISBN']."', '".$_POST['Quantity']."', '".$_POST['Price']."', '".$_POST['Status']."','".$_POST['Edition']."', '$id', '$image','$dt','".$_POST['exchange']."','".$_POST['payRate']."')";
        	}
        	else if($_POST['exchange'] == 'rent')
        	{
        		$sql = "INSERT INTO `book`( `title`, `ISBN`, `quantity`, `price`, `status`, `edition`, `owner_id`, `image`, `time`, `exchange_type`, `bookToExchange`, `rent`,  `Author`, `Categore`, `Publisher`) VALUES ('".$_POST['title']."', '".$_POST['ISBN']."', '".$_POST['Quantity']."', '".$_POST['Price']."', '".$_POST['Status']."','".$_POST['Edition']."', '$id', '$image','$dt','".$_POST['exchange']."','".$_POST['rentTime']."')";
        	}
        	else
        	{
        		$sql = "INSERT INTO `book`( `title`, `ISBN`, `quantity`, `price`, `status`, `edition`, `owner_id`, `image`, `time`, `exchange_type`,  `Author`, `Categore`, `Publisher`) VALUES ('".$_POST['title']."', '".$_POST['ISBN']."', '".$_POST['Quantity']."', '".$_POST['Price']."', '".$_POST['Status']."','".$_POST['Edition']."', '$id', '$image','$dt', 'donet', '".$_POST['Author']."', '".$_POST['Category']."', '".$_POST['Author']."')";
        	}
        ///////
        	$res = $conn->query($sql);

        	$sqlA = "INSERT INTO `author`( `name`) VALUES ('".$_POST['Author']."')";
        	$resA = $conn->query($sqlA);
        	$sqlC = "INSERT INTO `category`( `name`) VALUES ('".$_POST['Category']."')";
        	$resC = $conn->query($sqlC);
        	$sqlP = "INSERT INTO `publisher`( `name`) VALUES ('".$_POST['Author']."')";
        	$resP = $conn->query($sqlP);
        	
	        mysqli_close($conn);
	            if(!$res) {
	                echo "<script>
	                        alert('Something went worng!');
	                        window.location.href='add_book.php';
	                    </script>";
	            }
	            else{
	                echo "<script>
	                        alert('Book has bee added to database.');
	                        window.location.href='add_book.php';
	                    </script>";    
	            }
	            $conn = null;
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
                <div class="col-sm-6">
                    <div class="pull-left">
                        © Copyright Company 2015 | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a>
                    </div>
                </div>
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
        $(document).ready(function() {
            $('.custom-menu a[href^="#"], .intro-scroller .inner-link').on('click', function(e) {
                e.preventDefault();

                var target = this.hash;
                var $target = $(target);

                $('html, body').stop().animate({
                    'scrollTop': $target.offset().top
                }, 900, 'swing', function() {
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

            $(".nav a").on("click", function() {
                $(".nav").find(".active").removeClass("active");
                $(this).parent().addClass("active");
            });

            $('body').append('<div id="toTop" class="btn btn-primary color1"><span class="glyphicon glyphicon-chevron-up"></span></div>');
            $(window).scroll(function() {
                if ($(this).scrollTop() != 0) {
                    $('#toTop').fadeIn();
                } else {
                    $('#toTop').fadeOut();
                }
            });
            $('#toTop').click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, 700);
                return false;
            });

        });
    </script>

    <script>
        function gallery() {};

        var $itemsHolder = $('ul.port2');
        var $itemsClone = $itemsHolder.clone();
        var $filterClass = "";
        $('ul.filter li').click(function(e) {
            e.preventDefault();
            $filterClass = $(this).attr('data-value');
            if ($filterClass == 'all') {
                var $filters = $itemsClone.find('li');
            } else {
                var $filters = $itemsClone.find('li[data-type=' + $filterClass + ']');
            }
            $itemsHolder.quicksand(
                $filters, {
                    duration: 1000
                },
                gallery
            );
        });

        $(document).ready(gallery);
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            inicializemap()

            $('#contactForm').on('submit', function(e) {
                e.preventDefault();
                e.stopPropagation();

                // get values from FORM
                var name = $("#name").val();
                var email = $("#email").val();
                var message = $("#message").val();
                var goodToGo = false;
                var messgaeError = 'Request can not be send';
                var pattern = new RegExp(/^(('[\w-\s]+')|([\w-]+(?:\.[\w-]+)*)|('[\w-\s]+')([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);


                if (name && name.length > 0 && $.trim(name) != '' && message && message.length > 0 && $.trim(message) != '' && email && email.length > 0 && $.trim(email) != '') {
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
                        success: function(response) {
                            if (response == 1) {
                                $('#success').html('<div class="col-md-12 text-center">Your email was sent successfully</div>');
                                window.location.reload();
                            } else {
                                $('#success').html('<div class="col-md-12 text-center">E-mail was not sent. Please try again!</div>');
                            }
                        },
                        error: function(e) {
                            $('#success').html('<div class="col-md-12 text-center">We could not fetch the data from the server. Please try again!</div>');
                        },
                        complete: function(done) {
                            console.log('Finished');
                        },
                        type: 'POST',
                        url: '../js/send_email.php',
                    });
                    return true;
                } else {
                    $('#success').html('<div class="col-md-12 text-center">' + messgaeError + '</div>');
                    return false;
                }
                return false;
            });
        });





        $("<style type='text/css'>#boxMX{display:none;background: #333;padding: 10px;border: 2px solid #ddd;float: left;font-size: 1.2em;position: fixed;top: 50%; left: 50%;z-index: 99999;box-shadow: 0px 0px 20px #999; -moz-box-shadow: 0px 0px 20px #999; -webkit-box-shadow: 0px 0px 20px #999; border-radius:6px 6px 6px 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px; font:13px Arial, Helvetica, sans-serif; padding:6px 6px 4px;width:300px; color: white;}</style>").appendTo("head");

		function alertMX(t){
		$( "body" ).append( $( "<div id='boxMX'><p class='msgMX'></p><p>CLOSE</p></div>" ) );
		$('.msgMX').text(t); var popMargTop = ($('#boxMX').height() + 24) / 2, popMargLeft = ($('#boxMX').width() + 24) / 2; 
		$('#boxMX').css({ 'margin-top' : -popMargTop,'margin-left' : -popMargLeft}).fadeIn(600);
		$("#boxMX").click(function() { $(this).remove(); });  };
    </script>

     <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="../js/signUp.js"></script>
</body>

</html>