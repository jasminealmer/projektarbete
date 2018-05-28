<?php
include('connection.php');

session_start();

if (!isset($_SESSION['useremail']))
{
  header("Location: loginpage.php");
}
if ($_SESSION["userTypeID"] === "1")
{
  header("Location: userpage.php");
}
if ($_SESSION["userTypeID"] === "3")
{
  header("Location: adminpage.php");
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
    <link href="css/userPages.css" rel="stylesheet">

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
            <a class="nav-link js-scroll-trigger" href="#experience">Bokningsförfrågningar</a>
          </li>
          <form action="processlogout.php" method="get" >
            <button class="logOutButton" type="submit">LOGGA UT</button>
            <br/><br/>
          </form>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <h1 class="mb-0">Välkommen Vaccinationsgivare
            <span class="text-primary"><?php
            include("connection.php");
            //session_start();
            $email = $_SESSION["useremail"];
            $sql1 = "SELECT name FROM users WHERE email = '".$email."' ";
            $result1 = $connection->query($sql1);
            $name = $result1->fetch_assoc();
            echo "".$name['name']."";
            ?></span>
          </h1>
          <h3 class="mb-0">DINA UPPGIFTER</h3>
          <div class="subheading mb-3"><?php include("showUserData.php"); ?> </div>
          <?php
          $sql2 = "SELECT userID FROM users WHERE email = '".$email."' ";
          $result2 = $connection->query($sql2);
          $userID = $result2->fetch_assoc();
          echo "<form id='sendMessageButton' action='editUser.php' method='post'>
                  <input type='hidden' value=".$userID['userID']." name='userID'>
            <button id='sendMessageButton' class='btn btn-primary btn-xl text-uppercase' type='submit'>Redigera</button>
          </form>";
          ?>
        </div>
      </section>

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
          <h2 class="mb-5">Se dina bokningsförfrågningar!</h2>
          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <div class="subheading mb-3">Aktuella bokningsförfrågningar:</div>
                <?php
                include("connection.php");
                $sql = "SELECT email, postalCode, vaccinationNameDose, message FROM bookingRequests";
                $result = $connection->query($sql);

                if ($result->num_rows>0)
                {
                  echo "<table><tr> <th>Email</th> <th>Postnummer</th> <th>Önskad vaccination     </th> <th>Meddelande     </th> <th>Svara</th> </tr>";
                  // output data of each row
                  while($row = $result->fetch_assoc())
                  {
                    echo "<tr>
                            <td>".$row["email"]."</td>
                            <td>".$row["postalCode"]."</td>
                            <td>".$row["vaccinationNameDose"]."</td>
                            <td>".$row["message"]."</td>
                            <td><input type='submit' value='Svara'></td>
                          </tr>";
                  }
                  echo "</table>";
                }
                else
                {
                  echo "Du har inga bokningsförfrågningar! :( ";
                }
              ?>
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
