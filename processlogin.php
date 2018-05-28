<?php
include('connection.php');

$LIemail = trim(mysqli_real_escape_string($connection, $_POST["useremail"]), " ");
$LIpassword = mysqli_real_escape_string($connection, $_POST["password"]);

$userType = "SELECT userTypeID FROM users WHERE email = '".$LIemail."' ";
$resultUserType = $connection->query($userType);
$activeUserType = $resultUserType->fetch_assoc();

$queryPassword = "SELECT password FROM users WHERE email = '".$LIemail."' ";
$resultPassword = $connection->query($queryPassword);
$DBpassword = $resultPassword->fetch_assoc();

$querySalt = "SELECT salt FROM users WHERE email = '".$LIemail."' ";
$resultSalt = $connection->query($querySalt);
$DBsalt = $resultSalt->fetch_assoc();

$SLIpassword = $LIpassword . $DBsalt['salt'];
$HSLIpassword = sha1($SLIpassword);

if ($HSLIpassword === $DBpassword['password']) 
{
  session_start();
  $_SESSION["userTypeID"] = $activeUserType['userTypeID'];
  $_SESSION["useremail"] = $LIemail;

  if ($activeUserType['userTypeID'] === "1")
  {
    header("Location: userpage.php");
  }
  if ($activeUserType['userTypeID'] === "2")
  {
    header("Location: caregiverpage.php");
  }
  if ($activeUserType['userTypeID'] === "3")
  {
    header("Location: adminpage.php");
  }
}
else
{
  echo("Felaktig epostadress eller lösenord");
  header("refresh:2; url=loginpage.php");
}
 ?>
