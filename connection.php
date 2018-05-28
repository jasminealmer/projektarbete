<?php

$user = 'root';
$password = 'root';
$db = 'vaccinationsjournalen';
$host = 'localhost';

$connection = mysqli_connect($host, $user, $password, $db);

if ($connection->connect_error)
{
    die("Connection failed: " . $connection->connect_error);
  }
?>
