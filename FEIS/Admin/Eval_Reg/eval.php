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


    $com = $_POST['comment'];
    $result = $a1 + $a2 + $a3 + $a4 + $a5 + $b1 + $b2 + $b3 + $b4 + $b5 + $b6 + $b7 + $b8 + $b9 + $b10 +
    $c1 + $c2 + $c3 + $c4 + $c5 + $d1 + $d2 + $d3 + $d4 + $d5 + $e1 + $e2 + $e3 + $e4 + $e5;
    $total = 30;
    $percent = ($result/$total)*100;
    $evaluator = $_COOKIE['uID'];
    $tcay = $_POST['tc'];
    $insert = "INSERT INTO evaluation(TC_ID, Total, Percent, Evaluator_ID, comment, status,Acknowledgement)
    VALUE('".$tcay."','".$result."','".$percent."','".$evaluator."','".$com."','Unsend','Unacknowledge') ";
    $conn->exec($insert);



    $delete = "DELETE FROM e_sched WHERE ES_ID = '".$_SESSION['ES_ID']."'";
    // $conn->exec($delete);

    if ($_POST['save_eval'] == "exit") {
      echo '<script type="text/javascript">
      location.href = "A_Index.php";
      </script>';
    } else {
      echo "
      <script>
      Swal.fire(
        'The Internet?',
        'That thing is still around?',
        'question'
        )
        </script>
        ";
      }


    }catch(PDOException $e)
    {
      $errorMsg=  $e->getMessage();
      echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
    }



  }

  if (isset($_POST['edit_eval']) || isset($_POST['edit_eva2'])) {
    try{
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $id = $_SESSION['E_ID'];
      $com = $_POST['comment'];
      $result = $a1 + $a2 + $a3 + $a4 + $a5 + $b1 + $b2 + $b3 + $b4 + $b5 + $b6 + $b7 + $b8 + $b9 + $b10 +
      $c1 + $c2 + $c3 + $c4 + $c5 + $d1 + $d2 + $d3 + $d4 + $d5 + $e1 + $e2 + $e3 + $e4 + $e5;
      $total = 30;
      $percent = ($result/$total)*100;
      $tf = $_COOKIE["Fname"];
      $tl = $_COOKIE["Lname"];
      $evaluator = $tf." ".$tl;
      $update = "UPDATE evaluation SET TOTAL ='".$result."', Percent ='".$percent."', comment ='".$com."' WHERE Eval_ID ='".$id."'";
      $conn->exec($update);
      if ($_POST['edit_eval'] == "exit") {
        echo '<script type="text/javascript">
        location.href = "A_Index.php";
        </script>';
      }

      }catch(PDOException $e)
      {
        $errorMsg=  $e->getMessage();
        echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }



    }


  ?>
