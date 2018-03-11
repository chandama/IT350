<!DOCTYPE html>
<!-- 
TO DO:
Make sure that an employee is logged in before accessing this page or else redirect them
back to the login page. 

Goals:
1. Display all tables in the database similar to PHPmyadmin or sqlliteonline.com

-->
<?php
	include ("settings.php");
	session_start();

	//If session variable logged_in !true redirect to login
	/*!isset session var*/
	if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
	    header("location: login.php");
	}
?>

<html>
<head>
	<div class="w3-container w3-black">
  		<h1>Admin</h1>
	</div>
</head>	
<body>

	<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%,margin-left:25%">
	  <h3 class="w3-bar-item">Menu</h3>
	  <a href="/admin.php" class="w3-bar-item w3-button">Admin</a>
	  <a href="/customers.php" class="w3-bar-item w3-button">Customers</a>
	  <a href="/products.php" class="w3-bar-item w3-button">Products</a>
	  <a href="/logout.php" class="w3-bar-item w3-button">Logout</a>
	</div>

	<div style="margin-left:25%;width:50%">
		<?php 

			$sql = "SELECT * FROM products";
			$result = mysqli_query($db,$sql);

			if ($result->num_rows > 0) {
				//Print the table headers
				echo "<table><tr>
				<th>Product ID</th>
				<th>Category</th>
				<th>Name</th>
				<th>Item Description</th>
				<th>Inventory</th>
				<th>Price</th>
				<th>Image Path</th>
				</tr>";

				while ($row = $result->fetch_assoc()) {
					//Insert pulled data from mysqli_query
					echo "<tr><td>"
					.$row["id"]."</td><td>"
					.$row['cat_id']."</td><td>"
					.$row['name']."</td><td>"
					.$row['description']."</td><td>"
					.$row['inventory']."</td><td>"
					.$row['price']."</td><td>"
					.$row['image']."</td></tr>";
				}
			echo "</table>";
			}
			else {
				echo "0 results";
			}
			$db->close();
		?>
	</div>
	<div style="margin-left:25%">
		<div style="background-color:#707070;color:White;width:35%;display:inline-block">
			<form action="phpscripts/addproduct.php" method="post">
				<fieldset>
					<legend>Add new product</legend>
					Product Type:<br>
					<select name="categoryid">
						<option value="Rod">Fly Rod</option>
						<option value="Reel">Reel</option>
						<option value="Fly">Flies</option>
						<option value="Line">Fly Line</option>
					</select><br>
					Name:<br>
					<input type="text" name="itemname"><br>
					Description:<br>
					<input type="text" name="description"><br>
					Inventory:<br>
					<input type="number" name="inventory"><br>
					Price:<br>
					<input type="text" name="price"><br>	
					Image Path:<br>
					<input type="text" name="imgpath"><br>			
				</fieldset>
				<button type="submit" >Submit</button>
			</form>
		</div>
		<div style="background-color:#707070;color:White;width:35%;display:inline-block">
			<form action="phpscripts/updateproduct.php" method="post">
				<fieldset>
					<legend>Update Products</legend>
					Product ID<br>
					<input type="number" name="productid"><br>
					Product Type:<br>
					<select name="categoryid">
						<option value="Rod">Fly Rod</option>
						<option value="Reel">Reel</option>
						<option value="Fly">Flies</option>
						<option value="Line">Fly Line</option>
					</select><br>
					Name:<br>
					<input type="text" name="itemname"><br>
					Description:<br>
					<input type="text" name="description"><br>
					Inventory:<br>
					<input type="number" name="inventory"><br>
					Price:<br>
					<input type="text" name="price"><br>	
					Image Path:<br>
					<input type="text" name="imgpath"><br>			
				</fieldset>
				<button type="submit" >Submit</button>
			</form>
		</div>
		<div style="background-color:#707070;color:White;width:35%;display:inline-block">
			<form action="phpscripts/deleteproduct.php" method="post">
				<fieldset>
					<legend>Delete Product</legend>
					Product Type:<br>
					<select name="categoryid">
						<option value="Rod">Fly Rod</option>
						<option value="Reel">Reel</option>
						<option value="Fly">Flies</option>
						<option value="Line">Fly Line</option>
					</select><br>
					Product ID<br>
					<input type="number" name="productid"><br>			
				</fieldset>
				<button type="submit" >Submit</button>
			</form>
		</div>


	</div><br><br>
</body>

        <!-- CSS Links -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!-- JS Links -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</html>
