<?php
include('connection.php');
include('checklogin.php');
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
            <a class="nav-link js-scroll-trigger" href="#experience">Mina vaccinationer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#education">Kommande vaccinationer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#interests">Bokningsförfrågan</a>
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
          <h1 class="mb-0">Välkommen
            <span class="text-primary">Anna!</span>
          </h1>
          <h3 class="mb-0">DINA UPPGIFTER</h3>
          <div class="subheading mb-3"><p>Namn: Anna Enstam</p> <p> Email: anna.enstam@gmail.com </p> <p>Postnummer: 752 26</p><p>Telefonnummer: 070-699 23 13</p> </div>
          <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Redigera</button>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
          <h2 class="mb-5">Mina vaccinationer</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Lägg till tagen vaccination</h3>
              <form id="contactForm" name="sentMessage" novalidate="novalidate">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input class="form-control" id="name" type="text" placeholder="Vaccinationstyp *" required="required" data-validation-required-message="Du måste lägga in vaccinationstyp.">
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="email" type="email" placeholder="Vaccinationscentral *" required="required" data-validation-required-message="Du måste lägga till en vaccinationscentral.">
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="phone" type="tel" placeholder="Datum *" required="required" data-validation-required-message="Du måste fylla i ett datum.">
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <textarea class="form-control" id="message" placeholder="Kommentar" ></textarea>
                      <p class="help-block text-danger"></p>
                    </div>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                      Ladda upp kvitto:
                      <input type="file" name="fileToUpload" id="fileToUpload">
                      <input type="submit" value="Ladda upp" name="submit" id="laddaUpp">
                    </form>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-lg-12 text-center">
                    <div id="success"></div>
                    <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Lägg till</button><br/><br/>
                  </div>
                </div>
              </form>
              <div class="subheading mb-3">Registrerade vaccinationer:</div>
              <div class="container">
              <p>Query från databasen</p>
            </div>
          </div>
        </div>
      </div>

      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
        <div class="my-auto">
          <h2 class="mb-5">Kommande vaccinationer</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Dina kommande vaccinationer baserat på dina registrerade doser i Vaccinationsjournalen</h3>
              <div class="subheading mb-3">Jag önskar påminnelse via:</div>
              <p><form action="">
                <input type="checkbox" name="vehicle" value="sms"> SMS<br>
                <input type="checkbox" name="vehicle" value="mail"> Mail
              </form></p>
                <div class="container">
                <p>Query från databasen</p>
              </div>
            </div>
          </div>

        </div>
      </section>

      <section id="interests">
        <div class="my-auto">
            <div class="col-lg-12 text-center"> <br/><br/>
              <h2 class="mb-julia">Bokningsförfrågan</h2>
            </div>
            <div class="col-lg-12">
              <form id="contactForm" name="sentMessage" novalidate="novalidate" action="../bookingRequests.php">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input class="form-control" id="name" name="name" type="text" placeholder="Namn *" required="required" data-validation-required-message="Fyll ditt namn.">
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="email" name="email" type="email" placeholder="Email-adress *" required="required" data-validation-required-message="Fyll i din email-adress.">
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="phone" name="phone" type="tel" placeholder="Postnummer *" required="required" data-validation-required-message="Fyll i ditt postnummer.">
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <textarea class="form-control" id="message" name="message" placeholder="Meddelande *" required="required" data-validation-required-message="Fyll i vaccinationstyp."></textarea>
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-lg-12 text-center">
                    <div id="success"></div>
                    <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Skicka förfrågan</button><br/><br/>
                  </div>
                </div>
              </form>
            </div>
        </div>
      </section>

    </div>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
      <div class="my-auto">
        <form name='LogOut' action='processlogout.php' method='post'>
        <input type='submit' name='logOut' value='Logga Ut!'/>
      </div>
    </section>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>

  </body>

</html>
