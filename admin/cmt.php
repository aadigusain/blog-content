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
					<h3 class="panel-title">Pendding Comments</h3>
				  </div>
				  <div class="panel-body">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-10">
								<h3 class="panel-title"></h3>
							</div>
							<div class="col-md-2" align="right">
						
								
<input type="text" name="search" id="contact-filter" placeholder="Search.." style="margin:10px 0;">								
							</div>
						</div>
					</div>
					<div class="table-responsive">
					<table  id="contact-table" class="table table-bordered table-striped">
						<thead>
							<tr>
								
								<th>Blog</th>
								<th>Name</th>
								<th>Email</th>
								<th>Website</th>
								<th>Comment</th>
								<th>Action</th>
									
							
									
							</tr>
							</thead>
							<tbody>
<?php	
$limit ="";
$where ="";

foreach(showcmt($con,$limit,$where) as $aadi) {

if($aadi['action'] == "approved")
{
$action = "<td class='text-success text-center'><b>Approved</b></td>";
}
else {
	$action = '<td style="width:200px"><a href="" onclick="cmtup('.$aadi['id'].')" class="btn btn-success ">Approve</a> &nbsp;&nbsp;<a href="" class="btn btn-danger" onclick="cmtdlt('.$aadi['id'].')">Delete</a></td>';
}

	
echo '<tr>
	<td>'.$aadi['blog'].'</td>
	<td>'.$aadi['name'].'</td>
	<td>'.$aadi['email'].'</td>
	<td>'.$aadi['web'].'</td>
	<td>'.$aadi['cmt'].'</td>
					
		'.$action.'					
																	
								

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
function cmtdlt(e) {

  var r = confirm("Are you Want Delete this Comment..?");
  if (r == true) {
	  
	   $.ajax

      ({

         type: "POST",

         url: "delete_cmt.php",

          data: {id: e},

         success: function(option)

         {
			 
             window.location.replace("cmt.php");

         }

      });
   // window.location.href = "delete_categories.php?id="+e;
  } else {
  
  }

}

function cmtup(e) {

  var r = confirm("Are you Want Approved this Comment..?");
  if (r == true) {
	  
	   $.ajax

      ({

         type: "POST",

         url: "update_cmt.php",

          data: {id: e},

         success: function(option)

         {
			 
             window.location.replace("cmt.php");

         }

      });
   // window.location.href = "delete_categories.php?id="+e;
  } else {
  
  }

}
</script>
</body>
</html>
