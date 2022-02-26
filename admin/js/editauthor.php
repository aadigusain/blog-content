<?php
 

include_once '../database.php';
include_once '../class/Post.php';
include_once '../class/Category.php';
include_once '../class/SubCategory.php';
include_once '../class/Tag.php';
include_once '../class/Author.php';


 $name =   $_POST["name"];
 

 $about =   $_POST['about'];
 $id =   $_POST['id'];


$about = htmlentities($about);


$about = htmlspecialchars($about, ENT_QUOTES);


if($_POST['filev'] == ""){
	$img="";
	$saveMessage = updateauthor($con,$name,$about,$img,$id);
}
else{
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
	
			$sql2 = "SELECT img FROM author WHERE id= '$id'";
$result2 = mysqli_query($con, $sql2);



if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
  
  
     $p= "../../".$row['img'];
	 
     unlink ( $p ) ;
	
}
}


	
	
	
 $img = ", img='$url'";	
 
   $saveMessage = updateauthor($con,$name,$about,$img,$id);
 
}
}

        
echo $saveMessage;
	

?>