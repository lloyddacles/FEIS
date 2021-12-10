<?php
//From Log in form

$servername = "localhost";
$username = "root";
$password = "";
// code...
$numt = $nums = $numa = $numon = $numof = $nume = $nump = NULL;
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

  $ae = "SELECT COUNT(ES_ID) AS NumE FROM e_sched WHERE Evaluator_ID= '".$_COOKIE['uID']."'";

  if ($result = $conn->query($ae)) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $nume = $row['NumE'];
    }
  }

  $ap = "SELECT COUNT(Eval_ID) AS NumP FROM evaluation WHERE Evaluator_ID= '".$_COOKIE['uID']."'";

  if ($result = $conn->query($ap)) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $nump = $row['NumP'];
    }
  }

}catch(PDOException $e)
{
  echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
  $errorMsg=  $e->getMessage();
  echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}



?>
