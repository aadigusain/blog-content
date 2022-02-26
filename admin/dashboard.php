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
    <h3 class="panel-title" >New Update</h3>
  </div>
  <div class="panel-body">
   
   

    <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3> <?php countpost($con); ?></h3>
                        <p> Posts </p>
                    </div>
                    <div class="icon">
                       <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
                    </div>
                    <a href="posts" class="card-box-footer">View More <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
                </div>
            </div>

            
			    <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                        <h3> <?php countcat($con); ?></h3>
                        <p> Categories </p>
                    </div>
                    <div class="icon">
                       <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                    </div>
                    <a href="categories" class="card-box-footer">View More <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
                </div>
            </div>
			
			    <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                   <div class="inner">
                        <h3> <?php countauthor($con); ?></h3>
                        <p> Authors </p>
                    </div>
                    <div class="icon">
                       <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                    </div>
                    <a href="users" class="card-box-footer">View More <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
                </div>
            </div>
			
			    <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                        <h3> <?php counttag($con); ?></h3>
                        <p> Tags </p>
                    </div>
                    <div class="icon">
                       <i class="glyphicon glyphicon-tags" aria-hidden="true"></i>
                    </div>
                    <a href="tags" class="card-box-footer">View More <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
                </div>
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
</body>
</html>
