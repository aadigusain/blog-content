<?php

include 'database.php';

$type = $_GET['type'];
$CKEditor = $_GET['CKEditor'];
$funcNum  = $_GET['CKEditorFuncNum'];

// Image upload
if($type == 'image'){
    
    $allowed_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["upload"]["name"], PATHINFO_EXTENSION);
    
	$url ="uploads/".uniqid().".".$file_extension;
	
    if(in_array(strtolower($file_extension),$allowed_extension)){

        if(move_uploaded_file($_FILES['upload']['tmp_name'], "../".$url)){
			
			$sql = "INSERT INTO uploads (img)
	VALUES ('$url')";
	

if (mysqli_query($con, $sql)) {
  




            // File path
            if(isset($_SERVER['HTTPS'])){
                $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
            }
            else{
                $protocol = 'http';
            }
             //$url = $protocol."://".$_SERVER['SERVER_NAME'] ."/".$url;
             $url = $protocol."://".$_SERVER['SERVER_NAME'] ."/ca/".$url;
			 
            echo '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
        }
        
    }
   
    exit;
}
}
?>