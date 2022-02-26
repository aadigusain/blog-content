<?php

include 'database.php';

$id =$_POST['id'];

// sql to delete a record
$sql = "DELETE FROM cmt WHERE id=$id";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

?>