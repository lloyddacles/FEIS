<?php
$servername = "localhost";
$username = "root";
$password = "";
$user = NULL;
$pass = NULL;
  if (isset($_POST['save_eval'])) {
    try{
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


          //Teacher name
          if ($_POST['tc'] == 0) {
            echo '<script type="text/javascript">alert("INFO: WALANG TEACHER);</script>';
            $tc = NULL;
          } else {
            $tc= $_POST['tc'];
          }

          //A1
          if (isset($_POST['a1'])) {
            $a1 = 1;
          } else {
            $a1 = 0;
          }

          //A2
          if (isset($_POST['a2'])) {
            $a2 = 1;
          } else {
            $a2 = 0;
          }

          //A3
          if (isset($_POST['a3'])) {
            $a3 = 1;
          } else {
            $a3 = 0;
          }

          //A4
          if (isset($_POST['a4'])) {
            $a4 = 1;
          } else {
            $a4 = 0;
          }

          //A5
          if (isset($_POST['a5'])) {
            $a5 = 1;
          } else {
            $a5 = 0;
          }

          $total = $a1 + $a2 + $a3 + $a4 + $a5;
          $insert = "INSERT INTO a(A1,A2,A3,A4,A5,total,status)
          VALUE('".$a1."','".$a2."','".$a3."','".$a4."','".$a5."','".$total."','Unsend') ";
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
          if ($_POST['teacher'] == 0) {
            echo '<script type="text/javascript">alert("INFO: WALANG TEACHER);</script>';
            $tc = NULL;
          } else {
            $tc= $_POST['teacher'];
          }

          //A1
          if (isset($_POST['a1'])) {
            $a1 = 1;
          } else {
            $a1 = 0;
          }

          //A2
          if (isset($_POST['a2'])) {
            $a2 = 1;
          } else {
            $a2 = 0;
          }

          //A3
          if (isset($_POST['a3'])) {
            $a3 = 1;
          } else {
            $a3 = 0;
          }

          //A4
          if (isset($_POST['a4'])) {
            $a4 = 1;
          } else {
            $a4 = 0;
          }

          //A5
          if (isset($_POST['a5'])) {
            $a5 = 1;
          } else {
            $a5 = 0;
          }

          $total = $a1 + $a2 + $a3 + $a4 + $a5;
          $upsched = "UPDATE a SET A1 = '".$a1."', A2 = '".$a2."', A3 = '".$a3."', A4 = '".$a4."', A5 = '".$a5."', TOTAL = '".$total."' WHERE A_ID = '".$id."' ";
          $conn->exec($upsched);



    }catch(PDOException $e)
    {
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }



  }
?>
