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
	$sql = "INSERT INTO customer (fname,lname,email,address,postcode) VALUES (?,?,?,?,?)";
	
	//Variables from customer.php form
	$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$address = mysqli_real_escape_string($db, $_POST['address']);
	$postcode = mysqli_real_escape_string($db, $_POST['zipcode']);

	$statement = mysqli_stmt_init($db);
	if(!mysqli_stmt_prepare($statement,$sql)) {
		echo "SQL Failed";
	}
	else {
		mysqli_stmt_bind_param($statement, "ssssi", $firstname, $lastname, $email, $address, $postcode);
		mysqli_stmt_execute($statement);
	}
	header("Location:../customers.php");
?>