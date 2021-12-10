<!DOCTYPE html>
<?php session_start(); ?>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<?php include "php/S_notifs_func.php"; ?>
<?php
if (!$_SESSION['Login_Status']) {
  header ("Location: ../login.php");
}

?>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title> Responsiive Admin Dashboard | CodingLab </title>
  <link rel="shortcut icon" href="../images/logo.png">
  <link rel="stylesheet" href="../sidebar/style.css?v=<?php echo time(); ?>">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Footer CSS -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="../Footer/style.css">
<link rel="stylesheet" href="../Footer/style.css?v=<?php echo time(); ?>">
<link rel="stylesheet" type="text/css" href="mail-css/inbox-style.css?v=<?php echo time(); ?>">
<link rel="stylesheet" type="text/css" href="mail-css/notif-style.css?v=<?php echo time(); ?>">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">

  <!-- Sweet Alert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<style media="screen">
.swal2-popup { font-size: 1.7rem !important; }
.logo-img {
  width: min(50vw, 200px);
  width: 45px;
  margin: 8px;
}

.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 0 solid transparent;
  border-radius: .25rem;
  margin-bottom: 1.5rem;
  box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
  margin-right: .5rem!important;
}


</style>

<body>

  <!-- SideBar -->
  <div class="sidebar">
      <div class="logo-details">
        <!-- <i class='bx bxl-flutter'></i> -->
        <img src="../images/logo.png" class="logo-img">
        <span class="logo_name">FEIS</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="S_Index.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="S_Notification.php">
            <i class="fas fa-bell pulse-button"></i>
            <span class="links_name">Notifications</span><span class="badge2"><?php Sbadgecount(); ?></span>
          </a>
        </li>
        <li>
          <a href="schedule/Schedule.php">
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
            <a href="S_TRecords.php">
              <i class="far fa-address-book"></i>
              <span class="links_name">Training Records </span>
            </a>

            <li class="sub" id="myDIV1">
              <a href="S_ERecords.php">
                <i class="far fa-address-card"></i>
                <span class="links_name">Employment Records</span>
              </a>
            </li>

            <li class="sub" id="myDIV2">
              <a href="S_SRecords.php">
                <i class="fas fa-book"></i>
                <span class="links_name">Subject Records</span>
              </a>
            </li>

            <li class="sub" id="myDIV3">
              <a href="S_RRecords.php">
                <i class="fas fa-id-card-alt"></i>
                <span class="links_name">Registration Records</span>
              </a>
            </li>

            <li class="sub" id="myDIV4">
              <a href="S_ARecords.php">
                <i class="fas fa-users-cog"></i>
                <span class="links_name">Account Records</span>
              </a>
            </li>


          </li>

        </li>
        <li onclick="evaluation()" id="main2">
          <a class="active">
            <i class="fas fa-poll"></i>
            <span class="links_name">Evaluation</span><i style="margin-left:42px;" class='bx bxs-down-arrow bx-xs'></i>
          </a>

          <li class="sub" id="eval">
            <a href="S_EvalFormResult.php">
              <i class="far fa-sticky-note"></i>
              <span class="links_name">Evaluation Results </span>
            </a>

          </li>
          <li class="sub" id="eval1">
            <a href="S_EvalSchedule.php">
              <i class="fas fa-poll-h"></i>
              <span class="links_name">Evaluation</span>
            </a>
          </li>


        </li>


        <li>
          <a href="S_Profile.php">
            <i class="far fa-user-circle"></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        <form method="post">
          <li class="log_out">
            <button type="button" name="log" id="log" value="log">
              <i class='bx bx-log-out'></i>
              <span class="links_name">Logout</span>
            </button>
          </li>
        </form>

      </ul>
    </div>

  <!-- Top Bar -->
  <section class="home-section" style="min-height: 120vh;">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>

      <div class="profile-details">
      <?php include 'Index_Assets/all.php'; ?>
      </div>
    </nav>
    <br><br><br><br>
