<?php
$servername = "localhost";
$username = "root";
$password = "";
//From Log in form
try {
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM subject";

      if ($result = $conn->query($query)) {

          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $n = $row['sname'];
            echo '<option value="'.$n.'">'.$n.'</option>';
          }
      }

}catch(PDOException $e)
    {
     echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
     $errorMsg=  $e->getMessage();
     echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }
  ?>
