<?php
 
include_once '../database.php';
include_once '../class/Post.php';
include_once '../class/Category.php';
include_once '../class/SubCategory.php';
include_once '../class/Tag.php';
include_once '../class/Author.php';
 

	$date = $_POST['date']; 
	

date_default_timezone_set("Asia/kolkata");
	$un = date("mis"); 


 $author =   "";

 $heading =  "";
 $paragraph =  "";
 $tag=  "";

	  $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      $file_ext= pathinfo($file_name, PATHINFO_EXTENSION); 
      $url= "img/post/".uniqid().".".$file_ext; 


if (!$file_tmp) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($file_tmp, "../../".$url)){

$img = $url;


	 $cat =   $_POST['cat'];
	 $sub =   $_POST['sub'];
	 if($sub != "NULL")
	 {
		 $sub = "'$sub'";
	 }
	 else {
		 $sub ="''";
	 }
 $paragraph =   $_POST['paragraph'];
 $heading =   $_POST['heading'];
    $heading = htmlspecialchars( $heading ,ENT_QUOTES);
 $tag =   $_POST['tag'];
 $tags ="";
 $aadi = explode(", ",$tag); 
									
						foreach($aadi as $tag)
									{
									if ($tag !="")
										{
			$sql = "SELECT * FROM tags where tag = '$tag'";
 
	
$result = $con->query($sql);

if ($result->num_rows > 0 ) {
// output data of each row
while($row = $result->fetch_assoc()) {	

$tag =$row['id'];
}}							
										$tags = $tag.", ".$tags;
										}	
									}
										
									
		

 $author=   $_POST['author'];

 $descrpt=   $_POST['descrpt'];
   $descrpt = htmlspecialchars( $descrpt ,ENT_QUOTES);
 $meta =  str_replace(" ","-",$_POST['url']);
 
 
	$meta = str_replace("/", "-",$meta);
	$meta = str_replace(".", "",$meta);
	$meta = str_replace("&", "and",$meta);
 
 
 $meta=  $meta."-".$un;
 


   $saveMessage = createpost($con,$cat,$sub,$paragraph,$heading,$tags,$author,$img,$date,$descrpt,$meta);

}

echo $saveMessage;
?>