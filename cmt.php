<?php

include "database.php";



if(isset($_REQUEST['ans'])) {



$cmt = htmlspecialchars(strip_tags($_REQUEST['comment']));





if (!empty(strpos($_REQUEST['comment'] ,"http")) || strpos($_REQUEST['comment'] ,"http") === 0 ) {

    echo strpos($_REQUEST['comment'] ,"http");

    

echo  "<p>Dont Use http and Blank Field... !!</p>";

}

else {

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

}



}

else {

echo  "<p>Dont Use http and Blank Field... !!</p>";

}



?>