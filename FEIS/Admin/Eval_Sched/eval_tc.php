<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";
  // code...
  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM e_sched WHERE ES_ID= '".$_SESSION['ES_ID'] ."'";

      if ($result = $conn->query($query)) {
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $tid = $row['TC_ID'];
            $query = "SELECT * FROM user WHERE User_ID= '".$tid."'";

              if ($result = $conn->query($query)) {
                  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $tc = $row['F_Name'].' '.$row['L_Name'];
                    $ayd = $row['User_ID'];
                    echo '<option value="'.$ayd.'" readonly selected>'.$tc.'</option>';


                  }


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
