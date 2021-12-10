<?php
//From Log in form
$servername = "localhost";
$username = "root";
$password = "";

if (isset($_POST['delreg'])) {
  // code...    //
  try {
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_POST['drid'];
        $del = "DELETE FROM registration WHERE regist_id='".$id."'";
        $conn->exec($del);

        echo '<script type="text/javascript">
        location.href = "T_RRecords.php";
        </script>';



  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }

}



?>
