<?php
//Lrom Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";

session_start();
  $id =  $_SESSION["Eval_ID"];

  $l1 = $l2 = $l3 = $l4 = $l5 = $l6 = $l7 = $l8 = NULL;
  $lpic1 = $lpic2 = $lpic3 = $lpic4 = $lpic5 = $lpic6 = $lpic7 = $lpic8 = NULL;
  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


          $query = "SELECT * FROM learning WHERE L_ID ='".$id."'";

            if ($result = $conn->query($query)) {
                if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $l1 = $row['L1'];
                  $l2 = $row['L2'];
                  $l3 = $row['L3'];
                  $l4 = $row['L4'];
                  $l5 = $row['L5'];
                  $l6 = $row['L6'];
                  $l7 = $row['L7'];
                  $l8 = $row['L8'];

                  //L1
                  if ($l1 == NULL) {
                    $lpic1 =  '<input type="checkbox" value="Students raise questions to push understanding/gain clarity."disabeld name= "l1">';
                  } else {
                    $lpic1 = '<input type="checkbox" value="Students raise questions to push understanding/gain clarity."disabeld name= "l1" checked=checked>';
                  }

                  //L2
                  if ($l2 == NULL) {
                    $lpic2 =  '<input type="checkbox" value="Learners able to challenge others via question/critique/exceptions raise by peer and/or teacher."disabeld name= "l2">';
                  } else {
                    $lpic2 = '<input type="checkbox" value="Learners able to challenge others via question/critique/exceptions raise by peer and/or teacher."disabeld name= "l2" checked=checked>';
                  }

                  //L3
                  if ($l3 == NULL) {
                    $lpic3 =  '<input type="checkbox" value="Evidence of integrating previous materials."disabeld name= "l3">';
                  } else {
                    $lpic3 = '<input type="checkbox" value="Evidence of integrating previous materials."disabeld name= "l3" checked=checked>';
                  }

                  //L4
                  if ($l4 == NULL) {
                    $lpic4 =  '<input type="checkbox" value="Self directed task completion."disabeld name= "l4">';
                  } else {
                    $lpic4 = '<input type="checkbox" value="Self directed task completion."disabeld name= "l4" checked=checked>';
                  }

                  //L5
                  if ($l5 == NULL) {
                    $lpic5 =  '<input type="checkbox" value="Prepared for class(e.g. Questions raise from reading or task assignment.)."disabeld name= "l5">';
                  } else {
                    $lpic5 = '<input type="checkbox" value="Prepared for class(e.g. Questions raise from reading or task assignment.)."disabeld name= "l5" checked=checked>';
                  }

                  //L6
                  if ($l6 == NULL) {
                    $lpic6 =  '<input type="checkbox" value="Effortsto be attentive/focused on what is happening in class."disabeld name= "l6">';
                  } else {
                    $lpic6 = '<input type="checkbox" value="Effortsto be attentive/focused on what is happening in class."disabeld name= "l6" checked=checked>';
                  }

                  //L7
                  if ($l7 == NULL) {
                   $lpic7 =  '<input type="checkbox" value="Personal example/application shared."disabeld name= "l7">';
                  } else {
                    $lpic7 = '<input type="checkbox" value="Personal example/application shared."disabeld name= "l7" checked=checked>';
                  }

                  //L8
                  if ($l8 == NULL) {
                    $lpic8 =  '<input type="checkbox" value="Augment offered resources."disabeld name= "l8">';
                  } else {
                    $lpic8 = '<input type="checkbox" value="Augment offered resources."disabeld name= "l8" checked=checked>';
                  }

                  echo '
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #343F66; color: white;">
                      Feedback: Learning Impact
                      <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							Students raise questions to push understanding/gain clarity.
                      '.$lpic1.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							Learners able to challenge others via question/critique/exceptions raise by peer and/or teacher.
                      '.$lpic2.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							Evidence of integrating previous materials.
                      '.$lpic3.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							Self directed task completion.
                      '.$lpic4.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							Self directed task completion.
                      '.$lpic5.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							Efforts to be attentive/focused on what is happening in class.
                      '.$lpic6.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							Personal example/application shared.
                      '.$lpic7.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							Augment offered resources.
                      '.$lpic8.'
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
                      Feedback: Learning Impact
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
