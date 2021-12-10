<?php
$servername = "localhost";
$username = "root";
$password = "";
$l1 = $l2 = $l3 = $l4 = $l5 = $l6 = $l7 = $l8 = $l9 = $l10 = NULL;
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
          if (!isset($_POST['l1'])) {
            $l1 = null;
          } else {
            $l1 = $_POST['l1'];
          }

          //F2
          if (!isset($_POST['l2'])) {
            $l2 = null;
          } else {
            $l2 = $_POST['l2'];
          }

          //F3
          if (!isset($_POST['l3'])) {
            $l3 = null;
          } else {
            $l3 = $_POST['l3'];
          }

          //F4
          if (!isset($_POST['l4'])) {
            $l4 = null;
          } else {
            $l4 = $_POST['l4'];
          }

          //F5
          if (!isset($_POST['l5'])) {
            $l5 = null;
          } else {
            $l5 = $_POST['l5'];
          }

          //F6
          if (!isset($_POST['l6'])) {
            $l6 = null;
          } else {
            $l6 = $_POST['l6'];
          }

          //F7
          if (!isset($_POST['l7'])) {
            $l7 = null;
          } else {
            $l7 = $_POST['l7'];
          }

          //F8
          if (!isset($_POST['l8'])) {
            $l8 = null;
          } else {
            $l8 = $_POST['l8'];
          }


          $insert = "INSERT INTO learning(L1,L2,L3,L4,L5,L6,L7,L8,status)
          VALUE('".$l1."','".$l2."','".$l3."','".$l4."','".$l5."','".$l6."','".$l7."','".$l8."','Unsend') ";
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
          if (!isset($_POST['l1'])) {
            $l1 = null;
          } else {
            $l1 = $_POST['l1'];
          }

          //F2
          if (!isset($_POST['l2'])) {
            $l2 = null;
          } else {
            $l2 = $_POST['l2'];
          }

          //F3
          if (!isset($_POST['l3'])) {
            $l3 = null;
          } else {
            $l3 = $_POST['l3'];
          }

          //F4
          if (!isset($_POST['l4'])) {
            $l4 = null;
          } else {
            $l4 = $_POST['l4'];
          }

          //F5
          if (!isset($_POST['l5'])) {
            $l5 = null;
          } else {
            $l5 = $_POST['l5'];
          }

          //F6
          if (!isset($_POST['l6'])) {
            $l6 = null;
          } else {
            $l6 = $_POST['l6'];
          }

          //F7
          if (!isset($_POST['l7'])) {
            $l7 = null;
          } else {
            $l7 = $_POST['l7'];
          }

          //F8
          if (!isset($_POST['l8'])) {
            $l8 = null;
          } else {
            $l8 = $_POST['l8'];
          }


          $upsched = "UPDATE learning SET L1 = '".$l1."', L2 = '".$l2."', L3 = '".$l3."', L4 = '".$l4."', L5 = '".$l5."', L6 = '".$l6."', L7 = '".$l7."', L8 = '".$l8."' WHERE L_ID = '".$id."' ";
          $conn->exec($upsched);



    }catch(PDOException $e)
    {
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }



  }
?>
