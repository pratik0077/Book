<?php
	$q = $_GET['q'];

include("../connect.php");

//echo $q;
$sql="SELECT * FROM book WHERE title LIKE '%$q%' ";
$result = $conn->query($sql);
if($result != null)
{
	//echo $q;
 echo '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Book Name</th>
     
    </tr>
 ';

 while($row = mysqli_fetch_array($result))
 {
  echo '
   <tr>
    <td><a href="book.php?selected_book='.$row['title'].'">'.$row["title"].'</a></td>
    
   </tr>
  ';
 }
}
else
{
 echo 'Data Not Found';
}

?>
