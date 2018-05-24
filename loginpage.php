<!--login modal-->
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
    <title>Logga in hej</title>
  </head>
  <body>
    <div class="wrapper">
    <form class="form-signin" method="post" action="processlogin.php">
      <br/>
      <h2 class="form-signin-heading">Logga in</h2>
      <input type="text" class="form-control" name="username" placeholder="E-postadress" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Lösenord" required=""/><br/>
      <button class="btn btn-lg btn-primary btn-block" type="submit" href="">LOGGA IN</button>
      <br/><br/><br/>
    </form>
    <h2>Ny användare?</h2>
    <form action="registerpage.php" method="get" >
      <button class="secondbutton" type="submit">Skapa en användare</button>
      <br/><br/>
    </form>
  </div>
  </body>
</html>
