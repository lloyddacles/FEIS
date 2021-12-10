<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  // code...

  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $seltc = $_POST['lagayan'];
    $query = "SELECT * FROM teaching_load WHERE TC_ID='".$seltc."'";

      if ($result = $conn->query($query)) {
          if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['TL_ID'];
            $sched_no = $row['Sched_No'];
            $sub = $row['Subject'];
            $tc = $row['TC_ID'];
            $d = $row['Day'];
            $s = $row['Start'];
            $e = $row['end'];
            $sem = $row['Semester'];
            $sec = $row['Section'];

              echo '
              <script>

              var b = document.getElementById("m1");
                  $("#m1").removeAttr("data-start");
                  $("#m1").removeAttr("data-end");
                  $("#m1").removeAttr("data-content");
                  b.setAttribute("data-start", "'.$s.'");
                  b.setAttribute("data-end", "'.$e.'");
                  b.setAttribute("data-content", "event-sched'.$sched_no.'");
              </script>
              ';





          }

}


  }catch(PDOException $e)
  {
    echo '<script type="text/javascript">alert("Wrong Username or Password");</script>';
    $errorMsg=  $e->getMessage();
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
  }



?>
