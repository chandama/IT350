<?php
$username = "bluehalo";
$password = "bluehalo";
$database = "bluehalo";
$server = "localhost";
$table = "employee";
/*root user for mysql is itr0cks!*/
/*
	blue halo login info
	username = bluehalo@localhost
	password: bluehalo
*/

$db = mysqli_connect($server, $username, $password, $database);

if(!$db){
	die("Database Connection Failed".mysqli_error($db));
}

?> 