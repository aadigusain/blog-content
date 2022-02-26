
  <div id="loader"><div class="preloader">
        <div class="loader" id="loader-7"></div>
      </div>
      </div>

<nav class="navbar navbar-default">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand ad-nav" href="#" >NEWS Update</a>
	</div>
	<div id="navbar" class="collapse navbar-collapse">
	  <ul class="nav navbar-nav">
		<li class="active"><a href="index.php">Dashboard</a></li>		
	  </ul>
	  <?php 

	  if(!empty($_SESSION["admin"])) { ?>
	  <ul class="nav navbar-nav navbar-right">
		<li class="active"><a href="#">Welcome, <?php echo $_SESSION["name"]; ?></a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Logout</a></li>          
	  </ul>
	  <?php } ?>
	</div>
  </div>
</nav>
