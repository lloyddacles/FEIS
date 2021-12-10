<?php
//From Log in form

  $servername = "localhost";
  $username = "root";
  $password = "";

  $id = $_POST['userid'];
    // code...
    $com = $teacher = NULL;

  try {
      $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $query = "SELECT * FROM evaluation WHERE Eval_ID ='".$id."'";

            if ($result = $conn->query($query)) {
                if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  $com = $row['comment'];

                  echo '
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #343F66; color: white;">
                      Feedback: Comment
                      <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                    <form class="">
        							<div class="form-group">
        								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>'.$com.'</textarea>
        							</div>
        						</form>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>';
                } else {
                  echo '
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #343F66; color: white;">
                      Feedback: Comment
                      <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                    No teacher Selected
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>';
                }
          }


  }catch(PDOException $e)
      {
       echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
       $errorMsg=  $e->getMessage();
       echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
        }

  ?>
