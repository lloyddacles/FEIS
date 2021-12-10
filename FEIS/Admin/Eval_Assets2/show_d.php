<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";

session_start();
  $id =  $_SESSION["Eval_ID"];

  $d1 = $d2 = $d3 = $d4 = $d5 = NULL;
  $dpic1 = $dpic2 = $dpic3 = $dpic4 = $dpic5 = NULL;
  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $query = "SELECT * FROM d WHERE D_ID ='".$id."'";

            if ($result = $conn->query($query)) {
                if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $d1 = $row['D1'];
                  $d2 = $row['D2'];
                  $d3 = $row['D3'];
                  $d4 = $row['D4'];
                  $d5 = $row['D5'];

                  //D1
                  if ($d1 == 0) {
                    $dpic1 =  '<input type="checkbox" value=""disabled name="d1">';
                  } else {
                    $dpic1 = '<input type="checkbox" value=""disabled name="d1" checked=checked>';
                  }

                  //D2
                  if ($d2 == 0) {
                    $dpic2 =  '<input type="checkbox" value=""disabled name="d2">';
                  } else {
                    $dpic2 = '<input type="checkbox" value=""disabled name="d2" checked=checked>';
                  }

                  //D3
                  if ($d3 == 0) {
                    $dpic3 =  '<input type="checkbox" value=""disabled name="d3">';
                  } else {
                    $dpic3 = '<input type="checkbox" value=""disabled name="d3" checked=checked>';
                  }

                  //D4
                  if ($d4 == 0) {
                    $dpic4 =  '<input type="checkbox" value=""disabled name="d4">';
                  } else {
                    $dpic4 = '<input type="checkbox" value=""disabled name="d4" checked=checked>';
                  }

                  //D5
                  if ($d5 == 0) {
                    $dpic5 =  '<input type="checkbox" value=""disabled name="d5">';
                  } else {
                    $dpic5 = '<input type="checkbox" value=""disabled name="d5" checked=checked>';
                  }

                  echo '
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #343F66; color: white;">
          						D: Conclusion
                      <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							21: Ended on time.
                      '.$dpic1.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							22: Summarized key points.
                      '.$dpic2.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							23: Sense of completion felt, review of learning outcomes, how well the information was learned.
                      '.$dpic3.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							24: Reminder of assignments, if any...
                      '.$dpic4.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							25: Introduction of upcoming topics.
                      '.$dpic5.'
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
          						D: Conclusion
                      <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                    No Teacher Selected
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
