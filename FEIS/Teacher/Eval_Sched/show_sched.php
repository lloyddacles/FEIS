<?php


$servername = "localhost";
$username = "root";
$password = "";
// code...

try{
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = "SELECT * FROM e_sched";

  if ($result = $conn->query($query)) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $esid = $row['ES_ID'];
      $tc = $row['TC_ID'];
      $sp = $row['Evaluator_ID'];
      $start = $row['Start'];
      $end = $row['End'];
      $dat = $row['Date'];
      $date = date("M j, Y", strtotime($dat));
      $typ = $row['status'];

      $query = "SELECT * FROM user WHERE User_ID='".$tc."'";

      if ($result1 = $conn->query($query)) {
        if ($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {
          $tname = $row1['F_Name'].' '.$row1['L_Name'];


        }
      }
      $query = "SELECT * FROM user WHERE User_ID='".$sp."'";

      if ($result2 = $conn->query($query)) {
        if ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
          $ename = $row2['F_Name'].' '.$row2['L_Name'];



        }
      }
      echo '<tr>';
      echo '<td>'.$esid.'</td>';
      echo '<td>'.$tname.'</td>';
      echo '<td>'.$ename.'</td>';
      echo '<td>'.$start.'</td>';
      echo '<td>'.$end.'</td>';
      echo '<td>'.$dat.'</td>';
      echo '<td>'.$typ.'</td>';
      echo '<td> <center>';
      echo '<a class="btn btn-warning" data-role="update" data-id="'.$esid.'">Edit</a>
            <a href="#" class="btn btn-danger" data-role="delete" data-id="'.$esid.'">Delete</a>
            <button name="evaluate" id="evaluate" class="btn btn-success" value="'.$esid.'">Evaluate</button>';
      echo '</center> </td>';
      echo "</tr>";

      echo '<tr id="'.$esid.'" style="display: none; other-property: value;">';
      echo '<td data-target="">'.$esid.'</td>';
      echo '<td data-target="Teacher">'.$tc.'</td>';
      echo '<td data-target="Evaluator">'.$sp.'</td>';
      echo '<td data-target="start">'.$start.'</td>';
      echo '<td data-target="end">'.$end.'</td>';
      echo '<td data-target="date">'.$dat.'</td>';
      echo '<td data-target="typ">'.$typ.'</td>';
      echo '<td> <center>';
      echo '<a class="btn btn-warning" data-role="update" data-id="'.$esid.'">Edit</a>
            <a href="#" class="btn btn-danger" data-role="delete" data-id="'.$esid.'">Delete</a>
            <button name="evaluate" id="evaluate" class="btn btn-success" value="'.$esid.'">Evaluate</button>';
      echo '</center> </td>';
      echo "</tr>";

      if (isset($_POST['evaluate'])) {
        $e = $_POST['evaluate'];
        $_SESSION['ES_ID'] = $e;
        $update = "UPDATE e_sched SET status ='In Progress' WHERE ES_ID = '".$e."'";
        $conn->exec($update);
        echo '<script type="text/javascript">
        location.href = "S_EvalForm.php";
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
