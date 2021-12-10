<?php
$servername = "localhost";
$username = "root";
$password = "";
$c1 = $c2 = $c3 = $c4 = $c5 = NULL;

$user = NULL;
$pass = NULL;
  if (isset($_POST['save_eval'])) {
    try{
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


          //C1
          if (isset($_POST['c1'])) {
            $c1 = 1;
          } else {
            $c1 = 0;
          }

          //C2
          if (isset($_POST['c2'])) {
            $c2 = 1;
          } else {
            $c2 = 0;
          }

          //C3
          if (isset($_POST['c3'])) {
            $c3 = 1;
          } else {
            $c3 = 0;
          }

          //C4
          if (isset($_POST['c4'])) {
            $c4 = 1;
          } else {
            $c4 = 0;
          }

          //C5
          if (isset($_POST['c5'])) {
            $c5 = 1;
          } else {
            $c5 = 0;
          }

          $total = $c1 + $c2 + $c3 + $c4 + $c5;
          $insert = "INSERT INTO c(C1,C2,C3,C4,C5,Total,status)
          VALUE('".$c1."','".$c2."','".$c3."','".$c4."','".$c5."','".$total."','Unsend') ";
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
      $tf = $_COOKIE["Fname"];
      $tl = $_COOKIE["Lname"];
      $evaluator = $tf." ".$tl;
      $id = $_SESSION['E_ID'];;
          //Teacher name
          if ($_POST['teacher'] == NULL) {
            echo '<script type="text/javascript">alert("INFO: WALANG TEACHER);</script>';
            $tc = NULL;
          } else {
            $tc= $_POST['teacher'];
          }

          //C1
          if (isset($_POST['c1'])) {
            $c1 = 1;
          } else {
            $c1 = 0;
          }

          //C2
          if (isset($_POST['c2'])) {
            $c2 = 1;
          } else {
            $c2 = 0;
          }

          //C3
          if (isset($_POST['c3'])) {
            $c3 = 1;
          } else {
            $c3 = 0;
          }

          //C4
          if (isset($_POST['c4'])) {
            $c4 = 1;
          } else {
            $c4 = 0;
          }

          //C5
          if (isset($_POST['c5'])) {
            $c5 = 1;
          } else {
            $c5 = 0;
          }

          $total = $c1 + $c2 + $c3 + $c4 + $c5;
          $upsched = "UPDATE c SET C1 = '".$c1."', C2 = '".$c2."', C3 = '".$c3."', C4 = '".$c4."', C5 = '".$c5."', TOTAL = '".$total."' WHERE C_ID = '".$id."' ";
          $conn->exec($upsched);

    }catch(PDOException $e)
    {
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }



  }
?>
