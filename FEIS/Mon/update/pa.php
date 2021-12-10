<?php 
 if ($atype == 'Teacher') {
  header("location:T_index.php");
}
elseif ($atype == 'Supervisor') {
  header("location:S_profile.php");
}
elseif ($atype == 'Admin') {
  header("location:A_profile.php");
}
?>