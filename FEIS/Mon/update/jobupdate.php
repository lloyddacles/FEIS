<?php
  $servername = "localhost";
$username = "root";
$password = "";

    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$i = "";
if(isset($_POST['create'])){


	 $Employer = test_input($_POST["employer"]);
  $Office = test_input($_POST["office"]);
  $JobGL = test_input($_POST["jobgl"]);
  $Position = test_input($_POST["pos"]);
  $Start = test_input($_POST["start"]);
  $End = test_input($_POST["status"]);
 $jid = test_input($_POST["update_id"]);

    if (!preg_match("/[0-9]/",$jid)) {
 $i = "Only numbers are allowed";
$errorto = "#Modal";
}else{

 $query = "SELECT * FROM job_info WHERE User_ID = '".$uid."' AND Job_No = '".$jid."' ";

        if ($result = $conn->query($query)) {
        if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
 $upd = "UPDATE job_info SET Employer = '".$Employer."', Office_add = '".$Office."', Job_GL = '".$JobGL."', Position = '".$Position."', Date_hired = '".$Start."', E_Status = '".$End."' WHERE Job_No = '".$jid."' ";

 $conn->exec($upd);


 if ($atype == 'Teacher') {
            header("location:T_employee_rec1.php");
          }
          elseif ($atype == 'Supervisor') {
            header("location:S_employee_rec1.php");
          }
          elseif ($atype == 'Admin') {
            header("location:A_employee_rec1.php");
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
