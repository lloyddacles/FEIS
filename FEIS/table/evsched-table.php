<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
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


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">


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
  <div class="sidebar active">
    <div class="logo-details">
      <!-- <i class='bx bxl-flutter'></i> -->
      <img src="../images/logo.png" class="logo-img">
      <span class="logo_name">FEIS</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#" class="active">
          <i class='bx bx-grid-alt' ></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-box' ></i>
          <span class="links_name">Product</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-list-ul' ></i>
          <span class="links_name">Order list</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="links_name">Analytics</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-coin-stack' ></i>
          <span class="links_name">Stock</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-book-alt' ></i>
          <span class="links_name">Total order</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user' ></i>
          <span class="links_name">Team</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-message' ></i>
          <span class="links_name">Messages</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-heart' ></i>
          <span class="links_name">Favrorites</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="links_name">Setting</span>
        </a>
      </li>
      <li class="log_out">
        <a href="#">
          <i class='bx bx-log-out'></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
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
      Evaluation Schedule
    </div>

    <div class="container">

      <table id="example" class="table  table-bordered nowrap" style="width:100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Teacher Name</th>
            <th>Evaluator</th>
            <th>Time</th>
            <th>Date</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Tiger</td>
            <td>Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>2011/04/25</td>
          </tr>
          <tr>
            <td>Herrod</td>
            <td>Chandler</td>
            <td>Sales Assistant</td>
            <td>San Francisco</td>
            <td>59</td>
            <td>2012/08/06</td>
          </tr>
          <tr>
            <td>Rhona</td>
            <td>Davidson</td>
            <td>Integration Specialist</td>
            <td>Tokyo</td>
            <td>55</td>
            <td>2010/10/14</td>
          </tr>
          <tr>
            <td>Colleen</td>
            <td>Hurst</td>
            <td>Javascript Developer</td>
            <td>San Francisco</td>
            <td>39</td>
            <td>2009/09/15</td>
          </tr>
          <tr>
            <td>Colleen</td>
            <td>Hurst</td>
            <td>Javascript Developer</td>
            <td>San Francisco</td>
            <td>39</td>
            <td>2009/09/15</td>
          </tr>
          <tr>
            <td>Colleen</td>
            <td>Hurst</td>
            <td>Javascript Developer</td>
            <td>San Francisco</td>
            <td>39</td>
            <td>2009/09/15</td>
          </tr>
          <tr>
            <td>Colleen</td>
            <td>Hurst</td>
            <td>Javascript Developer</td>
            <td>San Francisco</td>
            <td>39</td>
            <td>2009/09/15</td>
          </tr>
          <tr>
            <td>Colleen</td>
            <td>Hurst</td>
            <td>Javascript Developer</td>
            <td>San Francisco</td>
            <td>39</td>
            <td>2009/09/15</td>
          </tr>
          <tr>
            <td>Colleen</td>
            <td>Hurst</td>
            <td>Javascript Developer</td>
            <td>San Francisco</td>
            <td>39</td>
            <td>2009/09/15</td>
          </tr>
          <tr>
            <td>Sonya</td>
            <td>Frost</td>
            <td>Software Engineer</td>
            <td>Edinburgh</td>
            <td>23</td>
            <td>2008/12/13</td>
          </tr>
          <tr>
            <td>Sonya</td>
            <td>Frost</td>
            <td>Software Engineer</td>
            <td>Edinburgh</td>
            <td>23</td>
            <td>2008/12/13</td>
          </tr>
          <tr>
            <td>Sonya</td>
            <td>Frost</td>
            <td>Software Engineer</td>
            <td>Edinburgh</td>
            <td>23</td>
            <td>2008/12/13</td>
          </tr>
          <tr>
            <td>Sonya</td>
            <td>Frost</td>
            <td>Software Engineer</td>
            <td>Edinburgh</td>
            <td>23</td>
            <td>2008/12/13</td>
          </tr>
          <tr>
            <td>Sonya</td>
            <td>Frost</td>
            <td>Software Engineer</td>
            <td>Edinburgh</td>
            <td>23</td>
            <td>2008/12/13</td>
          </tr>
          <tr>
            <td>Sonya</td>
            <td>Frost</td>
            <td>Software Engineer</td>
            <td>Edinburgh</td>
            <td>23</td>
            <td>2008/12/13</td>
          </tr>
          <tr>
            <td>Sonya</td>
            <td>Frost</td>
            <td>Software Engineer</td>
            <td>Edinburgh</td>
            <td>23</td>
            <td>2008/12/13</td>
          </tr>
          <tr>
            <td>juswa</td>
            <td>Frost</td>
            <td>Software Engineer</td>
            <td>Edinburgh</td>
            <td>23</td>
            <td>2008/12/13</td>
          </tr>
          <tr>
            <td>Sonya</td>
            <td>Frost</td>
            <td>Software Engineer</td>
            <td>Edinburgh</td>
            <td>23</td>
            <td>2008/12/13</td>
          </tr>
          <tr>
            <td>Sonya</td>
            <td>Frost</td>
            <td>Software Engineer</td>
            <td>Edinburgh</td>
            <td>23</td>
            <td>2008/12/13</td>
          </tr>
          <tr>
            <td>Sonya</td>
            <td>Frost</td>
            <td>Software Engineer</td>
            <td>Edinburgh</td>
            <td>23</td>
            <td>2008/12/13</td>
          </tr>
          <tr>
            <td>Jena</td>
            <td>Gaines</td>
            <td>Office Manager</td>
            <td>London</td>
            <td>30</td>
            <td>2008/12/19</td>
          </tr>
        </tbody>
      </table>

    </div>
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
