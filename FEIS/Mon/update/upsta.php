
<?php
include '../Mon/conn2.php';


if(isset($_POST['Online'])){

$sql = "UPDATE user SET Status='Online' WHERE User_ID = '$uid'";
$stmt = $conn->prepare($sql);
$stmt->execute();
   $online = "Online";
  $status = "Status";
  setcookie($status, $online, time() + (86400 * 30));
if ($atype == 'Teacher') {
  header("location:T_index.php");
}
elseif ($atype == 'Supervisor') {
  header("location:S_profile.php");
}
elseif ($atype == 'Admin') {
  header("location:A_profile.php");
}

} elseif (isset($_POST['Idle'])) {
  $sql = "UPDATE user SET Status='Idle' WHERE User_ID = '$uid'";
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
} elseif (isset($_POST['Sleep'])) {
$sql = "UPDATE user SET Status='Sleep' WHERE User_ID = '$uid'";
$stmt = $conn->prepare($sql);
$stmt->execute();
 $sleep = "Sleep";
  $status = "Status";
  setcookie($status, $sleep, time() + (86400 * 30));
if ($atype == 'Teacher') {
  header("location:T_index.php");
}
elseif ($atype == 'Supervisor') {
  header("location:S_profile.php");
}
elseif ($atype == 'Admin') {
  header("location:A_profile.php");
}
} elseif (isset($_POST['Offline'])) {
$sql = "UPDATE user SET Status='Offline' WHERE User_ID = '$uid'";
 $stmt = $conn->prepare($sql);
$stmt->execute();
  $off = "Offline";
  $status = "Status";
  setcookie($status, $off, time() + (86400 * 30));
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


?>
