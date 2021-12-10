<?php
$servername = "localhost";
$UserName = "root";
$Password = "";
$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
// Start of notifs
function Abadgecount(){ // Unread notification counter
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {
		$full = $_COOKIE['Fname'];
		$last = $_COOKIE['Lname'];
		$AS_ID = $_COOKIE['uID'];
		$AS_Type = 'Admin';

		$unreadNotif = "SELECT COUNT(AS_Read_ID) AS 'Unread Notifs' FROM supervisornotif WHERE AS_Read_ID = 0 AND AS_ID = '".$AS_ID."' AND AS_Type='Admin'";

		if ($result = $conn->query($unreadNotif)) {

			if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				echo $row['Unread Notifs'];
			}
		}

	}catch(PDOException $e) {
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}
}

function Abadgecount2(){ // Notification buttons (marks)
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {
		if (isset($_POST['readstatus'])) {
			$AS_ID = $_COOKIE['uID'];
			$AS_Type = 'Admin';
			$select = "SELECT * FROM supervisornotif WHERE (AS_Read_ID = 0 AND AS_ID = 'Everyone' AND AS_Type ='Everyone') OR (AS_Read_ID = 0 AND AS_ID = '".$AS_ID."' AND AS_Type='Admin') ORDER BY N_ID DESC";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$mark1 = $_POST['readstatus'];
					$N_ID = $row["N_ID"];

					$update = "UPDATE supervisornotif SET AS_Read_ID = 1 WHERE N_ID = '".$mark1."'";
					$conn->exec($update);
				}
			}
			echo "<meta http-equiv='refresh' content='0'>";
		}elseif (isset($_POST['readstatus2'])) {
			$AS_ID = $_COOKIE['uID'];
			$AS_Type = 'Admin';
			$select = "SELECT * FROM supervisornotif WHERE (AS_Read_ID = 1 AND AS_ID = 'Everyone' AND AS_Type ='Everyone') OR (AS_Read_ID = 1 AND AS_ID = '".$AS_ID."' AND AS_Type='Admin') ORDER BY N_ID DESC";

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
			$AS_ID = $_COOKIE['uID'];
			$AS_Type = 'Admin';
			$select = "SELECT * FROM supervisornotif WHERE (AS_Read_ID = 0 AND AS_ID = 'Everyone' AND AS_Type ='Everyone') OR (AS_Read_ID = 0 AND AS_ID = '".$AS_ID."' AND AS_Type='Admin') ORDER BY N_ID DESC";

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
			$AS_ID = $_COOKIE['uID'];
			$AS_Type = 'Admin';
			$select = "SELECT * FROM supervisornotif WHERE (AS_Read_ID = 1 AND AS_ID = 'Everyone' AND AS_Type ='Everyone') OR (AS_Read_ID = 1 AND AS_ID = '".$AS_ID."' AND AS_Type='Admin') ORDER BY N_ID DESC";

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

function Aunreadnotifs(){ // Print notifications (unread notifs)
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$AS_ID = $_COOKIE['uID'];
		$AS_Type = 'Admin';

		$select = "SELECT * FROM supervisornotif WHERE (AS_Read_ID = 0 AND AS_ID = 'Everyone' AND AS_Type ='Everyone') OR (AS_Read_ID = 0 AND AS_ID = '".$AS_ID."' AND AS_Type='Admin') ORDER BY N_ID DESC LIMIT 2";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$N_ID = $row["N_ID"];
				$AS_Cate = $row["AS_Cate"];
				$Date_Time = $row["Date_Time"];
				$end = date("g:i a", strtotime(".$Date_Time."));
				$d = date('F d, Y', strtotime($Date_Time));
				$Date_Time = $d.' '.$end;
				$AS_ID = $row['AS_ID'];

				// <span class="label label-danger"><i class="fa fa-bolt"></i></span>
				echo '<li>
				<a href="index.php#">';
				echo $AS_Cate;
				echo '<br><span class="small italic">';
				echo $Date_Time;

				echo '<form method="post"> <button name="readstatus" class="btn btn-theme05" value='.$N_ID.'>Mark as Read</button><br></form>';
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

function Areadnotifs(){ // Print notifications (read notifications)
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$AS_ID = $_COOKIE['uID'];
		$AS_Type = 'Admin';
		$select = "SELECT * FROM supervisornotif WHERE (AS_Read_ID = 1 AND AS_ID = 'Everyone' AND AS_Type ='Everyone') OR (AS_Read_ID = 1 AND AS_ID = '".$AS_ID."' AND AS_Type='Admin') ORDER BY N_ID DESC LIMIT 1";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$N_ID = $row["N_ID"];
				$AS_Cate = $row["AS_Cate"];
				$Date_Time = $row["Date_Time"];
				$end = date("g:i a", strtotime(".$Date_Time."));
				$d = date('F d, Y', strtotime($Date_Time));
				$Date_Time = $d.' '.$end;
				$AS_ID = $row['AS_ID'];


				// <span class="label label-danger"><i class="fa fa-bolt"></i></span>
				echo '<li>
				<a href="index.php#">';
				echo $AS_Cate;
				echo '<br><span class="small italic">';
				echo $Date_Time;

				echo '<form method="post"> <button name="readstatus2" class="btn btn-theme05" value='.$N_ID.'>Mark as Unread</button><br></form>';
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
// End of notifs

// Start of recent acts
function recentActA(){ // Print recent activities (Admin side)
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$AS_ID = $_COOKIE['uID'];
		$AS_Type = 'Admin';

		$select = "SELECT * FROM supervisornotif WHERE (AS_ID = 'Everyone' AND AS_Type ='Everyone') OR (AS_ID = '".$AS_ID."' AND AS_Type='Admin') ORDER BY N_ID DESC LIMIT 3";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$AS_ID = $row["AS_ID"];
				$N_ID = $row["N_ID"];
				$AS_Cate = $row["AS_Cate"];
				$Date_Time = $row["Date_Time"];
				$end = date("g:i a", strtotime(".$Date_Time."));
				$d = date('F d, Y', strtotime($Date_Time));
				$Date_Time = $d.' '.$end;

				echo ' <div class="desc"><div class="thumb">
				<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
				</div>
				<div class="details">
				<p>
				<muted>'.$Date_Time.'</muted>
				<br/>'.$AS_Cate.'<br/>
				</p>
				</div>
				</div>';

			}

		}

	}catch(PDOException $i){
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}


}
//See all notifications start
function seeallA(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$AS_ID = $_COOKIE['uID'];
		$AS_Type = 'Admin';

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

				$query = "SELECT * FROM user WHERE User_ID='".$T_ID."'";

				if ($result1 = $conn->query($query)) {
					if ($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {
						$tname = $row1['F_Name'].' '.$row1['L_Name'];


					}
				}

				if ($AS_Read_ID == 1) {
					echo '
					<tr>
					<td>'.$AS_Cate.' '.$tname.'</td>
					<td>Read</td>
					<td>'.$Date_Time.'</td>';

					?>

					<td>	<form method="post">
						<center>
							<button  name="markasunreadnotif" class="btn btn-primary" value='<?php echo $N_ID; ?>' title="Mark As Unread"><i class='bx bxs-message-alt-x' ></i> </button>
							<button class="btn btn-danger" name="deleteperm2" value='<?php echo $N_ID; ?>' title="Delete Notification"><i class='bx bx-trash' ></i></button>
						</center>

					</form>
				</td>

				<?php
			}else if ($AS_Read_ID == 0){
				echo '
				<tr>
				<td><b>'.$AS_Cate.' '.$tname.'</b></td>
				<td><b>Unread</b></td>
				<td><b>'.$Date_Time.'</b></td>';

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
//notifications end
// Start of Email funcs
function emailbadgecountA(){ // Unread emails counter
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {

		$AS_ID = $_COOKIE['uID'];
		$AS_Type = 'Admin';

		$unreadNotif = "SELECT COUNT(T_Status) AS 'Unread Notifs' FROM tcemail WHERE T_Status = 0 AND A_ID = '".$AS_ID."' AND T_Trash !=1 ";
		$select = "SELECT * FROM tcemail WHERE T_Status = 0 ORDER BY T_Message_ID DESC LIMIT 1";


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

function emailbadgecountA2(){ // Email Buttons (marks)
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try{
		if (isset($_POST['readstatus'])) {
			$AS_ID = $_COOKIE['uID'];
			$AS_Type = 'Admin';
			$select = "SELECT * FROM tcemail WHERE T_Status = 0 AND A_ID = '".$AS_ID."'AND T_Trash !=1 ORDER BY T_Message_ID DESC";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$mark1 = $_POST['readstatus'];
					$T_Message_ID = $row["T_Message_ID"];

					$update = "UPDATE tcemail SET T_Status = 1 WHERE T_Message_ID = '".$mark1."' AND A_ID = '".$AS_ID."'";
					$conn->exec($update);
				}
			}
			echo "<meta http-equiv='refresh' content='0'>";
		}elseif (isset($_POST['readstatus2'])) {
			$AS_ID = $_COOKIE['uID'];
			$AS_Type = 'Admin';
			$select = "SELECT * FROM tcemail WHERE T_Status = 1 AND A_ID = '".$AS_ID."' ORDER BY T_Message_ID DESC";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$mark2 = $_POST['readstatus2'];
					$T_Message_ID = $row["T_Message_ID"];

					$update = "UPDATE tcemail SET T_Status = 0 WHERE T_Message_ID = '".$mark2."' AND A_ID = '".$AS_ID."'";
					$conn->exec($update);
				}
			}
			echo "<meta http-equiv='refresh' content='0'>";
		}elseif (isset($_POST['EmarkR'])) {
			$AS_ID = $_COOKIE['uID'];
			$AS_Type = 'Admin';
			$select = "SELECT * FROM tcemail WHERE T_Status = 0 AND A_ID = '".$AS_ID."' ORDER BY T_Message_ID DESC";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$T_Message_ID = $row["T_Message_ID"];

					$update = "UPDATE tcemail SET T_Status = 1 WHERE A_ID = '".$AS_ID."'";
					$conn->exec($update);
				}
			}
			echo "<meta http-equiv='refresh' content='0'>";
		}
		elseif (isset($_POST['EmarkUr'])) {
			$AS_ID = $_COOKIE['uID'];
			$AS_Type = 'Admin';
			$select = "SELECT * FROM tcemail WHERE T_Status = 1 AND A_ID = '".$AS_ID."' ORDER BY T_Message_ID DESC";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$T_Message_ID = $row["T_Message_ID"];

					$update = "UPDATE tcemail SET T_Status = 0 WHERE A_ID = '".$AS_ID."'";
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

function emailunreadnotifsA(){ // Email prints (unread messages)
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$AS_ID = $_COOKIE['uID'];
		$AS_Type = 'Admin';

		$select = "SELECT * FROM tcemail WHERE T_Status = 0 AND A_ID ='".$AS_ID."' AND T_Trash !=1 ORDER BY T_Message_ID DESC LIMIT 2";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$T_Sender = $row['T_Sender'];
				$T_Message_ID = $row["T_Message_ID"];
				$T_Subject = $row["T_Subject"];
				$T_Message = substr($row["T_Message"], 0, 10)."..";
				$T_DateTime = $row["T_DateTime"];
				$end = date("g:i a", strtotime(".$T_DateTime."));
				$d = date('F d, Y', strtotime($T_DateTime));
				$T_DateTime = $d.' '.$end;
				$end = date("g:i a", strtotime(".$T_DateTime."));
				$d = date('F d, Y', strtotime($T_DateTime));
				$T_DateTime = $d.' '.$end;
				$T_Status = $row['T_Status'];
				$A_ID = $row['A_ID'];

				echo '<li>
				<a>
				<span class="subject">';
				echo 'Subject:'.$T_Subject;
				echo '</span> <span class="from">';
				echo 'Sender:'.$T_Sender;
				echo '</span>
				<span class="time">';
				echo '<br>';
				echo $T_DateTime;
				echo '</span>
				</span>
				<span class="message">';
				echo $T_Message;
				echo'<form method ="post"><button name="readstatus" class="btn btn-theme05" value='.$T_Message_ID.'>Mark as Read</button><br></form>';


				?>

				<!-- Button For Modal -->
				<form method="post">
					<button type="button" data-toggle="modal" data-target="#message<?php echo $row['T_Message_ID'];?>">Message Overview</button>
				</form>
				<!-- Modal Start -->
				<div class="modal fade" id="message<?php echo $row['T_Message_ID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title float-left">View Message</h4>

							</div>
							<div class="modal-body">
								<h4><?php echo 'Subject:';  echo' '; echo $row['T_Subject'];?></h4>
								<h4><?php echo '<br> Message:';?></h4>
								<h5><?php echo $row['T_Message'];?></h5>
								<h5><?php echo '<br> Date and Time sent:';?></h5>
								<h5><?php echo $row['T_DateTime'];?></h5>
								<h5><?php echo '<br> From:';?></h5>
								<h5><?php echo $row['T_Sender'];?></h5>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

							</div>
						</div>
					</div>
				</div>

				<!-- Modal End -->
				<?php
				echo'
				</span>
				</a>
				</li';

			}

		}
	}catch(PDOException $i){
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}

}

