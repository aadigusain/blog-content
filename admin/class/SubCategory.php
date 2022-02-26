<?php

//include '../database.php';

function countsub($con) {
	
 $sql_query = "select id from subcat";
        $result = mysqli_query($con ,$sql_query);
        $count = mysqli_num_rows($result);

		echo $count;
		
}

function showsub($con,$limit,$where) {
		

           $sql = "SELECT * FROM subcat $where order by id DESC  $limit";  





$json = array ();

$result = $con->query($sql);
if ($result->num_rows > 0 ) {
// output data of each row
while($row = $result->fetch_assoc()) {
	
$sqlc = "SELECT * FROM category where id=".$row['cat'];	
	
$resultc = $con->query($sqlc);
if ($resultc->num_rows > 0 ) {
// output data of each row
while($rowc = $resultc->fetch_assoc()) {	
	
	$cat = $rowc['cat'];
}}

$array = array("id" => $row['id'], "cat" => $cat, "sub" => $row['sub'], "catid" => $row['cat'], "title" => $row['title']);
array_push($json, $array);
	
}
}
return $json;
}


function createsub($con,$cat,$sub,$url) {
	
	$sql = "INSERT INTO subcat (cat, sub,  title)
VALUES ('$cat', '$sub', '$url')";

if (mysqli_query($con, $sql)) {
  $saveMessage = "New record created successfully";
} else {
  $saveMessage = "Error: " . $sql . "<br>" . mysqli_error($con);
}
return $saveMessage;
}


function updatesub($con,$cat,$sub,$url,$id) {
	
$sql = "UPDATE subcat SET cat='$cat', sub='$sub', title='$url'  WHERE id =$id";

if (mysqli_query($con, $sql)) {
  $saveMessage = "Sub Category updated successfully";
} else {
  $saveMessage = "Error: " . $sql . "<br>" . mysqli_error($con);
}
return $saveMessage;
}


?>