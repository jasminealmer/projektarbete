<?php
include("connection.php");

$userID = $_POST['userID'];
$new_email = $_POST['update_email'];
$new_name = $_POST['update_name'];
$new_phone = $_POST['update_phone'];
$new_postalCode = $_POST['update_postalCode'];

$queryUpdate = "UPDATE users SET email='".$new_email."', name='".$new_name."', phone='".$new_phone."', postalCode=$new_postalCode WHERE userID=$userID ";
$result = $connection->query($queryUpdate);
header("Location: userpage.php");
?>
