<?php
//From Log in form
$servername = "localhost";
$username = "root";
$password = "";


  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM user WHERE User_ID = '".$_COOKIE['uID']."'";

    if ($result = $conn->query($query)) {
      if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $pic = $row['Pic'];
        $aydi = $row['User_ID'];
        $fn = $row['F_Name'].' '.$row['L_Name'];
        echo '<img src="data:image;base64,'.base64_encode($row['Pic']).'" alt="Image"';
        echo '<span class="admin_name">'.$fn.' </span>';
      }
    }

  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }


?>

<script type="text/javascript">
$(document).ready(function(){
  $('#log').click(function(){
    logout();
  });
});

function logout(){
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-danger btn-lg',
      cancelButton: 'btn btn-info btn-lg'
    },
    buttonsStyling: false
  })

  swalWithBootstrapButtons.fire({
    title: 'Are you sure you want to <br> logout?',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Cancel',
    cancelButtonText: 'Logout',
    reverseButtons: true
  }).then((result) => {
    //LOGGING ouT
    if (result.isConfirmed) {

    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {

        var id = <?php echo $_COOKIE['uID']; ?>;
        $.ajax({
          url: "../Registration/logout.php",
          type: "POST",
          data: {
            id: id,
          },
          cache: false,
          success: function(response){

            let timerInterval
            Swal.fire({
              title: 'Logging Out',
              html: 'Please Stand By.',
              timer: 2000,
              timerProgressBar: true,
              allowOutsideClick: false,
              didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                  b.textContent = Swal.getTimerLeft();
                }, 100)
              },
              willClose: () => {
                clearInterval(timerInterval);
                location.href = "../login.php";
              }
            }).then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {

              }
            })


          }
        });
    }
  })
}

//SCHEDULE
$(document).ready(function(){
  $('#schedlog').click(function(){
    schedlogout();
  });
});

function schedlogout(){
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-danger btn-lg',
      cancelButton: 'btn btn-info btn-lg'
    },
    buttonsStyling: false
  })

  swalWithBootstrapButtons.fire({
    title: 'Are you sure you want to <br> logout?',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Cancel',
    cancelButtonText: 'Logout',
    reverseButtons: true
  }).then((result) => {
    //LOGGING ouT
    if (result.isConfirmed) {

    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {

        var id = <?php echo $_COOKIE['uID']; ?>;
        $.ajax({
          url: "../../Registration/logout.php",
          type: "POST",
          data: {
            id: id,
          },
          cache: false,
          success: function(response){

            let timerInterval
            Swal.fire({
              title: 'Logging Out',
              html: 'Please Stand By.',
              timer: 2000,
              timerProgressBar: true,
              allowOutsideClick: false,
              didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                  b.textContent = Swal.getTimerLeft();
                }, 100)
              },
              willClose: () => {
                clearInterval(timerInterval);
                location.href = "../../login.php";
              }
            }).then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {

              }
            })


          }
        });
    }
  })
}

</script>
