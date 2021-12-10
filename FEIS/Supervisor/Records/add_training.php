<?php
//From Log in form
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST['addtrain'])){
  try {
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $certi = $_POST['certi'];
      $id = $_POST['id'];
      $tname = $_POST['teach'];
      $loc = $_POST['loc'];
      $date = $_POST['date'];

      $insert = "INSERT INTO training_records(Certificate, T_Name, Location, Date) VALUES('".$certi."','".$tname."','".$loc."','".$date."')";
      $conn->exec($insert);

      echo '<script type="text/javascript">
      location.href = "S_TRecords.php";
      </script>';

  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }

}

if(isset($_POST['deltrain'])){
  try {
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $id = $_POST['did'];

      $del = "DELETE FROM training_records WHERE TR_ID = '".$id."'";
      $conn->exec($del);

      echo '<script type="text/javascript">
      location.href = "S_TRecords.php";
      </script>';


  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }

}

if(isset($_POST['editrain'])){
  try {
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $certi = $_POST['ecerti'];
      $id = $_POST['eid'];
      $tname = $_POST['eteach'];
      $loc = $_POST['eloc'];
      $date = $_POST['edate'];

      $up = "UPDATE training_records SET Certificate = '".$certi."', T_Name = '".$tname."', Location = '".$loc."', Date = '".$date."' WHERE TR_ID = '".$id."' ";
      $conn->exec($up);

      echo '<script type="text/javascript">
      location.href = "S_TRecords.php";
      </script>';

  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }

}

  ?>
