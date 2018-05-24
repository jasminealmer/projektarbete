<?php
session_start();
if (!isset($_SESSION["userTypeID"] === 3))
{
  if (isset($_SESSION["userTypeID"] === 2))
  {
    header("Location: caregiverpage.php");
  }
  else if (isset($_SESSION["userTypeID"] === 1))
  {
    header("Location: startbootstrap-resume-gh-pages/userpage.php");
  }
  else
  {
    header("Location: startbootstrap-resume-gh-pages/index.php");
  }
}

 ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resume - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Start Bootstrap</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profilbild.jpg" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Min profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#experience">Hantera användare</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#awards">Logga ut</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <h1 class="mb-0">Välkommen Admin
            <span class="text-primary">Anna!</span>
          </h1>
          <h3 class="mb-0">DINA UPPGIFTER</h3>
          <div class="subheading mb-3"><p>Namn: Anna Enstam</p> <p> Email: anna.enstam@gmail.com </p> <p>Postnummer: 752 26</p><p>Telefonnummer: 070-699 23 13</p> </div>
          <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Redigera</button>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
          <h2 class="mb-5">Hantera Vaccinationsjournalens kunder</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Lägg till en användare</h3>
              <form id="contactForm" name="sentMessage" novalidate="novalidate" action="processadmin.php">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input class="form-control" id="name" name="name" type="text" placeholder="Namn" required="required" data-validation-required-message="Du måste fylla i ett namn.">
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="email" name="email" type="email" placeholder="Email" required="required" data-validation-required-message="Du måste fylla i en email.">
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="phone" name="phone" type="tel" placeholder="Telefon" required="required" data-validation-required-message="Du måste fylla i ett telefonnummer.">
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="password" name="password" type="password" placeholder="Lösenord" required="required" data-validation-required-message="Du måste fylla i ett lösenord.">
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <select name="usertype">
                        <option value="kund">Kund</option>
                        <option value="vaccinationsgivare">Vaccinationsgivare</option>
                        <option value="admin">Admin</option>
                      </select>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-lg-12 text-center">
                    <div id="success"></div>
                    <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Lägg till</button><br/><br/>
                  </div>
                </div>
              </form>
              <div class="subheading mb-3">Registrerade användare:</div>
              <div class="container">
              <?php /*
              include('connection.php');
                $sql = "SELECT * FROM users";
                $result = $connection->query($sql);

                while ($row = $result->fetch_assoc())
                {
                  echo $row["userTypeID"];
                  echo $row["email"];
                  echo $row["name"];
                  echo $row["phone"];
                }*/
               ?>
            </div>
          </div>
        </div>
      </div>

      </section>

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>

  </body>

</html>
