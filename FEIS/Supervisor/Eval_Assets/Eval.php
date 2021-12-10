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
    $eval = $_POST['lagayan'];
    $query = "SELECT * FROM evaluation WHERE Eval_ID = '".$eval."'";

      if ($result = $conn->query($query)) {
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $e = $row['Evaluator_ID'];
            $query = "SELECT * FROM user WHERE User_ID = '".$e."'";

            if ($result = $conn->query($query)) {
              while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $f = $row['F_Name'].' '.$row['L_Name'];

                echo '<strong id="evaluator">Evaluator :</strong>'.$f;

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
