<?php


$servername = "localhost";
$username = "root";
$password = "";
try{
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query1 = "SELECT * FROM registration";

  if ($result1 = $conn->query($query1)) {
    while ($data = $result1->fetch(PDO::FETCH_ASSOC)) {
      $ID = $data['regist_id'];
      $f = $data['Fname'];
      $l = $data['Lname'];
      $m = $data['Mname'];
      $g = $data['Gender'];
      $e = $data['Email'];
      $c = $data['C_num'];
      $a = $data['Age'];


      echo '
      <tr>
      <td>'.$ID.'</td>
      <td>'.$f.'</td>
      <td>'.$l.'</td>
      <td>'.$m.'</td>
      <td>'.$g.'</td>
      <td>'.$c.'</td>
      <td>'.$e.'</td>
      <td>'.$a.'</td>';
      ?>
        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#message1<?php echo $data['regist_id'];?>">Create</button></td>
        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#message2<?php echo $data['regist_id'];?>">Delete</button></td>
          </tr>
      <!-- Modal 1 Start -->
      <div class="modal fade" id="message1<?php echo $data['regist_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog">
          <form method="post">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title float-left">Create Account</h4>
            </div>
            <div class="modal-body">
            <p>Account ID <input type="text" name="ID" value="<?php echo $ID; ?>"></p>
              <label class="col-lg-2 control-label">Type: </label>
                        <select name="sta" id="type" class="form-control" required="">
                          <option value=""></option>
                          <option value="Teacher">Teacher</option>
                          <option value="Supervisor">Supervisor</option>
                        </select>
              <br>
              <label class="col-lg-2 control-label">Username: </label>
                <input type="text" placeholder="Input Username" name="Username" value="" class="form-control" >
              <br>
              <label class="col-lg-2 control-label">Password: </label>
                <input type="password" placeholder="Input Password" name="Password" value="" class="form-control" >
              <br>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-success" name="create">Create</button>
            </div>
          </div>
          </form>
        </div>
      </div>
      <!-- Modal 1 End -->
      <!-- Modal 2 Start -->
      <div class="modal fade" id="message2<?php echo $data['regist_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog">
          <form method="post">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title float-left">Delete Account</h4>
            </div>
            <div class="modal-body">
              <p>Account ID <input type="text" name="idd" value="<?php echo $ID; ?>"></p>

              <p>You are about to delete an<b> Account</b>, this procedure is irreversible.</p>

             <p>Do you want to proceed?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-danger" name="del">Delete</button>
            </div>
          </div>
          </form>
        </div>
      </div>
      <!-- Modal 2 End -->
      <?php
    }
  }


}catch(PDOException $e)
{
  $errorMsg=  $e->getMessage();
  echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}

?>