function emailreadnotifsA(){ //Email prints (read messages)
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$AS_ID = $_COOKIE['uID'];

		$select = "SELECT * FROM tcemail WHERE T_Status = 1 AND A_ID ='".$AS_ID."'AND T_Trash !=1 ORDER BY T_Message_ID DESC LIMIT 2";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$T_Sender = $row['T_Sender'];
				$T_Message_ID = $row["T_Message_ID"];
				$T_Subject = $row["T_Subject"];
				$T_Message = substr($row["T_Message"], 0, 10)."..";
				$T_DateTime = $row["T_DateTime"];
				$end = date("g:i a", strtotime(".$T_DateTime."));
				$d = date('F d, Y', strtotime($T_DateTime));
				$T_DateTime = $d.' '.$end;
				$end = date("g:i a", strtotime(".$T_DateTime."));
				$d = date('F d, Y', strtotime($T_DateTime));
				$T_DateTime = $d.' '.$end;
				$T_Status = $row['T_Status'];
				$A_ID = $row['A_ID'];


				echo '<li>
				<a>
				<span class="subject">';
				echo $T_Subject;
				echo '</span> <span class="from">';
				echo $T_Sender;
				echo '</span>
				<span class="time">';
				echo '<br>';
				echo $T_DateTime;
				echo '</span>
				</span>
				<span class="message">';
				echo $T_Message;
				echo'<form method ="post"><button name="readstatus2"  class="btn btn-theme05" value='.$T_Message_ID.'>Mark as Unread</button><br></form>';
				?>
				<!-- Button For Modal -->
				<form method="post">
					<button type="button" data-toggle="modal" data-target="#message<?php echo $row['T_Message_ID'];?>">Message Overview</button>
				</form>
				<!-- Modal Start -->
				<div class="modal fade" id="message<?php echo $row['T_Message_ID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title float-left">View Message</h4>

							</div>
							<div class="modal-body">
								<h4><?php echo 'Subject:';  echo' '; echo $row['T_Subject'];?></h4>
								<h4><?php echo '<br> Message:';?></h4>
								<h5><?php echo $row['T_Message'];?></h5>
								<h5><?php echo '<br> Date and Time sent:';?></h5>
								<h5><?php echo $row['T_DateTime'];?></h5>
								<h5><?php echo '<br> From:';?></h5>
								<h5><?php echo $row['T_Sender'];?></h5>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

							</div>
						</div>
					</div>
				</div>
				<!-- Modal End -->
				<?php
				echo'
				</span>
				</a>
				</li';

			}

		}
	}catch(PDOException $i){
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}

}
// End of Email funcs
//all inbox start
function A_inbox(){

	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$full = $_COOKIE['Fname'];
		$last = $_COOKIE['Lname'];
		$A_ID = $_COOKIE['uID'];

		if (isset($_POST['searchemail2'])) {
			$search = $_POST['searchemail2'];

			$select = "SELECT * FROM tcemail WHERE T_Message LIKE '%".$search."%' OR T_Subject LIKE '%".$search."%' AND A_ID ='".$A_ID."'";

			if ($result = $conn->query($select)) {

				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

					$T_Sender = $row['T_Sender'];
					$T_Message_ID = $row["T_Message_ID"];
					$T_Subject = $row["T_Subject"];
					$T_Message = substr($row["T_Message"], 0, 10)."..";
					// $T_Message2 = substr($row["T_Message"], 0, 20)."<br>";
					// $T_Message2 = implode(' ',str_split($row["T_Message"]));
					$text = $row["T_Message"];
					$T_Message2 = wordwrap($text, 65, "<br />\n");
					$T_DateTime = $row["T_DateTime"];
					$end = date("g:i a", strtotime(".$T_DateTime."));
					$d = date('F d, Y', strtotime($T_DateTime));
					$T_DateTime = $d.' '.$end;

					$T_Status = $row['T_Status'];
					$T_Important = $row['T_Important'];
					$T_Trash = $row['T_Trash'];
					$A_ID = $row['A_ID'];

					if ($T_Important == 1 AND $T_Trash == 0 AND $T_Status == 1) {
						echo '<li class="list-group-item">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a class="m-r-10">'.$T_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$T_DateTime.'</time></small>
						</div>
						<p class="msg">'.$T_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasunread" title="Mark as Unread" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-square-dots' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>


						<?php
						echo '
						</li>';
					} elseif ($T_Important == 1 AND $T_Trash == 0 AND $T_Status == 0) {
						// code...
						echo '<li class="list-group-item unread">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$T_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$T_DateTime.'</time></small>
						</div>
						<p class="msg">'.$T_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasread" title="Mark as Read" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-square' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>
						<?php
						echo '
						</li>';
					}	elseif ($T_Important == 0 AND $T_Trash == 0 AND $T_Status == 1) {
						// code...
						echo '<li class="list-group-item">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$T_Subject.'</a>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$T_DateTime.'</time></small>
						</div>
						<p class="msg">'.$T_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button class="btn btn-primary" name="markasunread" title="Mark as Unread" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-square-dots' ></i></button>
							<button  class="btn btn-primary" name="markasimportant" title="Mark as Important" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>
						<?php
						echo '
						</li>';
					} elseif ($T_Important == 0 AND $T_Trash == 0 AND $T_Status == 0) {
						// code...
						echo '<li class="list-group-item unread">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$T_Subject.'</a>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$T_DateTime.'</time></small>
						</div>
						<p class="msg">'.$T_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasread" title="Mark as Read" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-square' ></i></button>
							<button  class="btn btn-primary" name="markasimportant" title="Mark as Important" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>
						<?php
						echo '
						</li>';
					}


					if (isset($_POST['viewmess'])){
						$A_ID = $_COOKIE['uID'];
						$read1 = $_POST['viewmess'];
						$update = "UPDATE tcemail SET T_Status = 1 WHERE T_Message_ID = '".$read1."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						$_SESSION['view_id'] = $_POST['viewmess'];
						echo '<script> location.href = "A_View_Message.php" </script>';
					}elseif (isset($_POST['markasimportant'])){
						$A_ID = $_COOKIE['uID'];
						$import = $_POST['markasimportant'];
						$update = "UPDATE tcemail SET T_Important = 1 WHERE T_Message_ID = '".$import."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['markasunimportant'])){
						$A_ID = $_COOKIE['uID'];
						$unimport = $_POST['markasunimportant'];
						$update = "UPDATE tcemail SET T_Important = 0 WHERE T_Message_ID = '".$unimport."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}
					elseif (isset($_POST['markasread'])){
						$A_ID = $_COOKIE['uID'];
						$read = $_POST['markasread'];
						$update = "UPDATE tcemail SET T_Status = 1 WHERE T_Message_ID = '".$read."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['markasunread'])){
						$A_ID = $_COOKIE['uID'];
						$unread = $_POST['markasunread'];
						$update = "UPDATE tcemail SET T_Status = 0 WHERE T_Message_ID = '".$unread."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['movetotrash'])) {
						$A_ID = $_COOKIE['uID'];
						$trash = $_POST['movetotrash'];
						$update = "UPDATE tcemail SET T_Trash = 1 WHERE T_Message_ID = '".$trash."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}



				}

			}

		}else{

			$select = "SELECT * FROM tcemail
			LEFT JOIN t_email_files ON tcemail.T_Message_ID = t_email_files.tfile_id WHERE A_ID ='".$A_ID."' ORDER BY T_Message_ID DESC";

			if ($result = $conn->query($select)) {

				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

					$T_Sender = $row['T_Sender'];
					$T_Message_ID = $row["T_Message_ID"];
					$T_Subject = $row["T_Subject"];
					$T_Message = substr($row["T_Message"], 0, 10)."..";
					$text = $row["T_Message"];
					$T_Message2 = wordwrap($text, 65, "<br />\n");
					$T_DateTime = $row["T_DateTime"];
					$end = date("g:i a", strtotime(".$T_DateTime."));
					$d = date('F d, Y', strtotime($T_DateTime));
					$T_DateTime = $d.' '.$end;
					$T_Status = $row['T_Status'];
					$T_Important = $row['T_Important'];
					$T_Trash = $row['T_Trash'];
					$A_ID = $row['A_ID'];
					$tfile_fk = $row['tfile_fk'];
					$file = $row['file'];



					if ($T_Important == 1 AND $T_Trash == 0 AND $T_Status == 1) {
						echo '<li class="list-group-item">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a class="m-r-10">'.$T_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$T_DateTime.'</time></small>
						</div>
						<p class="msg">'.$T_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasunread" title="Mark as Unread" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-square-dots' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>


						<?php
						echo '
						</li>';
					} elseif ($T_Important == 1 AND $T_Trash == 0 AND $T_Status == 0) {
						// code...
						echo '<li class="list-group-item unread">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$T_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$T_DateTime.'</time></small>
						</div>
						<p class="msg">'.$T_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasread" title="Mark as Read" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-square' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>
						<?php
						echo '
						</li>';
					}	elseif ($T_Important == 0 AND $T_Trash == 0 AND $T_Status == 1) {
						// code...
						echo '<li class="list-group-item">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$T_Subject.'</a>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$T_DateTime.'</time></small>
						</div>
						<p class="msg">'.$T_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button class="btn btn-primary" name="markasunread" title="Mark as Unread" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-square-dots' ></i></button>
							<button  class="btn btn-primary" name="markasimportant" title="Mark as Important" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>
						<?php
						echo '
						</li>';
					} elseif ($T_Important == 0 AND $T_Trash == 0 AND $T_Status == 0) {
						// code...
						echo '<li class="list-group-item unread">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$T_Subject.'</a>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$T_DateTime.'</time></small>
						</div>
						<p class="msg">'.$T_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasread" title="Mark as Read" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-square' ></i></button>
							<button  class="btn btn-primary" name="markasimportant" title="Mark as Important" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>
						<?php
						echo '
						</li>';
					}
					if (isset($_POST['viewmess'])){
						$A_ID = $_COOKIE['uID'];
						$read1 = $_POST['viewmess'];
						$update = "UPDATE tcemail SET T_Status = 1 WHERE T_Message_ID = '".$read1."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						$_SESSION['view_id'] = $_POST['viewmess'];
						echo '<script> location.href = "A_View_Message.php" </script>';
					}elseif (isset($_POST['markasimportant'])){
						$A_ID = $_COOKIE['uID'];
						$import = $_POST['markasimportant'];
						$update = "UPDATE tcemail SET T_Important = 1 WHERE T_Message_ID = '".$import."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['markasunimportant'])){
						$A_ID = $_COOKIE['uID'];
						$unimport = $_POST['markasunimportant'];
						$update = "UPDATE tcemail SET T_Important = 0 WHERE T_Message_ID = '".$unimport."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}
					elseif (isset($_POST['markasread'])){
						$A_ID = $_COOKIE['uID'];
						$read = $_POST['markasread'];
						$update = "UPDATE tcemail SET T_Status = 1 WHERE T_Message_ID = '".$read."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['markasunread'])){
						$A_ID = $_COOKIE['uID'];
						$unread = $_POST['markasunread'];
						$update = "UPDATE tcemail SET T_Status = 0 WHERE T_Message_ID = '".$unread."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['movetotrash'])) {
						$A_ID = $_COOKIE['uID'];
						$trash = $_POST['movetotrash'];
						$update = "UPDATE tcemail SET T_Trash = 1 WHERE T_Message_ID = '".$trash."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}
				}
			}
		}
	}catch(PDOException $i){
		$errorMsg=  $i->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}

}
//all inbox end
//important start
function A_importantbadge(){ // Unread emails counter
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {

		$AS_ID = $_COOKIE['uID'];
		$AS_Type = 'Admin';

		$unreadNotif = "SELECT COUNT(T_Trash) AS 'Unread Important' FROM tcemail WHERE T_Important = 1 AND T_Trash = 0 AND A_ID = '".$AS_ID."'";
		$select = "SELECT * FROM tcemail WHERE T_Important = 0 ORDER BY T_Message_ID DESC LIMIT 1";


		if ($result = $conn->query($unreadNotif)) {

			if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				echo $row['Unread Important'];
			}
		}

	}catch(PDOException $i) {
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}
}

