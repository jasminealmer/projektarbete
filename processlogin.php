<?php
include('connection.php');

$LIemail = mysqli_real_escape_string($connection, $_POST["username"]);
$LIpassword = mysqli_real_escape_string($connection, $_POST["password"]);

$activeUserType = "SELECT userTypeID FROM users WHERE email = '".$LIemail."' ";
$queryPassword = "SELECT password FROM users WHERE email = '".$LIemail."' ";
$resultPassword = $connection->query($queryPassword);
$DBpassword = $resultPassword->fetch_assoc();

//var_dump($DBpassword);

$querySalt = "SELECT salt FROM users WHERE email = '".$LIemail."' ";
$resultSalt = $connection->query($querySalt);
$DBsalt = $resultSalt->fetch_assoc();

$SLIpassword = $LIpassword . $DBsalt['salt']; //hämtar saltet i den första raden (kommer bara vara 1 rad)
$HSLIpassword = sha1($SLIpassword);

//var_dump($HSLIpassword);

if ($HSLIpassword === $DBpassword['password']) //hämtar lösenordet i den första raden (kommer bara vara 1 rad) och jämför med det saltade och hashade lösenordet som användaren försöker logga in med
{
  session_start();
  //echo session_id();
  $_SESSION["usertype"] = $activeUserType;
  $_SESSION["username"] = $LIemail;
  //echo "<p>Login succesfull with email: " . $LIemail . "</p>";
  //echo "<p><a href='posts.php'>Click here to get to the posts!</a></p>";

  if ($activeUserType === 1)
  {
    header("Location: startbootstrap-resume-gh-pages/userpage.php");
  }
  if ($activeUserType === 2)
  {
    header("Location: startbootstrap-resume-gh-pages/caregiverpage.php");
  }
  if ($activeUserType === 3)
  {
    header("Location: startbootstrap-resume-gh-pages/adminpage.php");
  }
}
else
{
  echo("Felaktig epostadress eller lösenord");
  header("refresh:2; url=loginpage.php");
}


 ?>
