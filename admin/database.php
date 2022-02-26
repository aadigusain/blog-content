<?php

$servername = "db4free.net";
$username = "aadigusain";
$password = "06@sep1997";
$dbname = "blog_site";


// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

