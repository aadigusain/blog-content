<?php


include('head.php');
include('inc/header.php');


$id= $_REQUEST['id'];

$limit ="";
$where ="where id ='$id'";


foreach(showauthor($con,$where,$limit) as $aadi) {

$namep = $aadi['name'];
$aboutp = $aadi['about'];
$imgp = $aadi['img'];
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
					<h3 class="panel-title">Edit Author</h3>
				  </div>
				  <div class="panel-body">
				  
					<form method="post" id="postForm">							
					<input type="text" value="<?php echo $id;?>" id="AuthorId" class="hidden">
							<div id="login-alert" class="alert  col-sm-12 hidden">10% Uploading</div>    
						
						
						<div class="form-group">
							<label for="title" class="control-label">Author Name</label>
							<input type="text" class="form-control" id="AuthorName" name="AuthorName" placeholder="Author Name.." value="<?php echo $namep;?>" required>							
						</div>

<div class="form-group">
							<label for="title" class="control-label">Author About</label>
							<textarea rows="4" class="form-control" id="AuthorAbout" name="AuthorAbout"  placeholder="Author About.."  required><?php echo $aboutp;?></textarea>							
						</div>

<div class="form-group">
							<label for="title" class="control-label">Author Profile</label>


<span id="authorImage" class="hidden" >
<div class="form-control" style="padding:0;">
<label for="image"  class="span">Choose File....</label>
  <input type="file"  class="custom-file-input hidden" id="image"  accept="image/*" >
  <label for="image" class="btn btn-default upload">Upload</label>
</div>
  </span>
 

 <span id="authorImageChange"  >
  <div class="row">
  <div class="col-md-6 text-center">
  <img src="<?php echo "../".$imgp;?>" class="img-thumbnail" width="300" id="imagePreview" >
  </div>
   <div class="col-md-6  " >
<div class="edit">
  <label class="btn btn-warning" for="image">Change</label> &nbsp;&nbsp;
  <label class="btn btn-danger " id="remove">Remove</label>
</div>
  </div>
  </div>
  </span>
					
</div>						
						
						<input type="button" name="categorySave" id="categorySave" class="btn btn-info" value="Save" onclick="uploadFile()" />											
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
<script>
$(document).on("change", "#image", function(evt) {

  var file = URL.createObjectURL(this.files[0]);
  var fileval = this.files[0].name;
 

 
	$('#authorImage').addClass('hidden');
	$('#authorImageChange').removeClass('hidden');
		  $source = $('#imagePreview');
		    $source[0].src = URL.createObjectURL(this.files[0]);
            $source.parent()[0].load();
			
			

});

$(document).on("click", "#remove", function(evt) {

  
$('#image').val('');
	$('#authorImage').removeClass('hidden');

	$('#authorImageChange').addClass('hidden');
	var a= $('#image').val();
	  $('#imagePreview').attr('src','');
	
});
</script>
<script src="js/edit_author.js"></script>
</body>
</html>