function A_important(){

	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$full = $_COOKIE['Fname'];
		$last = $_COOKIE['Lname'];
		$A_ID = $_COOKIE['uID'];

		if (isset($_POST['searchemail1'])) {
			$search = $_POST['searchemail1'];

			$select = "SELECT * FROM tcemail WHERE T_Message LIKE '%".$search."%' OR T_Subject LIKE '%".$search."%' AND A_ID ='".$A_ID."' AND T_Important = 1";

			if ($result = $conn->query($select)) {

				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

					$T_Sender = $row['T_Sender'];
					$T_Message_ID = $row["T_Message_ID"];
					$T_Subject = $row["T_Subject"];
					$T_Message = substr($row["T_Message"], 0, 10)."..";
					$text = $row["T_Message"];
					$T_Message2 = wordwrap($text, 60, "<br>\n");
					$T_DateTime = $row["T_DateTime"];
					$end = date("g:i a", strtotime(".$T_DateTime."));
					$d = date('F d, Y', strtotime($T_DateTime));
					$T_DateTime = $d.' '.$end;
					$T_Status = $row['T_Status'];
					$T_Important = $row['T_Important'];
					$T_Trash = $row['T_Trash'];
					$A_ID = $row['A_ID'];

					if ($T_Important == 1 AND $T_Trash == 0 AND $T_Status == 1) {
						echo '<li class="list-group-item">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$T_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$T_DateTime.'</time></small>
						</div>
						<p class="msg">'.$T_Message.'</p>
						</div>
						</div>'
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmessimp" title="View Message" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasunread" title="Mark as Unread" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-square-dots' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>

						<?php
						echo'
						</li>';
					} elseif ($T_Important == 1 AND $T_Trash == 0 AND $T_Status == 0) {
						echo '<li class="list-group-item unread">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$T_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$T_DateTime.'</time></small>
						</div>
						<p class="msg">'.$T_Message.'</p>
						</div>
						</div>'
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmessimp" title="View Message" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasread" title="Mark as Read" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-square' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>

						<?php
						echo'
						</li>';
					}
					if (isset($_POST['viewmessimp'])){
						$A_ID = $_COOKIE['uID'];
						$read1 = $_POST['viewmessimp'];
						$update = "UPDATE tcemail SET T_Status = 1 WHERE T_Message_ID = '".$read1."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						$_SESSION['view_id2'] = $_POST['viewmessimp'];
						echo '<script> location.href = "A_View_Important.php" </script>';
					}elseif (isset($_POST['markasunimportant'])){
						$A_ID = $_COOKIE['uID'];
						$import = $_POST['markasunimportant'];
						$update = "UPDATE tcemail SET T_Important = 0 WHERE T_Message_ID = '".$import."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}	elseif (isset($_POST['markasread'])){
						$A_ID = $_COOKIE['uID'];
						$read = $_POST['markasread'];
						$update = "UPDATE tcemail SET T_Status = 1 WHERE T_Message_ID = '".$read."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['markasunread'])){
						$A_ID = $_COOKIE['uID'];
						$unread = $_POST['markasunread'];
						$update = "UPDATE tcemail SET T_Status = 0 WHERE T_Message_ID = '".$unread."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['movetotrash'])) {
						$A_ID = $_COOKIE['uID'];
						$trash = $_POST['movetotrash'];
						$update = "UPDATE tcemail SET T_Trash = 1 WHERE T_Message_ID = '".$trash."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}

				}
			}
		}else{

			$select = "SELECT * FROM tcemail WHERE A_ID ='".$A_ID."' ORDER BY T_Message_ID DESC";

			if ($result = $conn->query($select)) {

				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

					$T_Sender = $row['T_Sender'];
					$T_Message_ID = $row["T_Message_ID"];
					$T_Subject = $row["T_Subject"];
					$T_Message = substr($row["T_Message"], 0, 10)."..";
					$text = $row["T_Message"];
					$T_Message2 = wordwrap($text, 60, "<br>\n");
					$T_DateTime = $row["T_DateTime"];
					$end = date("g:i a", strtotime(".$T_DateTime."));
					$d = date('F d, Y', strtotime($T_DateTime));
					$T_DateTime = $d.' '.$end;
					$T_Status = $row['T_Status'];
					$T_Important = $row['T_Important'];
					$T_Trash = $row['T_Trash'];
					$A_ID = $row['A_ID'];


					if ($T_Important == 1 AND $T_Trash == 0 AND $T_Status == 1) {
						echo '<li class="list-group-item">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$T_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$T_DateTime.'</time></small>
						</div>
						<p class="msg">'.$T_Message.'</p>
						</div>
						</div>'
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmessimp" title="View Message" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasunread" title="Mark as Unread" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-square-dots' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>

						<?php
						echo'
						</li>';
					} elseif ($T_Important == 1 AND $T_Trash == 0 AND $T_Status == 0) {
						// code...
						echo '<li class="list-group-item unread">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$T_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$T_DateTime.'</time></small>
						</div>
						<p class="msg">'.$T_Message.'</p>
						</div>
						</div>'
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmessimp" title="View Message" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasread" title="Mark as Read" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-message-square' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $T_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $T_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>

						<?php
						echo'
						</li>';
					}

					if (isset($_POST['viewmessimp'])){
						$A_ID = $_COOKIE['uID'];
						$read1 = $_POST['viewmessimp'];
						$update = "UPDATE tcemail SET T_Status = 1 WHERE T_Message_ID = '".$read1."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						$_SESSION['view_id2'] = $_POST['viewmessimp'];
						echo '<script> location.href = "A_View_Important.php" </script>';
					}elseif (isset($_POST['markasunimportant'])){
						$A_ID = $_COOKIE['uID'];
						$import = $_POST['markasunimportant'];
						$update = "UPDATE tcemail SET T_Important = 0 WHERE T_Message_ID = '".$import."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}	elseif (isset($_POST['markasread'])){
						$A_ID = $_COOKIE['uID'];
						$read = $_POST['markasread'];
						$update = "UPDATE tcemail SET T_Status = 1 WHERE T_Message_ID = '".$read."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['markasunread'])){
						$A_ID = $_COOKIE['uID'];
						$unread = $_POST['markasunread'];
						$update = "UPDATE tcemail SET T_Status = 0 WHERE T_Message_ID = '".$unread."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['movetotrash'])) {
						$A_ID = $_COOKIE['uID'];
						$trash = $_POST['movetotrash'];
						$update = "UPDATE tcemail SET T_Trash = 1 WHERE T_Message_ID = '".$trash."' AND A_ID = '".$A_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}


				}
			}
		}
	}catch(PDOException $i){
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}

}
//important end

