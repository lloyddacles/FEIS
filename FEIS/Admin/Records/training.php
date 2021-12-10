<?php


  $servername = "localhost";
  $username = "root";
  $password = "";
  // code...

  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $training = "SELECT * FROM training_records";

      if ($result = $conn->query($training)) {
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {


            $trid = $row['TR_ID'];
            $cer = $row['Certificate'];
            $name = $row['T_Name'];
            $loc = $row['Location'];
            $date = $row['Date'];

            $query = "SELECT * FROM user WHERE User_ID='".$name."'";

            if ($result1 = $conn->query($query)) {
              if ($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {
                $tname = $row1['F_Name'].' '.$row1['L_Name'];


              }
            }

            echo '<tr>';
            echo '<td>'.$trid.'</td>';
            echo '<td>'.$tname.'</td>';
            echo '<td>'.$cer.'</td>';
            echo '<td>'.$loc.'</td>';
            echo '<td>'.$date.'</td>';
            echo '<td><center>
            <a class="btn btn-info" data-role="edittrain" data-id="'.$trid.'">Edit</a>
            <a class="btn btn-danger" data-role="deltrain" data-id="'.$trid.'">Delete</a>
            </center></td>';
            echo '</tr>';

            echo '<tr id="'.$trid.'" style="display: none; other-property: value;">';
            echo '<td data-target="trid">'.$trid.'</td>';
            echo '<td data-target="name">'.$name.'</td>';
            echo '<td data-target="cer">'.$cer.'</td>';
            echo '<td data-target="loc">'.$loc.'</td>';
            echo '<td data-target="date">'.$date.'</td>';
            echo '<td><center>
            <a class="btn btn-info" data-role="edittrain" data-id="'.$trid.'">Edit</a>
            <a class="btn btn-danger" data-role="deltrain" data-id="'.$trid.'">Delete</a>
            </center></td>';
            echo '</tr>';

          }


    }

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }


?>
