<?php
$servername = "localhost";
$username = "root";
$password = "";
$m1 = $m2 = $m3 = $m4 = $m5 = $m6 = $m7 = $m8 = $m9 = $m10 = NULL;
$user = NULL;
$pass = NULL;
  if (isset($_POST['save_eval'])) {
    try{
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $tf = $_COOKIE["Fname"];
      $tl = $_COOKIE["Lname"];
      $evaluator = $tf." ".$tl;
          //Teacher name
          if ($_POST['teacher'] == NULL) {
            echo '<script type="text/javascript">alert("INFO: WALANG TEACHER");</script>';
            $tc = NULL;
          } else {
            $tc= $_POST['teacher'];
          }

          //F1
          if (!isset($_POST['m1'])) {
            $m1 = null;
          } else {
            $m1 = $_POST['m1'];
          }

          //F2
          if (!isset($_POST['m2'])) {
            $m2 = null;
          } else {
            $m2 = $_POST['m2'];
          }

          //F3
          if (!isset($_POST['m3'])) {
            $m3 = null;
          } else {
            $m3 = $_POST['m3'];
          }

          //F4
          if (!isset($_POST['m4'])) {
            $m4 = null;
          } else {
            $m4 = $_POST['m4'];
          }

          //F5
          if (!isset($_POST['m5'])) {
            $m5 = null;
          } else {
            $m5 = $_POST['m5'];
          }



          $insert = "INSERT INTO medium(M1,M2,M3,M4,M5,status)
          VALUE('".$m1."','".$m2."','".$m3."','".$m4."','".$m5."','Unsend') ";
                $conn->exec($insert);

    }catch(PDOException $e)
    {
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }



  }

  if (isset($_POST['edit_eval'])) {
    try{
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $id = $_SESSION['E_ID'];
      $tf = $_COOKIE["Fname"];
      $tl = $_COOKIE["Lname"];
      $evaluator = $tf." ".$tl;
          //Teacher name
          if ($_POST['teacher'] == NULL) {
            echo '<script type="text/javascript">alert("INFO: WALANG TEACHER");</script>';
            $tc = NULL;
          } else {
            $tc= $_POST['teacher'];
          }

          //F1
          if (!isset($_POST['m1'])) {
            $m1 = null;
          } else {
            $m1 = $_POST['m1'];
          }

          //F2
          if (!isset($_POST['m2'])) {
            $m2 = null;
          } else {
            $m2 = $_POST['m2'];
          }

          //F3
          if (!isset($_POST['m3'])) {
            $m3 = null;
          } else {
            $m3 = $_POST['m3'];
          }

          //F4
          if (!isset($_POST['m4'])) {
            $m4 = null;
          } else {
            $m4 = $_POST['m4'];
          }

          //F5
          if (!isset($_POST['m5'])) {
            $m5 = null;
          } else {
            $m5 = $_POST['m5'];
          }



          $upsched = "UPDATE medium SET M1 = '".$m1."', M2 = '".$m2."', M3 = '".$m3."', M4 = '".$m4."', M5 = '".$m5."' WHERE M_ID = '".$id."' ";
          $conn->exec($upsched);

    }catch(PDOException $e)
    {
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }



  }
?>
