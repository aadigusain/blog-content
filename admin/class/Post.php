<?php

//include '../database.php';

function countpost($con) {
	
 $sql_query = "select id from blog";
        $result = mysqli_query($con ,$sql_query);
        $count = mysqli_num_rows($result);

		echo $count;
		
}

function showpost($con,$where,$limit) {
	
	

           $sql = "SELECT * FROM blog $where order by id DESC $limit";  





$json = array ();

$result = $con->query($sql);
if ($result->num_rows > 0 ) {
// output data of each row
while($row = $result->fetch_assoc()) {
$id = $row['id'];

$catid = $row['cat'];
$subid = $row['sub'];
$authorid = $row['author'];
$datea = $row['date'];
$date = date_create($row['date']);


$datep = date_format($date,"d-M-Y");

$heading = $row['heading'];
$paragraph = $row['paragraph'];
$file = $row['file'];
$tag = $row['tag'];

$url = $row['url'];

$descrpt = $row['descrpt'];



$sqlauthor = "SELECT * FROM author where id=". $authorid;
mysqli_set_charset( $con, 'utf8');
$resultauthor = $con->query($sqlauthor);
if ($resultauthor->num_rows > 0 ) {
// output data of each row
while($rowauthor = $resultauthor->fetch_assoc()) {

$author = $rowauthor['name'];
}
}



$sqlcat= "SELECT * FROM category where id='".$catid."'";
mysqli_set_charset( $con, 'utf8');
$resultcat = $con->query($sqlcat);
if ($resultcat->num_rows > 0 ) {
// output data of each row
while($rowcat = $resultcat->fetch_assoc()) {
	
	$cat = $rowcat['cat'];


}}


if ($subid == "")
		
		{
			$sub ="NULL";
		}
		else
	{
	
$sqlsub= "SELECT * FROM subcat where id='".$subid."'";
mysqli_set_charset( $con, 'utf8');
$resultsub = $con->query($sqlsub);
if ($resultsub->num_rows > 0 ) {
// output data of each row
while($rowsub = $resultsub->fetch_assoc()) {
	
	$sub = $rowsub['sub'];


}}
	}

 $tags ="";
 $aadi = explode(", ",$tag); 
									
						foreach($aadi as $tag)
									{
									if ($tag !="")
										{
			$sqltag = "SELECT * FROM tags where id = '$tag'";
 
	
$resulttag = $con->query($sqltag);

if ($resulttag->num_rows > 0 ) {
// output data of each row
while($rowtag = $resulttag->fetch_assoc()) {	

$tag =$rowtag['tag'];
}}							
										$tags = $tag.", ".$tags;
										}	
									}
										
					


$array = 
array("id" => "$id",           
"date" => "$datep",             
"datep" => "$datea",             
"catid" => "$catid",             
"subid" => "$subid",             
"authorid" => "$authorid",             
"heading" => "$heading",       
"file" => "$file",       
"tag" => "$tags",               
"url" => "$url",             
"descrpt" => "$descrpt",       
"paragraph" => "$paragraph",                 
"cat" => "$cat",
"sub" => "$sub",
"author" =>"$author"); 



array_push($json, $array);


}
}


return $json;
}

function createpost($con,$cat,$sub,$paragraph,$heading,$tags,$author,$img,$date,$descrpt,$meta) {
	
$sql = "INSERT INTO blog (cat, sub, paragraph, heading, tag, author, file, date, descrpt, url) 
	VALUES ('$cat', $sub, '$paragraph', '$heading', '$tags', '$author', '$img' , '$date', '$descrpt', '$meta')";
	

if (mysqli_query($con, $sql)) {
  $saveMessage = "New record created successfully";
} else {
  $saveMessage = "Error: " . $sql . "<br>" . mysqli_error($con);
}
return $saveMessage;
}


function updatepost($con,$cat,$sub,$paragraph,$heading,$tags,$author,$img,$date,$descrpt,$meta,$id) {
	
$sql = "UPDATE blog SET cat = '$cat', sub = '$sub', paragraph = '$paragraph', heading = '$heading', tag = '$tags', author = '$author', date = '$date', descrpt = '$descrpt', url = '$meta' $img WHERE id =$id";

if (mysqli_query($con, $sql)) {
  $saveMessage = "Blog updated successfully";
} else {
  $saveMessage = "Error: " . $sql . "<br>" . mysqli_error($con);
}
return $saveMessage;
}
?>