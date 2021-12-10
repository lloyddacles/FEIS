
<?php include 'Index_Assets/profile.php'; ?>
<?php session_start();
if (!$_SESSION['Login_Status']) {
  header ("Location: ../login.php");
}
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<?php include "php/T_notifs_func.php"; ?>
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

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

  <!-- Footer CSS -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="../Footer/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="mail-css/inbox-style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="mail-css/notif-style.css?v=<?php echo time(); ?>">
  <!-- Evo Calendar CSS -->
  <link rel="stylesheet" type="text/css" href="../css-evo/evo-calendar.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="../css-evo/evo-calendar.orange-coral.css?v=<?php echo time(); ?>">

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!-- Sweet Alert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Chart JS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<style media="screen">

.logo-img {
  width: min(50vw, 200px);
  width: 45px;
  margin: 8px;
}
#logo-img2 {
  height: min(50vw, 200px);
  width: min(50vw, 200px);
  width: 170px;
  height: 170px;
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

/* 6 */
.btn-6 {
  background: #343F66;
  color: #fff;
  line-height: 42px;
  padding: 0;
  border: none;
  width: 100%;
}
.btn-6 span {
  position: relative;
  display: block;
  width: 100%;
  height: 100%;
}
.btn-6:before,
.btn-6:after {
  position: absolute;
  content: "";
  height: 0%;
  width: 2px;
  background: #343F66;
}
.btn-6:before {
  right: 0;
  top: 0;
  transition: all 500ms ease;
}
.btn-6:after {
  left: 0;
  bottom: 0;
  transition: all 500ms ease;
}
.btn-6:hover{
  color: #343F66;
  background: transparent;
}
.btn-6:hover:before {
  transition: all 500ms ease;
  height: 100%;
}
.btn-6:hover:after {
  transition: all 500ms ease;
  height: 100%;
}
.btn-6 span:before,
.btn-6 span:after {
  position: absolute;
  content: "";
  background: #343F66;
}
.btn-6 span:before {
  left: 0;
  top: 0;
  width: 0%;
  height: 2px;
  transition: all 500ms ease;
}
.btn-6 span:after {
  right: 0;
  bottom: 0;
  width: 0%;
  height: 2px;
  transition: all 500ms ease;
}
.btn-6 span:hover:before {
  width: 100%;
}
.btn-6 span:hover:after {
  width: 100%;
}

