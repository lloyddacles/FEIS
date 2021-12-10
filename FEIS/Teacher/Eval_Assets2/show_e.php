<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";

session_start();
  $id =  $_SESSION["Eval_ID"];
  $e1 = $e2 = $e3 = $e4 = $e5 = NULL;
  $epic1 = $epic2 = $epic3 = $epic4 = $epic5 = NULL;
  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


          $query = "SELECT * FROM e WHERE E_ID ='".$id."'";

            if ($result = $conn->query($query)) {
                if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $e1 = $row['E1'];
                  $e2 = $row['E2'];
                  $e3 = $row['E3'];
                  $e4 = $row['E4'];
                  $e5 = $row['E5'];

                  //E1
                  if ($e1 == 0) {
                    $epic1 =  '<input type="checkbox" value=""disabled name="e1">';
                  } else {
                    $epic1 = '<input type="checkbox" value=""disabled name="e1" checked=checked>';
                  }

                  //E2
                  if ($e2 == 0) {
                    $epic2 =  '<input type="checkbox" value=""disabled name="e2">';
                  } else {
                    $epic2 = '<input type="checkbox" value=""disabled name="e2" checked=checked>';
                  }

                  //E3
                  if ($e3 == 0) {
                    $epic3 =  '<input type="checkbox" value=""disabled name="e3">';
                  } else {
                    $epic3 = '<input type="checkbox" value=""disabled name="e3" checked=checked>';
                  }

                  //E4
                  if ($e4 == 0) {
                    $epic4 =  '<input type="checkbox" value=""disabled name="e4">';
                  } else {
                    $epic4 = '<input type="checkbox" value=""disabled name="e4" checked=checked>';
                  }

                  //E5
                  if ($e5 == 0) {
                    $epic5 =  '<input type="checkbox" value=""disabled name="e5">';
                  } else {
                    $epic5 = '<input type="checkbox" value=""disabled name="e5" checked=checked>';
                  }

                  echo '
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #343F66; color: white;">
                      E: Relationship
                      <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							26: Attendance.
                      '.$epic1.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							27: Class atmosphere of attentiveness and respect.
                      '.$epic2.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							28: Knows and users student names.
                      '.$epic3.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							29: Positive reaponsive to questions.
                      '.$epic4.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							30: Balance of attention/connection with all of the students and not just to few.
                      '.$epic5.'
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
                      E: Relationship
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
