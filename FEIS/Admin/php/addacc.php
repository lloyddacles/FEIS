<?php
$servername = "localhost";
$username = "root";
$password = "";

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

$iError = "";
$uError = "";
$pError = "";
$ito = "";
$u = "";
$passw = "";

if(isset($_POST['create'])){

    $id = test_input($_POST["ID"]);

    if (!preg_match("/[0-9]/",$id)) {
      $ito = "Only numbers are Allowed";
      $iError = "*";
      $errorto = "#Modal1";
    }
    else{
  $query1 = "SELECT * FROM registration WHERE regist_id = '".$id."'";

        if ($result1 = $conn->query($query1)) {
        if ($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {
      $g_id = $row1['Google_ID'];
      $f_id = $row1['Facebook_ID'];
      $userfor = test_input($_POST["Username"]);

      if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,13}/",$userfor)) {
      $u = "Only 5+ characters with Uppercase letter/s and number allowed";
      $uError = "*";
      $errorto = "#Modal1";
    }
    else {
       $query2 = "SELECT * FROM user WHERE Username ='".$userfor."'";

      if ($result2 = $conn->query($query2)) {
      if ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
      $u = "The Username you entered has already used";
      $errorto = "#Modal1";


   }
    else{
      $pass1 = test_input($_POST["Password"]);

    if ($pass1 == $userfor) {

      $passw = "Password not Valid it must be unique";
      $pError = "*";
      $errorto = "#Modal1";
    }
    else{

      if (preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,13}/",$pass1)) {
          $passw = "Only 5+ characters with Uppercase letter/s and number allowed";
    $pError = "*";
     $errorto = "#Modal1";
      }
      else{
      $stat = $_POST['sta'];
$ti = "N/A";
$add = "None";
$st = "Offline";
      $f = $row1['Fname'];
      $l = $row1['Lname'];
      $m = $row1['Mname'];
      $g = $row1['Gender'];
      $e = $row1['Email'];
      $c = $row1['C_num'];
      $b = $row1['Birthday'];
      $a = $row1['Age'];

$querye = "SELECT * FROM user WHERE Email = '".$e."' ";

if ($resulte = $conn->query($querye)) {
if ($rowe = $resulte->fetch(PDO::FETCH_ASSOC)) {
 echo '<script type="text/javascript">alert("The Email of this account has already used");
               window.location.href="Registration-records.php";
               </script>';


}
else{

$sql = "INSERT INTO user(Google_ID,Facebook_ID,Username,Password,Title,F_Name,M_Name,L_Name,Gender,Address,Birthday,Age,C_Num,Email,A_Type,Status)
 VALUES ('".$g_id ."','".$f_id ."','".$userfor."','".$pass1."','".$ti."','".$f."','".$m."','".$l."','".$g."','".$add."','".$b."','".$a."','".$c."','".$e."','".$stat."','".$st."')";
  $conn->exec($sql);

      $delete = "DELETE FROM registration WHERE regist_id = '".$id."' ";
      $alter1 = "ALTER TABLE registration DROP regist_id";
      $alter2 = "ALTER TABLE registration AUTO_INCREMENT = 1";
      $alter3 = "ALTER TABLE registration ADD regist_id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
      $conn->exec($delete);
      $conn->exec($alter1);
      $conn->exec($alter2);
      $conn->exec($alter3);

if ($stat !== "Admin" ) {
$t = "All";
$query = "SELECT * FROM calendar WHERE Type = '".$t."'";

            if ($result = $conn->query($query)) {
        if ($row1 = $result->fetch(PDO::FETCH_ASSOC)) {

        $a1 = $row1['C1'];
        $a2 = $row1['C2'];
        $a3 = $row1['C3'];
        $a4 = $row1['C4'];
        $a5 = $row1['C5'];
        $a6 = $row1['C6'];
        $a7 = $row1['C7'];
        $a8 = $row1['C8'];
        $a9 = $row1['C9'];
        $a10 = $row1['C10'];
        $a11 = $row1['C11'];
        $a12 = $row1['C12'];


        $query2 = "SELECT * FROM calendar WHERE Type = '".$stat."'";

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

        $a = date("F");

          if ($a == "January") {
            $A1 = $a1+1;
            $C1 = $c1+1;

   $update = "UPDATE calendar SET C1 = '".$C1."' WHERE Type = '".$stat."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C1 = '".$A1."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "February") {
    $A2 = $a2+1;
        $C2 = $c2+1;

   $update = "UPDATE calendar SET C2 = '".$C2."' WHERE Type = '".$stat."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C2 = '".$A2."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);


}elseif ($a == "March") {
    $A3 = $a3+1;
      $C3 = $c3+1;

   $update = "UPDATE calendar SET C3 = '".$C3."' WHERE Type = '".$stat."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C3 = '".$A3."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "April") {
    $A4 = $a4+1;
            $C4 = $c4+1;

   $update = "UPDATE calendar SET C4 = '".$C4."' WHERE Type = '".$stat."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C4 = '".$A4."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "May") {
  $A5 = $a5+1;
            $C5 = $c5+1;

   $update = "UPDATE calendar SET C5 = '".$C5."' WHERE Type = '".$stat."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C5 = '".$A5."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);


}elseif ($a == "June") {
  $A6 = $a6+1;
            $C6 = $c6+1;

   $update = "UPDATE calendar SET C6 = '".$C6."' WHERE Type = '".$stat."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C6 = '".$A6."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "July") {
  $A7 = $a7+1;
            $C7 = $c7+1;

   $update = "UPDATE calendar SET C7 = '".$C7."' WHERE Type = '".$stat."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C7 = '".$A7."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "August") {
  $A8 = $a8+1;
            $C8 = $c8+1;

   $update = "UPDATE calendar SET C8 = '".$C8."' WHERE Type = '".$stat."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C8 = '".$A8."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "September") {
   $A9 = $a9+1;
            $C9 = $c9+1;

   $update = "UPDATE calendar SET C9 = '".$C9."' WHERE Type = '".$stat."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C9 = '".$A9."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "October") {
  $A10 = $a10+1;
            $C10 = $c10+1;

   $update = "UPDATE calendar SET C10 = '".$C10."' WHERE Type = '".$stat."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C10 = '".$A10."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "November") {
  $A11 = $a11+1;
            $C11 = $c11+1;

   $update = "UPDATE calendar SET C11 = '".$C11."' WHERE Type = '".$stat."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C11 = '".$A11."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}elseif ($a == "December") {
  $A12 = $a12+1;
            $C12 = $c12+1;

   $update = "UPDATE calendar SET C12 = '".$C12."' WHERE Type = '".$stat."' ";

 $conn->exec($update);

  $updatee = "UPDATE calendar SET C12 = '".$A12."' WHERE Type = '".$t."' ";

 $conn->exec($updatee);

}

#FOR PIE
$pid = "1";
$query3 = "SELECT * FROM pie WHERE P_ID = '".$pid."'";

            if ($result3 = $conn->query($query3)) {
        if ($row3 = $result3->fetch(PDO::FETCH_ASSOC)) {
        $mal = $row3['Male'];
        $fem = $row3['Female'];
        $pre = $row3['NS'];

if ($g == "Male") {
 $ma = $mal+1;

 $update = "UPDATE pie SET Male = '".$ma."' WHERE P_ID = '".$pid."' ";

 $conn->exec($update);
}elseif($g == "Female"){
$fe = $fem+1;

$update = "UPDATE pie SET Female = '".$fe."' WHERE P_ID = '".$pid."' ";

 $conn->exec($update);
}elseif ($g == "Prefer not to say") {
 $pr = $pre+1;

 $update = "UPDATE pie SET NS = '".$pr."' WHERE P_ID = '".$pid."' ";

 $conn->exec($update);
}



//Mailing the account confirmation
        require 'phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
       $mail-> isSMTP();
        $mail-> Host='smtp.gmail.com';
        $mail-> Port='465';
        $mail-> SMTPAuth=true;
        $mail-> SMTPSecure='ssl';

        $mail-> Username='systemforschool@gmail.com';
        $mail-> Password='systemforschool089';

        $mail-> setFrom('systemforschool@gmail.com','Mr Knowbody');
        $mail-> addAddress($e);

        $mail-> isHTML();
        $mail-> Subject='PHP Mailer';
        $mail-> Body='<h1 align=center>Welcome to FEIS</h1><br>
        <h3 align=center>This will be your Username And Password to use FEIS</h3>
        <br>
        <h3 align=center>Username: "'.$userfor.'"</h3><br>
        <h3 align=center>Password: "'.$pass1.'"</h3><br>

        <h3 align=center>Yours truly<br>FEIS Administrator</h3>';

        $mail -> Send();


        }
        }

}
}
    }
    }

}
}



}





}
}
  }
  }
  }


        } else{
  $ito = "The ID you entered is not existed";
 $errorto = "#Modal1";

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
