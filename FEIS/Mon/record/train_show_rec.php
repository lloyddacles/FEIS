<?php
$servername = "localhost";
$username = "root";
$password = "";
try{
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = "SELECT * FROM training_records WHERE User_ID = '".$uid."' ";

		if ($result = $conn->query($query)) {
        while ($train = $result->fetch(PDO::FETCH_ASSOC)) {
        $ID = $train['TR_ID'];
        $t = $train['T_Name'];
        $l = $train['Location'];
        $c = $train['Certificate'];
        $d = $train['Date'];

      echo '   <tr class="gradeA">
                    <td>'.$ID.'</td>
                    <td class="center hidden-phone">'.$t.'</td>
                    <td class="center hidden-phone">'.$l.'</td>
                    <td class="center hidden-phone">'.$c.'</td>
                    <td class="center hidden-phone">'.$d.'</td>
                    <td class="center hidden-phone">
                    <a href="traindel.php?Edel='.$ID.'"><button class="btn btn-danger btn-xs1"><i class="fa fa-trash-o "></i></button></a>
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
