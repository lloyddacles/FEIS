<?php


$servername = "localhost";
$username = "root";
$password = "";
// code...

try{
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = "SELECT * FROM registration";

  if ($result = $conn->query($query)) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $rid = $row['regist_id'];
      $google = $row['Google_ID'];
      $fname = $row['Fname'];
      $mname = $row['Mname'];
      $lname = $row['Lname'];
      $gen = $row['Gender'];
      $num = $row['C_num'];
      $bday = $row['Birthday'];
      $age = $row['Age'];
      $email = $row['Email'];
      echo '<tr id="'.$rid.'">';
      echo '<td>'.$rid.'</td>';
      echo '<td data-target="fname">'.$fname.'</td>';
      echo '<td data-target="mname">'.$mname.'</td>';
      echo '<td data-target="lname">'.$lname.'</td>';
      echo '<td data-target="gen">'.$gen.'</td>';
      echo '<td data-target="num">'.$num.'</td>';
      echo '<td data-target="bday">'.$bday.'</td>';
      echo '<td data-target="email">'.$email.'</td>';
      echo '<td><center>
      <a class="btn btn-danger" data-role="delreg" data-id="'.$rid.'">Delete</a>
      <a class="btn btn-success" data-role="addreg" data-id="'.$rid.'">Confirm</a>
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
