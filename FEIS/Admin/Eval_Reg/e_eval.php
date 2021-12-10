<?php
$servername = "localhost";
$username = "root";
$password = "";
$e1 = $e2 = $e3 = $e4 = $e5 = NULL;
$user = NULL;
$pass = NULL;
$tc = NULL;
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
            echo '<script type="text/javascript">alert("INFO: WALANG TEACHER);</script>';
            $tc = NULL;
          } else {
            $tc= $_POST['teacher'];
          }

          //E1
          if (isset($_POST['e1'])) {
            $e1 = 1;
          } else {
            $e1 = 0;
          }

          //E2
          if (isset($_POST['e2'])) {
            $e2 = 1;
          } else {
            $e2 = 0;
          }

          //E3
          if (isset($_POST['e3'])) {
            $e3 = 1;
          } else {
            $e3 = 0;
          }

          //E4
          if (isset($_POST['e4'])) {
            $e4 = 1;
          } else {
            $e4 = 0;
          }

          //E5
          if (isset($_POST['e5'])) {
            $e5 = 1;
          } else {
            $e5 = 0;
          }

          $total = $e1 + $e2 + $e3 + $e4 + $e5;
          $insert = "INSERT INTO e(E1,E2,E3,E4,E5,Total,status)
          VALUE('".$e1."','".$e2."','".$e3."','".$e4."','".$e5."','".$total."','Unsend') ";
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
            echo '<script type="text/javascript">alert("INFO: WALANG TEACHER);</script>';
            $tc = NULL;
          } else {
            $tc= $_POST['teacher'];
          }

          //E1
          if (isset($_POST['e1'])) {
            $e1 = 1;
          } else {
            $e1 = 0;
          }

          //E2
          if (isset($_POST['e2'])) {
            $e2 = 1;
          } else {
            $e2 = 0;
          }

          //E3
          if (isset($_POST['e3'])) {
            $e3 = 1;
          } else {
            $e3 = 0;
          }

          //E4
          if (isset($_POST['e4'])) {
            $e4 = 1;
          } else {
            $e4 = 0;
          }

          //E5
          if (isset($_POST['e5'])) {
            $e5 = 1;
          } else {
            $e5 = 0;
          }

          $total = $e1 + $e2 + $e3 + $e4 + $e5;
          $upsched = "UPDATE e SET E1 = '".$e1."', E2 = '".$e2."', E3 = '".$e3."', E4 = '".$e4."', E5 = '".$e5."', TOTAL = '".$total."' WHERE E_ID = '".$id."' ";
          $conn->exec($upsched);


    }catch(PDOException $e)
    {
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }

  }
?>
