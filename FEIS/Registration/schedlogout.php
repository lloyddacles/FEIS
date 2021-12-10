<?php
//From Log in form
$servername = "localhost";
$username = "root";
$password = "";


  // try{
  //   $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  //   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //
  //   $up = "UPDATE user SET Status = 'Offline' WHERE User_ID = '".$_COOKIE['uID']."'";
  //   $conn->exec($up);
  //   unset($_COOKIE['Acc_type']);
  //   setcookie("Acc_type", "", time()-3600,'/');
  //
  //   unset($_COOKIE['Fname']);
  //   setcookie("Fname", "", time()-3600,'/');
  //
  //   unset($_COOKIE['Lname']);
  //   setcookie("Lname", "", time()-3600,'/');
  //
  //   unset($_COOKIE['uID']);
  //   setcookie("uID", "", time()-3600,'/');
  //
  //   unset($_COOKIE['Sched_TC']);
  //   setcookie("Sched_TC", "", time()-3600,'/');
  //
  //
  //
  // }catch(PDOException $e)
  // {
  //   echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
  //   $errorMsg=  $e->getMessage();
  //   echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  // }


  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $up = "UPDATE user SET Status = 'Offline' WHERE User_ID = '".$_COOKIE['uID']."'";
    $conn->exec($up);
    unset($_COOKIE['Acc_type']);
    setcookie("Acc_type", "", time()-3600,'/');

    unset($_COOKIE['Fname']);
    setcookie("Fname", "", time()-3600,'/');

    unset($_COOKIE['Lname']);
    setcookie("Lname", "", time()-3600,'/');

    unset($_COOKIE['uID']);
    setcookie("uID", "", time()-3600,'/');

    unset($_COOKIE['Sched_TC']);
    setcookie("Sched_TC", "", time()-3600,'/');

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }





?>
