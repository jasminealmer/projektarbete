<?php
include('connection.php');
include('userpage');
session_start();
session_unset();
session_destroy();
echo session_status();
header("Location: loginpage.php");
?>
