<?php

include('head.php');

include 'inc/header.php';
?>
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
  <div class="panel-heading" >
    <h3 class="panel-title" >Upload Media</h3>
  </div>
  <div class="panel-body">
   
   

    <?php 
	
	

           $sql = "SELECT * FROM uploads order by id DESC ";  






$result = $con->query($sql);
if ($result->num_rows > 0 ) {
// output data of each row
while($row = $result->fetch_assoc()) {
			echo '<div class="col-lg-3 col-sm-6" style="margin-bottom:20px; position:relative;"><img src="../'.$row['img'].'" class="img-thumbnail" >
			<a href="" class="img-remove" onclick="dltimg('.$row['id'].')">
          &times;
        </a>
			</div>';
			
			
		}
	
	}
	else {
		echo "No Media File Uploaded...!!";
	}

		
?>

            
			    
			
	
        </div>
  

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
function dltimg(e) {

  var r = confirm("Are you Want Delete this Image...?");
  if (r == true) {
	  
	   $.ajax

      ({

         type: "POST",

         url: "delete_photo.php",

          data: {id: e},

         success: function(option)

         {
			 
             window.location.replace("photo.php");

         }

      });
   // window.location.href = "delete_categories.php?id="+e;
  } else {
  
  }

}
</script>
</body>
</html>
