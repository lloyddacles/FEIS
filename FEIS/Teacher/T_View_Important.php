<?php
 include "php/T_notifs_func.php";
 ?>
 <?php session_start();
 if (!$_SESSION['Login_Status']) {
   header ("Location: ../login.php");
 }
 ?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title> Responsiive Admin Dashboard | CodingLab </title>
  <link rel="stylesheet" href="../sidebar/style.css?v=<?php echo time(); ?>">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- MAIl CSS -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="mail-css/mail-compose-style.css">
  <link rel="stylesheet" type="text/css" href="mail-css/inbox-style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="mail-css/notif-style.css?v=<?php echo time(); ?>">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
  <script src="javascript/notif.js" charset="utf-8"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Footer CSS -->
  <link rel="stylesheet" href="../Footer/style.css?v=<?php echo time(); ?>">
</head>

<style>
/* Float four columns side by side */
.column {
  width: 90%;
  padding: 20px 10px;
}

/* Remove extra left and right margins, due to padding in columns */
.logo-img {
  width: min(50vw, 200px);
  width: 45px;
  margin: 8px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
  margin: 0;
}
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
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
        <a href="T_Index.php">
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
        <a href="T_Mail_compose.php" class="active">
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
  <section class="home-section" style="min-height: 130vh;">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>


      <div class="profile-details">
        <?php include 'Index_Assets/all.php'; ?>
      </div>
    </nav>

    <br><br><br><br><br><br>

    <!-- Main Content -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!--- Include the above in your HEAD tag ---------->

    <link href="https://select2.github.io/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://select2.github.io/dist/js/select2.full.js"></script>
    <div class="container-fluid">
      <div class="row inbox">
        <div class="col-md-3">
          <div class="panel panel-default">
            <div class="panel-default inbox-menu">
              <a href="T_mail_compose.php" class="btn btn-primary btn-block">New Email</a>
              <ul>
                <li>
                  <a href="T_Inbox.php"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary"><?php emailbadgecountT(); ?></span></a>
                </li>
                <li>
                  <a href="T_Trash.php"><i class="fa fa-trash-o"></i> Trash<span class="label label-primary"><?php T_trashbadge(); ?></span></a>
                </li>
                <li class="active">
                  <a href="T_Important.php"><i class="fa fa-bookmark"></i> Important<span class="label label-primary"><?php T_importantbadge(); ?></span></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="panel panel-default" style="height: 250px; overflow: scroll;">
            <div class="panel-default contacts">
              <a href="T_mail_compose.php" class="btn btn-primary btn-block"> Online Contacts</a>
              <ul>
                <?php  T_Online(); ?>
              </ul>

            </div>

          </div>
          <div class="panel panel-default" style="height: 250px; overflow: scroll;">
            <div class="panel-default contacts">
              <a href="T_mail_compose.php" class="btn btn-primary btn-block"> Offline Contacts</a>
              <ul>
                <?php  T_Offline(); ?>
              </ul>

            </div>

          </div>


        </div><!--/.col-->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
        <div class="col-md-9">
          <section class="content inbox">
            <div class="container-fluid">
              <div class="row clearfix">
                <div class="col-lg-12">
                  <div class="card btn-primary btn-block">
                    <div class="body">
                          <h2>View Message</h2>
                    </div>
                  </div>
                  <div class="card" style="background-color: white; height: 607px; overflow: scroll;">
                    <div class="body">
                      <?php viewimportantmessage(); ?>
                      <br>

                    </div>
                    <a href="T_Important.php" class="btn btn-primary" style="float:left;">Go back to inbox</a>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md-12 col-lg-12 col-xl-12" >

                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <!-- End Of Main Content -->
    <!-- Footer -->
    <?php include '../Footer/footer.php'; ?>
    <!-- Footer End -->
  </section>

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
  $(document).ready(function(){
    $("#to, #cc, #bcc").select2({tags:["team@bm.com", "ceo@bm.com", "cto@bm.com"]});
  });
  </script>

</body>
</html>
