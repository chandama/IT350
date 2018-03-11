<?php
	//Establish db connection with $db as variable
	$username = "root";
	$password = "itr0cks!";
	$database = "bluehalo";
	$server = "localhost";
	/*root pw for phpmyadmin is root and VM password*/

	$db = new mysqli($server, $username, $password, $database);

	if($db->connect_error){
		die("Database Connection Failed".$db->connect_error);
	}

	//SQL Statement
	$sql = "DELETE FROM customer WHERE cust_id = ? AND email = ?";
	
	//Variables from customer.php form
	$customerid = mysqli_real_escape_string($db, $_POST['custid']);
	$custemail = mysqli_real_escape_string($db, $_POST['custemail']);


	$statement = mysqli_stmt_init($db);
	if(!mysqli_stmt_prepare($statement,$sql)) {
		echo "SQL Failed";
	}
	else {
		mysqli_stmt_bind_param($statement, "is", $customerid, $custemail);
		mysqli_stmt_execute($statement);
	}
	header("Location:../customers.php");
?>