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
  $Employer = $_POST['employer'];
  $Office = $_POST['office'];
  $JobGL = $_POST['jobgl'];
  $Position = $_POST['pos'];
  $Start = $_POST['start'];
  $End = $_POST['status'];


  $sql = "INSERT INTO job_info (User_ID, Employer, Office_add, Job_GL, Position, Date_hired, E_Status) VALUES ('".$uid."','".$Employer."','".$Office."','".$JobGL."','".$Position."','".$Start."','".$End."')";
  $conn->exec($sql);


 if ($atype == 'Teacher') {
            header("location:T_employee_rec1.php");
          }
          elseif ($atype == 'Supervisor') {
            header("location:S_employee_rec1.php");
          }
          elseif ($atype == 'Admin') {
            header("location:A_employee_rec1.php");
          }
}

}catch(PDOException $e)
    {
   $errorMsg=  $e->getMessage();
   echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }


?>
