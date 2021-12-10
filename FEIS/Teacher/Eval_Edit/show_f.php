<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";


  $id = $_SESSION['E_ID'];

  $f1 = $f2 = $f3 = $f4 = $f5 = NULL;
  $fpic1 = $fpic2 = $fpic3 = $fpic4 = $fpic5 = $fpic6 = $fpic7 = $fpic8 = $fpic9 = $fpic10 = $fpic11 = $fpic12 = $fpic13 = NULL;
  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


          $query = "SELECT * FROM feedback WHERE F_ID ='".$id."'";

            if ($result = $conn->query($query)) {
                if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $f1 = $row['F1'];
                  $f2 = $row['F2'];
                  $f3 = $row['F3'];
                  $f4 = $row['F4'];
                  $f5 = $row['F5'];
                  $f6 = $row['F6'];
                  $f7 = $row['F7'];
                  $f8 = $row['F8'];
                  $f9 = $row['F9'];
                  $f10 = $row['F10'];
                  $f11 = $row['F11'];
                  $f12 = $row['F12'];
                  $f13 = $row['F13'];

                  //F1
                  if ($f1 == NULL) {
                    $fpic1 =  '<input type="checkbox" value="Knowledge evident." id="f1" name="f1">';
                  } else {
                    $fpic1 = '<input type="checkbox" value="Knowledge evident." id="f1" name="f1" checked=checked>';
                  }

                  //F2
                  if ($f2 == NULL) {
                    $fpic2 =  '<input type="checkbox" value="Posed good questions." id="f2" name="f2">';
                  } else {
                    $fpic2 = '<input type="checkbox" value="Posed good questions." id="f2" name="f2" checked=checked>';
                  }

                  //F3
                  if ($f3 == NULL) {
                    $fpic3 =  '<input type="checkbox" value="Encourage active participation." id="f3" name="f3">';
                  } else {
                    $fpic3 = '<input type="checkbox" value="Encourage active participation." id="f3" name="f3" checked=checked>';
                  }

                  //F4
                  if ($f4 == NULL) {
                    $fpic4 =  '<input type="checkbox" value="Connected with the learners." id="f4" name="f4">';
                  } else {
                    $fpic4 = '<input type="checkbox" value="Connected with the learners." id="f4" name="f4" checked=checked>';
                  }

                  //F5
                  if ($f5 == NULL) {
                    $fpic5 =  '<input type="checkbox" value="Managed student issues/behaviours." id="f5" name="f5">';
                  } else {
                    $fpic5 = '<input type="checkbox" value="Managed student issues/behaviours." id="f5" name="f5" checked=checked>';
                  }

                  //F6
                  if ($f6 == NULL) {
                    $fpic6 =  '<input type="checkbox" value="Connected topics to daily events." id="f6" name="f6">';
                  } else {
                    $fpic6 = '<input type="checkbox" value="Connected topics to daily events." id="f6" name="f6" checked=checked>';
                  }

                  //F7
                  if ($f7 == NULL) {
                   $fpic7 =  '<input type="checkbox" value="Text and/or hand out materials where connected and/or referenced." id="" name="f7">';
                  } else {
                    $fpic7 = '<input type="checkbox" value="Text and/or hand out materials where connected and/or referenced." id="f7" name="f7" checked=checked>';
                  }

                  //F8
                  if ($f8 == NULL) {
                    $fpic8 =  '<input type="checkbox" value="Demonstrated respect." id="f8" name="f8">';
                  } else {
                    $fpic8 = '<input type="checkbox" value="Demonstrated respect." id="f8" name="f8" checked=checked>';
                  }

                  //F9
                  if ($f9 == NULL) {
                    $fpic9 =  '<input type="checkbox" value="Addressed varied learning styles/preferences." id="f9" name="f9">';
                  } else {
                    $fpic9 = '<input type="checkbox" value="Addressed varied learning styles/preferences." id="f9" name="f9" checked=checked>';
                  }

                  //F10
                  if ($f10 == NULL) {
                    $fpic10 =  '<input type="checkbox" value="Expectaion were clear" id="f10" name="f10">';
                  } else {
                    $fpic10 = '<input type="checkbox" value="Expectaion were clear" id="f10" name="f10" checked=checked>';
                  }

                  //F11
                  if ($f11 == NULL) {
                    $fpic11 =  '<input type="checkbox" value="Enthusiasm evident." id="f11" name="f11">';
                  } else {
                    $fpic11 = '<input type="checkbox" value="Enthusiasm evident." id="f11" name="f11" checked=checked>';
                  }

                  //F12
                  if ($f12 == NULL) {
                    $fpic12 =  '<input type="checkbox" value="Listened carefully." id="f12" name="f12">';
                  } else {
                    $fpic12 = '<input type="checkbox" value="Listened carefully." id="f12" name="f12" checked=checked>';
                  }

                  //F13
                  if ($f13 == NULL) {
                    $fpic13 =  '<input type="checkbox" value="Personally connected with the group." id="f13" name="f13">';
                  } else {
                    $fpic13 = '<input type="checkbox" value="Personally connected with the group." id="f13" name="f13" checked=checked>';
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
