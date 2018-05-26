<?php
include("connection.php");
$userID = $_POST['delete_userID'];

$sql = "DELETE FROM users WHERE userID= $userID";

if ($connection->query($sql) === TRUE)
{
  echo "Användare raderad";
  header("refresh:2; url='adminpage.php'");
}
else
{
  echo "Gick inte att radera användare";
}
 ?>
