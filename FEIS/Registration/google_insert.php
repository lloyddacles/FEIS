
<?php
$servername = "localhost";
$username = "root";
$password = "";



if(isset($_GET['code'])):
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

  if(!isset($token["error"]))  {

    $client->setAccessToken($token['access_token']);

    // getting profile information
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    // Storing data into database
    $id = $google_account_info->id;
    $Fname = trim($google_account_info->given_name);
    $Lname = trim($google_account_info->family_name);
    $email = $google_account_info->email;
    $profile_pic = $google_account_info->picture;
    $null = NULL;
    // checking user already exists or not
    try {
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $query = "SELECT * FROM registration WHERE Google_ID ='".$id."'";

      if ($result = $conn->query($query)) {
        if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          //User Already Exists
          $fname = $row['Fname'];
          $lname = $row['Lname'];
          $email = $row['Email'];
          $google_id = $row['Google_ID'];
          $full = $fname." ". $lname;


          $_SESSION['login_id'] = $id;

          $sel = "SELECT * FROM user WHERE Google_ID = '".$google_id."' AND Email ='".$email."' ";
          if ($result = $conn->query($sel)) {
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              $a = date("i");
              $uid = $row["User_ID"];
              $atype = $row["A_Type"];
              $sta = $row["Status"];
              $f = $row['F_Name'];
              $l = $row['L_Name'];
              $User = $row['Username'];
              $Pass = $row['Password'];


              //setting cookie

              setcookie("Fname",$f, time() + (86400 * 30), "/");
              setcookie("Lname",$l, time() + (86400 * 30), "/");
              setcookie("Acc_type",$atype, time() + (86400 * 30), "/");
              setcookie("uID",$uid, time() + (86400 * 30), "/");

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


              }
              elseif($sta == 'Sleep'){

                $sql = "UPDATE user SET Status='Sleep' WHERE User_ID = '$uid'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $sleep = "Sleep";
                $status = "Status";


              }
              #end of identifying status

              #identifying what kind of user that is login in
              if ($atype == 'Teacher') {

                echo '<script type="text/javascript">
                window.location.href="Teacher/T_index.php";
                </script>';

              }

              elseif ($atype == 'Supervisor') {
                echo '<script type="text/javascript">
                window.location.href="Supervisor/S_index.php";
                </script>';
              }

              elseif ($atype == 'Admin') {
                echo '<script type="text/javascript">
                window.location.href="Admin/A_index.php";
                </script>';
              }

            } else {
                header('Location: login.php');
                echo '<script type="text/javascript">
                window.location.href="login.php";
                </script>';
              }
            }



        } else {
          $sel = "SELECT * FROM user WHERE Google_ID = '".$id."' AND Email ='".$email."' ";
          if ($result = $conn->query($sel)) {
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              $aydi = $row['User_ID'];
              $fn = $row['F_Name'];
              $ln = $row['L_Name'];
              $ty = $row['A_Type'];

              //setting cookie

              setcookie("Fname", $fn, time() + (86400 * 30), "/");
              setcookie("Lname", $ln, time() + (86400 * 30), "/");
              setcookie("uID", $aydi, time() + (86400 * 30), "/");
              setcookie("Acc_type", $ty, time() + (86400 * 30), "/");
              $up = "UPDATE user SET Status = 'Online' WHERE User_ID = '".$aydi."'";
              $conn->exec($up);
$_SESSION["Login_Status"] = "Online";

              #identifying what kind of user that is login in
              if ($ty == 'Teacher') {

                echo '<script type="text/javascript">
                window.location.href="Teacher/T_index.php";
                </script>';

              }

              if ($ty == 'Supervisor') {
                echo '<script type="text/javascript">
                window.location.href="Supervisor/S_index.php";
                </script>';

            }

              elseif ($ty == 'Admin') {
                $_SESSION['Acc'] = "Admin";
                echo '<script type="text/javascript">
                window.location.href="Admin/A_index.php";
                </script>';
              }

            } else {
              // User does not exists
              $insert = "INSERT INTO registration(Google_ID,Facebook_ID,Fname,Mname,Lname,Gender,C_num,Birthday,Age,Email)
              VALUES('".$id."','".$null."','".$Fname."','".$null."','".$Lname."','".$null."','".$null."','".$null."','".$null."'
                ,'".$email."')";
                $conn->exec($insert);
                $_SESSION['login_id'] = $id;
                unset($_SESSION['logged_in']);
                  session_destroy();
                header('Location: login.php');
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






    }



    else {
      header('Location: login.php');
      exit;
    }

  else:
    // Google Login Url = $client->createAuthUrl();
    ?>



  <?php endif; ?>
