<!DOCTYPE html>
<!-- 
TO DO:
Make sure that an employee is logged in before accessing this page or else redirect them
back to the login page. 

Goals:
1. Display all tables in the database similar to PHPmyadmin or sqlliteonline.com

-->


<html>
<head>
	<div class="w3-container w3-black">
  		<h1>Register</h1>
	</div>
</head>	
<body>
  <section class="banner1">
    <form action="/phpscripts/registeruser.php" id="registerform" method="post">
      <div class="container">
        <label class="contactfield"><b>Username</b></label>
        <input type="text" placeholder="First Name" name="fname" required>
        <input type="text" placeholder="Last Name" name="lname" required>
        <input type="text" placeholder="Email" name="email" required>
        <input type="text" placeholder="Phone Number" name="phone">
        <label class="contactfield"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password1" required>
        <input type="password" placeholder="Verify Password" name="password2" required>

        <button type="submit">Register</button>
      </div>
    </form>
  </section>

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
