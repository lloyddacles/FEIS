<?php



try{
  $con = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(!$con){
      echo 'Not connected to server';
    }

  if(isset($_POST['update'])){
    $t1 = $_POST['title1'];
    $t2 = $_POST['title2'];
    $t3 = $_POST['title3'];
    $t4 = $_POST['title4'];
    $t5 = $_POST['title5'];
    $a1 = $_POST['ans1'];
    $a2 = $_POST['ans2'];
    $a3 = $_POST['ans3'];
    $a4 = $_POST['ans4'];
    $a5 = $_POST['ans5'];

  $sql = "INSERT INTO progress (T1, T2, T3, T4, T5, I1, I2, I3, I4, I5) VALUES ('".$t1."','".$t2."','".$t3."','".$t4."','".$t5."','".$a1."','".$a2."','".$a3."','".$a4."','".$a5."')";
  $con->exec($sql);
header("location:A_Index.php");
}


}catch(PDOException $e)
    {
   $errorMsg=  $e->getMessage();
   echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }


?>
