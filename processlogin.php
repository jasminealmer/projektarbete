<?php
include('connection.php');

$LIemail = mysqli_real_escape_string($connection, $_POST["useremail"]);
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

$SLIpassword = $LIpassword . $DBsalt['salt']; //hämtar saltet i den första raden (kommer bara vara 1 rad)
$HSLIpassword = sha1($SLIpassword);

if ($HSLIpassword === $DBpassword['password']) //hämtar lösenordet i den första raden (kommer bara vara 1 rad) och jämför med det saltade och hashade lösenordet som användaren försöker logga in med
{
  if ($activeUserType['userTypeID'] === "1")
  {
    session_start();
    $_SESSION["userTypeID"] = $activeUserType;
    $_SESSION["useremail"] = $LIemail;
    header("Location: userpage.php");
  }
  if ($activeUserType['userTypeID'] === "2")
  {
    $_SESSION["userTypeID"] = $activeUserType;
    $_SESSION["useremail"] = $LIemail;
    header("Location: caregiverpage.php");
  }
  if ($activeUserType['userTypeID'] === "3")
  {
    $_SESSION["userTypeID"] = $activeUserType;
    $_SESSION["useremail"] = $LIemail;
    header("Location: adminpage.php");
  }
}
else
{
  echo("Felaktig epostadress eller lösenord");
  header("refresh:2; url=loginpage.php");
}
 ?>
