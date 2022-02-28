<?php
include "database.php";



$cmt = $_REQUEST['comment'];
	$name = $_REQUEST['name'];
	$web = $_REQUEST['website'];
	$email = $_REQUEST['email'];
	$ans = $_REQUEST['ans'];
	$action ="review";
	
	
$sql = "INSERT INTO cmt (name, email, web, cmt, action,	blog)
VALUES ('$name', '$email', '$web', '$cmt', '$action', '$ans')";


if (mysqli_query($con, $sql)) {
header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
}


?>