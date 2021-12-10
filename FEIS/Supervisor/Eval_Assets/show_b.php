<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";


  $id = $_POST['userid'];

  $b1 = $b2 = $b3 = $b4 = $b5 = NULL;
  $bpic1 = $bpic2 = $bpic3 = $bpic4 = $bpic5 = $bpic6 = $bpic7 = $bpic8 = $bpic9 = $bpic10 = NULL;
  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


          $query = "SELECT * FROM b WHERE B_ID ='".$id."'";

            if ($result = $conn->query($query)) {
                if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $b1 = $row['B1'];
                  $b2 = $row['B2'];
                  $b3 = $row['B3'];
                  $b4 = $row['B4'];
                  $b5 = $row['B5'];
                  $b6 = $row['B6'];
                  $b7 = $row['B7'];
                  $b8 = $row['B8'];
                  $b9 = $row['B9'];
                  $b10 = $row['B10'];

                  //B1
                  if ($b1 == 0) {
                    $bpic1 =  '<input type="checkbox" value=""disabled name="b1">';
                  } else {
                    $bpic1 = '<input type="checkbox" value=""disabled name="b1" checked=checked>';
                  }

                  //B2
                  if ($b2 == 0) {
                    $bpic2 =  '<input type="checkbox" value=""disabled name="b2">';
                  } else {
                    $bpic2 = '<input type="checkbox" value=""disabled name="b2" checked=checked>';
                  }

                  //B3
                  if ($b3 == 0) {
                    $bpic3 =  '<input type="checkbox" value=""disabled name="b3">';
                  } else {
                    $bpic3 = '<input type="checkbox" value=""disabled name="b3" checked=checked>';
                  }

                  //B4
                  if ($b4 == 0) {
                    $bpic4 =  '<input type="checkbox" value=""disabled name="b4">';
                  } else {
                    $bpic4 = '<input type="checkbox" value=""disabled name="b4" checked=checked>';
                  }

                  //B5
                  if ($b5 == 0) {
                    $bpic5 =  '<input type="checkbox" value=""disabled name="b5">';
                  } else {
                    $bpic5 = '<input type="checkbox" value=""disabled name="b5" checked=checked>';
                  }

                  //B6
                  if ($b6 == 0) {
                    $bpic6 =  '<input type="checkbox" value=""disabled name="b6">';
                  } else {
                    $bpic6 = '<input type="checkbox" value=""disabled name="b6" checked=checked>';
                  }

                  //B7
                  if ($b7 == 0) {
                   $bpic7 =  '<input type="checkbox" value=""disabled name="b7">';
                  } else {
                    $bpic7 = '<input type="checkbox" value=""disabled name="b7" checked=checked>';
                  }

                  //B8
                  if ($b8 == 0) {
                    $bpic8 =  '<input type="checkbox" value=""disabled name="b8">';
                  } else {
                    $bpic8 = '<input type="checkbox" value=""disabled name="b8" checked=checked>';
                  }

                  //B9
                  if ($b9 == 0) {
                    $bpic9 =  '<input type="checkbox" value=""disabled name="b9">';
                  } else {
                    $bpic9 = '<input type="checkbox" value=""disabled name="b9" checked=checked>';
                  }
                  //B10
                  if ($b10 == 0) {
                    $bpic10 =  '<input type="checkbox" value=""disabled name="b10">';
                  } else {
                    $bpic10 = '<input type="checkbox" value=""disabled name="b10" checked=checked>';
                  }

                  echo '
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #343F66; color: white;">
                      B: Body
                      <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                    <label class="container">
                      6: Variety of delivery techniques including asking thought - provoking questions.
                      '.$bpic1.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							7: Explains the concepts within the group of the learners.
                      '.$bpic2.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							8: Clear, current, relevant, content, and examples.
                      '.$bpic3.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							9: Students active participation.
                      '.$bpic4.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							10: Enthusiasm, passion for subject.
                      '.$bpic5.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							11: Demonstration of adequate knowledge about the course and taught with competence.
                      '.$bpic6.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							12: Smooth trasition between topics.
                      '.$bpic7.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							13: Encouraging mannerism, has a clear and well modulated voice.
                      '.$bpic8.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							14: Articulate and proficient in the language of instruction.
                      '.$bpic9.'
                      <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="modal-body">
                    <label class="container">
        							15: Effective time- management.
                      '.$bpic10.'
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
                      B: Body
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
