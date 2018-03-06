<!DOCTYPE html>
<!-- 
TO DO:
Make sure that an employee is logged in before accessing this page or else redirect them
back to the login page. 

Goals:
1. Display all tables in the database similar to PHPmyadmin or sqlliteonline.com

-->
<?php
	session_start();
	//If session variable logged_in !true redirect to login
	/*!isset session var*/
	if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
	    header("location: login.php");
	}
?>

<html>
<head>
	
</head>	

</html>