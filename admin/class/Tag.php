<?php

function counttag($con) {
	
 $sql_query = "select id from tags";
        $result = mysqli_query($con ,$sql_query);
        $count = mysqli_num_rows($result);

		echo $count;
		
}


function showtag($con,$limit,$where) {
		

           $sql = "SELECT * FROM tags  $where order by id DESC $limit";  





$json = array ();

$result = $con->query($sql);
if ($result->num_rows > 0 ) {
// output data of each row
while($row = $result->fetch_assoc()) {

$array = array("id" => $row['id'], "tag" => $row['tag']);
array_push($json, $array);
	
}
}
return $json;
}


function createtag($con,$tag) {
	
	$sql = "INSERT INTO tags (tag)
VALUES ('$tag')";

if (mysqli_query($con, $sql)) {
  $saveMessage = "New Tag created successfully";
} else {
  $saveMessage = "Error: " . $sql . "<br>" . mysqli_error($con);
}
return $saveMessage;
}

function updatetag($con,$tag,$id) {
	
$sql = "UPDATE tags SET tag='$tag'  WHERE id =$id";

if (mysqli_query($con, $sql)) {
  $saveMessage = "Tag updated successfully";
} else {
  $saveMessage = "Error: " . $sql . "<br>" . mysqli_error($con);
}
return $saveMessage;
}


?>