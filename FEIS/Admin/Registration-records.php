<?php include 'php/addacc.php'; ?>
<?php include 'php/reg_del.php'; ?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<?php include "php/A_notifs_func.php"; ?>
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


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<style media="screen">
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
  <form method="post">
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
          <a href="A_Mail_compose.php" class="active">
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
          <a >
            <i class="far fa-clipboard"></i>
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
          <a href="A_Notification.php">
            <i class="fas fa-bell"></i>
            <span class="links_name">Notifications</span>
          </a>
        </li>
        <li>
          <a href="A_Profile.php">
            <i class="far fa-user-circle"></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li class="log_out">
            <button  name="logout" value="log">
              <i class='bx bx-log-out'></i>
              <span class="links_name">Logout</span>
            </button>
        </li>

      </ul>
    </div>
  </form>

  <!-- Top Bar -->
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>

      <div class="profile-details">
        <img src="images/profile.jpg" alt="">
        <span class="admin_name">Prem Shahi</span>
      </div>
    </nav>
    <br><br><br><br>

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
      Accounts
    </div>
    <form method="post">
    <div class="container">

      <table id="example" class="table  table-bordered nowrap" style="width:100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Middle Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Age</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'php/reg_show_rec.php';;
           ?>
        </tbody>
      </table>
    </div>
    </form>
<center>
    <!-- Footer -->
    <?php include '../Footer/footer.php'; ?>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
