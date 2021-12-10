<?php
$servername = "localhost";
$username = "root";
$password = "";
//From Log in form
try {
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $query = "SELECT Male FROM pie";

            if ($result = $conn->query($query)) {
        if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$m = $row['Male'];

}
}
  $query1 = "SELECT Female FROM pie";

            if ($result1 = $conn->query($query1)) {
        if ($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {
$f = $row1['Female'];

}
}
  $query2 = "SELECT NS FROM pie";

            if ($result2 = $conn->query($query2)) {
        if ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
$p = $row2['NS'];

}
}





}catch(PDOException $e)
    {
     echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
     $errorMsg=  $e->getMessage();
     echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }
  ?>
