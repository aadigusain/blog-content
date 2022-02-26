<?php
 

include_once '../database.php';
include_once '../class/Post.php';
include_once '../class/Category.php';
include_once '../class/SubCategory.php';
include_once '../class/Tag.php';
include_once '../class/Author.php';


 $name =   $_POST["name"];
 

	  $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      $file_ext= pathinfo($file_name, PATHINFO_EXTENSION); 
      $url= "img/author/".uniqid().".".$file_ext; 


if (!$file_tmp) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($file_tmp, "../../".$url)){
	
	
$img = $url;

	
 $about =   $_POST['about'];

  
  $about = htmlspecialchars($about ,ENT_QUOTES);
  
  
   $saveMessage = createauthor($con,$name,$about,$img);
 
}

        
echo $saveMessage;
	

?>