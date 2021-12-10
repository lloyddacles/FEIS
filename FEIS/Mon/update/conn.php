<?php
$servername = "localhost";
$username = "root";
$password = "";
try {
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




$query = "SELECT * FROM user WHERE Username = '".$User."' AND Password = '".$Pass."' ";

if ($result = $conn->query($query)) {
if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
 $mi = $row["M_Name"];
 $mid = substr($mi, 0, 1);
  $a = date("i");
$pic = $row["Pic"];
$f = $row["F_Name"];
$l = $row["L_Name"];

  if ($_COOKIE["Status"] == 'Online') {

    if ($time <= "29") {
        $b = $time + 30;

      if ($b == $a) {

        $sql = "UPDATE user SET Status='Idle' WHERE User_ID = '$uid'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $sql = "UPDATE user SET Log='$b' WHERE User_ID = '$uid'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $idle = "Idle";
        $status = "Status";

        setcookie($status, $idle, time() + (86400 * 30));

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

    elseif ($time >= "30" AND $time <= "59") {
        $t = $time + 30;
        $b = $t - 60;

      if ($b == $a) {

        $sql = "UPDATE user SET Status='Idle' WHERE User_ID = '$uid'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $sql = "UPDATE user SET Log='$b' WHERE User_ID = '$uid'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $idle = "Idle";
        $status = "Status";

        setcookie($status, $idle, time() + (86400 * 30));

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


}catch(PDOException $e)
    {

     $errorMsg=  $e->getMessage();
     echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
    }

?>
