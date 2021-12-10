<?php

function Sbadgecount(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {


		$AS_ID = $_COOKIE['uID'];
		$AS_Type = "Supervisor";

		$unreadNotif = "SELECT COUNT(AS_Read_ID) AS 'Unread Notifs' FROM supervisornotif WHERE AS_ID ='".$AS_ID."' AND AS_Read_ID = 0";

		if ($result = $conn->query($unreadNotif)) {

			if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				echo $row['Unread Notifs'];
			}
		}

	}catch(PDOException $i) {
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}
}

function Sbadgecount2(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {
		if (isset($_POST['readstatus'])) {
			$AS_Name = $_COOKIE['Fname']." ".$_COOKIE['Lname'];
			$AS_Type = "Supervisor";
			$select = "SELECT * FROM supervisornotif WHERE AS_ID ='".$AS_ID."'";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$mark1 = $_POST['readstatus'];
					$N_ID = $row["N_ID"];

					$update = "UPDATE supervisornotif SET AS_Read_ID = 1 WHERE N_ID = '".$mark1."' AND AS_Read_ID = 0";
					$conn->exec($update);
				}
			}
			echo "<meta http-equiv='refresh' content='0'>";
		}elseif (isset($_POST['readstatus2'])) {
			$AS_Name = $_COOKIE['Fname']." ".$_COOKIE['Lname'];
			$AS_Type = "Supervisor";
			$select = "SELECT * FROM supervisornotif WHERE (AS_Read_ID = 1 AND AS_Name = 'Everyone' AND AS_Type ='Everyone') OR (AS_Read_ID = 1 AND AS_Name = '".$AS_Name."' AND AS_Type='Supervisor') ORDER BY N_ID DESC";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$mark2 = $_POST['readstatus2'];
					$N_ID = $row["N_ID"];

					$update = "UPDATE supervisornotif SET AS_Read_ID = 0 WHERE N_ID = '".$mark2."'";
					$conn->exec($update);
				}
			}
			echo "<meta http-equiv='refresh' content='0'>";
		}elseif (isset($_POST['markasR'])) {
			$AS_Name = $_COOKIE['Fname']." ".$_COOKIE['Lname'];
			$AS_Type = "Supervisor";
			$select = "SELECT * FROM supervisornotif WHERE (AS_Read_ID = 0 AND AS_Name = 'Everyone' AND AS_Type ='Everyone') OR (AS_Read_ID = 0 AND AS_Name = '".$AS_Name."' AND AS_Type='Supervisor') ORDER BY N_ID DESC";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$N_ID = $row["N_ID"];

					$update = "UPDATE supervisornotif SET AS_Read_ID = 1 WHERE AS_Read_ID = 0";
					$conn->exec($update);
				}
			}
			echo "<meta http-equiv='refresh' content='0'>";
		}
		elseif (isset($_POST['markasUR'])) {
			$AS_Name = $_COOKIE['Fname']." ".$_COOKIE['Lname'];
			$AS_Type = "Supervisor";
			$select = "SELECT * FROM supervisornotif WHERE (AS_Read_ID = 1 AND AS_Name = 'Everyone' AND AS_Type ='Everyone') OR (AS_Read_ID = 1 AND AS_Name = '".$AS_Name."' AND AS_Type='Supervisor') ORDER BY N_ID DESC";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$N_ID = $row["N_ID"];

					$update = "UPDATE supervisornotif SET AS_Read_ID = 0 WHERE AS_Read_ID = 1";
					$conn->exec($update);
				}
			}
			echo "<meta http-equiv='refresh' content='0'>";
		}
	}catch(PDOException $i) {
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}
}

