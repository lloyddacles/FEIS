<?php
$servername = "localhost";
$username = "root";
$password = "";



try{
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $status = $_POST['status'];
  $User_ID = $_COOKIE['uID'];

  $sql = "UPDATE user SET Status='".$status."' WHERE User_ID = '".$User_ID."'";

  $conn->exec($sql);


}catch(PDOException $e)
{
  $errorMsg=  $e->getMessage();
  echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}


?>
