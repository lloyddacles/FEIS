<?php
$servername = "localhost";
$username = "root";
$password = "";
$d1 = $d2 = $d3 = $d4 = $d5 = NULL;
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
            echo '<script type="text/javascript">alert("INFO: WALANG TEACHER);</script>';
            $tc = NULL;
          } else {
            $tc= $_POST['teacher'];
          }

          //D1
          if (isset($_POST['d1'])) {
            $d1 = 1;
          } else {
            $d1 = 0;
          }

          //D2
          if (isset($_POST['d2'])) {
            $d2 = 1;
          } else {
            $d2 = 0;
          }

          //D3
          if (isset($_POST['d3'])) {
            $d3 = 1;
          } else {
            $d3 = 0;
          }

          //D4
          if (isset($_POST['d4'])) {
            $d4 = 1;
          } else {
            $d4 = 0;
          }

          //D5
          if (isset($_POST['d5'])) {
            $d5 = 1;
          } else {
            $d5 = 0;
          }

          $total = $d1 + $d2 + $d3 + $d4 + $d5;
          $insert = "INSERT INTO d(D1,D2,D3,D4,D5,Total,status)
          VALUE('".$d1."','".$d2."','".$d3."','".$d4."','".$d5."','".$total."','Unsend') ";
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

          //D1
          if (isset($_POST['d1'])) {
            $d1 = 1;
          } else {
            $d1 = 0;
          }

          //D2
          if (isset($_POST['d2'])) {
            $d2 = 1;
          } else {
            $d2 = 0;
          }

          //D3
          if (isset($_POST['d3'])) {
            $d3 = 1;
          } else {
            $d3 = 0;
          }

          //D4
          if (isset($_POST['d4'])) {
            $d4 = 1;
          } else {
            $d4 = 0;
          }

          //D5
          if (isset($_POST['d5'])) {
            $d5 = 1;
          } else {
            $d5 = 0;
          }

          $total = $d1 + $d2 + $d3 + $d4 + $d5;
          $upsched = "UPDATE d SET D1 = '".$d1."', D2 = '".$d2."', D3 = '".$d3."', D4 = '".$d4."', D5 = '".$d5."', TOTAL = '".$total."' WHERE D_ID = '".$id."' ";
          $conn->exec($upsched);


    }catch(PDOException $e)
    {
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }



  }
?>