function Sunreadnotifs(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$AS_Name = $_COOKIE['Fname']." ".$_COOKIE['Lname'];
		$AS_Type = "Supervisor";

		$select = "SELECT * FROM supervisornotif WHERE (AS_Read_ID = 0 AND AS_Name = 'Everyone' AND AS_Type ='Everyone') OR (AS_Read_ID = 0 AND AS_Name = '".$AS_Name."' AND AS_Type='Supervisor') ORDER BY N_ID DESC LIMIT 2";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$N_ID = $row["N_ID"];
				$AS_Cate = $row["AS_Cate"];
				$Date_Time = $row["Date_Time"];
				$AS_Name = $row['AS_Name'];


				// <span class="label label-danger"><i class="fa fa-bolt"></i></span>
				echo '<li>
				<a href="index.php#">';
				echo $AS_Cate;
				echo '<br><span class="small italic">';
				echo $Date_Time;

				echo '<form method="post"> <button name="readstatus"  class="btn btn-theme05"  class="btn btn-theme05" value='.$N_ID.'>Mark as Read</button> <br></form>';
				echo '</span>
				</a>
				</li>';

			}

		}

	}catch(PDOException $i){
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}

}

function Sreadnotifs(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$AS_Name = $_COOKIE['Fname']." ".$_COOKIE['Lname'];
		$AS_Type = "Supervisor";
		$select = "SELECT * FROM supervisornotif WHERE (AS_Read_ID = 1 AND AS_Name = 'Everyone' AND AS_Type ='Everyone') OR (AS_Read_ID = 1 AND AS_Name = '".$AS_Name."' AND AS_Type='Supervisor') ORDER BY N_ID DESC LIMIT 1";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$N_ID = $row["N_ID"];
				$AS_Cate = $row["AS_Cate"];
				$Date_Time = $row["Date_Time"];
				$AS_Name = $row['AS_Name'];


				// <span class="label label-danger"><i class="fa fa-bolt"></i></span>
				echo '<li>
				<a href="index.php#">';
				echo $AS_Cate;
				echo '<br><span class="small italic">';
				echo $Date_Time;

				echo '<form method="post"> <button name="readstatus2"  class="btn btn-theme05" value='.$N_ID.'>Mark as Unread</button> <br></form>';
				echo '</span>
				</a>
				</li>';
			}

		}

	}catch(PDOException $i){
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}

}
// Start of recent acts
function recentActT(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$AS_Name = $_COOKIE['Fname']." ".$_COOKIE['Lname'];
		$AS_Type = "Supervisor";

		$select = "SELECT * FROM supervisornotif WHERE AS_Name ='".$AS_Name."' AND AS_Type ='".$AS_Type."' ORDER BY N_ID DESC LIMIT 3";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$N_ID = $row["N_ID"];
				$AS_Cate = $row["AS_Cate"];
				$Date_Time = $row["Date_Time"];
				$end = date("g:i a", strtotime(".$Date_Time."));
				$d = date('F d, Y', strtotime($Date_Time));
				$Date_Time = $d.' '.$end;

				echo '<div class="activity-icon bg-theme"><i class="fa fa-check"></i></div>
				<div class="activity-panel">
				<h5>'.$Date_Time.'</h5>
				<p>'.$AS_Cate.'</p>
				</div>';

			}

		}

	}catch(PDOException $i){
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}


}
	// end of recent acts
