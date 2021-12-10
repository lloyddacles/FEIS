<?php
$servername = "localhost";
$username = "root";
$password = "";


if (isset($_POST['add_sched'])) {

  try{
    $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stc = $_COOKIE['Sched_TC'];

    if (isset($_POST['teacher']) == 0) {
      echo "
      <script>
        Swal.fire(
          'No Teacher Selected!',
          'Please Select Teacher First!',
          'error'
        );
      </script>
      ";
      } elseif (isset($_POST['teacher']) != 0) {
        $t = $_POST['teacher'];
        $select = "SELECT COUNT(Sched_No) AS Sched_No FROM teaching_load WHERE TC_ID = '".$t."'";

        if ($result = $conn->query($select)) {

          if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $sched = $row['Sched_No'] + 1;
            $day = $_POST['day'];
            $sub = $_POST['subject'];
            $tc = $_POST['teacher'];
            $s = $_POST['start'];
            $e = $_POST['end'];
            $sem = $_POST['Semester'];
            $sec = $_POST['section'];
            $inserts = "INSERT INTO teaching_load(Sched_No, TC_ID, Subject, Day, Start, end, Section, Semester, Status)
            VALUES('".$sched."','".$tc."','".$sub."','".$day."','".$s."','".$e."','".$sec."','".$sem."','unsend')  ";
            $conn->exec($inserts);
            echo '<script>
            document.getElementById("teacher").value = "'.$stc.'";
            document.getElementById("aydi").submit();
            </script>';

          }
        }
      }

    }catch(PDOException $e)
    {
      $errorMsg=  $e->getMessage();
      echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
    }



  }
  ?>
