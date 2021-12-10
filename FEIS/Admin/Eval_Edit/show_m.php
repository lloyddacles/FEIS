<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";


  $id = $_SESSION['E_ID'];

  $m1 = $m2 = $m3 = $m4 = $m5 = NULL;
  $mpic1 = $mpic2 = $mpic3 = $mpic4 = $mpic5 = NULL;
  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


          $query = "SELECT * FROM medium WHERE M_ID ='".$id."'";

            if ($result = $conn->query($query)) {
                if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $m1 = $row['M1'];
                  $m2 = $row['M2'];
                  $m3 = $row['M3'];
                  $m4 = $row['M4'];
                  $m5 = $row['M5'];

                  //M1
                  if ($m1 == NULL) {
                    $mpic1 =  '<input type="checkbox" value="Audio" id="m1" name="m1">';
                  } else {
                    $mpic1 = '<input type="checkbox" value="Audio" id="m1" name="m1" checked=checked>';
                  }

                  //M2
                  if ($m2 == NULL) {
                    $mpic2 =  '<input type="checkbox" value="Visual" id="m2" name="m2">';
                  } else {
                    $mpic2 = '<input type="checkbox" value="Visual" id="m2" name="m2" checked=checked>';
                  }

                  //M3
                  if ($m3 == NULL) {
                    $mpic3 =  '<input type="checkbox" value="Kinesthetic" id="m3" name="m3">';
                  } else {
                    $mpic3 = '<input type="checkbox" value="Kinesthetic" id="m3" name="m3" checked=checked>';
                  }

                  //M4
                  if ($m4 == NULL) {
                    $mpic4 =  '<input type="checkbox" value="Listened carefully." id="m4" name="m4">';
                  } else {
                    $mpic4 = '<input type="checkbox" value="Listened carefully." id="m4" name="m4" checked=checked>';
                  }

                  //M5
                  if ($m5 == NULL) {
                    $mpic5 =  '<input type="checkbox" value="Personally connected with the group." id="m5" name="m5">';
                  } else {
                    $mpic5 = '<input type="checkbox" value="Personally connected with the group." id="m5" name="m5" checked=checked>';
                  }

                }

              }



  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }



  ?>
