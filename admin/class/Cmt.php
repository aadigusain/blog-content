<?php

//include '../database.php';

function countcmt($con) {
	
 $sql_query = "select id from cmt where action = 'review'";
        $result = mysqli_query($con ,$sql_query);
        $count = mysqli_num_rows($result);

		echo $count;
		
}

function showcmt($con,$limit,$where) {
		

           $sql = "SELECT * FROM cmt $where order by id DESC  $limit";  





$json = array ();

$result = $con->query($sql);
if ($result->num_rows > 0 ) {
// output data of each row
while($row = $result->fetch_assoc()) {



           $sql = "SELECT * FROM blog where id =".$row['blog'];  



$resultblog = $con->query($sql);
if ($resultblog->num_rows > 0 ) {
// output data of each row
while($rowblog = $resultblog->fetch_assoc()) {

$blog= $rowblog['heading'];

}
}

if($row['web'] == "")
{
	$web ="NULL";
}
else {
		$web = $row['web'];
}
$array = array("id" => $row['id'], "name" => $row['name'], "email" => $row['email'], "web" => $web, "cmt" => $row['cmt'], "action" => $row['action'], "blog" => $blog);
array_push($json, $array);
	
}
}
return $json;
}



?>