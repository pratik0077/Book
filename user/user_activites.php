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
    $s_id = $row['id'];
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
        <link rel="stylesheet" href="../css/patros.css">
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
                        <li><a href="student.php">Home</a></li>
                        <li><a href="ask_for_book.php">Ask For Book</a></li>
                        <li><a href="add_book.php">Add Books</a></li>
                        <li><a href="book_request.php">Book Requests</a></li>
                        <li class="active"><a href="user_activites.php">My Activities</a></li>
                        <!-- <li><a href="#portfolio1">Portofolio</a></li> -->
                        <li><a href="profile.php">Profile</a></li>

                        <li><a href="../logout.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <section class="container blog">
            <div class="row">
                <!-- Blog Column -->
                <div class="col-md-12">
                    <h1 class="page-header sidebar-title">
                        Requested Books List
                        <div class="col-sm-3 col-md-3">
                            <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </h1>
                    <?php
                      $numberOfOrder = 0;
                      include("../connect.php");
                      $s = "SELECT count(id) as num from book_order where student_id = '$s_id'";
                      $r = $conn->query($s);

                      $ros = mysqli_fetch_assoc($r);
                      $numberOfOrder = $ros['num'];

                    ?>
                        <h3>Total requested :
                            <?php echo $numberOfOrder; ?>
                        </h3>
                        <?php
                    if($numberOfOrder > 0){
                    echo '<div style=" height: 360px; width: 100%; overflow: auto;"> 
                      <table > ';
                  }
                  else{
                    echo '';
                  }
                    ?>
                            <!-- <div style=" height: 500px; width: 100%; overflow: auto;"> 
                    <table >   -->
                            <!-- </div> -->
                            <?php
                      include("../connect.php");
                      if(isset($_POST['cancelBook'])){
                        //$timestamp = time()+3600*6;
                        //$created_date = gmdate("Y/m/d H:i:s",$timestamp);
                        
                        $sql = "DELETE FROM book_order where id = '".$_POST['order_id']."'";
                        $res = $conn->query($sql);
                        //$row = mysqli_fetch_assoc($res);



                        // $sqlOrder = "INSERT INTO `book_order`( `quentity`, `order_date`, `student_id`, `book_id`) VALUES ('".$row['quantity']."','$created_date','".$row['owner_id']."','".$_POST['book_id']."')";
                        // $resOrder = $conn->query($sqlOrder);
                        mysqli_close($conn);
                        if(!$res) {
                            echo "<script>
                          alert('Not deleted. ');
                          window.location.href='user_activites.php';
                      </script>";
                      }
                      else{
                          echo "<script>
                                  alert('Deleted.');
                                  window.location.href='user_activites.php';
                              </script>";    
                      }
                      $conn = null;
                    }
                    ?>



                                <?php
                        include("../connect.php"); 

                        //books show
                        //$i = 0;
                        $sqlBook = "SELECT * FROM book_order where student_id = '$s_id'";
                        $resultBook = $conn->query($sqlBook);
                        $rowO = mysqli_fetch_assoc($resultBook);
                        
                    while($rowO != NULL){
                      $sqlB = "SELECT * FROM book where id = '".$rowO['book_id']."'";
                        $resultB = $conn->query($sqlB);
                        $rowB = mysqli_fetch_assoc($resultB);

                       echo "
                       <tr>
                       <td>
                       <div class='floatSection'>
                       <div class='row blogu'>
                       <div class='col-sm-4 col-md-4 '>
                            <div style=' padding: 10px; border-radius: 5px;'>
                                <a href='#''>
                                    <img style=' border-radius: 5px;' src='data:image;base64,";echo $rowB['image'];echo"' alt='photo' width='280px' height='280px' >
                                    <input type='hidden' name='book_id' value='".$rowB['id']."'/>
                                </a>
                            </div>
                        </div>
                        <div class='col-sm-2 col-md-2'>
                            
                        </div>
                        <div class='col-sm-4 col-md-6'>
                        
                            <h2 >
                                <a href='#''>"; echo $rowB['title']; echo "</a>
                            </h2>
                            <p><i class='fa fa-calendar-o'></i>";echo $rowB['time'];echo " 
                                <span class='comments-padding'></span>
                                <i class='fa fa-comment'></i> Quantity: "; echo $rowB['quantity']; echo "
                            </p>
                            <p> Edition: ";
                            echo $rowB['edition']."</p><p>Status: ";
                            echo $rowB['status']."\n";
                            echo "
                            <form method='post' action = ''>
                              <div >
                                <input type='submit' class='buttonCustom buttonCustom2' name= 'cancelBook' value='Delete It'/>
                                <input type='hidden' name='order_id' value='".$rowO['id']."'/>
                              </div>
                            </form></p>
                        </div>
                        </div>
                        </div>
                        <br>
                        </td>

                        </tr>
                        
                        ";
                        //$i += 1;
                        $rowO = mysqli_fetch_assoc($resultBook);

                    }
                        $conn = null;



                       ?>

                                    </table>
                </div>
            </div>
            </div>
        </section>



        <section class="container blog">
            <div class="row">
                <!-- Blog Column -->
                <div class="col-md-12">
                    <h1 class="page-header sidebar-title">
                        Books added by me:
                    </h1>
                    <?php
                      $numberOfOrder = 0;
                      include("../connect.php");
                      $s = "SELECT count(id) as num from book where owner_id = '$s_id' ";
                      $r = $conn->query($s);

                      $ros = mysqli_fetch_assoc($r);
                      $numberOfOrder = $ros['num'];

                    ?>
                        <h3>Total added :
                            <?php echo $numberOfOrder; ?>
                        </h3>

                        <div style=" height: 400px; width: 100%; overflow: auto;">
                            <table>
                                <!-- <div style=" height: 500px; width: 100%; overflow: auto;"> 
                    <table >   -->

                                <?php
                      include("../connect.php");
                      if(isset($_POST['deleteBook'])){
                        //$timestamp = time()+3600*6;
                        //$created_date = gmdate("Y/m/d H:i:s",$timestamp);
                        
                        $sql = "DELETE FROM book_order where book_id = '".$_POST['book_id']."'";
                        $res = $conn->query($sql);

                        $sql1 = "DELETE FROM book where id = '".$_POST['book_id']."'";
                        $res1 = $conn->query($sql1);
                        //$row = mysqli_fetch_assoc($res);



                        // $sqlOrder = "INSERT INTO `book_order`( `quentity`, `order_date`, `student_id`, `book_id`) VALUES ('".$row['quantity']."','$created_date','".$row['owner_id']."','".$_POST['book_id']."')";
                        // $resOrder = $conn->query($sqlOrder);
                        mysqli_close($conn);
                        if(!$res1) {
                            echo "<script>
                          alert('Not deleted. ');
                          window.location.href='user_activites.php';
                      </script>";
                      }
                      else{
                          echo "<script>
                                  alert('Deleted.');
                                  window.location.href='user_activites.php';
                              </script>";    
                      }
                      $conn = null;
                    }
                    ?>



                                    <?php
                        include("../connect.php"); 

                        //books show
                        //$i = 0;
                        $sqlBook = "SELECT * FROM book where owner_id = '$s_id'";
                        $resultBook = $conn->query($sqlBook);
                        $rowB = mysqli_fetch_assoc($resultBook);
                        
                    while($rowB != NULL){
                       echo "
                       <tr>
                       <td>
                       <div class='floatSection'>
                       <div class='row blogu'>
                       <div class='col-sm-4 col-md-4 '>
                            <div style=' padding: 10px; border-radius: 5px;'>
                                <a href='#''>
                                    <img style=' border-radius: 5px;' src='data:image;base64,";echo $rowB['image'];echo"' alt='photo' width='280px' height='280px' >
                                    <input type='hidden' name='book_id' value='".$rowB['id']."'/>
                                </a>
                            </div>
                        </div>
                        <div class='col-sm-2 col-md-2 '>
                            
                        </div>
                        <div class='col-sm-4 col-md-6'>
                        <br>
                            <h2 >
                                <a href='#''>"; echo $rowB['title']; echo "</a>
                            </h2>
                            <p><i class='fa fa-calendar-o'></i>";echo $rowB['time'];echo " 
                                <span class='comments-padding'></span>
                                <i class='fa fa-comment'></i> Quantity: "; echo $rowB['quantity']; echo "
                            </p>
                            <p> Edition: ";
                            echo $rowB['edition']."</p><p>Status: ";
                            echo $rowB['status']."\n";
                            echo "
                            <form method='post' action = ''>
                              <div >
                                <input type='submit' class='buttonCustom buttonCustom2' name= 'deleteBook' value='Delete It'/>
                                <input type='hidden' name='book_id' value='".$rowB['id']."'/>
                              </div>
                            </form></p>
                        </div>
                        </div>
                        </div>
                        <br>
                        </td>

                        </tr>
                        
                        ";
                        //$i += 1;
                        $rowB = mysqli_fetch_assoc($resultBook);

                    }
                        $conn = null;



                       ?>
                                        <!-- </div> -->
                            </table>
                        </div>
                </div>
            </div>
        </section>

        <br>
        <br>
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
        </script>


    </body>

    </html>