<?php
//From Log in form
$servername = "localhost";
$username = "root";
$password = "";



if (isset($_POST['confirm'])) {


  try {
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $regid = $_POST['id'];

        $sel1 = "SELECT * FROM registration WHERE regist_id = '".$regid."'";
        if ($result = $conn->query($sel1)) {
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $google = $row['Google_ID'];
            $uname = $_POST['uname'];
            $pword = $_POST['pword'];
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $lname = $_POST['lname'];
            $atype = $_POST['atype'];
            $gender = $_POST['gender'];

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
            $email = $_POST['email'];
            $addr = $_POST['addr'];
            $cnum = $_POST['cnum'];
            $status = 'Offline';
            $desc = " ";
            $log = 0;
            $bday = $_POST['bday'];
            $today = date("Y-m-d");
            $diff = date_diff(date_create($bday), date_create($today));
            $age = $diff->format('%y');




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

            $id = $_POST['id'];
            $del = "DELETE FROM registration WHERE regist_id='".$id."'";
            $conn->exec($del);

            echo '<script type="text/javascript">
            location.href = "T_RRecords.php";
            </script>';


          }
        }







  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }

}


?>
