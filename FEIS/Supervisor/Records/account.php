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
      echo '<tr id="'.$uid.'">';
      echo '<td>'.$uid.'</td>';
      echo '<td data-target="fname">'.$fname.'</td>';
      echo '<td data-target="lname">'.$lname.'</td>';
      echo '<td data-target="uname">'.$uname.'</td>';
      echo '<td data-target="pword">'.$pword.'</td>';
      echo '<td data-target="email">'.$email.'</td>';
      echo '<td data-target="typ">'.$typ.'</td>';
      echo '<td><center>
      <a class="btn btn-info" data-role="editacc" data-id="'.$uid.'">Edit</a>
      <a class="btn btn-danger" data-role="delacc" data-id="'.$uid.'">Delete</a>
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
