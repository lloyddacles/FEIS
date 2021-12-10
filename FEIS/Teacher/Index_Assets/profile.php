<?php
//From Log in form

$servername = "localhost";
$username = "root";
$password = "";

// code...

try {
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $ay = $_COOKIE["uID"];
  $query = "SELECT * FROM user WHERE User_ID = '".$ay."'";

  if ($result = $conn->query($query)) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $pword = $row['Password'];
      $atype = $row['A_Type'];
      $picture = $row['Pic'];
      $first = $row['F_Name'];
      $mname = $row['M_Name'];

      $middle = substr($mname, 0, 1);

      $last = $row['L_Name'];
      $title = $row['Title'];
      $gender = $row['Gender'];
      $address = $row['Address'];
      $birth = $row['Birthday'];
      $uage = $row['Age'];
      $number = $row['C_Num'];
      $status = $row['Status'];
      $email = $row['Email'];

    }
  }


}catch(PDOException $e)
{
  echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
  $errorMsg=  $e->getMessage();
  echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}

if (isset($_POST['updateprof'])) {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $ay = $_COOKIE["uID"];
        $pw = $_POST['pw'];
        $fn = $_POST['FN'];
        $mn = $_POST['MN'];
        $ln = $_POST['LN'];
        $tt = $_POST['ti'];
        $gen = $_POST['ge'];

        if ($gen == "Male") {
          $gid = 1;
        } elseif ($gen == "Female") {
          $gid = 2;
        } else {
          $gid = 3;
        }

        $adds = $_POST['str'].' '.$_POST['bar'].' '.$_POST['mun'].' '.$_POST['pro'];

        if ($adds == '   ') {
          $add = $address;

        } else {
          $add = $adds;
        }

        $num = $_POST['phone'];

        $bday = $_POST['BD'];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($bday), date_create($today));
        $age = $diff->format('%y');

        $up = "UPDATE user SET Password = '".$pw."', Title = '".$tt."', F_Name = '".$fn."', M_Name = '".$mn."', L_Name = '".$ln."', Gender = '".$gen."', Address = '".$add."', Birthday = '".$bday."', Age = '".$age."', C_Num = '".$num."' WHERE User_ID = '".$_COOKIE['uID']."'";
        $conn->exec($up);


        if (!empty($_FILES['image']['tmp_name'])){
          $pic = file_get_contents($_FILES['image']['tmp_name']);
          $uppc = $conn->prepare("UPDATE user SET Pic =? WHERE User_ID=?");
          $uppc->bindParam(1,$pic);
          $uppc->bindParam(2,$ay);
          $uppc->execute();
        } else {

          
        }

        echo '<script type="text/javascript">
        location.href = "T_Profile.php";
        </script>';

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }
}

?>
