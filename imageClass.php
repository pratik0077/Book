<?php
 include 'connect.php' ;

  class Image{

   var 
   //$image_id,
   ////$image_name,
   $image;
  
  function Insert_into_image(){
   if(isset($_FILES['txt_image']))
   {
        //$tempname = $_FILES['txt_image']['tmp_name'];
        //$originalname =$_FILES['txt_image']['name'];
        $size =($_FILES['txt_image']['size']/5242888). "MB<br>";
        $type=$_FILES['txt_image']['type'];
        $image=$_FILES['txt_image']['name'];
        move_uploaded_file($_FILES['txt_image']['name'],"images/".$_FILES['txt_image']['name']);
      }
  

    
  }

}
?>