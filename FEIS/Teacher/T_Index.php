<?php
 include "php/T_notifs_func.php";
 ?>
 <?php session_start();
 if (!$_SESSION['Login_Status']) {
   header ("Location: ../login.php");
 }
 ?>
 <?php include 'Index_Assets/profile.php'; ?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title> Responsiive Admin Dashboard | CodingLab </title>
  <link rel="shortcut icon" href="../images/logo.png">
  <link rel="stylesheet" href="sidebar/style.css?v=<?php echo time(); ?>">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Footer CSS -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="../Footer/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="mail-css/inbox-style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="mail-css/notif-style.css?v=<?php echo time(); ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Evo Calendar CSS -->
  <link rel="stylesheet" type="text/css" href="../css-evo/evo-calendar.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="../css-evo/evo-calendar.orange-coral.css?v=<?php echo time(); ?>">





  <!-- Chart JS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<style>
/* Float four columns side by side */
.swal2-popup { font-size: 1.7rem !important; }
.containers{
  padding: 15px;
}
#an{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  background: white;
  color: white;
}
/* Float four columns side by side */
.column {
  float: left;
  width: 33%;
  padding: 10px;
}

/* Remove extra left and right margins, due to padding */
.row {
  margin: 0 -5px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: left;
  background-color: #fff;
}

.card:hover {

  border-top-left-radius: 10px;
 border-bottom-left-radius: 10px;
 animation-name: example;
 animation-duration: 0.25s;
 border-left: 8px solid #343f66;
 box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}

@keyframes example {
    0%   {border-left: 2px solid #343f66;}
    25%  {border-left: 3px solid #343f66;}
    50%  {border-left: 4px solid #343f66;}
    100% {border-left: 5px solid #343f66;}
}
.logo-img {
  width: min(50vw, 200px);
  width: 45px;
  margin: 8px;
}


</style>

<style>
/* Float four columns side by side */

.containers2{
  padding: 15px;
}

/* Float four columns side by side */
.column2 {
  float: left;
  width: 100%;
  padding: 10px;
}

/* Remove extra left and right margins, due to padding */
.row2 {
  margin: 0 -5px;
}

/* Clear floats after the columns */
.row2:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column2 {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card2 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: left;
  background-color: #fff;
}



/* Float four columns side by side */

.containers3{
  padding: 15px;
}

/* Float four columns side by side */
.column3 {
  float: left;
  width: 100%;
  padding: 10px;
}

/* Remove extra left and right margins, due to padding */
.row3 {
  margin: 0 -5px;
}

/* Clear floats after the columns */
.row3:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column3 {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

.card3 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: left;
  background-color: #fff;
  border-top: 3px #343F66 solid;
}


</style>

<body>
  <style media="screen">

  </style>
  <!-- SideBar -->
    <div class="sidebar">
      <div class="logo-details">
        <!-- <i class='bx bxl-flutter'></i> -->
        <img src="../images/logo.png" class="logo-img">
        <span class="logo_name">FEIS</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="T_Index.php" class="active">
            <i class='bx bx-box' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="T_Notification.php">
            <i class='bx bxs-bell-ring pulse-button' ></i>
            <span class="links_name">Notifications</span> <span class="badge2"><?php Tbadgecount(); ?></span>
          </a>
        </li>
        <li>
          <a href="T_Mail_compose.php">
            <i class='bx bx-message pulse-button'></i>
            <span class="links_name">Messages</span> <span class="badge2"><?php emailbadgecountT(); ?></span>
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
            <a href="T_TRecords.php">
              <i class="far fa-address-book"></i>
              <span class="links_name">Training Records </span>
            </a>

            <li class="sub" id="myDIV1">
              <a href="T_ERecords.php">
                <i class="far fa-address-card"></i>
                <span class="links_name">Employment Records</span>
              </a>
            </li>

            <li class="sub" id="myDIV2">
              <a href="T_SRecords.php">
                <i class="fas fa-book"></i>
                <span class="links_name">Subject Records</span>
              </a>
            </li>



          </li>

        </li>
        <li class="sub">
          <a href="T_EvalHistory.php">
            <i class="fas fa-poll-h"></i>
            <span class="links_name">Evaluation</span>
          </a>
        </li>
        <li>
          <a href="T_Profile.php">
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
  <section class="home-section">
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



    <?php include 'Index_Assets/First_DT.php'; ?>
    <div class="containers">
      <hr style="color:blue;">
      <div class="row">
        <div class="column">
          <div class="card">
            <h1><?php echo $numt; ?></h1>
            <p> &nbsp;</p>
            <p>Registered Teachers </p>

          </div>
        </div>

        <div class="column">
          <div class="card">
            <h1><?php echo $nums; ?></h1>
            <p> &nbsp;</p>
            <p>Registered Supervisors</p>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <h1><?php echo $numa; ?></h1>
            <p> &nbsp;</p>
            <p>Registered Admins</p>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <h1><?php echo $numon; ?></h1>
            <p> &nbsp;</p>
            <p>Active</p>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <h1><?php echo $numof; ?></h1>
            <p> &nbsp;</p>
            <p>Inactive</p>
          </div>
        </div>


      </div>
    </div>
    <?php include 'Index_Assets/Second_DT.php'; ?>
    <div class="containers">
      <hr style="color:blue;">
      <div class="row">
        <div class="column">
          <div class="card">
            <h1><?php echo $nume; ?></h1>
            <p> &nbsp;</p>
            <p>Evaluation (Pending)</p>
          </div>
        </div>

        <div class="column">
          <div class="card">
            <h1><?php echo $nump; ?></h1>
            <p> &nbsp;</p>
            <p>Evaluated (Approved)</p>
          </div>
        </div>


      </div>
    </div>

    <div class="containers">
      <hr style="color:blue;">
      <div class="row">

        <div class="column">
          <div class="card">
            <h1>1</h1>
            <p> &nbsp;</p>
            <p>Subjects</p>
          </div>
        </div>


      </div>
    </div>



    <!-- Footer -->
    <?php include '../Footer/footer.php'; ?>
  </section>






  <!-- SIDEBAR JS -->
  <script src="sidebar/script.js"></script>
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
