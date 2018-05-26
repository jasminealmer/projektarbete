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

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <!-- Bootstrap core CSS -->
     <link href="css/loginpage.css" rel="stylesheet">

     <!-- Custom fonts for this template -->
     <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
     <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
     <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
     <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

     <meta charset="utf-8">
     <title>Logga in</title>
   </head>
   <body>
     <div class="wrapper">
     <form class="form-signin" method="post" action="processlogin.php">
       <br/>
       <h2 class="form-signin-heading">Ändra uppgifter</h2>
       <p><input type="text" class="form-control" name="useremail" placeholder="E-postadress" required="" autofocus="" /></p>
       <p><input type="password" class="form-control" name="password" placeholder="Lösenord" required=""/></p>
       <button class="btn btn-lg btn-primary btn-block" type="submit" href="">Spara</button>
       <br/><br/><br/>

   </div>
   </body>
 </html>
