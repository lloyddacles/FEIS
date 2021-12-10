 <?php



try{
  $x = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $x->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(!$x){
      echo 'Not connected to server';
    }

  if(isset($_POST['insert'])){
    $id = "40";
    $t1 = $_POST['gender'];
    $t2 = $_POST['number'];
    $t3 = $_POST['teacher'];



   $insert = "update pie set Gender = '".$t1."', number = '".$t2."', teacher = '".$t3."' where pid = '".$id."'   ";

 $x->exec($insert);
header("location:A_index.php");
}

}catch(PDOException $e)
    {
   $errorMsg=  $e->getMessage();
   echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }


?>
