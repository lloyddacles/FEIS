<?php
$servername = "localhost";
$username = "root";
$password = "";
try{
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = "SELECT * FROM job_info WHERE User_ID = '".$uid."' ";

		if ($result = $conn->query($query)) {
        while ($job = $result->fetch(PDO::FETCH_ASSOC)) {
        $ID = $job['Job_No'];
        $e = $job['Employer'];
        $oa = $job['Office_add'];
        $jgl = $job['Job_GL'];
        $p = $job['Position'];
        $dh = $job['Date_hired'];
        $es = $job['E_Status'];

      echo '   <tr class="gradeA">
                    <td>'.$ID.'</td>
                    <td class="center hidden-phone">'.$e.'</td>
                    <td class="center hidden-phone">'.$oa.'</td>
                    <td class="center hidden-phone">'.$jgl.'</td>
                    <td class="center hidden-phone">'.$p.'</td>
                    <td class="center hidden-phone">'.$dh.'</td>
                    <td class="center hidden-phone">'.$es.'</td>
                    <td class="center hidden-phone">
                    <a href="jobdelete.php?Edel='.$ID.'"><button class="btn btn-danger btn-xs1"><i class="fa fa-trash-o "></i></button></a>
                    </td>
                  </tr>
                  ';

          }

    }else{
      echo "
      <h4>No record</h4>
      ";

    }


}catch(PDOException $e)
    {
   $errorMsg=  $e->getMessage();
   echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
      }

?>
