<?php

	$servername = "localhost";
$username = "root";
$password = "";

$i = "";
if (isset($_POST['del'])) {
try{
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$User = $_COOKIE["Username"];
$Pass = $_COOKIE["Password"];
$stat = $_COOKIE["Status"];
$atype = $_COOKIE["Acc_type"];
$uid = $_COOKIE["uID"];
$time = $_COOKIE["Time"];
setcookie("Username", $User);
setcookie("Password", $Pass);
setcookie("Status", $stat);
setcookie("uID", $uid);
setcookie("Time",$time);




  $id = $_POST['idd'];

 $query = "SELECT * FROM user WHERE User_ID = '".$id."'";

 if ($result = $conn->query($query)) {
 if ($data = $result->fetch(PDO::FETCH_ASSOC)) {
    $t = $data["A_Type"];
		$us = $data["Username"];
		if($t == "Admin"){

			$delete = "DELETE FROM user WHERE User_ID = '".$id."' ";

       $conn->exec($delete);




		 	echo '<script type="text/javascript">alert("Account Deleted");
		 					 window.location.href="A_account_rec.php";
		 				</script>';

		}else{

    $d = $data["Date"];
    $g = $data["Gender"];


$query1 = "SELECT * FROM calendar WHERE Type = '".$t."'";

        if ($result1 = $conn->query($query1)) {
        if ($row = $result1->fetch(PDO::FETCH_ASSOC)) {

        $a1 = $row['C1'];
        $a2 = $row['C2'];
        $a3 = $row['C3'];
        $a4 = $row['C4'];
        $a5 = $row['C5'];
        $a6 = $row['C6'];
        $a7 = $row['C7'];
        $a8 = $row['C8'];
        $a9 = $row['C9'];
        $a10 = $row['C10'];
        $a11 = $row['C11'];
        $a12 = $row['C12'];


$ty = "All";
    $query2 = "SELECT * FROM calendar WHERE Type = '".$ty."'";

 		if ($result2 = $conn->query($query2)) {
    	if ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
        $c1 = $row2['C1'];
        $c2 = $row2['C2'];
        $c3 = $row2['C3'];
        $c4 = $row2['C4'];
        $c5 = $row2['C5'];
        $c6 = $row2['C6'];
        $c7 = $row2['C7'];
        $c8 = $row2['C8'];
        $c9 = $row2['C9'];
        $c10 = $row2['C10'];
        $c11 = $row2['C11'];
        $c12 = $row2['C12'];


$timestamp = strtotime("$d");
$a = date("m", $timestamp);

if ($a == "01") {
            $A1 = $a1-1;
            $C1 = $c1-1;

   $update = "UPDATE calendar SET C1 = '".$C1."' WHERE Type = '".$ty."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C1 = '".$A1."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "02") {
    $A2 = $a2-1;
        $C2 = $c2-1;

   $update = "UPDATE calendar SET C2 = '".$C2."' WHERE Type = '".$ty."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C2 = '".$A2."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);


}elseif ($a == "03") {
    $A3 = $a3-1;
      $C3 = $c3-1;

   $update = "UPDATE calendar SET C3 = '".$C3."' WHERE Type = '".$ty."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C3 = '".$A3."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "04") {
    $A4 = $a4-1;
            $C4 = $c4-1;

   $update = "UPDATE calendar SET C4 = '".$C4."' WHERE Type = '".$ty."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C4 = '".$A4."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "05") {
  $A5 = $a5-1;
            $C5 = $c5-1;

   $update = "UPDATE calendar SET C5 = '".$C5."' WHERE Type = '".$ty."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C5 = '".$A5."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);


}elseif ($a == "06") {
  $A6 = $a6-1;
            $C6 = $c6-1;

   $update = "UPDATE calendar SET C6 = '".$C6."' WHERE Type = '".$ty."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C6 = '".$A6."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "07") {
  $A7 = $a7-1;
            $C7 = $c7-1;

   $update = "UPDATE calendar SET C7 = '".$C7."' WHERE Type = '".$ty."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C7 = '".$A7."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "08") {
  $A8 = $a8-1;
            $C8 = $c8-1;

   $update = "UPDATE calendar SET C8 = '".$C8."' WHERE Type = '".$ty."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C8 = '".$A8."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "09") {
   $A9 = $a9-1;
            $C9 = $c9-1;

   $update = "UPDATE calendar SET C9 = '".$C9."' WHERE Type = '".$ty."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C9 = '".$A9."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "10") {
  $A10 = $a10-1;
            $C10 = $c10-1;

   $update = "UPDATE calendar SET C10 = '".$C10."' WHERE Type = '".$ty."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C10 = '".$A10."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "11") {
  $A11 = $a11-1;
            $C11 = $c11-1;

   $update = "UPDATE calendar SET C11 = '".$C11."' WHERE Type = '".$$ty."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C11 = '".$A11."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "12") {
  $A12 = $a12-1;
            $C12 = $c12-1;

   $update = "UPDATE calendar SET C12 = '".$C12."' WHERE Type = '".$ty."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C12 = '".$A12."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}

$pid = "1";
$query3 = "SELECT * FROM pie WHERE P_ID = '".$pid."'";

    if ($result3 = $conn->query($query3)) {
      if ($row3 = $result3->fetch(PDO::FETCH_ASSOC)) {

        $mal = $row3['Male'];
        $fem = $row3['Female'];
        $pre = $row3['NS'];

if ($g == "Male") {
 $ma = $mal-1;

 $update = "UPDATE pie SET Male = '".$ma."' WHERE P_ID = '".$pid."' ";

 $conn->exec($update);
}elseif($g == "Female"){
$fe = $fem-1;

$update = "UPDATE pie SET Female = '".$fe."' WHERE P_ID = '".$pid."' ";

 $conn->exec($update);
}elseif ($g == "Prefer not to say") {
 $pr = $pre-1;

 $update = "UPDATE pie SET NS = '".$pr."' WHERE P_ID = '".$pid."' ";

 $conn->exec($update);
}

	   $delete = "DELETE FROM user WHERE User_ID = '".$id."' ";

      $conn->exec($delete);




      echo '<script type="text/javascript">alert("Account Deleted");
               window.location.href="A_account_rec.php";
            </script>';
          }
          }

    	}
     	}

    }
    }
	}

} else{
           $i = "The ID you entered is not existed";
 $errorto = "#Modal";
}
}





}catch(PDOException $e)
    {
   $errorMsg=  $e->getMessage();
   echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }

}
?>
