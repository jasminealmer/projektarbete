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
            <a class="nav-link js-scroll-trigger" href="#experience">Hantera användare</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Min profil</a>
          </li>
          <form action="processlogout.php" method="get" >
            <button class="logOutButton" type="submit">LOGGA UT</button>
            <br/><br/>
          </form>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
          <h1 class="mb-0">Välkommen
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
          <h2 class="mb-5">Sök bland Vaccinationsjournalens kunder</h2>
          <div class="subheading mb-3">Användartyper:</div>
          <h>1 - Kund/Privatperson</h>
          </br><h>2 - Kund/Vaccinationsgivare</h>
          </br><p>3 - Admin</p>

          <form method="post" action="adminpage.php">
            <input type="text" name="searchUserType" placeholder="Sök...">
            <select name="column">
              <option value="">Välj kolumn att filtrera på...</option>
              <option value="userTypeID">Användartyp</option>
              <option value="email">Email</option>
              <option value="name">Namn</option>
              <option value="phone">Telefon</option>
            </select>
            <form method="get" class="nav-link js-scroll-trigger" href="#experience">
              <button type="submit" name="submit">Sök</button>
            </form>
          </form>
          <p><h3 class="mb-0">Sökresultat:</h3></p>
          <?php
            include("connection.php");
            if(isset($_POST['submit']))
            {
              $searchUserType = ($_POST['searchUserType']);
              $column = ($_POST['column']);

              if ($column == "" || ($column != "userTypeID" && $column != "email" && $column != "name" && $column != "phone") )
              {
                echo "Välj kolumn att filtrera på! ";
              }

              $query = "SELECT userTypeID, email, name, phone FROM users WHERE $column LIKE '%$searchUserType%' ";
              $sql = $connection->query($query);

              if ($sql->num_rows > 0)
              {
                echo "<table><tr> <th>Användartyp</th> <th>Email</th> <th>Namn</th> <th>Telefon</th> </tr>";
                while ($data = $sql->fetch_array())
                {
                  echo "<tr> <td>".$data["userTypeID"]."</td><td>".$data["email"]."</td><td>".$data["name"]."</td><td>".$data["phone"]."</td></tr>";
                }
                echo "</table>";
              }
              else
              {
                echo "Ingen träff tyvärr.. :( ";
              }
            }
            ?>
          </br><p><h3 class="mb-0">Samtliga användare:</h3></p>
            <?php
            include("connection.php");
            $sql = "SELECT userID, userTypeID, email, name, phone FROM users";
            $result = $connection->query($sql);

            if ($result->num_rows>0)
            {
              echo "<table><tr> <th>Användar ID</th> <th>Användartyp</th> <th>Email</th> <th>Namn</th> <th>Telefon</th> <th>Ändra</th> <th>Radera</th> </tr>";
              // output data of each row
              while($row = $result->fetch_assoc())
              {
                echo "<tr>
                        <td>".$row["userID"]."</td>
                        <td>".$row["userTypeID"]."</td>
                        <td>".$row["email"]."</td>
                        <td>".$row["name"]."</td>
                        <td>".$row["phone"]."</td>
                        <td><form method='post' action='edit.php'>
                              <input type='hidden' value=".$row['userID']." name='edit_userID'>
                              <input type='submit' value='Ändra'>
                            </form></td>
                        <td><form method='post' action='delete.php'>
                              <input type='hidden' value=".$row['userID']." name='delete_userID'>
                              <input type='submit' value='Radera'>
                            </form></td>
                      </tr>";
              }
              echo "</table>";
            }


          ?>

          </div>
        </div>
      </div>

      </section>


      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <h3 class="mb-0">DINA UPPGIFTER</h3>
          <div class="subheading mb-3"><p>Namn: Anna Enstam</p> <p> Email: anna.enstam@gmail.com </p> <p>Postnummer: 752 26</p><p>Telefonnummer: 070-699 23 13</p> </div>
          <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Redigera</button>
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
    <script src="js/search.js"></script>

  </body>

</html>
