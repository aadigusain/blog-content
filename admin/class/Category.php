<?php

//include '../database.php';

function countcat($con) {
	
 $sql_query = "select id from category";
        $result = mysqli_query($con ,$sql_query);
        $count = mysqli_num_rows($result);

		echo $count;
		
}

function showcat($con,$limit,$where) {
		

           $sql = "SELECT * FROM category $where order by id DESC  $limit";  





$json = array ();
mysqli_set_charset( $con, 'utf8');
$result = $con->query($sql);
if ($result->num_rows > 0 ) {
// output data of each row
while($row = $result->fetch_assoc()) {

$array = array("id" => $row['id'], "cat" => $row['cat'], "title" => $row['title']);
array_push($json, $array);
	
}
}
return $json;
}


function createcat($con,$cat,$url) {
	
	$sql = "INSERT INTO category (cat, title)
VALUES ('$cat', '$url')";

if (mysqli_query($con, $sql)) {
  $saveMessage = "New record created successfully";
} else {
  $saveMessage = "Error: " . $sql . "<br>" . mysqli_error($con);
}
return $saveMessage;
}


function updatecat($con,$cat,$url,$id) {
	
$sql = "UPDATE category SET cat='$cat', title='$url'  WHERE id =$id";

if (mysqli_query($con, $sql)) {
  $saveMessage = "Category updated successfully";
} else {
  $saveMessage = "Error: " . $sql . "<br>" . mysqli_error($con);
}
return $saveMessage;
}


?>