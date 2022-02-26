<?php


include('head.php');
 
include('inc/header.php');

$saveMessage ="";



$id= $_REQUEST['id'];



$limit ="";
$where ="WHERE id = '$id' ";


foreach(showpost($con,$where,$limit) as $aadi) {

$id = $aadi['id'];

$cat = $aadi['catid'];
$sub = $aadi['subid'];
$author = $aadi['authorid'];
$date = $aadi['datep'];

$heading = $aadi['heading'];
$paragraph = $aadi['paragraph'];
$file = $aadi['file'];
$tag = $aadi['tag'];

$url = $aadi['url'];

$descrpt = $aadi['descrpt'];
}


?>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />

<link href="css/style.css" rel="stylesheet" type="text/css" >

	<link href="css/demo_style.css" rel="stylesheet" type="text/css">

<link href="css/smart_wizard.css" rel="stylesheet" type="text/css">

		 
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
					<h3 class="panel-title">Edit Post</h3>
				  </div>
				  <div class="panel-body" >
		 
<div id="login-alert" class="alert  hidden col-sm-12">10% Uploading</div>		  
	
			  
					<form method="post" id="postForm">	
	<div id="wizard1" class="swMain">
  			<ul>
  				<li><a href="#step-1">
                <label class="stepNumber">1</label>
                <span class="stepDesc">
                  &nbsp;Type<br />
                   <small>&nbsp;Enter Type Detail</small>
                </span>
            </a></li>
  				<li><a href="#step-2">
                <label class="stepNumber">2</label>
                <span class="stepDesc">
                   &nbsp;Blog<br />
                   <small>&nbsp;Enter Blog Detail</small>
                </span>
            </a></li>
  				<li><a href="#step-3">
                <label class="stepNumber">3</label>
                <span class="stepDesc">
                  &nbsp;SEO<br />
                   <small>&nbsp;Enter SEO Detail</small>
                </span>                   
             </a></li>
  				
  			</ul>
<div >
              
                <section id="step-1">
                    <div class="form-group">
					<input type="text" class="hidden" id="BlogId" value="<?php echo $id; ?>">
							<label for="title" class="control-label">Category Name</label>
							
<select class="form-control" id="categoryCat" name="categoryCat"  required>
<?php					

$sql = "SELECT * FROM category ORDER BY id ASC";
 
	
$result = $con->query($sql);

$output="<option >Select</option>";


if ($result->num_rows > 0 ) {
// output data of each row
while($row = $result->fetch_assoc()) {


if($cat == $row['id'] ) {
	$output= $output.'<option selected value="'.$row['id'].'">	'.$row['cat'].' </option>';  
}
else{
$output= $output.'<option value="'.$row['id'].'">	'.$row['cat'].' </option>';  
}                                  ;
}
}
echo $output;
									
                                  ?>
      </select>		

</div>
<div class="form-group " style="display:none">
							<label for="title" class="control-label">Sub Category Name</label>
							
<select class="form-control" id="categorySub" name="categorySub"  required>
<?php					

$sql = "SELECT * FROM subcat ORDER BY id ASC";
 
	
$result = $con->query($sql);

$output="<option >Select</option>";


if ($result->num_rows > 0 ) {
// output data of each row
while($row = $result->fetch_assoc()) {
if($row['cat'] == $cat) {

if($sub == $row['id'] ) {
	$output= $output.'<option selected value="'.$row['id'].'">	'.$row['sub'].' </option>';  
}
else{
$output= $output.'<option value="'.$row['id'].'">	'.$row['sub'].' </option>';  
}      }                            ;
}
}
echo $output;
									
                                  ?>
      </select>	
</div>	


<div class="form-group">
							<label for="title" class="control-label">Author Name</label>
							
<select class="form-control" id="Author" name="Author"  required>
<?php					

$sql = "SELECT * FROM author ORDER BY id ASC";
 
	
$result = $con->query($sql);

$output="<option >Select</option>";


if ($result->num_rows > 0 ) {
// output data of each row
while($row = $result->fetch_assoc()) {

if($author== $row['id'] ) {
	$output= $output.'<option selected value="'.$row['id'].'">	'.$row['name'].' </option>';  
}
else{
$output= $output.'<option value="'.$row['id'].'">	'.$row['name'].' </option>';  
}                                  ;
}
}
echo $output;
									
                                  ?>
      </select>	
