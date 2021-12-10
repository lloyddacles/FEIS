<?php
$servername = "localhost";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$User = $_COOKIE["Username"];
$Pass = $_COOKIE["Password"];
$stat = $_COOKIE["Status"];
$atype = $_COOKIE["Acc_type"];
$uid = $_COOKIE["uID"];
$time = $_COOKIE["Time"];
setcookie("Username", $User, time() + (86400 * 30),'/');
setcookie("Password", $Pass, time() + (86400 * 30),'/');
setcookie("Status", $stat, time() + (86400 * 30),'/');
setcookie("uID", $uid, time() + (86400 * 30),'/');
setcookie("Time",$time, time() + (86400 * 30),'/');



$select = "select * from user where Username = '".$User."' and Password = '".$Pass."' ";

if ($result = $conn->query($select)) {
if ($row = $result->fetch(PDO::FETCH_ASSOC)) {

}
}



}catch(PDOException $e)
    {

     $errorMsg=  $e->getMessage();
     echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
    }

?>
