<?php
$servername = "localhost";
$username = "root";
$password = "";
$f1 = $f2 = $f3 = $f4 = $f5 = $f6 = $f7 = $f8 = $f9 = $f10 = NULL;
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
          if (!isset($_POST['f1'])) {
            $f1 = null;
          } else {
            $f1 = $_POST['f1'];
          }

          //F2
          if (!isset($_POST['f2'])) {
            $f2 = null;
          } else {
            $f2 = $_POST['f2'];
          }

          //F3
          if (!isset($_POST['f3'])) {
            $f3 = null;
          } else {
            $f3 = $_POST['f3'];
          }

          //F4
          if (!isset($_POST['f4'])) {
            $f4 = null;
          } else {
            $f4 = $_POST['f4'];
          }

          //F5
          if (!isset($_POST['f5'])) {
            $f5 = null;
          } else {
            $f5 = $_POST['f5'];
          }

          //F6
          if (!isset($_POST['f6'])) {
            $f6 = null;
          } else {
            $f6 = $_POST['f6'];
          }

          //F7
          if (!isset($_POST['f7'])) {
            $f7 = null;
          } else {
            $f7 = $_POST['f7'];
          }

          //F8
          if (!isset($_POST['f8'])) {
            $f8 = null;
          } else {
            $f8 = $_POST['f8'];
          }

          //F9
          if (!isset($_POST['f9'])) {
            $f9 = null;
          } else {
            $f9 = $_POST['f9'];
          }

          //F10
          if (!isset($_POST['f10'])) {
            $f10 = null;
          } else {
            $f10 = $_POST['f10'];
          }

          //F11
          if (!isset($_POST['f11'])) {
            $f11 = null;
          } else {
            $f11 = $_POST['f11'];
          }

          //F12
          if (!isset($_POST['f12'])) {
            $f12 = null;
          } else {
            $f12 = $_POST['f12'];
          }

          //F13
          if (!isset($_POST['f13'])) {
            $f13 = null;
          } else {
            $f13 = $_POST['f13'];
          }

          $insert = "INSERT INTO feedback(F1,F2,F3,F4,F5,F6,F7,F8,F9,F10,F11,F12,F13,status)
          VALUE('".$f1."','".$f2."','".$f3."','".$f4."','".$f5."','".$f6."','".$f7."','".$f8."','".$f9."','".$f10."','".$f11."','".$f12."','".$f13."','Unsend') ";
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
          if (!isset($_POST['f1'])) {
            $f1 = null;
          } else {
            $f1 = $_POST['f1'];
          }

          //F2
          if (!isset($_POST['f2'])) {
            $f2 = null;
          } else {
            $f2 = $_POST['f2'];
          }

          //F3
          if (!isset($_POST['f3'])) {
            $f3 = null;
          } else {
            $f3 = $_POST['f3'];
          }

          //F4
          if (!isset($_POST['f4'])) {
            $f4 = null;
          } else {
            $f4 = $_POST['f4'];
          }

          //F5
          if (!isset($_POST['f5'])) {
            $f5 = null;
          } else {
            $f5 = $_POST['f5'];
          }

          //F6
          if (!isset($_POST['f6'])) {
            $f6 = null;
          } else {
            $f6 = $_POST['f6'];
          }

          //F7
          if (!isset($_POST['f7'])) {
            $f7 = null;
          } else {
            $f7 = $_POST['f7'];
          }

          //F8
          if (!isset($_POST['f8'])) {
            $f8 = null;
          } else {
            $f8 = $_POST['f8'];
          }

          //F9
          if (!isset($_POST['f9'])) {
            $f9 = null;
          } else {
            $f9 = $_POST['f9'];
          }

          //F10
          if (!isset($_POST['f10'])) {
            $f10 = null;
          } else {
            $f10 = $_POST['f10'];
          }

          //F11
          if (!isset($_POST['f11'])) {
            $f11 = null;
          } else {
            $f11 = $_POST['f11'];
          }

          //F12
          if (!isset($_POST['f12'])) {
            $f12 = null;
          } else {
            $f12 = $_POST['f12'];
          }

          //F13
          if (!isset($_POST['f13'])) {
            $f13 = null;
          } else {
            $f13 = $_POST['f13'];
          }

          $upsched = "UPDATE feedback SET F1 = '".$f1."', F2 = '".$f2."', F3 = '".$f3."', F4 = '".$f4."', F5 = '".$f5."', F6 = '".$f6."', F7 = '".$f7."', F8 = '".$f8."', F9 = '".$f9."', F10 = '".$f10."', F11 = '".$f11."', F12 = '".$f12."',
                     F13 = '".$f13."' WHERE F_ID = '".$id."' ";
          $conn->exec($upsched);


    }catch(PDOException $e)
    {
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }



  }
?>
