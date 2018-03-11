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
	//Variables from products.php form
	$id = mysqli_real_escape_string($db, $_POST['productid']);
	$category = mysqli_real_escape_string($db, $_POST['categoryid']);
	$product = mysqli_real_escape_string($db, $_POST['itemname']);
	$description = mysqli_real_escape_string($db, $_POST['description']);
	$inventory = mysqli_real_escape_string($db, $_POST['inventory']);
	$price = mysqli_real_escape_string($db, $_POST['price']);
	$imgpath = mysqli_real_escape_string($db, $_POST['imgpath']);

	$stmt = $db->prepare("UPDATE products SET cat_id = ?, name = ?, description = ?,
	 	inventory = ?, price = ?, image = ? WHERE id = ?");
	$stmt->bind_param("sssidsi", $category, $product, $description, $inventory,
		$price, $imgpath, $id);
	$stmt->execute();
	$stmt->close();
	// if(!mysqli_stmt_prepare($statement,$sql)) {
	// 	echo "SQL Failed";
	// }
	// else {
	// 	mysqli_stmt_bind_param($statement, "sssids", $category, $product, $description, $inventory, $price, $imgpath);
	// 	mysqli_stmt_execute($statement);
	// }
	header("Location:../products.php");
?>