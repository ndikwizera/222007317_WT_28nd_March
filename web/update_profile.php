<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: login.html");
    exit();
}
$connection = new mysqli("localhost", "root", "", "mytest");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$user_id=$_SESSION['userid'];
if ($_SERVER["REQUEST_METHOD"]=="POST") {
   $firstname=$_POST['firstname'];
   $lastname=$_POST['lastname'];


   //$sql="update profile set firstname='$firstname',lastname='$lastname',isCompleted=1 where userid='$user_id'";
  $sql = "INSERT INTO profile (firstname, lastname, userid, isCompleted) VALUES ('$firstname', '$lastname', '$userid', 1)";

   if ($connection->query($sql) ==TRUE) {
       echo"PROFILE updated successfully";
       header("Location:#");
   }else{
    echo "error updating  profile:".$connection->error;
   }
}
$connection->close();

?>