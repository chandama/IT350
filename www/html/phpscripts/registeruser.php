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

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = mysqli_real_escape_string($db,$_POST['fname']);
    $lastname = mysqli_real_escape_string($db,$_POST['lname']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $phone = mysqli_real_escape_string($db,$_POST['phone']);
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    //If passwords match, prepare and insert into customer table
    if ($password1 == $password2) {

      $hashpassword = mysqli_real_escape_string($db,$password1);
      $hashpw = sha1($hashpassword);

      $sql = "INSERT INTO customer 
        (`fname` ,`lname` ,`email` ,`password`, `phone` ,`registered`)
        VALUES (?, ?, ?, ?, ?, ?)";

      $statement = mysqli_stmt_init($db);


            //Prepare and execute SQL statement
            if(!mysqli_stmt_prepare($statement,$sql)) {     
              echo "SQL Failed";
            } 

            else {
              $one = 1;
              mysqli_stmt_bind_param($statement, "sssssi", $firstname, $lastname, 
              $email, $hashpw, $phone, $one);
              mysqli_stmt_execute($statement);
              $_SESSION['username'] = $email;
              $_SESSION['logged_in'] = 1;
              //Update database logged_in to 1
              $sql = "UPDATE customer SET logged_in = 1 WHERE email = '$email'";
              mysqli_query($db, $sql);
              //echo "<p>Success</p>";
              header("location:../home.php");
            }

    }
    else {
      $message = "Your passwords don't match!";
      echo "<script type='text/javascript'>alert('$message');</script>";
      session_unset();
      session_destroy();
      header("locaton:../home.php");
    }
}

?>