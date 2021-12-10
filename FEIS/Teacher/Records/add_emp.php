<?php
//From Log in form
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST['addjob'])){
  try {
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $emp = $_POST['emp'];
      $off = $_POST['off'];
      $pos = $_POST['pos'];
      $stat = $_POST['stat'];
      $job = $_POST['jgl'];
      $dat = $_POST['date'];

      $insert = "INSERT INTO job_info(Employer, Office_add, Job_GL, Position, Status, Date) VALUES('".$emp."','".$off."','".$job."','".$pos."','".$stat."','".$dat."')";
      $conn->exec($insert);

      echo '<script type="text/javascript">
      location.href = "T_ERecords.php";
      </script>';

  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }

}

if(isset($_POST['editjob'])){
  try {
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $id = $_POST['eid'];
      $emp = $_POST['eemp'];
      $off = $_POST['eoff'];
      $pos = $_POST['epos'];
      $stat = $_POST['estat'];
      $job = $_POST['ejgl'];
      $dat = $_POST['edate'];

      $update = "UPDATE job_info SET Employer = '".$emp."', Office_add = '".$off."', Job_GL = '".$job."', Position = '".$pos."', Status = '".$stat."', Date = '".$dat."' WHERE Job_No = '".$id."'";
      $conn->exec($update);
      echo '<script type="text/javascript">
      location.href = "T_ERecords.php";
      </script>';

  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }

}

if(isset($_POST['deljob'])){
  try {
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $id = $_POST['did'];

      $del = "DELETE FROM job_info WHERE Job_No ='".$id."'";
      $conn->exec($del);
      echo '<script type="text/javascript">
      location.href = "T_ERecords.php";
      </script>';

  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }

}

  ?>
