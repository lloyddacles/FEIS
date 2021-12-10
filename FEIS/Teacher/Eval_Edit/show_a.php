<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";

    // code...
$id = $_SESSION['E_ID'];
  $com = $teacher = NULL;
  $a1 = $a2 = $a3 = $a4 = $a5 = NULL;
  $pic1 = $pic2 = $pic3 = $pic4 = $pic5 = NULL;
  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $query = "SELECT * FROM a WHERE A_ID ='".$id."'";


            if ($result = $conn->query($query)) {
                if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $a1 = $row['A1'];
                  $a2 = $row['A2'];
                  $a3 = $row['A3'];
                  $a4 = $row['A4'];
                  $a5 = $row['A5'];


                  //A1
                  if ($a1 == 0) {
                    $pic1 = '<input type="checkbox" id="a1" value="" name="a1" >';
                  } else {
                    $pic1 = '<input type="checkbox" id="a1" value="" name="a1" checked=checked > ';
                  }

                  //A2
                  if ($a2 == 0) {
                    $pic2 = '<input type="checkbox" id="a2" value="" name="a2" >';
                  } else {
                    $pic2 = '<input type="checkbox" id="a2" value="" name="a2" checked=checked >';
                  }

                  //A3
                  if ($a3 == 0) {
                    $pic3 = '<input type="checkbox" id="a3" value="" name="a3" >';
                  } else {
                    $pic3 = '<input type="checkbox" id="a3" value="" name="a3" checked=checked >';
                  }

                  //A4
                  if ($a4 == 0) {
                    $pic4 = '<input type="checkbox" id="a4" value="" name="a4" >';
                  } else {
                    $pic4 = '<input type="checkbox" id="a4" value="" name="a4" checked=checked >';
                  }

                  //A5
                  if ($a5 == 0) {
                    $pic5 = '<input type="checkbox" id="a5" value="" name="a5" >';
                  } else {
                    $pic5 = '<input type="checkbox" id="a5" value="" name="a5" checked=checked >';
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
