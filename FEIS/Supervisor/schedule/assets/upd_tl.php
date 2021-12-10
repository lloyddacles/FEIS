<?php
$servername = "localhost";
$username = "root";
$password = "";


  if (isset($_POST['update_sched'])) {
    echo '<script type="text/javascript">alert("Wroasdasdd");</script>';
    try{
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $day = $_POST['up_day'];
      $sub = $_POST['up_subject'];
      $sec = $_POST['up_section'];
      $sem = $_POST['up_Semester'];
      $st = $_POST['up_start'];
      $en = $_POST['up_end'];
        echo '<script type="text/javascript">alert("'.$id.'");</script>';

      $update = "UPDATE teaching_load SET Subject='".$sub."', TC_ID='".$tc."', Day='".$day."', Start='".$st."', end='".$en."',  Section='".$sec."', Semester='".$sem."' WHERE TL_ID='".$id."' ";
      echo '<script type="text/javascript">
      alert("asdasd");
         window.location.href="asdasd.php";
      </script>';
      $conn->exec($update);


    }catch(PDOException $e)
    {
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }


     ;
  }
?>
