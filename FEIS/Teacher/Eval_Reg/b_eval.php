<?php
$servername = "localhost";
$username = "root";
$password = "";
$b1 = $b2 = $b3 = $b4 = $b5 = $b6 = $b7 = $b8 = $b9 = $b10 = NULL;

$user = NULL;
$pass = NULL;
  if (isset($_POST['save_eval'])) {
    try{
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          //B1
          if (isset($_POST['b1'])) {
            $b1 = 1;
          } else {
            $b1 = 0;
          }

          //B2
          if (isset($_POST['b2'])) {
            $b2 = 1;
          } else {
            $b2 = 0;
          }

          //B3
          if (isset($_POST['b3'])) {
            $b3 = 1;
          } else {
            $b3 = 0;
          }

          //B4
          if (isset($_POST['b4'])) {
            $b4 = 1;
          } else {
            $b4 = 0;
          }

          //B5
          if (isset($_POST['b5'])) {
            $b5 = 1;
          } else {
            $b5 = 0;
          }

          //B6
          if (isset($_POST['b6'])) {
            $b6 = 1;
          } else {
            $b6 = 0;
          }

          //B7
          if (isset($_POST['b7'])) {
            $b7 = 1;
          } else {
            $b7 = 0;
          }

          //B8
          if (isset($_POST['b8'])) {
            $b8 = 1;
          } else {
            $b8 = 0;
          }

          //B5
          if (isset($_POST['b9'])) {
            $b9 = 1;
          } else {
            $b9 = 0;
          }

          //B5
          if (isset($_POST['b10'])) {
            $b10 = 1;
          } else {
            $b10 = 0;
          }

          $total = $b1 + $b2 + $b3 + $b4 + $b5 + $b6 + $b7 + $b8 + $b9 + $b10;
          $insert = "INSERT INTO b(B1,B2,B3,B4,B5,B6,B7,B8,B9,B10,total,status)
          VALUE('".$b1."','".$b2."','".$b3."','".$b4."','".$b5."','".$b6."','".$b7."','".$b8."','".$b9."','".$b10."','".$total."','Unsend') ";
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
      $id = $_SESSION['E_ID'];
          //Teacher name
          if ($_POST['teacher'] == NULL) {
            echo '<script type="text/javascript">alert("INFO: WALANG TEACHER);</script>';
            $tc = NULL;
          } else {
            $tc= $_POST['teacher'];
          }

          //B1
          if (isset($_POST['b1'])) {
            $b1 = 1;
          } else {
            $b1 = 0;
          }

          //B2
          if (isset($_POST['b2'])) {
            $b2 = 1;
          } else {
            $b2 = 0;
          }

          //B3
          if (isset($_POST['b3'])) {
            $b3 = 1;
          } else {
            $b3 = 0;
          }

          //B4
          if (isset($_POST['b4'])) {
            $b4 = 1;
          } else {
            $b4 = 0;
          }

          //B5
          if (isset($_POST['b5'])) {
            $b5 = 1;
          } else {
            $b5 = 0;
          }

          //B6
          if (isset($_POST['b6'])) {
            $b6 = 1;
          } else {
            $b6 = 0;
          }

          //B7
          if (isset($_POST['b7'])) {
            $b7 = 1;
          } else {
            $b7 = 0;
          }

          //B8
          if (isset($_POST['b8'])) {
            $b8 = 1;
          } else {
            $b8 = 0;
          }

          //B5
          if (isset($_POST['b9'])) {
            $b9 = 1;
          } else {
            $b9 = 0;
          }

          //B5
          if (isset($_POST['b10'])) {
            $b10 = 1;
          } else {
            $b10 = 0;
          }

          $total = $b1 + $b2 + $b3 + $b4 + $b5 + $b6 + $b7 + $b8 + $b9 + $b10;
          $upsched = "UPDATE b SET B1 = '".$b1."', B2 = '".$b2."', B3 = '".$b3."', B4 = '".$b4."', B5 = '".$b5."', B6 = '".$b6."', B7 = '".$b7."', B8 = '".$b8."', B9 = '".$b9."', B10 = '".$b10."', TOTAL = '".$total."' WHERE B_ID = '".$id."' ";
          $conn->exec($upsched);





    }catch(PDOException $e)
    {
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }



  }
?>
