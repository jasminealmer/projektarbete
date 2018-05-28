<?php
include("connection.php");
$email = $_SESSION["useremail"];

$sql1 = "SELECT name FROM users WHERE email = '".$email."' ";
$result1 = $connection->query($sql1);
$name = $result1->fetch_assoc();

$sql2 = "SELECT postalCode FROM users WHERE email = '".$email."' ";
$result2 = $connection->query($sql2);
$postalcode = $result2->fetch_assoc();

$sql3 = "SELECT phone FROM users WHERE email = '".$email."' ";
$result3 = $connection->query($sql3);
$phone = $result3->fetch_assoc();

  echo "<div <p>Namn: ".$name['name']."</p> <p> Email: ".$email." </p> <p>Postnummer: ".$postalcode['postalCode']."</p><p>Telefonnummer: ".$phone['phone']."</p> </div>";
 ?>
