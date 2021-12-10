<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";

  $id = $_SESSION['E_ID'];
    // code...
    $com = $teacher = NULL;

  try {
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $query = "SELECT * FROM evaluation WHERE Eval_ID ='".$id."'";

            if ($result = $conn->query($query)) {
                if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $com = $row['comment'];
                  $teacher = $row['TC_ID'];
                  $query = "SELECT * FROM user WHERE User_ID ='".$id."'";

                    if ($result = $conn->query($query)) {
                        if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                          $com = $row['comment'];
                          $teacher = $row['TC_ID'];


                        }
                  }

                }
          }


  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }

  ?>
