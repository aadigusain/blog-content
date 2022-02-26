<?php
include '../database.php';


if(isset($_POST['cat'])) 
{	


$cat = $_POST ["cat"];

$output="<option value='NULL'>Select</option>";

$sql = "SELECT * FROM subcat ORDER BY id ASC";
$result = $con->query($sql);
if ($result->num_rows > 0 ) {
// output data of each row
while($row = $result->fetch_assoc()) {
if($row['cat'] == $cat){
				$output= $output.'<option value="'.$row['id'].'">	'.ucwords($row['sub']).' </option>';
}                                 
 
}
}
     echo $output;

}										
                                  ?>