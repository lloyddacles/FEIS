<?php
if($atype == "Admin"){

?>

<?php
    $active = "Online";
    $stmt =$conn->query("SELECT * FROM user");

      while($data=$stmt->fetch()) {

        $usid =  $data['User_ID'];
        $prof =  $data['Pic'];
        $f = $data['F_Name'];
        $m = $data['M_Name'];
        $l = $data['L_Name'];
        $at = $data['A_Type'];
        $sta =  $data['Status'];

        $fullname = $f." ".$m." ".$l;

        echo' <div class="desc">
              <div class="thumb">

                <img class="img-circle" src="img/'.$prof.'" width="35px" height="35px">

              </div>
              <div class="details">
                <p>
                  <a>'.$fullname.'</a><br/>
                  <a>'.$at.'</a><br/>
                  <muted>'.$sta.'</muted>
                </p>';
            ?>

    <button type="button"  class="btn btn-theme" data-toggle="modal" data-target="#md<?php echo $data['User_ID'];?>">View</button>


  <!-- Modal Start -->

  <div class="modal fade" id="md<?php echo $data['User_ID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <form role="form" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="centered" id="exampleModalLabel"><?php echo $fullname ?> Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body centered">


      <img class="img-circle" src="img/<?php echo $data["Pic"]; ?>" width="80px" height="80px">
                  <h4><?php echo $fullname; ?></h4>
                   <h4><?php echo $data['A_Type']; ?></h4>
                  <muted><?php echo $data['Status']; ?></muted>


        </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
      </form>
    </div>
  </div>

      <?php
        echo'

              </div>
            </div>';

      }
      } else{
?>




<?php
    $active = "Online";
    $stmt =$conn->query("SELECT * FROM user WHERE Status ='".$active."' ");

      while($data=$stmt->fetch()) {

        $usid =  $data['User_ID'];
        $prof =  $data['Pic'];
        $f = $data['F_Name'];
        $m = $data['M_Name'];
        $l = $data['L_Name'];
        $at = $data['A_Type'];
        $sta =  $data['Status'];

        $fullname = $f." ".$m." ".$l;

        echo' <div class="desc">
              <div class="thumb">

                <img class="img-circle" src="img/'.$prof.'" width="35px" height="35px">

              </div>
              <div class="details">
                <p>
                  <a>'.$fullname.'</a><br/>
                  <muted>'.$sta.'</muted>
                </p>';
            ?>

		<button type="button"  class="btn btn-theme" data-toggle="modal" data-target="#md<?php echo $data['User_ID'];?>">View</button>


  <!-- Modal Start -->

  <div class="modal fade" id="md<?php echo $data['User_ID'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <form role="form" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="centered" id="exampleModalLabel"><?php echo $fullname ?> Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body centered">


      <img class="img-circle" src="img/<?php echo $data["Pic"]; ?>" width="80px" height="80px">
								  <h4><?php echo $fullname; ?></h4>
								   <h4><?php echo $data['A_Type']; ?></h4>
                  <muted><?php echo $data['Status']; ?></muted>


        </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
      </form>
    </div>
  </div>

    	<?php
				echo'

              </div>
            </div>';

			}
      }
?>
