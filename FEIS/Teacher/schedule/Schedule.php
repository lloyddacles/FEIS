<!DOCTYPE html>
<?php session_start();
if (!$_SESSION['Login_Status']) {
  header ("Location: ../../login.php");
}
?>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<?php include "../php/T_notifs_func.php"; ?>

<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title> Responsiive Admin Dashboard | CodingLab </title>
  <link rel="shortcut icon" href="../../images/logo.png">
  <link rel="stylesheet" href="../sidebar/style.css?v=<?php echo time(); ?>">

  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>

  <!-- Footer CSS -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="../../Footer/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="../mail-css/inbox-style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="../mail-css/notif-style.css?v=<?php echo time(); ?>">


  <!-- SCHEDULE CSS -->
  <link rel="stylesheet" href="../../schedule/assets/css/style.css?v=<?php echo time(); ?>">
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

  <!-- SweetAlert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<style>
/* Float four columns side by side */
.column6 {
  width: 100%;
}

/* Remove extra left and right margins, due to padding in columns */


/* Clear floats after the columns */
.row6:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.card6 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
}
@media screen and (max-width: 600px) {
  .column6 {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}


</style>
<style>
/* Float four columns side by side */
.column0 {
  width: 70%;
  padding: 10px 10px;
}

/* Remove extra left and right margins, due to padding in columns */


/* Clear floats after the columns */
.row0:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.card0 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
  padding: 14px;
  text-align: center;
  background-color: #fff;
}
@media screen and (max-width: 600px) {
  .column0 {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

em{
  font-size: 15px;
}
</style>
<style>

/* Float four columns side by side */
.columns {
  width: 90%;
  padding: 10px 10px;
}

/* Remove extra left and right margins, due to padding in columns */


/* Clear floats after the columns */
.rows:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.cards {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
  padding: 16px;
  text-align: left;
  background-color: #fff;
  min-height: 1500px;
}
.cardss {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
  padding: 16px;
  text-align: left;
  background-color: #fff;
}
@media screen and (max-width: 600px) {
  .columns {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

.logo-img {
  width: min(50vw, 200px);
  width: 45px;
  margin: 8px;
}


</style>
<?php
  if (isset($_POST['teacher'])) {
    $st = $_COOKIE['Sched_TC'];
    echo '<script>
    $(document).ready(function(){
      document.getElementById("teacher").value = "'.$st.'";
     });</script>';
  }


 ?>
<body>

  <!-- SideBar -->
  <div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-flutter'></i> -->
      <img src="../../images/logo.png" class="logo-img">
      <span class="logo_name">FEIS</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="../T_Index.php" class="active">
          <i class='bx bx-box' ></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="../T_Notification.php">
          <i class='bx bxs-bell-ring pulse-button' ></i>
          <span class="links_name">Notifications</span> <span class="badge2"><?php Tbadgecount(); ?></span>
        </a>
      </li>
      <li>
        <a href="../T_Mail_compose.php">
          <i class='bx bx-message pulse-button'></i>
          <span class="links_name">Messages</span> <span class="badge2"><?php emailbadgecountT(); ?></span>
        </a>
      </li>
      <li>
        <a href="Schedule.php">
          <i class="fas fa-calendar-alt"></i>
          <span class="links_name">Class Schedule</span>
        </a>
      </li>
      <li onclick="myFunction()" id="main">
        <a >
          <i class="fas fa-clipboard"></i>
          <span class="links_name">Records </span><i style="margin-left:60px;" class='bx bxs-down-arrow bx-xs'></i>
        </a>

        <li class="sub" id="myDIV">
          <a href="../T_TRecords.php">
            <i class="far fa-address-book"></i>
            <span class="links_name">Training Records </span>
          </a>

          <li class="sub" id="myDIV1">
            <a href="../T_ERecords.php">
              <i class="far fa-address-card"></i>
              <span class="links_name">Employment Records</span>
            </a>
          </li>

          <li class="sub" id="myDIV2">
            <a href="../T_SRecords.php">
              <i class="fas fa-book"></i>
              <span class="links_name">Subject Records</span>
            </a>
          </li>



        </li>

      </li>
      <li class="sub">
        <a href="../T_EvalHistory.php">
          <i class="fas fa-poll-h"></i>
          <span class="links_name">Evaluation</span>
        </a>
      </li>
      <li>
        <a href="../T_Profile.php">
          <i class="far fa-user-circle"></i>
          <span class="links_name">Profile</span>
        </a>
      </li>
      <form method="post">
        <li class="log_out">
          <button type="button" name="schedlog" id="schedlog" value="log">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Logout</span>
          </button>
        </li>
      </form>

    </ul>
  </div>

  <style media="screen">
  .cd-schedule__name{
    font-size: 20px;
    font-weight: bold;
  }
  </style>
  <!-- Top Bar -->
  <section class="home-section" style="min-height: 230vh;">
    <nav style="z-index:2;">
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"><strong>Schedule</strong></span>
      </div>

      <div class="profile-details">
      <?php include '../Index_Assets/all.php'; ?>
      </div>
    </nav>
    <br><br><br><br>
    <center>
      <style media="screen">
      option{
        text-align: left;
      }
      </style>
      <!-- Card -->
      <form method="post" id="aydi" enctype="multipart/form-data">

        <div class="rows">
          <div class="columns">
            <div class="cardss" style="background-color: #343F66; color: white; font-size: 20px;">




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

                <div class="cd-schedule__events" id="all">
                  <ul>
                    <li class="cd-schedule__group">
                      <div class="cd-schedule__top-info"><span>Monday</span></div>
                      <ul>
                        <?php include_once 'db_sched.php' ?>
                        <?php
                        if (isset($_POST['teacher'])) {
                          echo sched(1);
                        }
                        ;?>
                      </ul>
                    </li>

                    <li class="cd-schedule__group">
                      <div class="cd-schedule__top-info"><span>Tuesday</span></div>
                      <ul>
                        <?php
                        if (isset($_POST['teacher'])) {
                          echo sched(2);
                        }
                        ;?>
                      </ul>
                    </li>

                    <li class="cd-schedule__group">
                      <div class="cd-schedule__top-info"><span>Wednesday</span></div>
                      <ul>
                        <?php
                        if (isset($_POST['teacher'])) {
                          echo sched(3);
                        }
                        ;?>
                      </ul>
                    </li>

                    <li class="cd-schedule__group">
                      <div class="cd-schedule__top-info"><span>Thursday</span></div>
                      <ul>
                        <?php
                        if (isset($_POST['teacher'])) {
                          echo sched(4);
                        }
                        ;?>
                      </ul>
                    </li>

                    <li class="cd-schedule__group">
                      <div class="cd-schedule__top-info"><span>Friday</span></div>
                      <ul>
                        <?php
                        if (isset($_POST['teacher'])) {
                          echo sched(5);
                        }
                        ;?>
                      </ul>
                    </li>

                    <li class="cd-schedule__group">
                      <div class="cd-schedule__top-info"><span>Saturday</span></div>
                      <ul>
                        <?php
                        if (isset($_POST['teacher'])) {
                          echo sched(6);
                        }
                        ;?>
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

                  <a href="../#0" class="cd-schedule-modal__close text-replace">Close</a>
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
      </form>

    </center>
    <!-- event sched  -->
    <div class="hide" hidden>

      <?php include 'event-sched1.php'; ?>
      <?php include 'event-sched2.php'; ?>
      <?php include 'event-sched3.php'; ?>
      <?php include 'event-sched4.php'; ?>
      <?php include 'event-sched5.php'; ?>
      <?php include 'event-sched6.php'; ?>
      <?php include 'event-sched7.php'; ?>
      <?php include 'event-sched8.php'; ?>
      <?php include 'event-sched9.php'; ?>
      <?php include 'event-sched10.php'; ?>
      <?php include 'event-sched11.php'; ?>
      <?php include 'event-sched12.php'; ?>
      <?php include 'event-sched13.php'; ?>
      <?php include 'event-sched14.php'; ?>
      <?php include 'event-sched15.php'; ?>
      <?php include 'event-sched16.php'; ?>
      <?php include 'event-sched17.php'; ?>
      <?php include 'event-sched18.php'; ?>
      <?php include 'event-sched19.php'; ?>
      <?php include 'event-sched20.php'; ?>
    </div>


    <!-- Footer -->
    <?php include '../../Footer/footer.php'; ?>


  </section>

  <script type="text/javascript">
  $('#teacher').on('change', function(){
    var x = document.getElementById("teacher").value;
    document.cookie = "Sched_TC="+x+";path=/";
    document.getElementById("aydi").submit();
  });
  </script>
  <?php

   ?>





  <!-- .cd-schedule -->
  <script src="../../schedule/assets/js/util.js?v=<?php echo time(); ?>"></script>
  <!-- util functions included in the CodyHouse framework -->
  <script src="../../schedule/assets/js/main.js?v=<?php echo time(); ?>"></script>
  <!-- SIDEBAR JS -->
  <script src="../sidebar/script.js?v=<?php echo time(); ?>"></script>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".sidebarBtn");
  sidebarBtn.onclick = function() {
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
      sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
  }
  </script>

</body>
</html>
