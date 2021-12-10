<?php
//From Log in form
$servername = "localhost";
$username = "root";
$password = "";

if(isset($_POST['addsched'])){
  try {
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $tc = $_POST['tc'];
      $sp = $_POST['sp'];
      $start = $_POST['start'];
      $end = $_POST['end'];
      $date = $_POST['date'];

      $insert = "INSERT INTO e_sched(	TC_ID, Evaluator_ID, Start, End, Date, status) VALUES('".$tc."','".$sp."','".$start."','".$end."','".$date."','To be Evaluated')";
      $conn->exec($insert);

      echo '<script type="text/javascript">
      location.href = "S_EvalSchedule.php";
      </script>';

  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }

}


if (isset($_POST['editsched'])) {
  // code...

try{
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $esid = $_POST['eid'];
      $etc = $_POST['etc'];
      $esp = $_POST['esp'];
      $estart = $_POST['estart'];
      $eend = $_POST['eend'];
      $edate = $_POST['edate'];
      $update = "UPDATE e_sched SET TC_ID='".$etc."', Evaluator_ID='".$esp."', Start='".$estart."', End='".$eend."',  Date='".$edate."' WHERE ES_ID='".$esid."' ";

      $conn->exec($update);
      echo '<script type="text/javascript">
      location.href = "S_EvalSchedule.php";
      </script>';

}catch(PDOException $e)
{
  echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
  $errorMsg=  $e->getMessage();
  echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}
}

  ?>
