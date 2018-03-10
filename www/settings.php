<?php
$username = "root";
$password = "itr0cks!";
$database = "bluehalo";
$server = "localhost";
$table = "admin";
/*root pw for phpmyadmin is root and VM password*/

$db = mysqli_connect($server, $username, $password, $database);

if(!$db){
	die("Database Connection Failed".mysqli_error($db));
}

?> 