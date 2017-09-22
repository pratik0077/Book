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
    $pass = $row['password'];

?>

<html>
	<head>
		
        <title><?php echo $name ?></title>
		<link rel="stylesheet" type="text/css" href='../css/style.css'>
	</head>
	<body>
		<?php
       include("../connect.php");
       $isIn = '1';
       $passErr = "";
       $alertText = "";

    if(isset($_POST['Update_password'])){
        if(($_POST['Current_password']==$pass)){
          if(($_POST['Type_Newpassword']==$_POST['Retype_password'])){
            $newpass = $_POST['Type_Newpassword'];
        
        $sql = "UPDATE `student` SET password= '$newpass' WHERE id = '$id'";
       
        
        if ($conn->query($sql) === TRUE) {
         //echo "Record updated successfully";
        } else {
          //echo "Error updating record: " . $conn->error;
        }

          $conn->close();
        }
      }
    }
    ///*************************

    if(isset($_POST['Update_name'])){
        if(($_POST['Current_name']==$name)){
          if(($_POST['New_name']==$_POST['Retype_name'])){
            $newname = $_POST['New_name'];
        
        $sql = "UPDATE `student` SET name= '$newname' WHERE id = '$id'";
       
        
        if ($conn->query($sql) === TRUE) {
         //echo "Record updated successfully";
        } else {
          //echo "Error updating record: " . $conn->error;
        }

          $conn->close();
        }
      }
    }
    ///***************************************



    if(isset($_POST['Update_Email'])){
        if(($_POST['Current_Email_address']==$email)){
          if(($_POST['New_Email_address']==$_POST['Retype_Email_address'])){
            $newemail = $_POST['New_Email_address'];
        
        $sql = "UPDATE `student` SET email= '$newemail' WHERE id = '$id'";
       
        
        if ($conn->query($sql) === TRUE) {
         //echo "Record updated successfully";
        } else {
          //echo "Error updating record: " . $conn->error;
        }

          $conn->close();
        }
      }
    }

 ?>
		<div class="container">
			<?php include_once('../include/user_header.html');?>
			<nav class = "menu"> 
                 <ul>
                        <li> <a href="../user/student.php"> Home </a></li>
                        <li> <a href="../user/ask_for_book.php"> Ask for a Book </a></li>
                        <li > <a href="../user/add_book.php"> Add books </a></li>
                        <li > <a href="../user/book_request.php"> Book Requests </a></li>
                        <li> <a href="../user/user_activites.php"> Your Activities </a></li>
                        <li id = "current"> <a href="../user/user_settings.php"> Settings </a></li>
                        <li> <a href="#"> Contact Us </a></li>
                    </ul> 
            </nav>
		<section class="sec">
			<div id="My_account">
			<br>
            <nav>
                
              <ul>
                <li><a href="#">Name Change </a></li>
              </ul>
            </nav>
            <!-- </div> -->
                     <form method="post" action="" ><b>
                   
                        Name:<br>
                        <input id="srhBox" type="text" name="Current_name" placeholder="Current name"><br> <br>
                         <input id="srhBox" type="text" name="New_name" placeholder="new name "><br> <br>
                          <input id="srhBox" type="text" name="Retype_name" placeholder="Retype name "><br> <br>
                          <input id="u_btn" type="submit" name="Update_name" value="Update Name"></b>
            </form>
            <nav>
                
              <ul>
                <li><a href="#">Email Address Change </a></li>
              </ul>
            </nav>



            		<form method="post" action="" ><b>
                        Email address:
                        <br>
                        <input id="srhBox" type="text" name="Current_Email_address" placeholder="Current Email_address"><br><br>
                        <input id="srhBox" type="text" name="New_Email_address" placeholder="New Email_address"><br><br>
                        <input id="srhBox" type="text" name="Retype_Email_address" placeholder="Retype Email_address"><br><br>

                        <input id="u_btn" type="submit" name="Update_Email" value="Update Email"></b>
                    </form>

            <nav>
                
              <ul>
                <li><a href="#">Password Change(user) </a></li>
              </ul>
            </nav>
            
                     <form method="post" action="" ><b>
                   
                        User password :<br>
                        <input id="srhBox" type="password" name="Current_password" placeholder="Current password"><br> <br>
                        <!-- Type(New password): -->
                        <!-- <br> -->
                        <input id="srhBox" type="password" name="Type_Newpassword" placeholder="new password"><br><br>
                         <!-- Retype(password):<br> -->
                        <input id="srhBox" type="password" name="Retype_password" placeholder="Retype password"><br><br>                        
                        <input id="u_btn" type="submit" name="Update_password" value="Update Password"></b>
                    </form>
                </div>
		</section>
		</div>
		</body>
		</html>
