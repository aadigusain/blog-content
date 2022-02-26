<?php


include('head.php');
 
include('inc/header.php');

$saveMessage ="";



$id= $_REQUEST['id'];


if(isset($_POST['categoryUpdate'])) {

     $tag= $_POST['tag'];

  $saveMessage = updatetag($con,$tag,$id);
}

$limit ="";
$where ="WHERE id = '$id' ";

foreach(showtag($con,$limit,$where) as $aadi) {

$tagp = $aadi['tag'];

}

?>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/posts.js"></script>	
<link href="css/style.css" rel="stylesheet" type="text/css" >  
</head>
<body>

<?php include "menus.php"; ?>


<section id="main">
  <div class="container-fulid" style="padding:10px;">
    <div class="row" style="margin:0;">
	
	<?php include "left_menus.php"; ?>
	
	
	
      <div class="col-md-10 pl" >
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Edit Tag</h3>
				  </div>
				  <div class="panel-body">
				  
					<form method="post" id="postForm">							
						<?php if ($saveMessage != '') { ?>
							<div id="login-alert" class="alert alert-success col-sm-12"><?php echo $saveMessage; ?></div>                            
						<?php } ?>
						
						<div class="form-group">
							<label for="title" class="control-label">Tag Name</label>
							<input type="text" class="form-control" id="tag" name="tag" placeholder="Tag Name.." value="<?php echo $tagp; ?>" required>							
						</div>

					
						
						<input type="submit" name="categoryUpdate" id="categoryUpdate" class="btn btn-info" value="Update" />											
					</form>				
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="insert-post-ads1" style="margin-top:20px;">
</div>
</div>
</body>
</html>