</div>  
                </section>

  
                <section id="step-2">
                    
					
					<div class="form-group">
							<label for="title" class="control-label">Blog Heading</label>
							<input type="text" class="form-control" id="heading" name="heading" placeholder="Blog Heading.." value="<?php echo $heading;?>" required>							
						</div>
						
	<div class="form-group">
							<label for="title" class="control-label">Blog File</label>


<span id="authorImage" class="hidden">
<div class="form-control" style="padding:0;">
<label for="image"  class="span">Choose File....</label>
  <input type="file"  class="custom-file-input hidden" id="image" required accept="video/mp4, audio/mp3, image/* ">
  <label for="image" class="btn btn-default upload">Upload</label>
</div>
  </span>
 

 <span id="authorImageChange"  >
  <div class="row">
  <div class="col-md-6 text-center" id="preview">
  
  <?php
// echo $file;
  if(strpos("$file","jpg") != "" || strpos("$file","jpeg") != "" || strpos("$file","png") != "")
  { ?>
<img src="../<?php echo $file;?>" class="img-thumbnail" width="300" id="imagePreview" >
 
 <?php
  }
 else if(strpos("$file","mp4") != "" )
  { ?>
<video controls width="100%"> <source src="../<?php echo $file;?>" type="video/mp4"  ></video>

<?php
  }
else if(strpos("$file","mp3") != "" )
  { ?>
<audio controls width="100%" style="margin-top:20px;"> <source src="../<?php echo $file;?>" type="audio/mp3"  ></audio>

<?php
  }
 ?>
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

<div class="form-group">
							<label for="title" class="control-label">Blog Schedule Date </label>
							<input type="date" class="form-control" id="date" name="date" value="<?php echo $date ?>" required >							
						</div>					
						

<div class="form-group">
							<label for="title" class="control-label">Blog Paragraph</label>
							<textarea rows="4" class="form-control" id="paragraph" name="paragraph"  placeholder="Blog Paragraph.." ><span><?php echo htmlspecialchars($paragraph); ?></span></textarea>							
						</div>


					
					</section>

            
                <section id="step-3">
                    <div class="form-group">
							<label for="title" class="control-label">Blog URL</label>
							<input type="text" class="form-control" id="blogUrl" name="blogUrl" placeholder="Blog URL.." value="<?php echo $url;?>"  required>							
						</div>
						<div class="form-group">
							<label for="title" class="control-label">Blog Description </label>
							<textarea rows="4" class="form-control" id="description" name="description"  placeholder="Blog Description.."  required ><?php echo $descrpt;?></textarea>							
						</div>
						
						
						<div class="form-group ">
  <label for="title" class="control-label">Blog Tags</label>
      <div class="">
	  <div class="ad-multiselect " id="tag">
    <div class="ad-selectBox  " onclick="adshowCheckboxes()">
      <input type="text" class="custom-select form-control ad-select m-0" placeholder="Select Tags..." readonly style="cursor:default" id="adinput" value="<?php echo $tag;?>" >
      
    </div>
    <div id="adcheckboxes">
    <!--  <div class="custom-control custom-checkbox my-1 mr-sm-2">
    <input type="checkbox" class="custom-control-input" id="checkbox1" value="Awosome" name="checkbox" onclick="Checked()">
    <label class="custom-control-label ad-lebel" for="checkbox1">Awosome</label>
  </div> -->
  
 
  
  
  <?php					

$sql = "SELECT * FROM tags ORDER BY tag ASC";
 
	
$result = $con->query($sql);

$output= '';

$i=1;
if ($result->num_rows > 0 ) {
// output data of each row
while($row = $result->fetch_assoc()) {

$output= $output.'<div class="custom-control custom-checkbox my-1 mr-sm-2">
    <input type="checkbox" class="custom-control-input" id="checkbox'.$i.'" value="'.$row['tag'].'" name="checkbox" onclick="Checked()">
    <label class="custom-control-label ad-lebel" for="checkbox'.$i.'">'.$row['tag'].'</label>
  </div>';  
    $i++;                               ;
}

}
else {
	$output = '<div class="custom-control custom-checkbox my-1 mr-sm-2">
           No Tag Found...
  </div>';
}
echo $output;
									
                                  ?>
  </div>
    </div>
	</div>
    
    </div>
						
						
                </section>

                
            </div>			  
