<?php
session_start();

if (!isset($_SESSION['useremail']))
{
  header("Location: loginpage.php");
}
if ($_SESSION["userTypeID"] === "1")
{
  header("Location: userpage.php");
}
if ($_SESSION["userTypeID"] === "2")
{
  header("Location: caregiverpage.php");
}
if ($_SESSION["userTypeID"] === "3")
{
  header("Location: adminpage.php");
}
 ?>
