<?php
$fError = "";
$mError = "";
$lError = "";
$pError = "";
$sError = "";
$bError = "";
$muError = "";
$prError = "";
$deError = "";
$t = $row["Title"];
$g = $row["Gender"];
$lname = $row["L_Name"];
$mname = $row["M_Name"];
$fname = $row["F_Name"];
$phone = $row["C_Num"];
$bid =$row["Birthday"];
$add =$row["Address"];
$des =$row["Descrip"];
$str = "Street";
$bar = "Barangay";
$mun = "Municipality";
$pro = "Province";

  if(isset($_POST['updateadmin'])){
#UPDATE FOR TITLE
    if (empty($_POST["ti"])) {

      $insert = "UPDATE user SET Title = '".$t."' WHERE User_ID = '".$uid."'   ";
      $conn->exec($insert);

    }else{

      $title = $_POST["ti"];

      $insert = "UPDATE user SET Title = '".$title."' WHERE User_ID = '".$uid."'   ";
      $conn->exec($insert);

        if ($atype == 'Teacher') {
          header("location:T_index.php");
        }
        elseif ($atype == 'Supervisor') {
          header("location:S_profile.php");
        }
        elseif ($atype == 'Admin') {
          header("location:A_profile.php");
        }

    }
#END OF UP TITLE

#UPDATE FOR DESCRIPTION
    if(empty($_POST["desc"])) {

      $insert = "UPDATE user SET Descrip = '".$des."' WHERE User_ID = '".$uid."'   ";
      $conn->exec($insert);

    }else{

      $description = test_input($_POST["desc"]);

      if (!preg_match("/^[a-zA-Z0-9 ]{1,25}$/",$description)) {

        $des = "1-25 Characters Only";
        $deError = "*";
        $errorto = "#Modal6";

      }else{

        $insert = "UPDATE user SET  Descrip = '".$description."' WHERE User_ID = '".$uid."'   ";
        $conn->exec($insert);

          if ($atype == 'Teacher') {
            header("location:T_index.php");
          }
          elseif ($atype == 'Supervisor') {
            header("location:S_profile.php");
          }
          elseif ($atype == 'Admin') {
            header("location:A_profile.php");
          }

      }

    }
#END OF UP DESCRIPTION

#UPDATE FOR GENDER

    if (empty($_POST["ge"])) {

      $insert = "UPDATE user SET Gender = '".$g."' WHERE User_ID = '".$uid."'   ";
      $conn->exec($insert);

    }else{

      $gender = $_POST["ge"];

$pid = "1";

if ($atype == "Admin") {

 $insert = "UPDATE user SET Gender = '".$gender."' WHERE User_ID = '".$uid."'   ";
      $conn->exec($insert);

        if ($atype == 'Teacher') {
          header("location:T_index.php");
        }
        elseif ($atype == 'Supervisor') {
          header("location:S_profile.php");
        }
        elseif ($atype == 'Admin') {
          header("location:A_profile.php");
        }

}

else{
$query3 = "SELECT * FROM pie WHERE P_ID = '".$pid."'";

            if ($pie = $conn->query($query3)) {
        if ($piee = $pie->fetch(PDO::FETCH_ASSOC)) {
        $mal = $piee['Male'];
        $fem = $piee['Female'];
        $pre = $piee['NS'];

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

if ($gender == "Male") {
 $ma = $mal+1;

 $update = "UPDATE pie SET Male = '".$ma."' WHERE P_ID = '".$pid."' ";

 $conn->exec($update);

}elseif($gender == "Female"){
$fe = $fem+1;

$update = "UPDATE pie SET Female = '".$fe."' WHERE P_ID = '".$pid."' ";

 $conn->exec($update);
}elseif ($gender == "Prefer not to say") {
 $pr = $pre+1;

 $update = "UPDATE pie SET NS = '".$pr."' WHERE P_ID = '".$pid."' ";

 $conn->exec($update);
}

      $insert = "UPDATE user SET Gender = '".$gender."' WHERE User_ID = '".$uid."'   ";
      $conn->exec($insert);

        if ($atype == 'Teacher') {
          header("location:T_index.php");
        }
        elseif ($atype == 'Supervisor') {
          header("location:S_profile.php");
        }
        elseif ($atype == 'Admin') {
          header("location:A_profile.php");
        }

    }

  }
}
}
#END OF UP GENDER

#UPDATE FOR NAME

    if (empty($_POST["LN"])) {

      $insert = "UPDATE user SET L_Name = '".$lname."' WHERE User_ID = '".$uid."'   ";
      $conn->exec($insert);

    }else{

      $laname = test_input($_POST["LN"]);

      if (!preg_match("/^[a-zA-Z ]{2,25}$/",$laname)) {

        $lname = "Only 2 or more letters and white space allowed";
        $lError = "*";
        $errorto = "#Modal2";

      }else{

    if (empty($_POST["MN"])) {

      $insert = "UPDATE user SET  M_Name = '".$mname."' WHERE User_ID = '".$uid."'   ";
      $conn->exec($insert);

    }else {

      $maname = test_input($_POST["MN"]);

      if (!preg_match("/^[a-zA-Z]{2,14}$/",$maname)) {

        $mname = "Only letters are allowed";
        $mError = "*";
        $errorto = "#Modal2";

      }else{

        if (empty($_POST["FN"])) {

          $insert = "UPDATE user SET  F_Name = '".$fname."' WHERE User_ID = '".$uid."'   ";
          $conn->exec($insert);

        } else{


          $faname = test_input($_POST["FN"]);

          if (!preg_match("/^[a-zA-Z]{2,14}$/",$faname)) {

            $fname = "Only letters are allowed";
            $fError = "*";
            $errorto = "#Modal2";

          }else {
            $username = $faname." ".$laname;

            $insert = "UPDATE user SET L_Name = '".$laname."', M_Name = '".$maname."', F_Name = '".$faname."' WHERE User_ID = '".$uid."'   ";
            $conn->exec($insert);

            setcookie("Fname",$faname, time() + (86400 * 30),'/');
            setcookie("lname",$laname, time() + (86400 * 30),'/');

            if ($atype == 'Teacher') {
              $update2 = "UPDATE adminemail SET A_Receiver = '".$username."'WHERE T_ID = '".$uid."'   ";
              $conn->exec($update2);

              $update4 = "UPDATE tcemail SET T_Sender = '".$username."'WHERE T_ID = '".$uid."'   ";
              $conn->exec($update4);

              $update3 = "UPDATE supervisornotif SET T_Name = '".$username."'WHERE T_ID = '".$uid."'   ";
              $conn->exec($update3);
            }
            elseif ($atype == 'Supervisor') {
              $update2 = "UPDATE supervisornotif SET AS_Name = '".$username."'WHERE AS_ID = '".$uid."'";
              $conn->exec($update2);
            }
            elseif ($atype == 'Admin') {
              $update2 = "UPDATE adminemail SET A_Sender = '".$username."'WHERE A_ID = '".$uid."'   ";
              $conn->exec($update2);

              $update4 = "UPDATE tcemail SET T_Receiver = '".$username."'WHERE A_ID = '".$uid."'   ";
              $conn->exec($update4);

              $update5 = "UPDATE supervisornotif SET AS_Name = '".$username."'WHERE AS_ID = '".$uid."'";
              $conn->exec($update5);
            }

              if ($atype == 'Teacher') {
                header("location:T_index.php");
              }
              elseif ($atype == 'Supervisor') {
                header("location:S_profile.php");
              }
              elseif ($atype == 'Admin') {
              }
          }

        }

      }

    }

      }

    }
#END OF UP NAME

#UPDATE FOR PHONE NUM
    if(empty($_POST["phone"])) {

      $insert = "UPDATE user SET  C_Num = '".$phone."' WHERE User_ID = '".$uid."'   ";
      $conn->exec($insert);

    }else{

      $phonee = test_input($_POST["phone"]);

      if (!preg_match("/^[0-9]{11}$/",$phonee)) {

        $phone = "Only 11 numbers are allowed";
        $pError = "*";
        $errorto = "#Modal5";

      }else{

        $insert = "UPDATE user SET  C_Num = '".$phonee."' WHERE User_ID = '".$uid."'   ";
        $conn->exec($insert);

          if ($atype == 'Teacher') {
            header("location:T_index.php");
          }
          elseif ($atype == 'Supervisor') {
            header("location:S_profile.php");
          }
          elseif ($atype == 'Admin') {
            header("location:A_profile.php");
          }

      }

    }
#END OF UP PHONE NUM

#UPDATE FOR BIRTHDAY
    if (empty($_POST["BD"])) {

      $insert4 = "UPDATE user SET Birthday = '".$bid."' WHERE User_ID = '".$uid."'   ";
      $conn->exec($insert4);

    }else {

      $birthd = test_input($_POST["BD"]);

      $insert4 = "UPDATE user SET Birthday = '".$birthd."' WHERE User_ID = '".$uid."'   ";
      $conn->exec($insert4);

        $dob = new DateTime("$birthd");
        $to   = new DateTime('today');

        $age = $dob->diff($to)->y;

      $insert5 = "UPDATE user SET Age = '".$age."' WHERE User_ID = '".$uid."'   ";
      $conn->exec($insert5);

          if ($atype == 'Teacher') {
            header("location:T_index.php");
          }
          elseif ($atype == 'Supervisor') {
            header("location:S_profile.php");
          }
          elseif ($atype == 'Admin') {
            header("location:A_profile.php");
          }

    }
#END OF UP BIRTHDAY


#UPDATE FOR ADDRESS
    if (empty($_POST["str"])) {

      $insert3 = "UPDATE user SET Address = '".$add."' where User_ID = '".$uid."'   ";
      $conn->exec($insert3);

    }else {

      $stre = test_input($_POST["str"]);

      if (!preg_match("/^[a-zA-Z0-9 ]{2,12}$/",$stre)) {

        $str = "Only letters and numbers allowed";
        $sError = "*";
        $errorto = "#Modal4";

      }else {

    if (empty($_POST["bar"])) {

      $insert3 = "UPDATE user SET Address = '".$add."' where User_ID = '".$uid."'   ";
      $conn->exec($insert3);

    }else {

      $bara = test_input($_POST["bar"]);

      if (!preg_match("/^[a-zA-Z0-9 ]{2,12}$/",$bara)) {

        $bar = "Only letters and numbers allowed";
        $bError = "*";
        $errorto = "#Modal4";

      }else {

    if (empty($_POST["mun"])) {

      $insert3 = "UPDATE user SET Address = '".$add."' where User_ID = '".$uid."'   ";
      $conn->exec($insert3);

    }else {

      $muni = test_input($_POST["mun"]);

      if (!preg_match("/^[a-zA-Z ]{2,12}$/",$muni)) {

        $mun = "Only letters and numbers allowed";
        $muError = "*";
        $errorto = "#Modal4";

      }else {

    if (empty($_POST["pro"])) {

      $insert3 = "UPDATE user SET Address = '".$add."' where User_ID = '".$uid."'   ";
      $conn->exec($insert3);

    }else {

      $prov = test_input($_POST["pro"]);

      if (!preg_match("/^[a-zA-Z ]{2,12}$/",$prov)) {

        $pro = "Only letters and numbers allowed";
        $prError = "*";
        $errorto = "#Modal4";

      }else {
        $address = $stre." ".$bara." ".$muni." ".$prov;

        $insert3 = "UPDATE user SET Address = '".$address."' where User_ID = '".$uid."'   ";
        $conn->exec($insert3);

          if ($atype == 'Teacher') {
            header("location:T_index.php");
          }
          elseif ($atype == 'Supervisor') {
            header("location:S_profile.php");
          }
          elseif ($atype == 'Admin') {
            header("location:A_profile.php");
          }
      }


    }

      }

    }

      }

    }

      }

    }
#END OF UP ADDRESS



  }
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

 ?>
