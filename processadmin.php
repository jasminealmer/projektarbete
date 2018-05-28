<?php

include('connection.php');

function countnumberOfAtsPHP($string)
{
  $count = 0;
  for ($i=0; $i < strlen($string); $i++)
  {
    if ($string{$i} === '@')
    {
      $count++;
    }
  }
  return $count;
}

function doubleEmail($email, $connection)
{
  $query = "SELECT email FROM users WHERE email = '".$email."' ";
  $result = $connection->query($query);
  $DBemail = $result->fetch_assoc();
  return ($DBemail['email'] === $email);
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$name = mysqli_real_escape_string($connection, $_POST['name']);
$useremail = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
$salt = generateRandomString();
$usertype = mysqli_real_escape_string($connection, $_POST['usertype']);


var_dump($useremail);
var_dump($password);

if ($useremail === "" || $password === "" || $usertype === "")
{
  die("Var vänlig fyll i alla fält!");
}
else
{
  if (doubleEmail($useremail, $connection))
  {
    echo("Epost redan registrerad, logga in istället!");
    if (true)
    {
      header("refresh:3; url=register.php");
    }
  }
  else
  {
    $at = countnumberOfAtsPHP($useremail);
    if ($at === 1)
    {
      $emailparts = end(explode('@', $useremail));
      if (strpos($emailparts, '.') === false)
      {
        die("Var vänlig fyll i en giltig emailadress!");
      }
      else
      {
        $Spassword = $password . $salt;
        $HSpassword = sha1($Spassword);
        $query = "INSERT INTO users(email, password, salt) VALUES ('".$useremail."','".$HSpassword."','".$salt."');";
        $connection->query($query);
        if (true)
        {
          header("Location: login.php");
        }
      }
    }
    else
    {
      echo("Var vänlig fyll i en giltig emailadress!");
    }
  }
}


?>
