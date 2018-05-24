<?php

include('connection.php');

if(isset($_POST["submit"])) {

  $name = $_POST["name"];
  $email = $_POST["email"];
  $postal = $_POST["phone"];
  $message = $_POST["message"];

  $sql = "INSERT INTO bookingRequests (/*userID, */message, postalCode, email) VALUES (/*'en session', */'".$message."', '".$postal."', '".$email."')";

  if(!mysqli_query($connection, $sql)) {
    die('Något gick fel, försök igen!');
  }

}
header('Location: ../userpage.php');

?>