.btn{
  display: inline-block;
  font-weight: 400;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  padding: .375rem .75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: .25rem;
  transition: background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.btn:hover {
  text-decoration: none;
}

/*btn_background*/
.effect01 {
  color: white;
  border: 4px solid #343F66;
  background-color: #343F66;
  overflow: hidden;
  position: relative;
  transition: all 0.3s ease-in-out;
}
.effect01:hover {
  border: 4px solid #666;
  background-color: #FFF;
  box-shadow:0px 0px 0px 4px #EEE inset;
  color: black;
}

/*btn_text*/
.effect01 span {
  transition: all 0.2s ease-out;
  z-index: 2;
}
.effect01:hover span{
  letter-spacing: 0.13em;
  color: #333;
}

/*highlight*/
.effect01:after {
  background: #FFF;
  border: 0px solid #000;
  content: "";
  height: 155px;
  left: -75px;
  opacity: .8;
  position: absolute;
  top: -50px;
  -webkit-transform: rotate(35deg);
  transform: rotate(35deg);
  width: 50px;
  transition: all 1s cubic-bezier(0.075, 0.82, 0.165, 1);/*easeOutCirc*/
  z-index: 1;
}
.effect01:hover:after {
  background: #FFF;
  border: 20px solid #000;
  opacity: 0;
  left: 120%;
  -webkit-transform: rotate(40deg);
  transform: rotate(40deg);
}

#title, #gender{
  display: block;
  width: 100%;
  padding: .375rem .75rem;
  font-size: 1rem;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-image: none;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: .25rem;
  transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
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
  <section class="home-section" style="min-height: 140vh;">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Profile</span>
      </div>

      <div class="profile-details">
        <?php include 'Index_Assets/all.php'; ?>
      </div>
    </nav>
    <br><br><br><br>
<br><br>

    <div class="container">
      <div class="main-body">
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header" style="background-color: #343F66; color: white; font-size: 20px;">Profile</div>
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img style="width:180px;" class="
                  <?php if ($status == "Online") {
                    echo "rounded-circle p-1 bg-success";
                  }elseif ($status  == "Offline") {
                    echo "rounded-circle p-1 bg-danger";
                  }else {
                    echo "rounded-circle p-1 bg-warning";
                  } ?>" <?php echo 'src="data:image;base64,'.base64_encode($picture).'" alt="Image"'; ?> id="logo-img2">
                  <div class="mt-3">
                    <h4><?php echo $first.' '.$middle.'. '.$last;?></h4>
                    <p class="text-secondary mb-1"><?php echo $atype; ?></p>
                    <p class="text-muted font-size-sm"><?php echo $address; ?></p>
                    <div class="btn-group">
                      <button type="button" class="btn effect01 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Status
                      </button>
                      <div class="dropdown-menu">
                        <button class="dropdown-item" name="button" id="A" value="Online">Online</button>
                        <button class="dropdown-item" name="button" id="B" value="Offline">Offline</button>
                        <button class="dropdown-item" name="button" id="C" value="Idle">Idle</button>
                      </div>
                    </div>
                    <button class="btn effect01" id="edit">Edit Profile</button>
                  </div>
                </div>
                <hr class="my-4">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Email</h6>
                    <span class="text-secondary"><?php echo $email; ?></span>
                  </li>

                </ul>
              </div>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="card">
              <div class="card-header" style="background-color: #343F66; color: white; font-size: 20px;">Personal Information</div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Change Profile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="file" name="image" class="form-control" disabled>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Title</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <select name="ti" id="title" class="form-control" disabled >
                        <?php
                        if ($title == "Mr.") {
                          echo '
                          <option value="Mr.">Mr.</option>
                          <option value="Ms.">Ms.</option>
                          <option value="Mrs.">Mrs.</option>';
                        }
                        if($title == "Ms."){
                          echo '
                          <option value="Mr.">Ms.</option>
                          <option value="Ms.">Mr.</option>
                          <option value="Mrs.">Mrs.</option>';
                        }
                        if($title == "Mrs."){
                          echo '
                          <option value="Mr.">Mrs.</option>
                          <option value="Ms.">Ms.</option>
                          <option value="Mrs.">Mr.</option>';
                        }
                        ?>

                      </select>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="password" class="form-control" disabled name="pw" id="pw" value='<?php echo $pword; ?>'>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">First Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" disabled name="FN" value='<?php echo $first; ?>'>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Middle Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" disabled name="MN" value='<?php echo $mname; ?>'>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Last Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" disabled name="LN" value='<?php echo $last; ?>'>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" >
                      <select name="ge"id="gender" class="form-control" disabled >
                        <?php
                        if ($gender == "Male") {
                          echo '
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Prefer not to say">Prefer not to say</option>';
                        }
                        if($gender == "Female"){
                          echo '
                          <option value="Female">Female</option>
                          <option value="Male">Male</option>
                          <option value="Prefer not to say">Prefer not to say</option>';
                        }
                        if($gender == "Prefer not to say"){
                          echo '
                          <option value="Prefer not to say">Prefer not to say</option>
                          <option value="Female">Female</option>
                          <option value="Male">Male</option>';
                        }
                        ?>


                      </select>
                      <div class="col-sm-9 text-secondary">
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Birthday</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input name="BD" type="date" class="form-control" disabled  value='<?php echo $birth; ?>'>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Age</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" disabled readonly value='<?php echo $uage; ?>'>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="phone" class="form-control" disabled  value='<?php echo $number; ?>'>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" class="form-control" name="fadd" id="add" readonly  value='<?php echo $address; ?>'>
                      <input hidden  name="str" type="text" class="form-control form-control-sm" id="st" disabled  placeholder="Input Street..">
                      <input hidden  name="bar" type="text" class="form-control form-control-sm" id="br" disabled  placeholder="Input Barangay..">
                      <input hidden  name="mun" type="text" class="form-control form-control-sm" id="mu" disabled  placeholder="Input Municipality..">
                      <input hidden  name="pro" type="text" class="form-control form-control-sm" id="pr" disabled  placeholder="Input Province..">

                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                      <button class="custom-btn btn-6" name="updateprof" type="submit" id="save" disabled><span> Save Changes </span></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>




    <!-- Footer -->
    <?php include '../Footer/footer.php'; ?>


  </section>
  <script src="sidebar/script.js?v=<?php echo time(); ?>"></script>

  <script type="text/javascript">
  $(document).ready(function() {

    var x = document.getElementById("pw");
    $('#save').click(function() {
      x.type = "password";
      Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
      )
    });

    $('#edit').click(function() {

      if($('.form-control').attr('disabled') && $('#save').attr('disabled')){
        Swal.fire(
          'Personal Information',
          'You can edit now your information!',
          'info'
        )
        $('.form-control').removeAttr('disabled');
        $('#save').removeAttr('disabled');


        var x = document.getElementById("pw");
        x.type = "text";
        document.getElementById("add").hidden = true;
        document.getElementById("st").hidden = false;
        document.getElementById("br").hidden = false;
        document.getElementById("mu").hidden = false;
        document.getElementById("pr").hidden = false;

      }else{
        $(".form-control").attr({'disabled': 'disabled'});
        $("#save").attr({'disabled': 'disabled'});

        document.getElementById("add").hidden = false;
        document.getElementById("st").hidden = true;
        document.getElementById("br").hidden = true;
        document.getElementById("mu").hidden = true;
        document.getElementById("pr").hidden = true;
      }

    });
  });
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

  <!-- Start Update Status -->
  <script type="text/javascript">
  // A Result
  $(document).ready(function(){
    $('#A').click(function(){
      var status = $('#A').val();
      $.ajax({
        url: 'php/upstatus.php',
        type: 'post',
        data: {status: status},
        success: function(response){
          $("#logo-img2 ").removeClass("rounded-circle p-1 bg-primary").addClass("rounded-circle p-1 bg-success");
          $("#logo-img2 ").removeClass("rounded-circle p-1 bg-danger").addClass("rounded-circle p-1 bg-success");
          $("#logo-img2 ").removeClass("rounded-circle p-1 bg-warning").addClass("rounded-circle p-1 bg-success");
        }
      });
    });
  });

  // A Result
  $(document).ready(function(){
    $('#B').click(function(){
      var status = $('#B').val();
      $.ajax({
        url: 'php/upstatus.php',
        type: 'post',
        data: {status: status},
        success: function(response){
          $("#logo-img2 ").removeClass("rounded-circle p-1 bg-primary").addClass("rounded-circle p-1 bg-danger");
          $("#logo-img2 ").removeClass("rounded-circle p-1 bg-success").addClass("rounded-circle p-1 bg-danger");
          $("#logo-img2 ").removeClass("rounded-circle p-1 bg-warning").addClass("rounded-circle p-1 bg-danger");
        }
      });
    });
  });

  // A Result
  $(document).ready(function(){
    $('#C').click(function(){
      var status = $('#C').val();
      $.ajax({
        url: 'php/upstatus.php',
        type: 'post',
        data: {status: status},
        success: function(response){
          $("#logo-img2 ").removeClass("rounded-circle p-1 bg-primary").addClass("rounded-circle p-1 bg-warning");
          $("#logo-img2 ").removeClass("rounded-circle p-1 bg-success").addClass("rounded-circle p-1 bg-warning");
          $("#logo-img2 ").removeClass("rounded-circle p-1 bg-danger").addClass("rounded-circle p-1 bg-warning");
        }
      });
    });
  });
  </script>
  <!-- End Update Status -->
</body>
</html>
