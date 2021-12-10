<?php


  $servername = "localhost";
  $username = "root";
  $password = "";
  // code...

  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM subject";

      if ($result = $conn->query($query)) {
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $sid = $row['s_id'];
            $cod = $row['scode'];
            $name = $row['sname'];
            $des = $row['sdesc'];
            $uni = $row['sunit'];
            $typ = $row['stype'];
            echo '<tr id="'.$sid.'">';
            echo '<td data-target="sid">'.$sid.'</td>';
            echo '<td data-target="cod">'.$cod.'</td>';
            echo '<td data-target="name">'.$name.'</td>';
            echo '<td data-target="des">'.$des.'</td>';
            echo '<td data-target="uni">'.$uni.'</td>';
            echo '<td data-target="typ">'.$typ.'</td>';
            echo '<td><center>
            <a class="btn btn-info" data-role="editsub" data-id="'.$sid.'">Edit</a>
            <a class="btn btn-danger" data-role="delsub" data-id="'.$sid.'">Delete</a>
            </center></td>';
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
