<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";


  $id = $_SESSION['E_ID'];

  $d1 = $d2 = $d3 = $d4 = $d5 = NULL;
  $dpic1 = $dpic2 = $dpic3 = $dpic4 = $dpic5 = NULL;
  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $query = "SELECT * FROM d WHERE D_ID ='".$id."'";

            if ($result = $conn->query($query)) {
                if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $d1 = $row['D1'];
                  $d2 = $row['D2'];
                  $d3 = $row['D3'];
                  $d4 = $row['D4'];
                  $d5 = $row['D5'];

                  //D1
                  if ($d1 == 0) {
                    $dpic1 =  '<input id="d1" type="checkbox" value="" name="d1">';
                  } else {
                    $dpic1 = '<input id="d1" type="checkbox" value="" name="d1" checked=checked>';
                  }

                  //D3
                  if ($d2 == 0) {
                    $dpic2 =  '<input id="d2" type="checkbox" value="" name="d2">';
                  } else {
                    $dpic2 = '<input id="d2" type="checkbox" value="" name="d2" checked=checked>';
                  }

                  //D3
                  if ($d3 == 0) {
                    $dpic3 =  '<input id="d3" type="checkbox" value="" name="d3">';
                  } else {
                    $dpic3 = '<input id="d3" type="checkbox" value="" name="d3" checked=checked>';
                  }

                  //D4
                  if ($d4 == 0) {
                    $dpic4 =  '<input id="d4" type="checkbox" value="" name="d4">';
                  } else {
                    $dpic4 = '<input id="d4" type="checkbox" value="" name="d4" checked=checked>';
                  }

                  //D5
                  if ($d5 == 0) {
                    $dpic5 =  '<input id="d5" type="checkbox" value="" name="d5">';
                  } else {
                    $dpic5 = '<input id="d5" type="checkbox" value="" name="d5" checked=checked>';
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
