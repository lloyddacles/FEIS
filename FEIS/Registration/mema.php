<?php

//From Log in form
$servername = "localhost";
$username = "root";
$password = "";


if (isset($_POST['logs'])) {
  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $u = $_POST['users'];
    $p = $_POST['passs'];
    $query = "SELECT * FROM user WHERE Username='".$u."' AND Password='".$p."'";

    if ($result = $conn->query($query)) {
      if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $aydi = $row['User_ID'];
        $fn = $row['F_Name'];
        $ln = $row['L_Name'];
        $ty = $row['A_Type'];
        setcookie("Fname", $fn, time() + (86400 * 30), "/");
        setcookie("Lname", $ln, time() + (86400 * 30), "/");
        setcookie("uID", $aydi, time() + (86400 * 30), "/");
        setcookie("Acc_type", $ty, time() + (86400 * 30), "/");

        $up = "UPDATE user SET Status = 'Online' WHERE User_ID = '".$aydi."'";
        $conn->exec($up);
        $_SESSION["Login_Status"] = "Online";


        if ($ty == "Admin") {
          $_SESSION['Acc'] = "Admin";
          echo '<script type="text/javascript">
          location.href = "Admin/A_Index.php";
          </script>';
        } elseif ($ty == "Supervisor") {
          echo '<script type="text/javascript">
          location.href = "Supervisor/S_Index.php";
          </script>';
        } elseif ($ty == "Teacher") {
          echo '<script type="text/javascript">
          location.href = "Teacher/T_Index.php";
          </script>';
        }


      }
    }

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }

}


?>
