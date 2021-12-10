<?php


  $servername = "localhost";
  $username = "root";
  $password = "";
  // code...

  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM job_info";

      if ($result = $conn->query($query)) {
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $job = $row['Job_No'];
            $emp = $row['Employer'];
            $off = $row['Office_add'];
            $gl = $row['Job_GL'];
            $pos = $row['Position'];
            $date = $row['Date'];
            $stat = $row['Status'];
            echo '<tr id="'.$job.'">';
            echo '<td data-target="job">'.$job.'</td>';
            echo '<td data-target="emp">'.$emp.'</td>';
            echo '<td data-target="off">'.$off.'</td>';
            echo '<td data-target="gl">'.$gl.'</td>';
            echo '<td data-target="pos">'.$pos.'</td>';
            echo '<td data-target="stat">'.$stat.'</td>';
            echo '<td data-target="date">'.$date.'</td>';
            echo '<td><center>
            <a class="btn btn-info" data-role="edittemp" data-id="'.$job.'">Edit</a>
            <a class="btn btn-danger" data-role="delemp" data-id="'.$job.'">Delete</a>';
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
