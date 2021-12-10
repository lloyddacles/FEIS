<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<?php include "php/A_notifs_func.php"; ?>
<?php session_start();
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
        <a href="A_Index.php">
          <i class='bx bx-box' ></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="A_Notification.php">
          <i class='bx bxs-bell-ring pulse-button' ></i>
          <span class="links_name">Notifications</span> <span class="badge2"><?php Abadgecount(); ?></span>
        </a>
      </li>
      <li>
        <a href="A_Mail_compose.php">
          <i class='bx bx-message pulse-button'></i>
          <span class="links_name">Messages</span> <span class="badge2"><?php emailbadgecountA(); ?></span>
        </a>
      </li>
      <li>
        <a href="schedule/Schedule.php">
          <i class="fas fa-calendar-alt"></i>
          <span class="links_name">Class Schedule</span>
        </a>
      </li>
      <li onclick="myFunction()" id="main">
        <a class="active">
          <i class="fas fa-clipboard"></i>
          <span class="links_name">Records </span><i style="margin-left:60px;" class='bx bxs-down-arrow bx-xs'></i>
        </a>

        <li class="sub" id="myDIV">
          <a href="A_TRecords.php">
            <i class="far fa-address-book"></i>
            <span class="links_name">Training Records </span>
          </a>

          <li class="sub" id="myDIV1">
            <a href="A_ERecords.php">
              <i class="far fa-address-card"></i>
              <span class="links_name">Employment Records</span>
            </a>
          </li>

          <li class="sub" id="myDIV2">
            <a href="A_SRecords.php">
              <i class="fas fa-book"></i>
              <span class="links_name">Subject Records</span>
            </a>
          </li>

          <li class="sub" id="myDIV3">
            <a href="A_RRecords.php">
              <i class="fas fa-id-card-alt"></i>
              <span class="links_name">Registration Records</span>
            </a>
          </li>

          <li class="sub" id="myDIV4">
            <a href="A_ARecords.php">
              <i class="fas fa-users-cog"></i>
              <span class="links_name">Account Records</span>
            </a>
          </li>


        </li>

      </li>
      <li onclick="evaluation()" id="main2">
        <a>
          <i class="fas fa-poll"></i>
          <span class="links_name">Evaluation</span><i style="margin-left:42px;" class='bx bxs-down-arrow bx-xs'></i>
        </a>

        <li class="sub" id="eval">
          <a href="A_EvalFormResult.php">
            <i class="far fa-sticky-note"></i>
            <span class="links_name">Evaluation Results </span>
          </a>

        </li>
        <li class="sub" id="eval1">
          <a href="A_EvalSchedule.php">
            <i class="fas fa-poll-h"></i>
            <span class="links_name">Evaluation</span>
          </a>
        </li>


      </li>


      <li>
        <a href="A_Profile.php">
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
      <div class="container" style="background-color: #343F66; color: white; padding: 16px;">
        <div class="row">
          <div class="col-sm-4" style="font-size: 20px;">
            Employment Records
          </div>
          <div class="col-sm-8" style="text-align:right;">
            <button type="button" class="btn btn-success" id="add_emp">Add Account Records</button>
          </div>
        </div>

      </div>

      <div class="container">

        <table id="example" class="table  table-bordered nowrap" style="width:100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Employer</th>
              <th>Office Address</th>
              <th>Job Grade Level</th>
              <th>Position</th>
              <th>Status</th>
              <th>Date Hired</th>
              <th></th>
            </tr>
          </thead>
          <tbody >
            <?php include 'Records/employment.php'; ?>
          </tbody>
        </table>

      </div>
      <div class="modal fade" id="editemp" role="dialog" style="text-align:left;">
        <form method="post">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #343F66; color: white;">
              Edit Employee
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
              <div class="alert alert-info" role="alert">
                Are you sure you want to edit this employment record?
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">ID</label>
                <input type="text" class="form-control" name="eid"id="eid" readonly>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Employer</label>
                <input type="text" class="form-control" name="eemp"id="eemp">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Office Address</label>
                <input type="text" class="form-control" name="eoff"id="eoff">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Position</label>
                <input type="text" class="form-control" name="epos"id="epos">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Status</label>
                <input type="text" class="form-control" name="estat"id="estat">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Job Grade Level</label>
                <select class="form-control" name="ejgl"id="ejgl">
                  <option value=""  selected>Select Job Grade Level</option>
                  <option>Entry-Level</option>
                  <option>Intermediate</option>
                  <option>Mid-Level</option>
                  <option>Senior/Executive Level</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Date Hired</label>
                <input type="date" class="form-control" name="edate"id="edate">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button name="editjob" class="btn btn-success">Edit Employee</button>
            </div>
          </div>
        </div>
      </form>
    </div>

      <div class="modal fade" id="employee" role="dialog" style="text-align:left;">
        <form method="post">
          <?php include 'Records/add_emp.php'; ?>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #343F66; color: white;">
              Add Employee
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleFormControlInput1">Employer</label>
                <input type="text" class="form-control" name="emp"id="employer">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Office Addres</label>
                <input type="text" class="form-control" name="off"id="offadd">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Position</label>
                <input type="text" class="form-control" name="pos"id="subunit">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Status</label>
                <input type="text" class="form-control" name="stat"id="stat">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Job Grade Level</label>
                <select class="form-control" name="jgl"id="jgl">
                  <option value=""  selected>Select Job Grade Level</option>
                  <option>Entry-Level</option>
                  <option>Intermediate</option>
                  <option>Mid-Level</option>
                  <option>Senior/Executive Level</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Date Hired</label>
                <input type="date" class="form-control" name="date"id="datehired">
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button name="addjob" class="btn btn-success">Add Employee</button>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class="modal fade" id="delemp" role="dialog" style="text-align:left;">
      <form method="post">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #343F66; color: white;">
            Delete Employee
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger" role="alert">
              Are you sure you want to delete this employment record?
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">ID</label>
              <input type="text" class="form-control" name="did"id="did" readonly>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Employer</label>
              <input type="text" class="form-control" name="demp"id="demp" readonly>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Office Addres</label>
              <input type="text" class="form-control" name="doff"id="doff" readonly>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Position</label>
              <input type="text" class="form-control" name="dpos"id="dpos" readonly>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Status</label>
              <input type="text" class="form-control" name="dstat"id="dstat" readonly>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Job Grade Level</label>
              <select class="form-control" name="djgl"id="djgl" disabled>
                <option>Entry-Level</option>
                <option>Intermediate</option>
                <option>Mid-Level</option>
                <option>Senior/Executive Level</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Date Hired</label>
              <input type="date" class="form-control" name="ddate"id="ddate" readonly>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button name="deljob" class="btn btn-success">Delete Employee</button>
          </div>
        </div>
      </div>
    </form>
  </div>
    </center>
        <!-- Footer -->
        <?php include '../Footer/footer.php'; ?>
      </section>
      <script src="../sidebar/script.js"></script>
      <script src="Records/script.js?v=<?php echo time(); ?>">	</script>
      <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
      <script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
      <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>

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
