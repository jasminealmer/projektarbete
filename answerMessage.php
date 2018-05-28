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
     <title>Svara på bokningsförfrågan</title>
   </head>
   <body>
     <div class="wrapper">
     <form class="form-signin" method="post" action="caregiverpage.php">
       <br/>
       <h2 class="form-signin-heading">Svara på bokningsförfrågan</h2>
       <?php
       echo "<form>
              <p>Ämnesrad:</p>
              <textarea rows='1' type='text' class='form-control' name='update_email'>$print_email</textarea>
              <p>Meddelande:</p>
              <textarea rows='5' type='text' class='form-control' name='update_name'>$print_name</textarea>
              <p> <button id='sendMessageButton' class='btn btn-primary btn-xl text-uppercase' onclick='caregiverpage.php' type='submit'>Skicka</button></p>
            </form>";
        ?>
   </div>
   </body>
 </html>
