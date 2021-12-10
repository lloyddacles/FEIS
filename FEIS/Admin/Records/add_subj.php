<?php
//From Log in form
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST['addsub'])){
  try {
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $n = $_POST['sname'];
      $c = $_POST['scode'];
      $d = $_POST['sdesc'];
      $u = $_POST['sunit'];
      $t = $_POST['stype'];

      $insert = "INSERT INTO subject(scode, sname, sdesc, sunit, stype) VALUES('".$c."','".$n."','".$d."','".$u."','".$t."')";
      $conn->exec($insert);

      echo '<script type="text/javascript">
      location.href = "A_SRecords.php";
      </script>';

  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }

}


if(isset($_POST['editsub'])){
  try {
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $i = $_POST['esid'];
      $n = $_POST['esname'];
      $c = $_POST['escode'];
      $d = $_POST['esdesc'];
      $u = $_POST['esunit'];
      $t = $_POST['estype'];

      $up = "UPDATE subject SET scode = '".$c."', sname = '".$n."', sdesc = '".$d."', sunit = '".$u."', stype = '".$t."' WHERE s_id = '".$i."'";
      $conn->exec($up);

      echo '<script type="text/javascript">
      location.href = "A_SRecords.php";
      </script>';

  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }

}

if(isset($_POST['delsub'])){
  try {
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $i = $_POST['dsid'];

      $del = "DELETE FROM subject WHERE s_id = '".$i."'";
      $conn->exec($del);

      echo '<script type="text/javascript">
      location.href = "A_SRecords.php";
      </script>';

  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }

}


  ?>
