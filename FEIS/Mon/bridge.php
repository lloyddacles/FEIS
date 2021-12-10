
<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (isset($_POST['login'])){
    session_start();
    $_SESSION["logged_in"] = "Login";
    $User = $_POST["Username"];
    $Pass = $_POST["Password"];


    $query = "select * from user where Username = '".$User."' and Password= '".$Pass."' ";

  if ($result = $conn->query($query)) {
  if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  $a = date("i");
  $uid = $row["User_ID"];
  $atype = $row["A_Type"];
  $sta = $row["Status"];
  $f = $row['F_Name'];
  $l = $row['L_Name'];

  //setting cookie

  setcookie("Fname",$f, time() + (86400 * 30));
  setcookie("lname",$l, time() + (86400 * 30));
  setcookie("Time",$a, time() + (86400 * 30));
  setcookie("Username", $User, time() + (86400 * 30));
  setcookie("Password", $Pass, time() + (86400 * 30));
  setcookie("Acc_type",$atype, time() + (86400 * 30));
  setcookie("Status",$sta, time() + (86400 * 30));
  setcookie("uID",$uid, time() + (86400 * 30));


  $sql = "UPDATE user SET Log='$a' WHERE User_ID = '$uid'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();


#knowing the status of the user when he/she login in to feis
    if ($sta == 'Offline') {

      $sql = "UPDATE user SET Status='Online' WHERE User_ID = '$uid'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();

      $on = "Online";
      $status = "Status";
      setcookie($status, $on, time() + (86400 * 30));


    }
    elseif($sta == 'Idle'){

      $sql = "UPDATE user SET Status='Idle' WHERE User_ID = '$uid'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();

      $idle = "Idle";
      $status = "Status";
      setcookie($status, $idle, time() + (86400 * 30));


    }
    elseif($sta == 'Sleep'){

      $sql = "UPDATE user SET Status='Sleep' WHERE User_ID = '$uid'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();

      $sleep = "Sleep";
      $status = "Status";
      setcookie($status, $sleep, time() + (86400 * 30));


    }
#end of identifying status

#identifying what kind of user that is login in
    if ($atype == 'Teacher') {
    echo '<script type="text/javascript">alert("Login Successful");
               window.location.href="T_index.php";
            </script>';

    }

    elseif ($atype == 'Supervisor') {
    echo '<script type="text/javascript">alert("Login Successful");
               window.location.href="S_index.php";
            </script>';
    }

    elseif ($atype == 'Admin') {
    echo '<script type="text/javascript">alert("Login Successful");
               window.location.href="A_index.php";
            </script>';
    }
#end of knowing what type of user loging in


  }else{
     echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
  }
}

}





  }catch(PDOException $e)
    {

     $errorMsg=  $e->getMessage();
     echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
    }

?>
