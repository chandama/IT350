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
    if($count == 1) {
      $_SESSION['username'] = $myusername;
      $_SESSION['logged_in'] = 1;
      //Update database logged_in to 1
      $sql = "UPDATE employee SET logged_in = 1 WHERE username = '$myusername'";
      mysqli_query($db, $sql);
      echo "<p>Success</p>";
      header("location:admin.php");
    }
    else { 
      header("location:login.php");
      session_unset();
      session_destroy();
    }
  }

?>