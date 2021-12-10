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
    $query = "SELECT * FROM evaluation WHERE Eval_ID = '".$_SESSION["Eval_ID"]."'";

      if ($result = $conn->query($query)) {
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $i = $row['Eval_ID'];
            $tc = $row['Teacher'];
            $t = $row['Total'];
            $p = $row['Percent'];
            $e = $row['Evaluator'];
            $s = $row['status'];
            $a = $row['Acknowledgement'];
            echo '<strong id="evaluated">Teacher :</strong>'.$tc;

          }


    }

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }



?>