function seeallS(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$AS_ID = $_COOKIE['uID'];
		$AS_Type = 'Supervisor';

		$select = "SELECT * FROM supervisornotif WHERE AS_ID ='".$AS_ID."' ORDER BY N_ID DESC";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$T_ID = $row["T_ID"];
				$N_ID = $row["N_ID"];
				$AS_Cate = $row["AS_Cate"];
				$AS_Read_ID = $row["AS_Read_ID"];
				$Date_Time = $row["Date_Time"];
				$end = date("g:i a", strtotime(".$Date_Time."));
				$d = date('F d, Y', strtotime($Date_Time));
				$Date_Time = $d.' '.$end;
				$AS_Notification_Type = $row['AS_Notification_Type'];

				$query = "SELECT * FROM user WHERE User_ID='".$T_ID."'";

				if ($result1 = $conn->query($query)) {
					if ($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {
						$tname = $row1['F_Name'].' '.$row1['L_Name'];


					}
				}

				if ($AS_Read_ID == 1) {

					if ($AS_Notification_Type == 'Evaluation') {
						echo '
						<tr>
						<td><a href="S_EvalHistory.php" style="color:inherit;">'.$AS_Cate.' '.$tname.'</a></td>
						<td>Read</td>
						<td><a href="S_EvalHistory.php" style="color:inherit;">'.$Date_Time.'</a></td>';
					}else{
						echo '
						<tr>
						<td>'.$AS_Cate.' '.$tname.'</td>
						<td>Read</td>
						<td>'.$Date_Time.'</td>';
					}
						?>

						<td>	<form method="post">
							<center>
								<button  name="markasunreadnotif" class="btn btn-primary" value='<?php echo $N_ID; ?>' title="Mark As Unread"><i class='bx bxs-message-alt-x' ></i> </button>
								<button class="btn btn-danger" name="deleteperm" value='<?php echo $N_ID; ?>' title="Delete Notification"><i class='bx bx-trash' ></i></button>
							</center>

						</form>
					</td>

				<?php
			}else if ($AS_Read_ID == 0){
				if ($AS_Notification_Type == 'Evaluation') {
					echo '
					<tr>
					<td><a href="S_EvalHistory.php" style="color:inherit;"><b>'.$AS_Cate.' '.$tname.'</b></a></td>
					<td>Unread</td>
					<td><a href="S_EvalHistory.php" style="color:inherit;"><b>'.$Date_Time.'</b></a></td>';
				}else{
					echo '
					<tr>
					<td>'.$AS_Cate.' '.$tname.'</td>
					<td>Read</td>
					<td>'.$Date_Time.'</td>';
				}

					?>

					<td>
						<form method="post">
							<center>
								<button   name="markasreadnotif" class="btn btn-primary" value='<?php echo $N_ID;?>' title="Mark As Read"><i class='bx bxs-message-alt-check' ></i></button>
								<button   class="btn btn-danger" name="deleteperm2" value='<?php echo $N_ID; ?>' title="Delete Notification"><i class='bx bx-trash' ></i></button>
							</center>
						</form>
					</td>

				<?php
			}
			echo'
			</tr>
			';

			if (isset($_POST['markasreadnotif'])){
				$read = $_POST['markasreadnotif'];
				$update = "UPDATE supervisornotif SET AS_Read_ID = 1 WHERE N_ID = '".$read."' ";
				$conn->exec($update);
				echo "<meta http-equiv='refresh' content='0'>";
			}elseif (isset($_POST['markasunreadnotif'])){
				$unread = $_POST['markasunreadnotif'];
				$update = "UPDATE supervisornotif SET AS_Read_ID = 0 WHERE N_ID = '".$unread."'";
				$conn->exec($update);
				echo "<meta http-equiv='refresh' content='0'>";
			}elseif (isset($_POST['markallasread'])){
				$update = "UPDATE supervisornotif SET AS_Read_ID = 1 WHERE AS_Read_ID = 0";
				$conn->exec($update);
				echo "<meta http-equiv='refresh' content='0'>";
			}elseif (isset($_POST['markallasunread'])){
				$update = "UPDATE supervisornotif SET AS_Read_ID = 0 WHERE AS_Read_ID = 1";
				$conn->exec($update);
				echo "<meta http-equiv='refresh' content='0'>";
			}

		}
		if (isset($_POST['deleteperm2'])) {

			$deleteperm = $_POST['deleteperm2'];

			$delete = "DELETE FROM supervisornotif WHERE N_ID = '".$deleteperm."'";
			$alter1 = "ALTER TABLE supervisornotif DROP N_ID";
			$alter2 = "ALTER TABLE supervisornotif AUTO_INCREMENT = 1";
			$alter3 = "ALTER TABLE supervisornotif ADD N_ID int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
			$conn->exec($delete);
			$conn->exec($alter1);
			$conn->exec($alter2);
			$conn->exec($alter3);
			echo "<meta http-equiv='refresh' content='0'>";
		}

	}

}catch(PDOException $e){
	$errorMsg=  $e->getMessage();
	echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}
}
?>
