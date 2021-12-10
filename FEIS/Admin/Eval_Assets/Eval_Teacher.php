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
    $tf = $_COOKIE["Fname"];
    $tl = $_COOKIE["Lname"];
    $evaluator = $tf." ".$tl;
        $query = "SELECT * FROM evaluation WHERE Evaluator_ID = '".$_COOKIE['U_ID']."'";

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


            echo '<option value="'.$i.'">'.$i.'.  '.$tc.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>'.$date.'</strong></option>';

          }


    }

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }



?>
