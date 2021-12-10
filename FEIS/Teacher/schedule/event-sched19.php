<style>
/* Float four columns side by side */
.columna {
  width: 10%;
  padding: 20px 10px;
}

/* Remove extra left and right margins, due to padding in columns */


/* Clear floats after the columns */
.rowa:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.carda {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
  padding: 16px;
  text-align: center;
  background-color: #fff;
}
@media screen and (max-width: 600px) {
  .columna {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}


</style>
<?php
//From Log in form


$servername = "localhost";
$username = "root";
$password = "";


try{
$conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stc = $_COOKIE['uID'];
$sel = "SELECT * FROM teaching_load WHERE TC_ID='".$stc."' AND Sched_No=19";

if ($result = $conn->query($sel)) {
  if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['TL_ID'];
    $sched_no = $row['Sched_No'];
    $sub = $row['Subject'];
    $tc = $row['TC_ID'];
    $d = $row['Day'];
    $sem = $row['Semester'];
    $sec = $row['Section'];
    $s = $row['Start'];
    $e = $row['end'];

  }


}

}catch(PDOException $e)
{
echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
$errorMsg=  $e->getMessage();
echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}
?>

  <!-- Card -->


    <div class="cd-schedule-modal__event-info">
      <div style="background:#fff;">
        <div class="row6">
          <div class="column6">
              <form method="post" enctype="multipart/form-data">
              <label for="formGroupExampleInput" style="padding-left: 10px;">Subject</label>
              <select class="form-control" name="up_subject" disabled>
              <option value="<?php echo $sub; ?>" selected style="color:red;">&nbsp;<?php echo $sub; ?></option>
              <?php include 'assets/select_sub.php'; ?>
              </select>
              <br>
              <label for="formGroupExampleInput" style="padding-left: 10px;">Section</label>
              <select class="form-control" name="up_section" disabled>
              <option value="<?php echo $sec; ?>" selected style="color:red;">&nbsp;<?php echo $sec; ?></option>
                <option>Indonesia</option>
                <option>Excellent</option>
                <option>Indonesia</option>
              </select>
              <br>
              <label for="formGroupExampleInput" style="padding-left: 10px;">Day of Schedule</label>
              <select class="form-control" name="up_day" disabled>
              <option value="<?php echo $d; ?>" selected style="color:red;">&nbsp;<?php echo $d; ?></option>
                <option>Monday</option>
                <option>Tuesday</option>
                <option>Wednesday</option>
                <option>Thursday</option>
                <option>Friday</option>
                <option>Saturday</option>
              </select>
              <br>
              <label for="formGroupExampleInput" style="padding-left: 10px;">Semester</label>
              <select class="form-control" name="up_Semester" disabled>
              <option value="<?php echo $sem; ?>" selected style="color:red;">&nbsp;<?php echo $sem; ?></option>
                <option>1st Semester</option>
                <option>2nd Semester</option>
              </select>
              <br>
              <div class="row">
                <div class="col">

                    <label for="startr">Start</label>
                    <input type="time" class="form-control" value="<?php echo $s; ?>" name="up_start" id="up_start" disabled>
                </div>
                <div class="col">
                  <label for="end">End</label>
                  <input type="time" class="form-control" value="<?php echo $e; ?>" name="up_end" id="up_end" disabled>
                </div>


              </div>

            </form>
          </div>
        </div>

      </div>
      </div>
