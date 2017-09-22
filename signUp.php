<?
  ini_set('mysql.connection_timeout',300);
  ini_set('default_socket_timeout',300);

?>
<!DOCTYPE html>
<html >
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
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/signUpStyle.css">

  
</head>

<body>
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
            <li ><a href="index.php">Home</a></li>
            <li><a href="resource.php">Resources</a></li>
            <li><a href="index.php #about">About</a></li>
            <li><a href="index.php #services">Services</a></li>
            <li><a href="index.php #meet-team">Team</a></li>
            <!-- <li><a href="#portfolio1">Portofolio</a></li> -->
            <li><a href="index.php #contact">Contact</a></li>
            
            <li class="active"><a href="signUp.php">Log In</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <br>
    <br>

    <!-- php works -->




 <?php

    session_start();
    include("connect.php"); 
    if(isset($_POST['logIn'])){
        $st_id = $_POST['u_id'];
        $pass = $_POST['u_pass'];
      
        $query = "SELECT * FROM `student` WHERE '$st_id'=id AND '$pass'= password ";
        $result = $conn->query($query);
        $row = mysqli_fetch_assoc($result);
        $type = $row['type'];
        if(mysqli_num_rows($result) > 0){
            if( $type == 'admin'){
                $_SESSION['id']=$row['id'];
                $_SESSION['type']=$row['type'];
                header('location: admin/admin_home.php');
            }elseif ($type == 'student') {
                 $_SESSION['id']=$row['id'];
                 $_SESSION['type']=$row['type'];
                 header('location: user/student.php');
            }
            else{
            echo " Something wrong!!!";}
        }
    }

 ?>





    
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
                  <form action="" method="post" enctype="multipart/form-data">
                  
                  <div class="top-row">
                    <div class="field-wrap">
                      <label>
                        First Name<span class="req">*</span>
                      </label>
                      <input type="text" name = "fstName" required autocomplete="off" />
                    </div>
                
                    <div class="field-wrap">
                      <label>
                        Last Name<span class="req">*</span>
                      </label>
                      <input type="text" name="lstName" required autocomplete="off"/>
                    </div>
                  </div>

                  <div class="field-wrap">
                    <label>
                      UIU ID<span class="req">*</span>
                    </label>
                    <input type="text" name = "s_id" required autocomplete="off" pattern="011[0-1][0-9][1-3][0-5][0-9][0-9]|021[0-1][0-9][1-3][0-5][0-9][0-9]|111[0-1][0-9][1-3][0-5][0-9][0-9]"/>
                  </div>

                  <div class="field-wrap">
                    <label>
                      Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name="s_mail" required autocomplete="off"/>
                  </div>
                  
                  <div class="field-wrap">
                    <label>
                      Set A Password<span class="req">*</span>
                    </label>
                    <input type="password" name="pass" required autocomplete="off"/>
                  </div>

                  <div class="field-wrap">
                    <label>
                      Confirm Password<span class="req">*</span>
                    </label>
                    <input type="password" name="con_pass" required autocomplete="off"/>
                  </div>

                  <div class="field-wrap">
                  
                  <input type="file" name="image" />
                  </div>
                  <div class="field-wrap">
                  <input  type="submit" name="signUp" class="button button-block" value="Get Started"/>
                  </div>
                  </form>


        </div>

        <?php
       include("connect.php");
       //echo "Database Connected";
       $isIn = '1';
       $passErr = "";
       $alertText = "";

    if(isset($_POST['signUp'])){
     // echo "\nSignup prassed";
        if(($_POST['pass']==$_POST['con_pass'])){

          $Username = $_POST['fstName'] ." ". $_POST['lstName'];

          $image = addslashes($_FILES['image']['tmp_name']);
          //$image = addslashes($_FILES['image']['name']);
          $image = file_get_contents($image);
          $image = base64_encode($image);
          
         
            
          

          

        $sql = "INSERT INTO student (name, id, email, password, image, type)
        VALUES ( '$Username', '".$_POST['s_id']."', '".$_POST['s_mail']."', '".$_POST['pass']."', '$image','student')";
        
        ///////
        $res = $conn->query($sql);
        mysqli_close($conn);
            if(!$res) {
                echo "<script>
                        alert('Not registered. May br registered.');
                        window.location.href='signUp.php';
                    </script>";
            }
            else{
                echo "<script>
                        alert('Welcome! you are now registered.');
                        window.location.href='index.php';
                    </script>";    
            }
            $conn = null;
        }
        else{
            $passErr = "* Passwords Don't Match";
        }
        echo $error;
    }

 ?>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
                  <form action="" method="post">
                  
                    <div class="field-wrap">
                    <label>
                      UIU ID <span class="req">*</span>
                    </label>
                    <input type="text" name ="u_id" required autocomplete="off"/>
                  </div>
                  
                  <div class="field-wrap">
                    <label>
                      Password<span class="req">*</span>
                    </label>
                    <input type="password" name = "u_pass" required autocomplete="off"/>
                  </div>
                  
                  <p class="forgot"><a href="#">Forgot Password?</a></p>
                  
                  <input type="submit" name="logIn" class="button button-block" value="Log In">
                  
                  </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->




    <!-- end php -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/signUp.js"></script>

</body>
</html>
