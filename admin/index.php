<?php
session_start();
include_once 'database.php';


// Check user login or not
if(!isset($_SESSION['admin'])){


$v="";
if(isset($_POST['login'])){
     
    $uname = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
 

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as user from login where username='".$uname."' and password='".$password. "'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['user'];
        
        $sql_query2 = "select * from login where username='".$uname."'";
        $result2 = mysqli_query($con,$sql_query2);
        $row2 = mysqli_fetch_array($result2);

        $name = $row2['name'];


        if($count > 0){
            $_SESSION['admin'] = $uname;
            $_SESSION['name'] = $name;
            
                
                echo "<script>location.href='dashboard.php' </script>";
                
                  
        }else{
            $v ="Invalid Username and Password...!!!";
        }

    }

}


?>
<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/style.css" >
<!-- jQuery -->
<title>News Login</title>
</head>
<body style="background:white !important">

	
	
<div class="container login">	
	
	<div class="log-info">                    
		<div class="panel panel-info">
			<div class="panel-heading" style="background:#00796B;color:white;">
				<div class="panel-title">Admin Login</div>                        
			</div> 
			<div style="padding-top:30px" class="panel-body" >
				<?php if ($v != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $v; ?></div>                            
				<?php } ?>
				<form id="loginform" class="form-horizontal" role="form" method="POST" action="">                                    
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" id="email" name="username" placeholder="username" style="background:white;" required>                                        
					</div>                                
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon" ><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" id="password" name="password" placeholder="password" required>
					</div>
					<div style="margin-top:10px" class="form-group">                               
						<div class="col-sm-12 controls">
						  <input type="submit" name="login" value="Login" class="btn btn-info btn-block">						  
						</div>						
					</div>	
					
				</form>   
			</div>                     
		</div>  
	</div>
</div>	
<div class="insert-post-ads1" style="margin-top:20px;">
</div>
</div>
<?php
}

else 
{

header('Location: dashboard.php');

}
?>
</body>
</html>