<br><br>

    <style media="screen">
    .container{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
      padding: 16px;
      background-color: #fff;
      text-align: left;
    }
    </style>
    <center>
      <div class="container" style="background-color: #343F66; color: white; padding: 20px;">
        <div class="row">
          <div class="col-sm-4" style="font-size: 20px;">
            Evaluation Schedule
          </div>
          <div class="col-sm-8"style="text-align:right;">
            <button class="btn btn-success" id="add_sched">Add Schedule</button>
            <a href="S_EvalHistory.php" class="btn btn-success">Evaluation History</a>
          </div>
        </div>

      </div>



      <div class="container">

        <form method="post">
          <table id="example" class="table  table-bordered nowrap" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Teacher</th>
                <th>Evaluator</th>
                <th>Start</th>
                <th>End</th>
                <th>Date</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody >
              <?php include 'Eval_Sched/show_sched.php'; ?>
            </tbody>
          </table>
        </form>

      </div>

      <div class="modal fade" id="evaluate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align:left;">
        <form method="post">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #343F66; color: white;">
                Evaluate Teacher
                <button type="button" class="close" data-dismiss="modal">×</button>
              </div>
              <div class="modal-body" id="body">
                <div class="alert alert-success" role="alert">
                  Are you sure you want to evaluate this teacher?
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">ID</label>
                  <input type="text" class="form-control" name="aid" id="aid" disabled>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput1" style="padding-left: 10px;">Teacher</label>
                  <select class="form-control" name="atc" id="atc" disabled>
                    <option value="" disabled selected>Select Teacher</option>
                    <?php include 'Eval_Assets/select_tc.php'; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput" style="padding-left: 10px;">Supervisor</label>
                  <select class="form-control" name="asp" id="asp" disabled>
                    <option value="" disabled selected>Select Supervisor</option>
                    <?php include 'Eval_Assets/select_sp.php'; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Time-Start</label>
                  <input type="time" class="form-control" name="astart" id="astart" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Time-End</label>
                  <input type="time" class="form-control" name="aend" id="aend" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Date</label>
                  <input type="date" class="form-control" name="adate" id="adate" disabled>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" name="avaltc" id="avaltc">Evaluate Teacher </button>
              </div>
            </div>
          </div>

        </form>
      </div>


      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align:left;">
        <form method="post">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #343F66; color: white;">
                Delete Schedule
                <button type="button" class="close" data-dismiss="modal">×</button>
              </div>
              <div class="modal-body" id="body">
                <div class="alert alert-danger" role="alert">
                  Are you sure you want to delete this schedule?
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">ID</label>
                  <input type="text" class="form-control" name="did" id="did" readonly>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput1" style="padding-left: 10px;">Teacher</label>
                  <select class="form-control" name="dtc" id="dtc" disabled>
                    <option value="" disabled selected>Select Teacher</option>';
                    <?php include 'Eval_Assets/select_tc.php'; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput" style="padding-left: 10px;">Supervisor</label>
                  <select class="form-control" name="dsp" id="dsp" disabled>
                    <option value="" disabled selected>Select Supervisor</option>
                    <?php include 'Eval_Assets/select_sp.php'; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Time-Start</label>
                  <input type="time" class="form-control" name="dstart" id="dstart" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Time-End</label>
                  <input type="time" class="form-control" name="dend" id="dend" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Date</label>
                  <input type="date" class="form-control" name="ddate" id="ddate" disabled>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" name="delsched" id="delsched">Delete Schedule</button>
              </div>
            </div>
          </div>

        </form>
      </div>

      <!-- Modal Subject -->
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align:left;">
        <form method="post">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #343F66; color: white;">
                Edit Schedule
                <button type="button" class="close" data-dismiss="modal">×</button>
              </div>
              <div class="modal-body" id="body">
                <div class="alert alert-warning" role="alert">
                  Are you sure you want to edit this schedule?
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">ID</label>
                  <input type="text" class="form-control" name="eid" id="eid" readonly>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput1" style="padding-left: 10px;">Teacher</label>
                  <select class="form-control" name="etc" id="etc">
                    <option value="" disabled selected>Select Teacher</option>';
                    <?php include 'Eval_Assets/select_tc.php'; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput" style="padding-left: 10px;">Supervisor</label>
                  <select class="form-control" name="esp" id="esp">
                    <option value="" disabled selected>Select Supervisor</option>
                    <?php include 'Eval_Assets/select_sp.php'; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Time-Start</label>
                  <input type="time" class="form-control" name="estart" id="estart">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Time-End</label>
                  <input type="time" class="form-control" name="eend" id="eend">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Date</label>
                  <input type="date" class="form-control" name="edate" id="edate">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" name="editsched" id="editsched">Edit Schedule</button>
              </div>
            </div>
          </div>

        </form>
      </div>

      <div class="modal fade" id="addsched" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align:left;">
        <form method="post">
          <?php include 'Eval_Sched/addsched.php'; ?>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #343F66; color: white;">
                Add Schedule
                <button type="button" class="close" data-dismiss="modal">×</button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="formGroupExampleInput1" style="padding-left: 10px;">Teacher</label>
                  <select class="form-control" name="tc">
                    <option value="" disabled selected>Select Teacher</option>';
                    <?php include 'Eval_Assets/select_tc.php'; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput" style="padding-left: 10px;">Supervisor</label>
                  <select class="form-control" name="sp">
                    <option value="" disabled selected>Select Supervisor</option>
                    <?php include 'Eval_Assets/select_sp.php'; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Time-Start</label>
                  <input type="time" class="form-control" name="start">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Time-End</label>
                  <input type="time" class="form-control" name="end">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Date</label>
                  <input type="date" class="form-control" name="date">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" name="addsched">Add Subject</button>
              </div>
            </div>
          </div>

        </form>
      </div>
    </center>
    <!-- Footer -->
    <?php include '../Footer/footer.php'; ?>
  </section>
  <script src="../sidebar/script.js?v=<?php echo time(); ?>"></script>
  <script src="Records/script.js?v=<?php echo time(); ?>">	</script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>

  <!-- <script type="text/javascript">
  $(document).ready(function(){
  $('#view').click(function(){
  var x = document.getElementById("view").value;
  document.cookie = "Eval_ID="+x;
});
});

</script> -->
<?php
if ($_SESSION['Acc']) {
  echo "<script>Swal.fire(
  'Reminder!',
  'Admins are not allowed to evaluate.',
  'error'
 );</script>";
}

?>




<script type="text/javascript">
$(document).ready(function() {
  var table = $('#example').DataTable( {
    responsive: true,
    scrollY:    400,
    scroller:   true
  } );

  new $.fn.dataTable.FixedHeader( table );
} );


</script>

<script type="text/javascript">
$$(document).ready(function() {
  var table = $('#example').DataTable( {
    scrollX:    true,
  } );

  new $.fn.dataTable.FixedHeader( table );
} );
</script>



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
