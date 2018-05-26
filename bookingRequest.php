<?php
include("connection.php");
session_start();
$email = $_SESSION["useremail"];

$sql1 = "SELECT name FROM users WHERE email = '".$email."' ";
$result1 = $connection->query($sql1);
$name = $result1->fetch_assoc();

$sql2 = "SELECT postalCode FROM users WHERE email = '".$email."' ";
$result2 = $connection->query($sql2);
$postalcode = $result2->fetch_assoc();

/*
$sql3 = "SELECT phone FROM users WHERE email = '".$email."' ";
$result3 = $connection->query($sql3);
$phone = $result3->fetch_assoc();
*/

$sql4 = "SELECT userID FROM users WHERE email = '".$email."' ";
$result4 = $connection->query($sql4);
$userID = $result4->fetch_assoc();

$message = trim(mysqli_real_escape_string($connection, $_POST["message"]), " ");
$vaccination = $_POST["vaccinationToTake"];

if ($vaccination === "")
{
  die("Var vänlig välj önskad vaccination!");
}
else
{
  $query = "INSERT INTO bookingRequests(userID, email, message, postalCode, vaccinationNameDose) VALUES (' " . $userID['userID'] . " ',' " . $email . " ',' " . $message . " ', ' " . $postalcode['postalCode'] . " ',' " . $vaccination . " ')" ;
  $connection->query($query);
  header("Location: userpage.php");
}

?>
