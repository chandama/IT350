<?php
  include("settings.php");
  session_start();
  $username = $_SESSION['username'];
  $sql = "UPDATE customer SET logged_in = 0 WHERE email = '$username'";
  mysqli_query($db, $sql);
  session_destroy();
  header("location:../home.php");
?>