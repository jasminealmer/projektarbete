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
     <title>Redigera uppgifter</title>
   </head>
   <body>
     <div class="wrapper">
     <form class="form-signin" method="post" action="saveEditUser.php">
       <br/>
       <h2 class="form-signin-heading">Ändra uppgifter</h2>
       <?php
       include("connection.php");

       $userID_function = $_POST['userID'];

       $query2 = "SELECT email FROM users WHERE userID=$userID_function";
       $result2 = $connection->query($query2);
       $email = $result2->fetch_assoc();
       $print_email = $email['email'];

       $query3 = "SELECT name FROM users WHERE userID=$userID_function";
       $result3 = $connection->query($query3);
       $name = $result3->fetch_assoc();
       $print_name = $name['name'];

       $query4 = "SELECT phone FROM users WHERE userID=$userID_function";
       $result4 = $connection->query($query4);
       $phone = $result4->fetch_assoc();
       $print_phone = $phone['phone'];

       $query5 = "SELECT postalCode FROM users WHERE userID=$userID_function";
       $result5 = $connection->query($query5);
       $postalCode = $result5->fetch_assoc();
       $print_postalCode = $postalCode['postalCode'];

       echo "<form method='post' action='saveEditUser.php'>
              <input type='hidden' value=".$userID_function." name='userID'>
              <p>Email:</p>
              <textarea rows='1' type='text' class='form-control' name='update_email'>$print_email</textarea>
              <p>Name:</p>
              <textarea rows='1' type='text' class='form-control' name='update_name'>$print_name</textarea>
              <p>Telefonnummer:</p>
              <textarea rows='1' type='text' class='form-control' name='update_phone'>$print_phone</textarea>
              <p>Postnummer:</p>
              <textarea rows='1' type='text' class='form-control' name='update_postalCode'>$print_postalCode</textarea>
              <p><input type='submit' onclick='saveEditUser.php' value='Spara'></p>
            </form>";
        ?>
   </div>
   </body>
 </html>
