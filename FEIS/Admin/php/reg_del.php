<?php

	$servername = "localhost";
$username = "root";
$password = "";

$i = "";
if (isset($_POST['del'])) {
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




  $id = $_POST['idd'];

 $query = "SELECT * FROM registration WHERE regist_id = '".$id."'";

 if ($result = $conn->query($query)) {
 if ($data = $result->fetch(PDO::FETCH_ASSOC)) {

	   $delete = "DELETE FROM registration WHERE regist_id = '".$id."' ";
      $alter1 = "ALTER TABLE registration DROP regist_id";
      $alter2 = "ALTER TABLE registration AUTO_INCREMENT = 1";
      $alter3 = "ALTER TABLE registration ADD regist_id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
      $conn->exec($delete);
      $conn->exec($alter1);
      $conn->exec($alter2);
      $conn->exec($alter3);



      echo '<script type="text/javascript">alert("Account Deleted");
               window.location.href="Registration-records.php";
            </script>';





} else{
           $i = "The ID you entered is not existed";
 $errorto = "#Modal2";}
}



}catch(PDOException $e)
    {
   $errorMsg=  $e->getMessage();
   echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }

}
?>
