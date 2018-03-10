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
	$sql = "INSERT INTO customer (fname,lname) VALUES (?,?)";
	
	//Variables from customer.php form
	$firstname = mysqli_real_escape_string($db, $_POST['categoryid']);
	$lastname = mysqli_real_escape_string($db, $_POST['itemname']);
	$password = mysqli_real_escape_string($db, $_POST['itemname']);
	$hashpw = sha1($password);
	$statement = mysqli_stmt_init($db);
	if(!mysqli_stmt_prepare($statement,$sql)) {
		echo "SQL Failed";
	}
	else {
		mysqli_stmt_bind_param($statement, "ssi", $category, $product, $description, $inventory, $price, $imgpath);
		mysqli_stmt_execute($statement);
	}
	header("Location:products.php");
?>