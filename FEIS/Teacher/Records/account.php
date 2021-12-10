<?php


  $servername = "localhost";
  $username = "root";
  $password = "";
  // code...

  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM user";

      if ($result = $conn->query($query)) {
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $uid = $row['User_ID'];
            $fname = $row['F_Name'];
            $lname = $row['L_Name'];
            $uname = $row['Username'];
            $pword = $row['Password'];
            $email = $row['Email'];
            $typ = $row['A_Type'];
            echo "<tr>";
            echo '<td>'.$uid.'</td>';
            echo '<td>'.$fname.'</td>';
            echo '<td>'.$lname.'</td>';
            echo '<td>'.$uname.'</td>';
            echo '<td>'.$pword.'</td>';
            echo '<td>'.$email.'</td>';
            echo '<td>'.$typ.'</td>';
            echo '<td><center><button type="button" class="btn btn-info">Edit</button> | <button type="button" class="btn btn-danger">Delete</button></center></td>';
            echo "</tr>";

          }


    }

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }


?>
