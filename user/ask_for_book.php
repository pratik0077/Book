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
        <link rel="stylesheet" href="../css/patros.css" >
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        <style type="text/css">
          hr { 
              display: block;
              margin-top: 0.5em;
              margin-bottom: 0.5em;
              margin-left: auto;
              margin-right: auto;
              border-style: inset;
              border-width: 2px;
          } 
        </style>

        <script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","res.php?q="+str,true);
  xmlhttp.send();
}
</script>

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
                        <li ><a href="student.php ">Home</a></li>
                        <li class="active"><a href="ask_for_book.php">Ask For Book</a></li>
                        <li><a href="add_book.php">Add Books</a></li>
                        <li><a href="book_request.php">Book Requests</a></li>
                        <li><a href="user_activites.php">My Activities</a></li>
                        <!-- <li><a href="#portfolio1">Portofolio</a></li> -->
                        <li><a href="profile.php">Profile</a></li>
                        
                        <li><a href="../logout.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>


<!-- <section id="about">
           <div class="container">
                <div class="text-center">
                   
                    
                </div>
            </div>

        </section> -->
            <!-- <section class="sec">
                <div id = "search">
                    <br>
                    <br>
                    <form action="" method="POST">
                        <input id="srhBox" type="text" name="user_input" placeholder="any search" size="">
                        <input id="u_btn" type="submit" name="name_search" value="search">
                        <br><br>
                    </form>
                </div> -->
                <!-- <div id="table_div"> -->



          

        <section class="container blog">
            <div class="row">
            <div class="col-md-12">
            <h2>
            Book List
            </h2>
            </div>
            </div>
            </div>
            <div class="row" >
                  <div class="col-sm-6 col-sm-offset-3">
                      <div id="imaginary_container"> 
                        <form action="" method="post">
                          <div class="input-group stylish-input-group">
                              <input type="text" class="form-control" id="search" style=" background-color: black; " autocomplete="off" placeholder="Search" onkeyup="showResult(this.value)" >
                              
                              <span class="input-group-addon">
                                  <button type="submit">
                                      <span class="glyphicon glyphicon-search"></span>
                                  </button>  
                              </span>
                              
                          </div>
                          </form>
                          <div class="resultDropdown" id = "livesearch"></div>
                      </div>
                  </div>
            </div>

            
            <br>
            <br>
            <br>
            <div class="row">
                <!-- Blog Column -->
                <div class="col-md-12">

                
                    <div style=" height: 500px; width: 100%; overflow: auto;"> 
                    <table >   
                     <!-- </div> -->
                    <?php
                      include("../connect.php");
                      if(isset($_POST['requestBook'])){
                        $timestamp = time()+3600*6;
                        $created_date = gmdate("Y/m/d H:i:s",$timestamp);
                       
                        $sql = "SELECT * FROM book where id = '".$_POST['book_id']."'";
                        $res = $conn->query($sql);
                        $row = mysqli_fetch_assoc($res);



                        $sqlOrder = "INSERT INTO `book_order`( `quentity`, `order_date`, `student_id`, `book_id`) VALUES ('".$row['quantity']."','$created_date','$s_id','".$_POST['book_id']."')";
                        $resOrder = $conn->query($sqlOrder);
                        mysqli_close($conn);
                        if(!$resOrder) {
                            echo "<script>
                          alert('Not registered. ');
                          window.location.href='ask_for_book.php';
                      </script>";
                      }
                      else{
                          echo "<script>
                                  alert('registered.');
                                  window.location.href='ask_for_book.php';
                              </script>";    
                      }
                      $conn = null;
                    }
                    ?>

                    <?php
                        include("../connect.php"); 

                        //books show
                        //$i = 0;
                        $sqlBook = "SELECT * FROM book";
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
                        <div class='col-sm-4 col-md-8'>
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
                                <input type='submit' class='buttonCustom buttonCustom2' name= 'requestBook' value='Request It'/>
                                <input type='hidden' name='book_id' value='".$rowB['id']."'/>
                              </div>
                            
                            
                              <div class='form-group'>
                                <button type='submit' class='buttonCustom buttonCustom2' name='reset'>Add to wish-list
                                </button>
                              
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
                $('.custom-menu a[href^=""], .intro-scroller .inner-link').on('click',function (e) {
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




