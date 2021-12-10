<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";

session_start();
  $id =  $_SESSION["Eval_ID"];

  $m1 = $m2 = $m3 = $m4 = $m5 = NULL;
  $mpic1 = $mpic2 = $mpic3 = $mpic4 = $mpic5 = NULL;
  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


          $query = "SELECT * FROM medium WHERE M_ID ='".$id."'";

            if ($result = $conn->query($query)) {
                if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $m1 = $row['M1'];
                  $m2 = $row['M2'];
                  $m3 = $row['M3'];
                  $m4 = $row['M4'];
                  $m5 = $row['M5'];

                  //M1
                  if ($m1 == NULL) {
                    $mpic1 =  '<input type="checkbox" value="Audio"disabled name="m1">';
                  } else {
                    $mpic1 = '<input type="checkbox" value="Audio"disabled name="m1" checked=checked>';
                  }

                  //M2
                  if ($m2 == NULL) {
                    $mpic2 =  '<input type="checkbox" value="Visual"disabled name="m2">';
                  } else {
                    $mpic2 = '<input type="checkbox" value="Visual"disabled name="m2" checked=checked>';
                  }

                  //M3
                  if ($m3 == NULL) {
                    $mpic3 =  '<input type="checkbox" value="Kinesthetic"disabled name="m3">';
                  } else {
                    $mpic3 = '<input type="checkbox" value="Kinesthetic"disabled name="m3" checked=checked>';
                  }

                  //M4
                  if ($m4 == NULL) {
                    $mpic4 =  '<input type="checkbox" value="Listened carefully."disabled name="m4">';
                  } else {
                    $mpic4 = '<input type="checkbox" value="Listened carefully."disabled name="m4" checked=checked>';
                  }

                  //M5
                  if ($m5 == NULL) {
                    $mpic5 =  '<input type="checkbox" value="Personally connected with the group."disabled name="m5">';
                  } else {
                    $mpic5 = '<input type="checkbox" value="Personally connected with the group."disabled name="m5" checked=checked>';
                  }

                  echo '
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #343F66; color: white;">
                    Feedback: Medium Use And How They Added to the learning Experience
                      <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							Audio
                      '.$mpic1.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							Visual
                      '.$mpic2.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							Kinesthetic
                      '.$mpic3.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							Listened carefully.
                      '.$mpic4.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							Personally connected with the group.
                      '.$mpic5.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>';

                } else {
                  echo '
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #343F66; color: white;">
                    Feedback: Medium Use And How They Added to the learning Experience
                      <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                    No teacher Selected
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>';
                }

              }



  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }



  ?>
