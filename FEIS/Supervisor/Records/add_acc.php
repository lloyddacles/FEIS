<?php
//From Log in form
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST['addacc'])){

  try {
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];
    $atype = $_POST['atype'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $addr = $_POST['addr'];
    $cnum = $_POST['cnum'];
    $bday = $_POST['bday'];
    $desc = " ";
    $status = 'Offline';
    $desc = " ";
    $google = " ";
    $log = 0;
    $today = date("Y-m-d");
    $diff = date_diff(date_create($bday), date_create($today));
    $age = $diff->format('%y');

    if ($gender == 'Male') {
      $ti = 'Mr.';
      $sel = "SELECT * FROM photo WHERE ID = 1";
      if ($result = $conn->query($sel)) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          $pic = $row['Pic'];
        }
      }

    } elseif ($gender == "Female") {
      $ti = 'Ms.';
      $sel = "SELECT * FROM photo WHERE ID = 2";
      if ($result = $conn->query($sel)) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          $pic = $row['Pic'];
        }
      }
    } else {
      $ti = " ";
      $sel = "SELECT * FROM photo WHERE ID = 3";
      if ($result = $conn->query($sel)) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          $pic = $row['Pic'];
        }
      }
    }

    $insert = $conn->prepare("INSERT INTO user VALUES('',?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $insert->bindParam(1,$google);
    $insert->bindParam(2,$uname);
    $insert->bindParam(3,$pword);
    $insert->bindParam(4,$ti);
    $insert->bindParam(5,$fname);
    $insert->bindParam(6,$mname);
    $insert->bindParam(7,$lname);
    $insert->bindParam(8,$gender);
    $insert->bindParam(9,$addr);
    $insert->bindParam(10,$bday);
    $insert->bindParam(11,$age);
    $insert->bindParam(12,$cnum);
    $insert->bindParam(13,$email);
    $insert->bindParam(14,$atype);
    $insert->bindParam(15,$status);
    $insert->bindParam(16,$log);
    $insert->bindParam(17,$pic);
    $insert->bindParam(18,$desc);
    $insert->bindParam(19,$today);
    $insert->execute();

    //
    echo '<script type="text/javascript">
    location.href = "S_ARecords.php";
    </script>';

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }

}



if(isset($_POST['dacc'])){

  try {
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ay = $_POST['did'];

    $del = "DELETE FROM user WHERE User_ID = '".$ay."'";
    $conn->exec($del);
    //
    echo '<script type="text/javascript">
    location.href = "S_ARecords.php";
    </script>';

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }

}

if(isset($_POST['eacc'])){

  try {
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ay = $_POST['eid'];
    $euname = $_POST['euname'];
    $epword = $_POST['epword'];
    $eemail = $_POST['eemail'];
    $eatype = $_POST['eatype'];

    $up = "UPDATE user SET Username = '".$euname."', Password = '".$epword."' , Email = '".$eemail."', A_Type = '".$eatype."' WHERE User_ID = '".$ay."'";
    $conn->exec($up);
    //
    echo '<script type="text/javascript">
    location.href = "S_ARecords.php";
    </script>';

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }

}


?>
