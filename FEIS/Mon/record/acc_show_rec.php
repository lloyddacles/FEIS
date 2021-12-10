<?php


$servername = "localhost";
$username = "root";
$password = "";
try{
  $conn = new PDO("mysql:host=$servername;dbname=feis", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query1 = "SELECT * FROM user";

        if ($result1 = $conn->query($query1)) {
        while ($data1 = $result1->fetch(PDO::FETCH_ASSOC)) {
        	 $ID = $data1['User_ID'];
        $t = $data1['A_Type'];
        $f = $data1['F_Name'];
        $m = $data1['M_Name'];
        $l = $data1['L_Name'];
        $d = $data1['Date'];
$fullname = $f." ".$m." ".$l;
      echo '   <tr class="gradeA">
                    <td class="center hidden-phone">'.$ID.'</td>
                    <td class="center hidden-phone">'.$t.'</td>
                    <td class="center hidden-phone">'.$fullname.'</td>
                    <td class="center hidden-phone">'.$l.'</td>
                    <td class="center hidden-phone">'.$d.'</td>

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
