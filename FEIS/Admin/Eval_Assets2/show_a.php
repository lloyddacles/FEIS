<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";
session_start();
    // code...
$id =  $_SESSION["Eval_ID"];
  $com = $teacher = NULL;
  $a1 = $a2 = $a3 = $a4 = $a5 = NULL;
  $pic1 = $pic2 = $pic3 = $pic4 = $pic5 = NULL;
  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $query = "SELECT * FROM a WHERE A_ID ='".$id."'";


            if ($result = $conn->query($query)) {
                if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $a1 = $row['A1'];
                  $a2 = $row['A2'];
                  $a3 = $row['A3'];
                  $a4 = $row['A4'];
                  $a5 = $row['A5'];


                  //A1
                  if ($a1 == 0) {
                    $pic1 = '<input type="checkbox" value="" name="a1" disabled>';
                  } else {
                    $pic1 = '<input type="checkbox" value="" name="a1" checked=checked disabled> ';
                  }

                  //A2
                  if ($a2 == 0) {
                    $pic2 = '<input type="checkbox" value="" name="a2" disabled>';
                  } else {
                    $pic2 = '<input type="checkbox" value="" name="a2" checked=checked disabled>';
                  }

                  //A3
                  if ($a3 == 0) {
                    $pic3 = '<input type="checkbox" value="" name="a3" disabled>';
                  } else {
                    $pic3 = '<input type="checkbox" value="" name="a3" checked=checked disabled>';
                  }

                  //A4
                  if ($a4 == 0) {
                    $pic4 = '<input type="checkbox" value="" name="a4" disabled>';
                  } else {
                    $pic4 = '<input type="checkbox" value="" name="a4" checked=checked disabled>';
                  }

                  //A5
                  if ($a5 == 0) {
                    $pic5 = '<input type="checkbox" value="" name="a5" disabled>';
                  } else {
                    $pic5 = '<input type="checkbox" value="" name="a5" checked=checked disabled>';
                  }


                    echo '
                    <div class="modal-content">
            					<div class="modal-header" style="background-color: #343F66; color: white;">
            						A: Start Up
            						<button type="button" class="close" data-dismiss="modal">×</button>
            					</div>
            					<div class="modal-body">
                      <label class="container">
          							1: Gained Learner Attention
          							'.$pic1.'
          							<span class="checkmark"></span>
          						</label>
            					</div>
                      <div class="modal-body">
                      <label class="container">
          							2: Shared goals/outline for the day, clearly communicates learning competencies and objectives.
          							'.$pic2.'
          							<span class="checkmark"></span>
          						</label>
            					</div>
                      <div class="modal-body">
                      <label class="container">
          							3: Assessed prior knowledge
          							'.$pic3.'
          							<span class="checkmark"></span>
          						</label>
            					</div>
                      <div class="modal-body">
                      <label class="container">
          							4: Connected to previous learning
          							'.$pic4.'
          							<span class="checkmark"></span>
          						</label>
            					</div>
                      <div class="modal-body">
                      <label class="container">
          							5: Puctual
          							'.$pic5.'
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
                      A: Start Up
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
