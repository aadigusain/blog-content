<?php


include('head.php');
 
include('inc/header.php');

$saveMessage ="";



$id= $_REQUEST['id'];


if(isset($_POST['categoryUpdate'])) {

     $cat= $_POST['categoryCat'];
     $sub= $_POST['categorySub'];
     $url= $_POST['categoryUrl'];
	 	 $url = strtolower($url);
	$url =  str_replace(" ","",$url );
	$url = str_replace("/", "",$url );
	$url = str_replace(".", "",$url );
	$url = str_replace("&", "and",$url );

 $saveMessage = updatesub($con,$cat,$sub,$url,$id);
}



$limit ="";
$where ="WHERE id = '$id' ";
foreach(showsub($con,$limit,$where) as $aadi) {

$catp = $aadi['catid'];
$urlp = $aadi['title'];
$subp = $aadi['sub'];
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
					<h3 class="panel-title">Edit Category</h3>
				  </div>
				  <div class="panel-body">
				  
					<form method="post" id="postForm">							
						<?php if ($saveMessage != '') { ?>
							<div id="login-alert" class="alert alert-success col-sm-12"><?php echo $saveMessage; ?></div>                            
						<?php } ?>
						
						
						
						<div class="form-group">
							<label for="title" class="control-label">Category Name</label>
							
<select class="form-control" id="categoryCat" name="categoryCat"    required >
<?php					

$sql = "SELECT * FROM category ORDER BY id ASC";
 
	
$result = $con->query($sql);

$output="<option >Select</option>";


if ($result->num_rows > 0 ) {
// output data of each row
while($row = $result->fetch_assoc()) {

if($row['id']== $catp){
	$output= $output.'<option selected value="'.$row['id'].'">	'.$row['cat'].' </option>';  
}
else {
$output= $output.'<option value="'.$row['id'].'">	'.$row['cat'].' </option>';  
                                   
}
}
}
echo $output;
									
                                  ?>
      </select>							
						</div>
						
						<div class="form-group">
							<label for="title" class="control-label">Sub Category Name</label>
							<input type="text" class="form-control" id="categorySub" name="categorySub" placeholder="Sub Category name.." value="<?php echo $subp; ?>" required>							
						</div>

<div class="form-group">
							<label for="title" class="control-label">Sub Category Url (SEO)</label>
							<input type="text" class="form-control" id="categoryUrl" name="categoryUrl"  placeholder="Sub Category URL.." value="<?php echo $urlp; ?>" required>							
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
