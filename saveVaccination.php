<?php
include('connection.php');

$vaccination = $_POST["takenVaccination"];
$sql = "SELECT vaccinationID FROM vaccinations WHERE vaccinationNameDose = '".$vaccination."' ";
$result1 = $connection->query($sql);
$vaccinationID = $result1->fetch_assoc();
$print_vaccinationID = $vaccinationID['vaccinationID'];


$userID = $_POST['userID'];
$day = $_POST['date'];
$message = $_POST['comment'];

$query = "INSERT INTO takenVaccinations (userID, vaccinationID, day, comment) VALUES ($userID, '".$print_vaccinationID."', '".$day."', '".$message."')";
$result2 = $connection->query($query);

header("Location: userpage.php");
 ?>
