<?php

function countauthor($con) {
	
 $sql_query = "select id from author";
        $result = mysqli_query($con ,$sql_query);
        $count = mysqli_num_rows($result);

		echo $count;
		
}

function showauthor($con,$where,$limit) {
		

           $sql = "SELECT * FROM author $where order by id DESC ";  





$json = array ();

$result = $con->query($sql);
if ($result->num_rows > 0 ) {
// output data of each row
while($row = $result->fetch_assoc()) {

$array = array("id" => $row['id'], "name" => $row['name'], "img" => $row['img'], "about" => $row['about']);
array_push($json, $array);
	
}
}
return $json;
}


function createauthor($con,$name,$about,$img) {
	
	$sql = "INSERT INTO author (name, about, img)
VALUES ('$name', '$about', '$img')";

if (mysqli_query($con, $sql)) {
  $saveMessage = "New record created successfully";
} else {
  $saveMessage = "Error: " . $sql . "<br>" . mysqli_error($con);
}
return $saveMessage;
}


function updateauthor($con,$name,$about,$img,$id) {
	
$sql = "UPDATE author SET name='$name', about='$about' $img WHERE id =$id";

if (mysqli_query($con, $sql)) {
  $saveMessage = "Author Profile updated successfully";
} else {
  $saveMessage = "Error: " . $sql . "<br>" . mysqli_error($con);
}
return $saveMessage;
}
?>