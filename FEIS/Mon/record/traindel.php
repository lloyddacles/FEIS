<?php 

	$servername = "localhost";
$username = "root";
$password = "";

try{
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_GET['Edel'])){
    $ID = $_GET['Edel'];
    $query = "DELETE FROM training_records WHERE TR_ID = '".$ID."'";
    $alt1 = "ALTER TABLE training_records DROP TR_ID";
    $alt2 = "ALTER TABLE training_records AUTO_INCREMENT = 1";
    $alt3 = "ALTER TABLE training_records ADD TR_ID int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
    $conn->exec($query);
    $conn->exec($alt1);
    $conn->exec($alt2);
    $conn->exec($alt3);
      header("location:A_training_rec1.php");

	  }

}catch(PDOException $e)
    {
   $errorMsg=  $e->getMessage();
   echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }


?>
