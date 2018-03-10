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

	<div style="margin-left:25%">
		<?php 

			$sql = "SELECT * FROM admin";
			$result = mysqli_query($db,$sql);

			if ($result->num_rows > 0) {
				//Print the table headers
				echo "<table><tr>
				<th>Employee ID</th>
				<th>Username</th>
				<th>Password</th>
				<th>Logged In</th>
				</tr>";

				while ($row = $result->fetch_assoc()) {
					//Insert pulled data from mysqli_query
					echo "<tr><td>"
					.$row["id"]."</td><td>"
					.$row['username']."</td><td>"
					.$row['password']."</td><td>"
					.$row['logged_in']."</td></tr>";
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

		<form action="" id="Submit">
			<button type="submit" >Submit</button>
		</form>
	</div>
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
