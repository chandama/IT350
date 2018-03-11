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
	$sql = "DELETE FROM products WHERE id = ? AND cat_id = ?";
	
	//Variables from products.php form
	$id = mysqli_real_escape_string($db, $_POST['productid']);
	$category = mysqli_real_escape_string($db, $_POST['categoryid']);


	$statement = mysqli_stmt_init($db);
	if(!mysqli_stmt_prepare($statement,$sql)) {
		echo "SQL Failed";
	}
	else {
		mysqli_stmt_bind_param($statement, "is", $id, $category);
		mysqli_stmt_execute($statement);
	}
	header("Location:../products.php");
?>