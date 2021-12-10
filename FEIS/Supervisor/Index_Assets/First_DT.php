<?php
//From Log in form

$servername = "localhost";
$username = "root";
$password = "";
// code...
$numt = $nums = $numa = $numon = $numof = NULL;
try{
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $tc = "SELECT COUNT(A_Type) AS NumT FROM user WHERE A_Type= 'Teacher'";

  if ($result = $conn->query($tc)) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $numt = $row['NumT'];
    }
  }

  $sp = "SELECT COUNT(A_Type) AS NumS FROM user WHERE A_Type= 'Supervisor'";

  if ($result = $conn->query($sp)) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $nums = $row['NumS'];
    }
  }

  $ad = "SELECT COUNT(A_Type) AS NumA FROM user WHERE A_Type= 'Admin'";

  if ($result = $conn->query($ad)) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $numa = $row['NumA'];
    }
  }

  $on = "SELECT COUNT(Status) AS NumOn FROM user WHERE Status= 'Online'";

  if ($result = $conn->query($on)) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $numon = $row['NumOn'];
    }
  }

  $of = "SELECT COUNT(Status) AS NumOf FROM user WHERE Status= 'Offline' || Status = 'Idle'";

  if ($result = $conn->query($of)) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $numof = $row['NumOf'];
    }
  }

}catch(PDOException $e)
{
  echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
  $errorMsg=  $e->getMessage();
  echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}



?>
