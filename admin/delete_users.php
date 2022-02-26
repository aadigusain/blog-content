<?php

include 'database.php';

$id =$_POST['id'];



		$sql2 = "SELECT img FROM author WHERE id= '$id'";
$result2 = mysqli_query($con, $sql2);



if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
  
  
     $p= "../".$row['img'];
	 
     unlink ("$p") ;
	
}
}


// sql to delete a record
$sql = "DELETE FROM author WHERE id=$id";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

?>