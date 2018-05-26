<?php
  include("connection.php");
    $searchUserType = ($_POST['searchUserType']);
    $column = ($_POST['column']);

    if ($column == "" || ($column != "userTypeID" && $column != "email" && $column != "name" && $column != "phone") )
    {
      $column = "userTypeID";
    }

    $query = "SELECT userTypeID, email, name, phone FROM users WHERE $column LIKE '%$searchUserType%' ";
    $sql = $connection->query($query);

    if ($sql->num_rows > 0)
    {
      echo "<table><tr> <th>Användartyp</th> <th>Email</th> <th>Namn</th> <th>Telefon</th> </tr>";
      while ($data = $sql->fetch_array())
      {
        echo "<tr> <td>".$data["userTypeID"]."</td> <td>".$data["email"]."</td> <td>".$data["name"]."</td> <td>".$data["phone"]."</td> </tr>";;
      }
      echo "</table>";
    }
    else
    {
      echo "Ingen träff tyvärr.. :( ";
    }
?>

<?php
/*
include('connection.php');
$sql = "SELECT userTypeID, email, name, phone FROM users";
$result = $connection->query($sql);

if ($result->num_rows>0)
{
  echo "<table><tr> <th>Användartyp</th> <th>Email</th> <th>Namn</th> <th>Telefon</th> </tr>";
  // output data of each row
  while($row = $result->fetch_assoc())
  {
    echo "<tr> <td>".$row["userTypeID"]."</td> <td>".$row["email"]."</td> <td>".$row["name"]."</td> <td>".$row["phone"]."</td> </tr>";
  }
  echo "</table>";
}
else
{
  echo "0 results";
}
$connection->close();
*/
