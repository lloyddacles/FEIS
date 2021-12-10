<?php
$servername = "localhost";
$username = "root";
$password = "";
//From Log in form
try {
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  if (isset($_POST['Offline'])) {

    $sql = "UPDATE user SET Status='Offline' WHERE User_ID = '$uid'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    unset($_COOKIE['Acc_type']);
    setcookie("Acc_type", "", time()-3600);

    unset($_COOKIE['Fname']);
    setcookie("Fname", "", time()-3600);

    unset($_COOKIE['PHPSESSID']);
    setcookie("PHPSESSID", "", time()-3600);

    unset($_COOKIE['ID']);
    setcookie("ID", "", time()-3600, '/');

    unset($_COOKIE['Password']);
    setcookie("Password", "", time()-3600);

    unset($_COOKIE['Status']);
    setcookie("Status", "", time()-3600);

    unset($_COOKIE['Time']);
    setcookie("Time", "", time()-3600);

    unset($_COOKIE['Username']);
    setcookie("Username", "", time()-3600);

    unset($_COOKIE['lname']);
    setcookie("lname", "", time()-3600);

    unset($_COOKIE['pma_lang']);
    setcookie("pma_lang", "", time()-3600);

    unset($_COOKIE['uID']);
    setcookie("uID", "", time()-3600);

    unset($_SESSION['logged_in']);
      session_destroy();  
    header("location:login.php");

  }

}catch(PDOException $e)
{

  $errorMsg=  $e->getMessage();
  echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}



?>
