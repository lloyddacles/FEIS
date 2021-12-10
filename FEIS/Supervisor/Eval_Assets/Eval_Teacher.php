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

      $query = "SELECT * FROM evaluation WHERE Evaluator_ID = '".$_COOKIE['uID']."'";

      if ($result = $conn->query($query)) {
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $i = $row['Eval_ID'];
            $tc = $row['TC_ID'];
            $t = $row['Total'];
            $p = $row['Percent'];
            $e = $row['Evaluator_ID'];
            $s = $row['status'];
            $a = $row['Acknowledgement'];
            $dat = $row['Date'];
            $date = date("M j, Y", strtotime($dat));


            $query = "SELECT * FROM user WHERE User_ID = '".$tc."'";

            if ($result1 = $conn->query($query)) {
                while ($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {
                  $tname = $row1['F_Name'].' '.$row1['L_Name'];


                  echo '<option value="'.$i.'">'.$i.'.  '.$tname.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>'.$date.'</strong></option>';

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
