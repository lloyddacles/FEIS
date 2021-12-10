<?php
//From Log in form
function sched($daysNo){

  $servername = "localhost";
  $username = "root";
  $password = "";
  // code...
  $week = [" ","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
  $days = $week[$daysNo];

  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tc = $_POST['lagayan'];
    $query = "SELECT * FROM teaching_load WHERE Day = '".$days."' AND Teacher='".$tc."'";

      if ($result = $conn->query($query)) {
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['TL_ID'];
            $sched_no = $row['Sched_No'];
            $sub = $row['Subject'];
            $tc = $row['Teacher'];
            $d = $row['Day'];
            $s = $row['Start'];
            $e = $row['end'];
            $sem = $row['Semester'];
            $sec = $row['Section'];

            if ($days == "Monday") {
              echo
              '<li class="cd-schedule__event">
                <a data-start="'.$s.'" data-end="'.$e.'" data-content="event-sched'.$sched_no.'" data-event="event-1" href="#0">
                <em class="cd-schedule__name" style="font-size:15px;"> '.$sec.'
                <br>'.$sub.'
                <br>'.$tc.'
                </em>
                </a>
               </li>';

            }

            if ($days == "Tuesday") {
              echo
              '<li class="cd-schedule__event">
                <a data-start="'.$s.'" data-end="'.$e.'" data-content="event-sched'.$sched_no.'" data-event="event-2" href="#0">
                <em class="cd-schedule__name" style="font-size:15px;"> '.$sec.'
                <br>'.$tc.'
                <br>'.$sem.'
                </em>
                </a>
               </li>';
            }

            if ($days == "Wednesday") {
              echo
              '<li class="cd-schedule__event">
                <a data-start="'.$s.'" data-end="'.$e.'" data-content="event-sched'.$sched_no.'" data-event="event-3" href="#0">
                <em class="cd-schedule__name" style="font-size:15px;"> '.$sec.'
                <br>'.$sub.'
                <br>'.$tc.'
                <br>'.$sem.'
                </em>
                </a>
               </li>';
            }

            if ($days == "Thursday") {
              echo
              '<li class="cd-schedule__event">
                <a data-start="'.$s.'" data-end="'.$e.'" data-content="event-sched'.$sched_no.'" data-event="event-4" href="#0">
                <em class="cd-schedule__name" style="font-size:15px;"> '.$sec.'
                <br>'.$sub.'
                <br>'.$tc.'
                <br>'.$sem.'
                </em>
                </a>
               </li>';
            }

            if ($days == "Friday") {
              echo
              '<li class="cd-schedule__event">
                <a data-start="'.$s.'" data-end="'.$e.'" data-content="event-sched'.$sched_no.'" data-event="event-1" href="#0">
                <em class="cd-schedule__name" style="font-size:15px;"> '.$sec.'
                <br>'.$sub.'
                <br>'.$tc.'
                <br>'.$sem.'
                </em>
                </a>
               </li>';
            }

            if ($days == "Saturday") {
              echo
              '<li class="cd-schedule__event">
                <a data-start="'.$s.'" data-end="'.$e.'" data-content="event-sched'.$sched_no.'" data-event="event-2" href="#0">
                <em class="cd-schedule__name" style="font-size:15px;"> '.$sec.'
                <br>'.$sub.'
                <br>'.$tc.'
                <br>'.$sem.'
                </em>
                </a>
               </li>';
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


?>


<div class="rows">
  <div class="columns">
    <div class="cardss" style="background-color: #343F66; color: white; font-size: 20px;">
      <div class="row">
        <div class="col-md-10">
          <select class="form-control" id="teacher" name="teacher">
          <option value="" disabled selected>Select Teacher</option>';
            <?php include 'assets/select_tc.php'; ?>
          </select>
        </div>
        <div class="col-md-2">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add Schedule</button>
        </div>
      </div>




    </div>
    <div class="cards">
      <div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
        <div class="cd-schedule__timeline">
          <ul>
            <li><span>06:00</span></li>
            <li><span>06:30</span></li>
            <li><span>07:00</span></li>
            <li><span>07:30</span></li>
            <li><span>08:00</span></li>
            <li><span>08:30</span></li>
            <li><span>09:00</span></li>
            <li><span>09:30</span></li>
            <li><span>10:00</span></li>
            <li><span>10:30</span></li>
            <li><span>11:00</span></li>
            <li><span>11:30</span></li>
            <li><span>12:00</span></li>
            <li><span>12:30</span></li>
            <li><span>01:00</span></li>
            <li><span>01:30</span></li>
            <li><span>02:00</span></li>
            <li><span>02:30</span></li>
            <li><span>03:00</span></li>
            <li><span>03:30</span></li>
            <li><span>04:00</span></li>
            <li><span>04:30</span></li>
            <li><span>05:00</span></li>
            <li><span>05:30</span></li>
            <li><span>06:00</span></li>
            <li><span>06:30</span></li>
            <li><span>07:00</span></li>
            <li><span>07:30</span></li>
            <li><span>08:00</span></li>
          </ul>
        </div> <!-- .cd-schedule__timeline -->

        <div class="cd-schedule__events">
          <ul>
            <li class="cd-schedule__group">
              <div class="cd-schedule__top-info"><span>Monday</span></div>
              <ul>
                <?php echo sched(1);?>
              </ul>
            </li>

            <li class="cd-schedule__group">
              <div class="cd-schedule__top-info"><span>Tuesday</span></div>
              <ul>
              <?php echo sched(2);?>
              </ul>
            </li>

            <li class="cd-schedule__group">
              <div class="cd-schedule__top-info"><span>Wednesday</span></div>
              <ul>
              <?php echo sched(3);?>
              </ul>
            </li>

            <li class="cd-schedule__group">
              <div class="cd-schedule__top-info"><span>Thursday</span></div>
              <ul>
              <?php echo sched(4);?>
              </ul>
            </li>

            <li class="cd-schedule__group">
              <div class="cd-schedule__top-info"><span>Friday</span></div>
              <ul>
              <?php echo sched(5);?>
              </ul>
            </li>

            <li class="cd-schedule__group">
              <div class="cd-schedule__top-info"><span>Saturday</span></div>
              <ul>
              <?php echo sched(6);?>
              </ul>
            </li>
          </ul>
        </div>

        <div class="cd-schedule-modal">
          <header class="cd-schedule-modal__header">
            <div class="cd-schedule-modal__content">
              <span class="cd-schedule-modal__date"></span>
              <h3 class="cd-schedule-modal__name"></h3>
            </div>

            <div class="cd-schedule-modal__header-bg"></div>
          </header>

          <div class="cd-schedule-modal__body">
            <div class="cd-schedule-modal__event-info"></div>
            <div class="cd-schedule-modal__body-bg"></div>
          </div>

          <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
        </div>

        <div class="cd-schedule__cover-layer"></div>
      </div> <!-- .cd-schedule -->

    </div>
  </div>




  <?php include 'assets/reg_tl.php'; ?>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align:left;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#343F66; color: white;">
          <h5 class="modal-title" id="exampleModalLabel">Teacher Schedule</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="formGroupExampleInput" style="padding-left: 10px;">Subject</label>
          <select class="form-control" name="subject">
          <option value="" disabled selected>Select Subject</option>';
          <?php include 'assets/select_sub.php'; ?>
          </select>
          <br>
          <label for="formGroupExampleInput" style="padding-left: 10px;">Section</label>
          <select class="form-control" name="section">
          <option value="" disabled selected>Select Section</option>';
            <option>Indonesia</option>
            <option>Excellent</option>
            <option>Indonesia</option>
          </select>
          <br>
          <label for="formGroupExampleInput" style="padding-left: 10px;">Day of Schedule</label>
          <select class="form-control" name="day">
          <option value="" disabled selected>Select Day</option>';
            <option>Monday</option>
            <option>Tuesday</option>
            <option>Wednesday</option>
            <option>Thursday</option>
            <option>Friday</option>
            <option>Saturday</option>
          </select>
          <br>
          <label for="formGroupExampleInput" style="padding-left: 10px;">Semester</label>
          <select class="form-control" name="Semester">
          <option value="" disabled selected>Select Semester</option>';
            <option>1st Semester</option>
            <option>2nd Semester</option>
          </select>
          <br>
            <div class="row">
              <div class="col">
                Start
                <input type="time" class="form-control" name="start">
              </div>
              <div class="col">
                End
                <input type="time" class="form-control" name="end">
              </div>
            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button class="btn btn-success" name="add_sched">Add Schedule</button>


        </div>
      </div>
    </div>
  </div>
</div>
