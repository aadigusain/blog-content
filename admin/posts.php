<?php

include('head.php');


include('inc/header.php');
?>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />

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
					<h3 class="panel-title">Post Listing</h3>
				  </div>
				  <div class="panel-body">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-10">
								<h3 class="panel-title"></h3>
							</div>
							<div class="col-md-2" align="right">
								<a href="add_post" class="btn btn-default">Add New</a>	
								
<input type="text" name="search" id="contact-filter" placeholder="Search.." style="margin:10px 0;">								
							</div>
						</div>
					</div>
					<div class="table-responsive">
					<table  id="contact-table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Heading</th>
								<th>Category</th>
							<!--	<th>Sub Category</th> -->
							
								<th>Author</th>
								<th>P. Date</th>	
																							
								<th>Action</th>
									
							</tr>
							</thead>
							<tbody>
<?php	
$limit ="";

$where="";
foreach(showpost($con,$where,$limit) as $aadi) {

echo '<tr>
	<td>'.$aadi['heading'].'</td>
								<td>'.$aadi['cat'].'</td>
					
							
								<td>'.$aadi['author'].'</td>
								<td>'.$aadi['date'].'</td>	
																	
								<td style="width:200px"><a href="edit_post-'.$aadi['id'].'" class="btn btn-warning ">Edit</a> &nbsp;&nbsp;<a href="" onclick="catdlt('.$aadi['id'].')" class="btn btn-danger">Delete</a></td>

</tr>';
}


?>						
							
						</tbody>
					</table>
					
					
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
function catdlt(e) {

  var r = confirm("Are you Want Delete this Post...?");
  if (r == true) {
	  
	   $.ajax

      ({

         type: "POST",

         url: "delete_post.php",

          data: {id: e},

         success: function(option)

         {
			 
             window.location.replace("posts.php");

         }

      });
   // window.location.href = "delete_categories.php?id="+e;
  } else {
  
  }

}
</script>

  <script src="js/filter-table.js"></script>
<script type="text/javascript" src="js/paginathing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($){

		$('.table tbody').paginathing({
	    perPage: 10,
	    insertAfter: '.table-responsive'
		});
	});
</script>
  <script>
  (function ($) {
    $(document).ready(function () {
      $('#contact-table').filterTable('#contact-filter');
    });
  })(jQuery);

  </script>

  
</body>
</html>
