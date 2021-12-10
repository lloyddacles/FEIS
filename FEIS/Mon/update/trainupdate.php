<?php
  $servername = "localhost";
$username = "root";
$password = "";

    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$i = "";
if(isset($_POST['create'])){


	 $t = test_input($_POST["title"]);
	 $l = test_input($_POST["location"]);
	 $c = test_input($_POST["certificate"]);
	 $d = test_input($_POST["date"]);
 $id = test_input($_POST["update_id"]);

    if (!preg_match("/[0-9]/",$id)) {
 $i = "Only numbers are allowed";
$errorto = "#Modal";
}else{

 $query = "SELECT * FROM training_records WHERE User_ID = '".$uid."' AND TR_ID = '".$id."'";

        if ($result = $conn->query($query)) {
        if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
 $upd = "UPDATE training_records SET T_Name = '".$t."', Location = '".$l."', Certificate = '".$c."', Date = '".$d."' WHERE TR_ID = '".$id."' ";

 $conn->exec($upd);


 if ($atype == 'Teacher') {
            header("location:T_training_rec1.php");
          }
          elseif ($atype == 'Supervisor') {
            header("location:S_training_rec1.php");
          }
          elseif ($atype == 'Admin') {
            header("location:A_training_rec1.php");
          }

  }
else{


 $i = "The ID you entered is not for your data";
$errorto = "#Modal";


}


}

}
}



function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}



?>
