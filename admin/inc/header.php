<?php 
// Check user login or not
session_start();
if(!isset($_SESSION['admin'])){
    header('Location: index.php');
}
?>

<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Blog Dashbord</title>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- jQuery -->

<script>
  $(document).ready(function(){
      	
        $('#loader').fadeOut('10000');
  });
</script>