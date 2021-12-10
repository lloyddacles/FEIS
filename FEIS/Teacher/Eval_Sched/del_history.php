<?php
//From Log in form
$servername = "localhost";
$username = "root";
$password = "";



if (isset($_POST['Acknow'])) {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_POST['uID'];
    $elid = $_POST['evalid'];
    $update = "UPDATE evaluation SET Acknowledgement ='Acknowledge' WHERE Eval_ID = '".$elid."'";

    $conn->exec($update);

    echo '<script type="text/javascript">
    location.href = "T_EvalHistory.php";
    </script>';
    // $conn->exec($alter1);
    // $conn->exec($alter2);
    // $conn->exec($alter3);

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }
}
if (isset($_POST['unacknow'])) {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_POST['uID'];
    $elid = $_POST['uevalid'];
    $update = "UPDATE evaluation SET Acknowledgement ='Unacknowledge' WHERE Eval_ID = '".$elid."'";

    $conn->exec($update);

    echo '<script type="text/javascript">

    location.href = "T_EvalHistory.php";
    </script>';
    // $conn->exec($alter1);
    // $conn->exec($alter2);
    // $conn->exec($alter3);

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }
}



?>
