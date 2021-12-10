<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";


  $id = $_SESSION['E_ID'];
  $e1 = $e2 = $e3 = $e4 = $e5 = NULL;
  $epic1 = $epic2 = $epic3 = $epic4 = $epic5 = NULL;
  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


          $query = "SELECT * FROM e WHERE E_ID ='".$id."'";

            if ($result = $conn->query($query)) {
                if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $e1 = $row['E1'];
                  $e2 = $row['E2'];
                  $e3 = $row['E3'];
                  $e4 = $row['E4'];
                  $e5 = $row['E5'];

                  //E1
                  if ($e1 == 0) {
                    $epic1 =  '<input type="checkbox" value="" id="e1" name="e1">';
                  } else {
                    $epic1 = '<input type="checkbox" value="" id="e1" name="e1" checked=checked>';
                  }

                  //E2
                  if ($e2 == 0) {
                    $epic2 =  '<input type="checkbox" value="" id="e2" name="e2">';
                  } else {
                    $epic2 = '<input type="checkbox" value="" id="e2" name="e2" checked=checked>';
                  }

                  //E3
                  if ($e3 == 0) {
                    $epic3 =  '<input type="checkbox" value="" id="e3" name="e3">';
                  } else {
                    $epic3 = '<input type="checkbox" value="" id="e3" name="e3" checked=checked>';
                  }

                  //E4
                  if ($e4 == 0) {
                    $epic4 =  '<input type="checkbox" value="" id="e4" name="e4">';
                  } else {
                    $epic4 = '<input type="checkbox" value="" id="e4" name="e4" checked=checked>';
                  }

                  //E5
                  if ($e5 == 0) {
                    $epic5 =  '<input type="checkbox" value="" id="e5" name="e5">';
                  } else {
                    $epic5 = '<input type="checkbox" value="" id="e5" name="e5" checked=checked>';
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
