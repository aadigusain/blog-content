<?php
if(isset($_POST)){
try {	


$table ="";
$count = count($_POST);
$i =1;
foreach ($_POST as $key => $value) {

	if($i == $count)
	{
		$table  .=' <tr style="">
     
      <th style="width:40%;padding:10px;">'.ucwords($key).' : </th>
	   <td style="width:60%;padding:10px;" >'.$value.'</td>
  
    </tr>';
	$i++;
	}


else {	
  $table  .=' <tr style="">
     
      <th style="width:40%;border-bottom:1px solid #ccc;padding:10px;">'.ucwords($key).' : </th>
	   <td style="width:60%;border-bottom:1px solid #ccc;padding:10px;" >'.$value.'</td>
  
    </tr>';
	$i++;
	
}
	
  }


	$html='
<html>
<body style="100%;margin:0">
<div style="background:#eee;padding:20px 0;margin:0">
	<div style="background:#fff;width:380px;margin:auto;border-top:5px solid #007adf; padding:20px 10px;">
	
 <span  style="color: #007adf;
 
    font-family: arial;
   
    "><h3 style="font-size: 32px;margin:0;">Adept Professional</h3>
	
	
	</span>
 <br>
  <center>
  
	<table style="border:1px solid #ccc; width:100%;text-align:center;">
  <tbody >
  
  '. 
  $table
  .'

  </tbody>
</table>
</center>
</div>
</div>
</body>
</html>
	';
	
	
$to = "rahul.kumar71@gmail.com";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


$headers .= 'From: honda@meghawks.com' . "\r\n" .
    'Reply-To: ' . $_POST['email']  . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	

	if(mail($to,$_POST['form'],$html,$headers )){
		 echo "<p class='text-success'>Thanks for Sending Mail..!!</p>";
	}else{
		echo "<p class='text-danger'><b>Error ::</b> Mail could not Send..!!</p>";
	}
} catch (Exception $e) {
    echo "Mailer Error: ". $e->getMessage();
}
}

?>
