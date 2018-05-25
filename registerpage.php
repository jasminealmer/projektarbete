<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="css/loginpage.css" rel="stylesheet">
    <title>Registrera användare</title>
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <div class="wrapper">
    <form class="form-signin" method="post" action="processreg.php">
      <h2 class="form-signin-heading">Registrera dig</h2>
      <input type="text" class="form-control" name="username" placeholder="E-postadress" required="" autofocus="" /><br/>
      <input type="password" class="form-control" name="password" placeholder="Lösenord" required=""/><br/>
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Jag accepterar <a href="https://www.w3schools.com">användarvillkoren.</a><br/>
        <input type="checkbox" value="mail-me" id="mail-me" name="mail-me"> Ja, jag vill prenumerera på nyhetsbrev.</a>
      </label><br/><br/><br/>
      <button class="btn btn-lg btn-primary btn-block" type="submit">REGISTRERA</button>
      <br/><br/>
  </form>
  <h2 class="form-signin-heading">Redan registrerad?</h2>
  <form method="get" action="loginpage.php">
    <button class="secondbutton" type="submit">Logga in</button>
</form>
  </div>
  </body>
</html>
