<?php
$username = "root";
$password = "itr0cks!";
$database = "bluehalo";
$server = "localhost";
$table = "admin";
/*root pw for phpmyadmin is root and VM password
Mysql itr0cks! for root user
*/

$db = mysqli_connect($server, $username, $password, $database);

if(!$db){
	die("Database Connection Failed".mysqli_error($db));
}

?> 