//trash start
function A_trashbadge(){ // Unread emails counter
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {

		$AS_ID = $_COOKIE['uID'];
		$AS_Type = 'Admin';

		$unreadNotif = "SELECT COUNT(T_Trash) AS 'Unread Trash' FROM tcemail WHERE T_Trash = 1 AND A_ID = '".$AS_ID."'";
		$select = "SELECT * FROM tcemail WHERE T_Trash = 0 ORDER BY T_Message_ID DESC LIMIT 1";



		if ($result = $conn->query($unreadNotif)) {

			if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				echo $row['Unread Trash'];
			}
		}

	}catch(PDOException $i) {
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}
}

function A_trash(){

	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$full = $_COOKIE['Fname'];
		$last = $_COOKIE['Lname'];
		$A_ID = $_COOKIE['uID'];

		$select = "SELECT * FROM tcemail WHERE A_ID ='".$A_ID."' ORDER BY T_Message_ID DESC";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$T_Sender = $row['T_Sender'];
				$T_Message_ID = $row["T_Message_ID"];
				$T_Subject = $row["T_Subject"];
				$T_Message = substr($row["T_Message"], 0, 10)."..";
				$T_DateTime = $row["T_DateTime"];
				$end = date("g:i a", strtotime(".$T_DateTime."));
				$d = date('F d, Y', strtotime($T_DateTime));
				$T_DateTime = $d.' '.$end;
				$T_Status = $row['T_Status'];
				$T_Important = $row['T_Important'];
				$T_Trash = $row['T_Trash'];
				$A_ID = $row['A_ID'];

				if ($T_Trash == 1) {
					echo '<li class="list-group-item">
					<div class="media">
					<div class="media-body">
					<div class="media-heading">
					<a  class="m-r-10">'.$T_Subject.'</a>
					<small class="float-right text-muted"><time class="hidden-sm-down" >'.$T_DateTime.'</time></small>
					</div>
					<p class="msg">'.$T_Message.'</p>
					</div>
					</div>';
					?>
					<form method="post">
						<button  class="btn btn-primary" name="removefromtrash" title="Recycle" value="<?php echo $T_Message_ID; ?>">Remove from Trash</button>
						<button  class="btn btn-danger" name="deleteperm" title="Delete Permanently" type="submit" value=<?php echo $T_Message_ID; ?>>Delete Permanently</button>
					</form>

					<?php
					echo '
					</li>';
				}
				if (isset($_POST['removefromtrash'])) {
					$A_ID = $_COOKIE['uID'];
					$untrash = $_POST['removefromtrash'];
					$update = "UPDATE tcemail SET T_Trash = 0 WHERE T_Message_ID = '".$untrash."' AND A_ID = '".$A_ID."'";
					$conn->exec($update);
					echo "<meta http-equiv='refresh' content='0'>";
				}


			}
			if (isset($_POST['deleteperm'])) {
				$A_ID = $_COOKIE['uID'];
				$deleteperm = $_POST['deleteperm'];

				$delete = "DELETE FROM tcemail WHERE T_Message_ID = '".$deleteperm."' AND A_ID = '".$A_ID."'";
				$alter1 = "ALTER TABLE tcemail DROP T_Message_ID";
				$alter2 = "ALTER TABLE tcemail AUTO_INCREMENT = 1";
				$alter3 = "ALTER TABLE tcemail ADD T_Message_ID int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
				$conn->exec($delete);
				$conn->exec($alter1);
				$conn->exec($alter2);
				$conn->exec($alter3);
				echo "<meta http-equiv='refresh' content='0'>";
			}

		}
	}catch(PDOException $i){
		echo "<meta http-equiv='refresh' content='0'>";
	}

}
//trash end
function A_Online(){

	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$A_ID = $_COOKIE['uID'];
		$select = "SELECT * FROM user WHERE Status = 'Online' AND User_ID != $A_ID ";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$F_Name = $row["F_Name"];
				$L_Name = $row["L_Name"];
				$A_Type = $row["A_Type"];
				$Email = $row["Email"];


				echo '<li><span class="label label-primary"></span>'.$F_Name.' '.$L_Name.'('.$A_Type.')</li>';
				echo '<li>'.$Email.'</li><hr>';

			}

		}

	}catch(PDOException $i){
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}
}
function A_Offline(){

	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$A_ID = $_COOKIE['uID'];
		$select = "SELECT * FROM user WHERE Status = 'Offline' AND User_ID != $A_ID ";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$F_Name = $row["F_Name"];
				$L_Name = $row["L_Name"];
				$A_Type = $row["A_Type"];
				$Email = $row["Email"];


				echo '<li><span class="label label-danger"></span>'.$F_Name.' '.$L_Name.'('.$A_Type.')</li>';
				echo '<li>'.$Email.'</li><hr>';
			}

		}

	}catch(PDOException $i){
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}
}

