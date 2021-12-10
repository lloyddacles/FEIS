<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";


  $id = $_SESSION['E_ID'];

  $c1 = $c2 = $c3 = $c4 = $c5 = NULL;
  $cpic1 = $cpic2 = $cpic3 = $cpic4 = $cpic5 = NULL;
  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $query = "SELECT * FROM c WHERE C_ID ='".$id."'";

            if ($result = $conn->query($query)) {
                if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $c1 = $row['C1'];
                  $c2 = $row['C2'];
                  $c3 = $row['C3'];
                  $c4 = $row['C4'];
                  $c5 = $row['C5'];


                  //C1
                  if ($c1 == 0) {
                    $cpic1 =  '<input type="checkbox" id="c1" value="" name="c1">';
                  } else {
                    $cpic1 = '<input type="checkbox" id="c1" value="" name="c1" checked=checked>';
                  }

                  //C2
                  if ($c2 == 0) {
                    $cpic2 =  '<input type="checkbox" id="c2" value="" name="c2">';
                  } else {
                    $cpic2 = '<input type="checkbox" id="c2" value="" name="c2" checked=checked>';
                  }

                  //C3
                  if ($c3 == 0) {
                    $cpic3 =  '<input type="checkbox" id="c3" value="" name="c3">';
                  } else {
                    $cpic3 = '<input type="checkbox" id="c3" value="" name="c3" checked=checked>';
                  }

                  //C4
                  if ($c4 == 0) {
                    $cpic4 =  '<input type="checkbox" id="c4" value="" name="c4">';
                  } else {
                    $cpic4 = '<input type="checkbox" id="c4" value="" name="c4" checked=checked>';
                  }

                  //C5
                  if ($c5 == 0) {
                    $cpic5 =  '<input type="checkbox" id="c5" value="" name="c5">';
                  } else {
                    $cpic5 = '<input type="checkbox" id="c5" value="" name="c5" checked=checked>';
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
