<?php

$servername = "localhost";
$username = "root";
$password = "";

try{
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$User = $_COOKIE["Username"];
$Pass = $_COOKIE["Password"];
$stat = $_COOKIE["Status"];
$atype = $_COOKIE["Acc_type"];
$uid = $_COOKIE["uID"];
$time = $_COOKIE["Time"];
setcookie("Username", $User);
setcookie("Password", $Pass);
setcookie("Status", $stat);
setcookie("uID", $uid);
setcookie("Time",$time);



  if(isset($_POST['insert'])){
  $t = $_POST['t'];
  $l = $_POST['l'];
  $c = $_POST['c'];
  $date = $_POST['date'];


  $sql = "INSERT INTO training_records (Certificate,T_Name,Location,Date,User_ID) VALUES ('".$c."','".$t."','".$l."','".$date."','".$uid."')";
  $conn->exec($sql);


 if ($atype == 'Teacher') {
            header("location:../../T_training_rec1.php");
          }
          elseif ($atype == 'Supervisor') {
            header("location:S_training_rec1.php");
          }
          elseif ($atype == 'Admin') {
            header("location:../../A_training_rec1.php");
          }
}

}catch(PDOException $e)
    {
   $errorMsg=  $e->getMessage();
   echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }


?>
