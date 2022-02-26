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
					<h3 class="panel-title">Sub Categories</h3>
				  </div>
				  <div class="panel-body">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-10">
								<h3 class="panel-title"></h3>
							</div>
							<div class="col-md-2" align="right">
								<a href="add_subcategories" class="btn btn-default">Add New</a>	
								
<input type="text" name="search" id="contact-filter" placeholder="Search.." style="margin:10px 0;">								
							</div>
						</div>
					</div>
					<div class="table-responsive">
					<table  id="contact-table" class="table table-bordered table-striped">
						<thead>
							<tr>
								
								<th>Sub Category</th>
								<th>Category</th>
																		
								<th>Action</th>
									
							</tr>
							</thead>
							<tbody>
<?php	
$limit ="";
$where ="";

foreach(showsub($con,$limit,$where) as $aadi) {


echo '<tr>
	<td>'.$aadi['sub'].'</td>
	<td>'.$aadi['cat'].'</td>
					
							
																	
								<td style="width:200px"><a href="edit_subcategories-'.$aadi['id'].'" class="btn btn-warning ">Edit</a> &nbsp;&nbsp;<a href="" class="btn btn-danger" onclick="catdlt('.$aadi['id'].')">Delete</a></td>

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
  
  <script>
function catdlt(e) {

  var r = confirm("Are you Want Delete this Sub Category...?");
  if (r == true) {
     $.ajax

      ({

         type: "POST",

         url: "delete_subcategories.php",

          data: {id: e},

         success: function(option)

         {
			 
             window.location.replace("sub_categories.php");

         }

      });
  } else {
  
  }

}
</script>
</body>
</html>
