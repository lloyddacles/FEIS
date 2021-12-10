<?php
//From Log in form
$servername = "localhost";
$username = "root";
$password = "";


if (isset($_POST['delhis'])) {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $delid = $_POST['evalid'];
    $delete = "DELETE FROM evaluation WHERE Eval_ID = '".$delid."'";
    $a = "DELETE FROM a WHERE A_ID = '".$delid."'";
    $b = "DELETE FROM b WHERE B_ID = '".$delid."'";
    $c = "DELETE FROM c WHERE C_ID = '".$delid."'";
    $d = "DELETE FROM d WHERE D_ID = '".$delid."'";
    $e = "DELETE FROM e WHERE E_ID = '".$delid."'";
    $l = "DELETE FROM feedback WHERE F_ID = '".$delid."'";
    $f = "DELETE FROM learning WHERE L_ID = '".$delid."'";
    $m = "DELETE FROM medium WHERE M_ID = '".$delid."'";

    $conn->exec($delete);
    $conn->exec($a);
    $conn->exec($b);
    $conn->exec($c);
    $conn->exec($d);
    $conn->exec($e);
    $conn->exec($l);
    $conn->exec($f);
    $conn->exec($m);
    echo '<script type="text/javascript">
    location.href = "S_EvalHistory.php";
    </script>';

    // $conn->exec($alter1);
    // $conn->exec($alter2);
    // $conn->exec($alter3);

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }
}

if (isset($_POST['send'])) {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $delid = $_POST['sevalid'];
    $update = "UPDATE evaluation SET Status ='Sent' WHERE Eval_ID = '".$delid."'";
    $a = "UPDATE a SET Status ='Sent' WHERE A_ID = '".$delid."'";
    $b = "UPDATE b SET Status ='Sent' WHERE B_ID = '".$delid."'";
    $c = "UPDATE c SET Status ='Sent' WHERE C_ID = '".$delid."'";
    $d = "UPDATE d SET Status ='Sent' WHERE D_ID = '".$delid."'";
    $e = "UPDATE e SET Status ='Sent' WHERE E_ID = '".$delid."'";
    $f = "UPDATE feedback SET Status ='Sent' WHERE F_ID = '".$delid."'";
    $l = "UPDATE learning SET Status ='Sent' WHERE L_ID = '".$delid."'";
    $m = "UPDATE medium SET Status ='Sent' WHERE M_ID = '".$delid."'";
    $tid = $_POST['sid'];

    $AS_Name = $_COOKIE['Fname'].' '.$_COOKIE['Lname'];
    $AS_ID = $_COOKIE['uID'];
    $insert = "INSERT INTO supervisornotif(AS_ID,AS_Name, AS_Cate, T_ID,AS_Notification_Type)
    VALUE('".$AS_ID."','".$AS_Name."','You sent the evaluation result to','".$tid."','Evaluation') ";
    $conn->exec($insert);

    $insert = "INSERT INTO teachernotif(T_ID,AS_Name,T_Cate)
    VALUE('".$tid."','".$AS_Name."','sent your evaluation result') ";
    $conn->exec($insert);

    $conn->exec($update);
    $conn->exec($a);
    $conn->exec($b);
    $conn->exec($c);
    $conn->exec($d);
    $conn->exec($e);
    $conn->exec($f);
    $conn->exec($l);
    $conn->exec($m);

    echo '<script type="text/javascript">
    location.href = "S_EvalHistory.php";
    </script>';
    // $conn->exec($alter1);
    // $conn->exec($alter2);
    // $conn->exec($alter3);

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }
}

if (isset($_POST['unsend'])) {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $delid = $_POST['uevalid'];
    $update = "UPDATE evaluation SET Status ='Unsend' WHERE Eval_ID = '".$delid."'";
    $a = "UPDATE a SET Status ='Unsend' WHERE A_ID = '".$delid."'";
    $b = "UPDATE b SET Status ='Unsend' WHERE B_ID = '".$delid."'";
    $c = "UPDATE c SET Status ='Unsend' WHERE C_ID = '".$delid."'";
    $d = "UPDATE d SET Status ='Unsend' WHERE D_ID = '".$delid."'";
    $e = "UPDATE e SET Status ='Unsend' WHERE E_ID = '".$delid."'";
    $f = "UPDATE feedback SET Status ='Unsend' WHERE F_ID = '".$delid."'";
    $l = "UPDATE learning SET Status ='Unsend' WHERE L_ID = '".$delid."'";
    $m = "UPDATE medium SET Status ='Unsend' WHERE M_ID = '".$delid."'";

    $conn->exec($update);
    $conn->exec($a);
    $conn->exec($b);
    $conn->exec($c);
    $conn->exec($d);
    $conn->exec($e);
    $conn->exec($f);
    $conn->exec($l);
    $conn->exec($m);

    echo '<script type="text/javascript">
    location.href = "S_EvalHistory.php";
    </script>';
    // $conn->exec($alter1);
    // $conn->exec($alter2);
    // $conn->exec($alter3);

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }
}



?>
