<?php

$host = "localhost";
$username = "nieveslo_nievesdb";
$password = "Milbert@1995";
$dbname = "nieveslo_db";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
	die("Connection Failed: " . mysqli_connect_error());
}

?>