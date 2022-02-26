
           <?php   
		   
	date_default_timezone_set("Asia/kolkata");
  $today = date("Y-m-d");	   


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "casite";


// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	
	  
}
           $sql = "SELECT * FROM blog order by date DESC ";  





$json = array ();

$result = $con->query($sql);
if ($result->num_rows > 0 ) {
// output data of each row
while($row = $result->fetch_assoc()) {
$id = $row['id'];

$view =$row['views'];

if($view >= 1024)
{
	$view = round($view/1024)."K";
}

if($view >= 1024*1024)
{
	$view = round($view/1024*1024)."M";
}



$datea = $row['date'];
$date = date_create($row['date']);
$dateToday=date_create($today);

$diff=date_diff($dateToday,$date);
$days = $diff->format("%R%a");

if ($days <= 0)
{
	
	if($days == 0)
	{	
	$datep ="Today";
}

	else if($days ==  -1)
	{	
	$datep ="Yesterday";
}
else 
{
	
$datep = date_format($date,"d F, Y");

}



$catid = $row['cat'];
$subid = $row['sub'];
$authorid = $row['author'];




$heading = $row['heading'];
$paragraph = $row['paragraph'];
//$file = $row['file'];

if (strpos($row['file'],"mp3") != "")
{
	$file= 'img/post/podcast.jpg';
	$media= $row['file'];
}

else if (strpos($row['file'],"mp4") != "")
{
	$file= 'img/post/video.jpg';
	$media= $row['file'];
}

else {
	
	$media= $row['file'];
	$file= $row['file'];
}



$tag = $row['tag'];

$url = $row['url'];

$descrpt = $row['descrpt'];



 $sqlcmt= "select blog from cmt where blog = $id ";
        $resultcmt = mysqli_query($con ,$sqlcmt);
        $count = mysqli_num_rows($resultcmt);

		$cmt = $count;


$sqlauthor = "SELECT * FROM author where id=". $authorid;
mysqli_set_charset( $con, 'utf8');
$resultauthor = $con->query($sqlauthor);
if ($resultauthor->num_rows > 0 ) {
// output data of each row
while($rowauthor = $resultauthor->fetch_assoc()) {

$author = $rowauthor['name'];
$authorabout = $rowauthor['about'];
$authorimage = $rowauthor['img'];
}
}



$sqlcat= "SELECT * FROM category where id='".$catid."'";
mysqli_set_charset( $con, 'utf8');
$resultcat = $con->query($sqlcat);
if ($resultcat->num_rows > 0 ) {
// output data of each row
while($rowcat = $resultcat->fetch_assoc()) {
	
	$cat = $rowcat['cat'];
	$caturl = $rowcat['title'];



}}


if ($subid == "")
		
		{
			$sub ="NULL";
			$suburl ="#";
			
		}
		else
	{
	
$sqlsub= "SELECT * FROM subcat where id='".$subid."'";
mysqli_set_charset( $con, 'utf8');
$resultsub = $con->query($sqlsub);
if ($resultsub->num_rows > 0 ) {
// output data of each row
while($rowsub = $resultsub->fetch_assoc()) {
	
	$sub = $rowsub['sub'];
	$suburl = $rowsub['title'];
	


}}
	}

 $tags ="";
 $aadi = explode(", ",$tag); 
									
						foreach($aadi as $tag)
									{
									if ($tag !="")
										{
			$sqltag = "SELECT * FROM tags where id = '$tag'";
 
	
$resulttag = $con->query($sqltag);

if ($resulttag->num_rows > 0 ) {
// output data of each row
while($rowtag = $resulttag->fetch_assoc()) {	

$tag =$rowtag['tag'];
}}							
										$tags = $tag.", ".$tags;
										}	
									}
										
					


$array = 
array("id" => "$id",           
"date" => "$datep",             
"view" => "$view",             
"datep" => "$datea",             
"catid" => "$catid",             
"subid" => "$subid",             
"authorid" => "$authorid",             
"heading" => "$heading",       
"file" => "$file",       
"media" => "$media",       
"tag" => "$tags",               
"url" => "$url",             
"descrpt" => "$descrpt",       
"paragraph" => "$paragraph",                 
"cat" => "$cat",
"sub" => "$sub",
"caturl" => "$caturl",
"suburl" => "$suburl",
"author" =>"$author",
"cmt" =>"$cmt",
"authorabout" =>"$authorabout",
"authorimage" =>"$authorimage"
); 



array_push($json, $array);


}

}
}



//$len = strlen($json);
//$json =substr($json,1,$len);

//$json = array ($json) ;



/*
foreach($json as $aadi) {
	foreach($aadi as $n => $v) {
		
		echo $n."=>".$v.",<br>";
}
echo "<br><br>";
}
echo "<br>";



  $type= "hot";
$hot_news= array_filter($json, function ($hot) use ($type) {

    return ($hot["type"] == $type);

});
foreach($hot_news as $news) {
	foreach($news as $na => $va) {
		
		echo $na."=>".$va.",<br>";
}
echo "<br>";
}
echo "<br>"; 




$output =array();

$x = count($json);
$x = $x-1;

for($i=0; $i<= $x; $i++)
{

$outputA = array_filter($json[$i], function($v, $k) {
  return $k == 'heading' || $k == 'id';
}, ARRAY_FILTER_USE_BOTH);
//print_r($outputA);


array_push($output, $outputA);

}
//print_r($output);

foreach($output as $aadi) {
	
		
		echo $aadi['id']." = ".$aadi['heading'];
		echo "<br><br>";
}


  $type= "टिप्पणी";
$hot_news= array_filter($json, function ($hot) use ($type) {

    return ($hot["cat"] == $type);

});

$aa = array ();
foreach($hot_news as $aadi) {
	
		if($aadi['id'] !="24")
		{
			array_push($aa, $aadi);
		}
		
}


//print_r($output);

foreach($aa as $aadi) {
	
		
		echo $aadi['id']." = ".$aadi['heading'];
		echo "<br><br>";

}

*/



 

?>
    