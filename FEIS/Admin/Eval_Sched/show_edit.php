<?php


$servername = "localhost";
$username = "root";
$password = "";
// code...

try{
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $ayd = $_POST['lagayan'];
  $query = "SELECT * FROM e_sched WHERE ES_ID='".$ayd."'";

  if ($result = $conn->query($query)) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $esid = $row['ES_ID'];
      $tc = $row['Teacher'];
      $sp = $row['Evaluator'];
      $start = $row['Start'];
      $end = $row['End'];
      $dat = $row['Date'];
      $date = date("M j, Y", strtotime($dat));
      $typ = $row['status'];
    }


  }

}catch(PDOException $e)
{
  echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
  $errorMsg=  $e->getMessage();
  echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}


?>