</div>			  
		  
							
					
							    
						
						
					
						
					<!--	<input type="button" name="categorySave" id="categorySave" class="btn btn-info" value="Save" onclick="uploadFile()" />		-->
 

						
					</form>	


  
				  
				 
				  
						
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>

</div>
</div>
<script src="js/option_sub.js"></script>
<script src="js/edit_blog.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
    	//  Wizard 1  	
        $('#wizard1').smartWizard({
            transitionEffect:'fade',
            onFinish:onFinishCallback,
            onLeaveStep  : leaveAStepCallback,
        });
        function leaveAStepCallback(obj, context){
            // To check and enable finish button if needed
            if (context.fromStep >= 2) {
                $('#wizard1').smartWizard('enableFinish', true);
            }
            return true;
        }
    	//  Wizard 2
      $('#wizard2').smartWizard({transitionEffect:'slide',onFinish:onFinishCallback});
      function onFinishCallback(){
       
      }     
		});
</script>	 
	 

        
     <script>
                $(function ()
                {
                    $("#wizard").steps({
                        headerTag: "h2",
                        bodyTag: "section",
                        transitionEffect: "slideLeft"
                    });
                });
            </script>
<script>
$(document).on("change", "#image", function(evt) {

  var file = URL.createObjectURL(this.files[0]);
  var fileval = this.files[0].name;
 

			
	
       var ext = fileval.replace(/^.*\./, '');
            ext = ext.toLowerCase();

 
	$('#authorImage').addClass('hidden');
	$('#authorImageChange').removeClass('hidden');
	
	
if(ext== "jpg" || ext== "png" || ext== "jpeg") {
		  $('#preview').html('<img src="../img/title.png" class="img-thumbnail " id="blogimagePreview" >');
		  $source = $('#blogimagePreview');
		    $source[0].src = URL.createObjectURL(this.files[0]);
            $source.parent()[0].load();
			
	}

if(ext== "mp4") {
	$('#preview').html('<video controls width="100%"> <source src="" type="video/mp4"  ></video>');
		  $source = $('video source');
		    $source[0].src = URL.createObjectURL(this.files[0]);
            $source.parent()[0].load();
}	

else {
	$('#preview').html('<audio controls width="100%" style="margin-top:20px;"> <source src="" type="audio/mp3"  ></audio>');
		  $source = $('audio  source');
		    $source[0].src = URL.createObjectURL(this.files[0]);
            $source.parent()[0].load();
}			
			
		

});

$(document).on("click", "#remove", function(evt) {

  
$('#image').val('');
	$('#authorImage').removeClass('hidden');

	$('#authorImageChange').addClass('hidden');
	var a= $('#image').val();
	  $('#imagePreview').attr('src','');
	
});

</script>
<script type="text/javascript">
			function Checked(){
				var items=document.getElementsByName('checkbox');
				var selectedItems="";
				for(var i=0; i<items.length; i++){
					if(items[i].type=='checkbox' && items[i].checked==true)
						selectedItems+=items[i].value+", ";
						
				}
				adinput.value=selectedItems;
			adform();
			
			
			}			
		</script>


<script>
var expanded = false;

function adshowCheckboxes() {
  var checkboxes = document.getElementById("adcheckboxes");
  if (!expanded) {
    adcheckboxes.style.display = "block";
    expanded = true;
  } else {
    adcheckboxes.style.display = "none";
    expanded = false;
  }
}
</script>
   
 <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>


<script type="text/javascript">
		CKEDITOR.replace( 'paragraph', {
            height: 300,
		
            filebrowserUploadUrl: "ajaxfile.php?type=file",
            filebrowserImageUploadUrl: "ajaxfile.php?type=image"
        } );
        
        
     </script>
	 
	 
<script type="text/javascript" src="js/jquery-2.0.0.min.js"></script>
<script type="text/javascript" src="js/jquery.smartWizard.js"></script>	


</body>
</html>