$A_ID = $_COOKIE['uID'];
if (isset($_POST['markallasread2'])){
	$update = "UPDATE tcemail SET T_Status = 1 WHERE T_Status = 0 AND A_ID = '".$A_ID."'";
	$conn->exec($update);
	echo "<meta http-equiv='refresh' content='0'>";
}elseif (isset($_POST['markallasunread2'])){
	$update = "UPDATE tcemail SET T_Status = 0 WHERE T_Status = 1 AND A_ID = '".$A_ID."'";
	$conn->exec($update);
	echo "<meta http-equiv='refresh' content='0'>";
}

if (isset($_POST['markallasread3'])){
	$update = "UPDATE tcemail SET T_Status = 1 WHERE T_Status = 0 AND A_ID = '".$A_ID."' AND T_Important = 1";
	$conn->exec($update);
	echo "<meta http-equiv='refresh' content='0'>";
}elseif (isset($_POST['markallasunread3'])){
	$update = "UPDATE tcemail SET T_Status = 0 WHERE T_Status = 1 AND A_ID = '".$A_ID."' AND T_Important = 1";
	$conn->exec($update);
	echo "<meta http-equiv='refresh' content='0'>";
}

//start view message
function viewmessage(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {

		$A_ID = $_COOKIE['uID'];
		$T_Message_ID1 = 	$_SESSION['view_id'];
		$select = "SELECT * FROM tcemail WHERE A_ID = '".$A_ID."' AND T_Message_ID = '".$T_Message_ID1."' ";

		if ($result = $conn->query($select)) {
			if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$T_Sender = $row['T_Sender'];
				$T_Message_ID = $row["T_Message_ID"];
				$T_Subject = $row["T_Subject"];
				$T_Message = substr($row["T_Message"], 0, 10)."..";
				$text = $row["T_Message"];
				$T_Message2 = wordwrap($text, 65, "<br />\n");
				$T_DateTime = $row["T_DateTime"];
				$end = date("g:i a", strtotime(".$T_DateTime."));
				$d = date('F d, Y', strtotime($T_DateTime));
				$T_DateTime = $d.' '.$end;
				$T_Status = $row['T_Status'];
				$T_Important = $row['T_Important'];
				$T_Trash = $row['T_Trash'];
				$A_ID = $row['A_ID'];

				echo "<h1 class='lead text-left'><b>Sender:</b> ".$T_Sender." <br><small>Date and Time sent: ".$T_DateTime."</small></h1>";
				echo "<h3 class='lead text-left'><b>Subject:</b> ".$T_Subject."</h3>";
				echo "<hr>";
				echo "<h4 class='lead text-left'><b>Message:</b> ".$text."</h4>";
				echo "<hr>";
				echo "<p class='text-left'><b>Files:</b></p>";

				$select = "SELECT * FROM t_email_files WHERE tfile_fk = '".$T_Message_ID1."' ";

				if ($result = $conn->query($select)) {
					while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

						$file = $row['file'];


						if (!empty($file)) {
							?>
							<p class="text-left"><a href="../teacher_uploads/<?php echo $file; ?>"><?php echo $file; ?></a></p>

							<?php
						}else {
							echo "<p class='text-left'> There are no attachments </p>";
						}

					}
				}


			}
		}

	} catch (PDOException $e) {
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}



}
//end view message

