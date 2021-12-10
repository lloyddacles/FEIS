<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";

    // code...
    $com = $teacher = NULL;

  try {
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $tf = $_COOKIE["Fname"];
      $tl = $_COOKIE["Lname"];
      $evaluator = $tf." ".$tl;
          $query = "SELECT * FROM evaluation WHERE Evaluator = '".$evaluator."'";

            if ($result = $conn->query($query)) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $com = $row['comment'];
                  $teacher = $row['Teacher'];
                  $evalid = $row['Eval_ID'];
                  $evaluator = $row['Evaluator'];
                  $dat = $row['Date'];
                  $date = date("M j, Y", strtotime($dat));
                  $stats = $row['status'];
                  $ack = $row['Acknowledgement'];
                  $total = $row['Total'];
                  $percent = $row['Percent'];

                  echo "<tr>";
                  echo '<td>'.$evalid.'</td>';
                  echo '<td>'.$teacher.'</td>';
                  echo '<td>'.$evaluator.'</td>';
                  echo '<td>'.$total.'</td>';
                  echo '<td>'.$percent.'%</td>';
                  echo '<td>'.$date.'</td>';
                  echo '<td>'.$stats.'</td>';
                  echo '<td>'.$ack.'</td>';
                  echo '<td><center><button type="button" class="btn btn-danger">Delete</button> <button type="button" class="btn btn-warning">Edit</button> <button type="button" class="btn btn-success">Send</button></center></td>';
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
