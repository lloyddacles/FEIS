
<?php
//From Log in form

$servername = "localhost";
$username = "root";
$password = "";


if (isset($_POST['regs'])) {
  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $faname = $_POST['fname'];
    $maname = $_POST['mname'];
    $laname = $_POST['lname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $bday = $_POST['bday'];
    $today = date("Y-m-d");
    $diff = date_diff(date_create($bday), date_create($today));
    $age = $diff->format('%y');
    $insert = "insert into registration (Fname,Mname,Lname,Gender,C_num,Birthday,Age,Email)
    VALUES('".$faname."','".$maname."','".$laname."','".$gender."','".$number."','".$bday."','".$age."','".$email."')";
    $conn->exec($insert);

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }

}


?>
