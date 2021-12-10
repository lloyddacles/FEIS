<?php
//From Log in form
$servername = "localhost";
$username = "root";
$password = "";


  try {
      $conn = new PDO("mysql:host=$servername;dbname=expi", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];

  $sql = "INSERT INTO crud(name,email,phone,city) VALUES ('".$name."','".$email."','".$phone."','".$city."')";
      $conn->exec($sql);

      if ($conn->exec($sql)) {
        echo json_encode(array("statusCode"=>200));
      }else {
        echo json_encode(array("statusCode"=>201));
      }



  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }


  ?>
