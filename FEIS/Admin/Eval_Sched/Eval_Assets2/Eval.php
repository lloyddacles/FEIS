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
            $tc = $row['TC_ID'];
            $t = $row['Total'];
            $p = $row['Percent'];
            $e = $row['Evaluator_ID'];
            $s = $row['status'];
            $a = $row['Acknowledgement'];
            $query = "SELECT * FROM user WHERE User_ID = '".$e."'";

              if ($result = $conn->query($query)) {
                  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $fn = $row['F_Name'].' '.$row['L_Name'];
                    echo '<strong id="evaluator">Evaluator :</strong>'.$fn;

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
