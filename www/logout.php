<?php
  include("settings.php");
  session_start();
  $username = $_SESSION['username'];
  $sql = "UPDATE admin SET logged_in = 0 WHERE username = '$username'";
  mysqli_query($db, $sql);
  session_destroy();
  header("location:login.php");
?>