//start view important message
function viewimportantmessage(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {

		$A_ID = $_COOKIE['uID'];
		$T_Message_ID2 = 	$_SESSION['view_id2'];
		$select = "SELECT * FROM tcemail WHERE A_ID = '".$A_ID."' AND T_Message_ID = '".$T_Message_ID2."' ";

		if ($result = $conn->query($select)) {
			if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$T_Sender = $row['T_Sender'];
				$T_Message_ID = $row["T_Message_ID"];
				$T_Subject = $row["T_Subject"];
				$T_Message = substr($row["T_Message"], 0, 10)."..";
				// $A_Message2 = substr($row["A_Message"], 0, 20)."<br>";
				// $A_Message2 = implode(' ',str_split($row["A_Message"]));
				$text = $row["T_Message"];
				$T_Message2 = wordwrap($text, 65, "<br />\n");
				$T_DateTime = $row["T_DateTime"];
				$end = date("g:i a", strtotime(".$T_DateTime."));
				$d = date('F d, Y', strtotime($T_DateTime));
				$T_DateTime = $d.' '.$end;
				$T_Status = $row['T_Status'];
				$T_Important = $row['T_Important'];
				$T_Trash = $row['T_Trash'];
				$A_ID = $row['A_ID'];

				echo "<h1 class='lead text-left'><b>Sender:</b> ".$T_Sender." <br><small>Date and Time sent: ".$T_DateTime."</small></h1>";
				echo "<h3 class='lead text-left'><b>Subject:</b> ".$T_Subject."</h3>";
				echo "<hr>";
				echo "<h4 class='lead text-left'><b>Message:</b> ".$text."</h4>";
				echo "<hr>";
				echo "<p class='text-left'><b>Files:</b></p>";
				$select = "SELECT * FROM t_email_files WHERE tfile_fk = '".$T_Message_ID2."' ";

				if ($result = $conn->query($select)) {
					while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

						$file = $row['file'];


						if (!empty($file)) {
							?>
							<p class='text-left'><a href="../teacher_uploads/<?php echo $file; ?>"><?php echo $file; ?></a></p>
							<?php
						}else {
							echo "<p class='text-left'> There are no attachments </p>";
						}

					}
				}


			}
		}

	} catch (PDOException $e) {
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}



}
//end view important message
?>
