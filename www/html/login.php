<!DOCTYPE html>

<?php

include("settings.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    $hashpw = sha1($mypassword);
    $query = "SELECT * FROM $table WHERE username = '$myusername' and password = '$hashpw'";
    $result = mysqli_query($db,$query);
    //Check number of rows that match the query
    $count = mysqli_num_rows($result);
    //If matched row, then login the user and changed logged_in to true

    //Prepared sql statement
    /*$sql = "SELECT * FROM $table WHERE username = ? and password = ?";
    //Escape string character variables
    $username = mysqli_real_escape_string($db, $myusername);
    $password = mysqli_real_escape_string($db, $hashpw);

    $statement = mysqli_stmt_init($db);

    if(!mysqli_stmt_prepare($statement,$sql)) {
      echo "SQL Failed";
    }
    else {
      mysqli_stmt_bind_param($statement, "ss", $username, $hashpw);
      mysqli_stmt_execute($statement);
      echo "SQL Success";
    }*/
    
    if($count == 1) {
      $_SESSION['username'] = $myusername;
      $_SESSION['logged_in'] = 1;
      //Update database logged_in to 1
      $sql = "UPDATE admin SET logged_in = 1 WHERE username = '$myusername'";
      mysqli_query($db, $sql);
      //echo "<p>Success</p>";
      header("location:admin.php");
    }
    else {  
      header("location:login.php");
      session_unset();
      session_destroy();
    }
  }

?>

<html>

<head>
  <title>Home</title>
  <meta charset="utf-8">
  
        <!-- CSS Links -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>


        <!-- JS Links -->
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/script.js"></script>


  <link rel="shortcut icon" href="favicon.ico"/>
</head>

<body>
<?php include('navbar.php');?>
 
  <section class="banner1">
    <form action="login.php" id="loginform" method="post">
      <div class="container">
        <label class="contactfield"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label class="contactfield"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
      </div>
    </form>
  </section>
  
</body>

</html>