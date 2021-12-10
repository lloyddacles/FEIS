<?php
//From Log in form
$servername = "localhost";
$username = "root";
$password = "";


try {
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $delid = $_POST['id'];

  $delete = "DELETE FROM e_sched WHERE ES_ID = '".$delid."'";
  $alter1 = "ALTER TABLE e_sched DROP ES_ID";
  $alter2 = "ALTER TABLE e_sched AUTO_INCREMENT = 1";
  $alter3 = "ALTER TABLE e_sched ADD ES_ID int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
  $conn->exec($delete);
  // $conn->exec($alter1);
  // $conn->exec($alter2);
  // $conn->exec($alter3);

}catch(PDOException $e)
{
  echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
  $errorMsg=  $e->getMessage();
  echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}



?>
