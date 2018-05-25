<?php
include('connection.php');
//include('userpage');
session_start();
session_destroy();
header("Location: loginpage.php");
?>
