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
  $evaluator = $_COOKIE["uID"];
  $query = "SELECT * FROM evaluation WHERE Evaluator_ID = '".$evaluator."'";

  if ($result = $conn->query($query)) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $com = $row['comment'];
      $teacher = $row['TC_ID'];
      $evalid = $row['Eval_ID'];
      $evaluator = $row['Evaluator_ID'];
      $dat = $row['Date'];
      $stats = $row['status'];
      $ack = $row['Acknowledgement'];
      $total = $row['Total'];
      $percent = $row['Percent'];
      if ($stats == "Sent") {
        $s = "Unsend";
      } elseif ($stats == "Unsend") {
        $s = "Send";
      }

      $query = "SELECT * FROM user WHERE User_ID='".$teacher."'";

      if ($result1 = $conn->query($query)) {
        if ($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {
          $tname = $row1['F_Name'].' '.$row1['L_Name'];


        }
      }
      $query = "SELECT * FROM user WHERE User_ID='".$evaluator."'";

      if ($result2 = $conn->query($query)) {
        if ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
          $ename = $row2['F_Name'].' '.$row2['L_Name'];



        }
      }


      echo '<tr>';
      echo '<td>'.$evalid.'</td>';
      echo '<td>'.$tname.'</td>';
      echo '<td>'.$ename.'</td>';
      echo '<td>'.$total.'</td>';
      echo '<td>'.$percent.'%</td>';
      echo '<td>'.$dat.'</td>';
      echo '<td>'.$stats.'</td>';
      echo '<td>'.$ack.'</td>';
      echo '<td><center>
      <a href="#" class="btn btn-danger" data-role="delete" data-id="'.$evalid.'">Delete</a>
      <button name="edit" id="view" class="btn btn-warning" value="'.$evalid.'">Edit</button>
      <button name="view" id="view" class="btn btn-info" value="'.$evalid.'">View</button>
      <a href="#" class="btn btn-success" data-role="'.$s.'" data-id="'.$evalid.'">'.$s.'</a></center></td>';
      echo "</tr>";

      echo '<tr id="'.$evalid.'" style="display: none; other-property: value;">';
      echo '<td data-target="evalid">'.$evalid.'</td>';
      echo '<td data-target="teacher">'.$teacher.'</td>';
      echo '<td data-target="evaluator">'.$evaluator.'</td>';
      echo '<td data-target="total">'.$total.'</td>';
      echo '<td data-target="percent">'.$percent.'%</td>';
      echo '<td data-target="dat">'.$dat.'</td>';
      echo '<td data-target="stats">'.$stats.'</td>';
      echo '<td data-target="ack">'.$ack.'</td>';
      echo '<td><center>
      <a href="#" class="btn btn-danger" data-role="delete" data-id="'.$evalid.'">Delete</a>
      <button name="edit" id="view" class="btn btn-info" value="'.$evalid.'">Edit</button>
      <button name="view" id="view" class="btn btn-info" value="'.$evalid.'">View</button>
      <a href="#" class="btn btn-success" data-role="'.$s.'" data-id="'.$evalid.'">'.$s.'</a></center></td>';
      echo "</tr>";


      if (isset($_POST['view'])) {
        $a = $_POST['view'];
        $_SESSION['Eval_ID'] = $a;
        echo '<script type="text/javascript">

        location.href = "A_EvalTableResult.php";
        </script>';
      }

      if (isset($_POST['edit'])) {
        $e = $_POST['edit'];
        $_SESSION['E_ID'] = $e;
        echo '<script type="text/javascript">
        location.href = "EditEvalForm.php";
        </script>';
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
