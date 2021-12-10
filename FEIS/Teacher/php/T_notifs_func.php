<?php
$servername = "localhost";
$UserName = "root";
$Password = "";
$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
date_default_timezone_set('Asia/Manila');


function Tbadgecount(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {

		$T_ID = $_COOKIE['uID'];

		$unreadNotif = "SELECT COUNT(T_Read_ID) AS 'Unread Notifs' FROM teachernotif WHERE T_Read_ID = 0 AND T_ID = '".$T_ID."'  ";
		$select = "SELECT * FROM teachernotif WHERE T_Read_ID = 0 ORDER BY N_ID DESC LIMIT 1";


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

function Tbadgecount2(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {
		if (isset($_POST['readstatus'])) {
		$T_ID = $_COOKIE['uID'];
			$select = "SELECT * FROM teachernotif WHERE T_Read_ID = 0 AND T_ID = '".$T_ID."'";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$mark1 = $_POST['readstatus'];
					$N_ID = $row["N_ID"];

					$update = "UPDATE teachernotif SET T_Read_ID = 1 WHERE N_ID  = '".$mark1."' AND T_ID = '".$T_ID."'";
					$conn->exec($update);
				}
			}
			echo "<meta http-equiv='refresh' content='0'>";
		}elseif (isset($_POST['readstatus2'])) {
			$T_ID = $_COOKIE['uID'];
			$select = "SELECT * FROM teachernotif WHERE T_Read_ID = 1 AND T_ID = '".$T_ID."' ORDER BY N_ID DESC";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$mark2 = $_POST['readstatus2'];
					$N_ID = $row["N_ID"];

					$update = "UPDATE teachernotif SET T_Read_ID = 0 WHERE N_ID = '".$mark2."' AND T_ID = '".$T_ID."'";
					$conn->exec($update);
				}
			}
			echo "<meta http-equiv='refresh' content='0'>";
		}elseif (isset($_POST['markasR'])) {
			$T_ID = $_COOKIE['uID'];
			$select = "SELECT * FROM teachernotif WHERE T_Read_ID = 0 AND T_ID = '".$T_ID."' ORDER BY N_ID DESC";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$N_ID = $row["N_ID"];

					$update = "UPDATE teachernotif SET T_Read_ID = 1 WHERE T_Name = '".$T_Name."'";
					$conn->exec($update);
				}
			}
			echo "<meta http-equiv='refresh' content='0'>";
		}
		elseif (isset($_POST['markasUR'])) {
			$T_ID = $_COOKIE['uID'];
			$select = "SELECT * FROM teachernotif WHERE T_Read_ID = 1 AND T_ID = '".$T_ID."' ORDER BY N_ID DESC";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$N_ID = $row["N_ID"];

					$update = "UPDATE teachernotif SET T_Read_ID = 0 WHERE T_Name = '".$T_Name."'";
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

function Tunreadnotifs(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$T_ID = $_COOKIE['uID'];

		$select = "SELECT * FROM teachernotif WHERE T_Read_ID = 0 AND T_ID ='".$T_ID."' ORDER BY N_ID DESC LIMIT 2";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$N_ID = $row["N_ID"];
				$T_Cate = $row["T_Cate"];
				$Date_Time = $row["Date_Time"];
				$end = date("g:i a", strtotime(".$Date_Time."));
				$d = date('F d, Y', strtotime($Date_Time));
				$Date_Time = $d.' '.$end;
				$T_Name = $row['T_Name'];


				// <span class="label label-danger"><i class="fa fa-bolt"></i></span>
				echo '<li>
				<a href="index.php#">';
				echo $T_Cate;
				echo '<br><span class="small italic">';
				echo $Date_Time;

				echo '<form method="post"> <button name="readstatus"  class="btn btn-theme05" value='.$N_ID.'>Mark as Read</button> <br></form>';
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

function Treadnotifs(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

	$T_ID = $_COOKIE['uID'];

		$select = "SELECT * FROM teachernotif WHERE T_Read_ID = 1 AND T_ID ='".$T_ID."' ORDER BY N_ID DESC LIMIT 2";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$N_ID = $row["N_ID"];
				$T_Cate = $row["T_Cate"];
				$Date_Time = $row["Date_Time"];
				$end = date("g:i a", strtotime(".$Date_Time."));
				$d = date('F d, Y', strtotime($Date_Time));
				$Date_Time = $d.' '.$end;
				$T_Name = $row['T_Name'];


				// <span class="label label-danger"><i class="fa fa-bolt"></i></span>
				echo '<li>
				<a href="index.php#">';
				echo $T_Cate;
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
function recentAct(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$T_ID = $_COOKIE['Fname'];

		$select = "SELECT * FROM teachernotif WHERE T_Name ='".$T_Name."' ORDER BY N_ID DESC LIMIT 3";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$N_ID = $row["N_ID"];
				$T_Cate = $row["T_Cate"];
				$Date_Time = $row["Date_Time"];
				$end = date("g:i a", strtotime(".$Date_Time."));
				$d = date('F d, Y', strtotime($Date_Time));
				$Date_Time = $d.' '.$end;

				echo '<div class="activity-icon bg-theme"><i class="fa fa-check"></i></div>
				<div class="activity-panel">
				<h5>'.$Date_Time.'</h5>
				<p>'.$T_Cate.'</p>
				</div>';

			}

		}

	}catch(PDOException $i){
		$errorMsg=  $e->getMessage();
		echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
	}


}
function recentAct2(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$T_Name = $_COOKIE['Fname']." ".$_COOKIE['Lname'];

		$select = "SELECT * FROM teachernotif WHERE T_Name ='".$T_Name."' ORDER BY N_ID DESC LIMIT 3";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$T_Name = $row["T_Name"];
				$N_ID = $row["N_ID"];
				$T_Cate = $row["T_Cate"];
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
				<br'.$T_Name.': </a>'.$T_Cate.'<br/>
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

// Start of Email funcs
function emailbadgecountT(){ // Unread emails counter
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {

		$T_ID = $_COOKIE['uID'];

		$unreadNotif = "SELECT COUNT(A_Status) AS 'Unread Notifs' FROM adminemail WHERE A_Status = 0 AND A_Trash = 0 AND T_ID = '".$T_ID."'  ";
		$select = "SELECT * FROM adminemail WHERE A_Status = 0 ORDER BY A_Message_ID DESC LIMIT 1";


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

function emailbadgecountT2(){ // Email Buttons (marks)
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try{
		if (isset($_POST['readstatus'])) {
			$T_ID = $_COOKIE['uID'];
			$select = "SELECT * FROM adminemail WHERE A_Status = 0 AND T_ID = '".$T_ID."' ORDER BY A_Message_ID DESC";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$mark1 = $_POST['readstatus'];
					$A_Message_ID = $row["A_Message_ID"];

					$update = "UPDATE adminemail SET A_Status = 1 WHERE A_Message_ID = '".$mark1."' AND T_ID = '".$T_ID."'";
					$conn->exec($update);
				}
			}
			echo "<meta http-equiv='refresh' content='0'>";
		}elseif (isset($_POST['readstatus2'])) {
			$T_ID = $_COOKIE['uID'];
			$select = "SELECT * FROM adminemail WHERE A_Status = 1 AND T_ID = '".$T_ID."' ORDER BY A_Message_ID DESC";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$mark2 = $_POST['readstatus2'];
					$A_Message_ID = $row["A_Message_ID"];

					$update = "UPDATE adminemail SET A_Status = 0 WHERE A_Message_ID = '".$mark2."' AND T_ID = '".$T_ID."'";
					$conn->exec($update);
				}
			}
			echo "<meta http-equiv='refresh' content='0'>";
		}elseif (isset($_POST['EmarkR'])) {
			$T_ID = $_COOKIE['uID'];
			$select = "SELECT * FROM adminemail WHERE A_Status = 0 AND T_ID = '".$T_ID."' ORDER BY A_Message_ID DESC";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$A_Message_ID = $row["A_Message_ID"];

					$update = "UPDATE adminemail SET A_Status = 1 WHERE T_ID = '".$T_ID."'";
					$conn->exec($update);
				}
			}
			echo "<meta http-equiv='refresh' content='0'>";
		}
		elseif (isset($_POST['EmarkUr'])) {
				$T_ID = $_COOKIE['uID'];
			$select = "SELECT * FROM adminemail WHERE A_Status = 1 AND T_ID = '".$T_ID."' ORDER BY A_Message_ID DESC";

			if ($result = $conn->query($select)) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$A_Message_ID = $row["A_Message_ID"];

					$update = "UPDATE adminemail SET A_Status = 0 WHERE T_ID = '".$T_ID."'";
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

function emailunreadnotifsT(){ // Email prints (unread messages)
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$T_ID = $_COOKIE['uID'];

		$select = "SELECT * FROM adminemail WHERE A_Status = 0 AND T_ID ='".$T_ID."' ORDER BY A_Message_ID DESC LIMIT 2";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$A_Sender = $row['A_Sender'];
				$A_Message_ID = $row["A_Message_ID"];
				$A_Subject = $row["A_Subject"];
				$A_Message= $row["A_Message"];
				$A_DateTime = $row["A_DateTime"];
				$end = date("g:i a", strtotime(".$A_DateTime."));
				$d = date('F d, Y', strtotime($A_DateTime));
				$A_DateTime = $d.' '.$end;
				$A_Status = $row['A_Status'];
				$T_ID = $row['T_ID'];


				echo '<li>
				<a>
				<span class="subject">';
				echo 'Subject:'.$A_Subject;
				echo '</span> <span class="from">';
				echo 'Sender:'.$A_Sender;
				echo '</span>
				<span class="time">';
				echo "<br>";
				echo $A_DateTime;
				echo '</span>
				</span>
				<span class="message">';
				echo $A_Message;
				echo'<form method ="post"><button name="readstatus" class="btn btn-theme05" value='.$A_Message_ID.'>Mark as Read</button></form>';
				?>

				<!-- Button For Modal -->
				<form method="post">
					<button type="button" data-toggle="modal" data-target="#message<?php echo $row['A_Message_ID'];?>">Message Overview</button>
				</form>
				<!-- Modal Start -->
				<div class="modal fade" id="message<?php echo $row['A_Message_ID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title float-left">View Message</h4>

							</div>
							<div class="modal-body">
								<h4><?php echo 'Subject:';  echo' '; echo $row['A_Subject'];?></h4>
								<h4><?php echo '<br> Message:';?></h4>
								<h5><?php echo $row['A_Message'];?></h5>
								<h5><?php echo '<br> Date and Time sent:';?></h5>
								<h5><?php echo $row['A_DateTime'];?></h5>
								<h5><?php echo '<br> From:';?></h5>
								<h5><?php echo $row['A_Sender'];?></h5>
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

function emailreadnotifsT(){ //Email prints (read messages)
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$T_ID = $_COOKIE['uID'];

		$select = "SELECT * FROM adminemail WHERE A_Status = 1 AND T_ID ='".$T_ID."' ORDER BY A_Message_ID DESC LIMIT 2";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$A_Sender = $row['A_Sender'];
				$A_Message_ID = $row["A_Message_ID"];
				$A_Subject = $row["A_Subject"];
				$A_Message = $row["A_Message"];
				$A_DateTime = $row["A_DateTime"];
				$A_Status = $row['A_Status'];
				$T_ID = $row['T_ID'];


				echo '<li>
				<a>
				<span class="subject">';
				echo 'Subject:'.$A_Subject;
				echo '</span> <span class="from">';
				echo 'Sender:'.$A_Sender;
				echo '</span>
				<span class="time">';
				echo "<br>";
				echo $A_DateTime;
				echo '</span>
				</span>
				<span class="message">';
				echo $A_Message;
				echo'<form method ="post"><button name="readstatus2"  class="btn btn-theme05" value='.$A_Message_ID.'>Mark as Unread</button><br></form>';
				?>
				<!-- Button For Modal -->
				<form method="post">
					<button type="button" data-toggle="modal" data-target="#message<?php echo $row['A_Message_ID'];?>">Message Overview</button>
				</form>
				<!-- Modal Start -->
				<div class="modal fade" id="message<?php echo $row['A_Message_ID'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title float-left">View Message</h4>

							</div>
							<div class="modal-body">
								<h4><?php echo 'Subject:';  echo' '; echo $row['A_Subject'];?></h4>
								<h4><?php echo '<br> Message:';?></h4>
								<h5><?php echo $row['A_Message'];?></h5>
								<h5><?php echo '<br> Date and Time sent:';?></h5>
								<h5><?php echo $row['A_DateTime'];?></h5>
								<h5><?php echo '<br> From:';?></h5>
								<h5><?php echo $row['A_Sender'];?></h5>
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

function seeallT(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$T_Name = $_COOKIE['Fname']." ".$_COOKIE['Lname'];
		$uID = $_COOKIE['uID'];
		$select = "SELECT * FROM teachernotif WHERE T_ID = '".$uID."' ORDER BY N_ID DESC";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$N_ID = $row["N_ID"];
				$AS_Name = $row["AS_Name"];
				$T_Cate = $row["T_Cate"];
				$T_Read_ID = $row["T_Read_ID"];
				$Date_Time = $row["Date_Time"];
				$end = date("g:i a", strtotime(".$Date_Time."));
				$d = date('F d, Y', strtotime($Date_Time));
				$Date_Time = $d.' '.$end;
				$T_Notification_Type = $row['T_Notification_Type'];
				if ($T_Read_ID == 1) {

					if ($T_Notification_Type == 'Evaluation') {
						echo '
						<tr>
						<td><a href="T_EvalHistory.php" style="color:inherit;">'.$T_Cate.' '.$AS_Name.'</a></td>
						<td>Read</td>
						<td><a href="T_EvalHistory.php" style="color:inherit;">'.$Date_Time.'</a></td>';
					}else{
						echo '
						<tr>
						<td>'.$T_Cate.' '.$AS_Name.'</td>
						<td>Read</td>
						<td>'.$Date_Time.'</td>';
					}
					?>

					<td>	<form method="post">
						<center>
							<button  name="markasunreadnotif" class="btn btn-primary" value='<?php echo $N_ID; ?>' title="Mark As Unread"><i class='bx bxs-message-alt-x' ></i> </button>
							<button class="btn btn-danger" name="deleteperm2" value='<?php echo $N_ID; ?>' title="Delete Notification"><i class='bx bx-trash' ></i></button>
						</center>

					</form>
				</td>

				<?php
			}else if ($T_Read_ID == 0){
				if ($T_Notification_Type == 'Evaluation') {
					echo '
					<tr>
					<td><a href="T_EvalHistory.php" style="color:inherit;"><b>'.$T_Cate.' '.$AS_Name.'</b></a></td>
					<td>Unread</td>
					<td><a href="T_EvalHistory.php" style="color:inherit;"><b>'.$Date_Time.'</b></a></td>';
				}else{
					echo '
					<tr>
					<td>'.$T_Cate.' '.$AS_Name.'</td>
					<td>Unread</td>
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
			if (isset($_POST['viewmess'])){
				$_SESSION['view_id'] = $_POST['viewmess'];
				echo '<script> location.href = "T_View_Message.php" </script>';
			}
			if (isset($_POST['markasreadnotif'])){
				$read = $_POST['markasreadnotif'];
				$update = "UPDATE teachernotif SET T_Read_ID = 1 WHERE N_ID = '".$read."' ";
				$conn->exec($update);
				echo "<meta http-equiv='refresh' content='0'>";
			}elseif (isset($_POST['markasunreadnotif'])){
				$unread = $_POST['markasunreadnotif'];
				$update = "UPDATE teachernotif SET T_Read_ID = 0 WHERE N_ID = '".$unread."'";
				$conn->exec($update);
				echo "<meta http-equiv='refresh' content='0'>";
			}elseif (isset($_POST['markallasread'])){
				$update = "UPDATE teachernotif SET T_Read_ID = 1 WHERE T_Read_ID = 0";
				$conn->exec($update);
				echo "<meta http-equiv='refresh' content='0'>";
			}elseif (isset($_POST['markallasunread'])){
				$update = "UPDATE teachernotif SET T_Read_ID = 0 WHERE T_Read_ID = 1";
				$conn->exec($update);
				echo "<meta http-equiv='refresh' content='0'>";
			}

		}
		if (isset($_POST['deleteperm2'])) {

			$deleteperm = $_POST['deleteperm2'];

			$delete = "DELETE FROM teachernotif WHERE N_ID = '".$deleteperm."'";
			$alter1 = "ALTER TABLE teachernotif DROP N_ID";
			$alter2 = "ALTER TABLE teachernotif AUTO_INCREMENT = 1";
			$alter3 = "ALTER TABLE teachernotif ADD N_ID int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
			$conn->exec($delete);
			$conn->exec($alter1);
			$conn->exec($alter2);
			$conn->exec($alter3);

			echo '<script type="text/javascript">
			location.href = "T_Notification.php";
      </script>';
		}

	}

}catch(PDOException $e){
	$errorMsg=  $e->getMessage();
	echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}
}

//all inbox start
function T_inbox(){

	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$full = $_COOKIE['Fname'];
		$last = $_COOKIE['Lname'];
		$T_ID = $_COOKIE['uID'];

		if (isset($_POST['searchemail2'])) {
			$search = $_POST['searchemail2'];

			$select = "SELECT * FROM adminemail WHERE A_Message LIKE '%".$search."%' OR A_Subject LIKE '%".$search."%' AND T_ID ='".$T_ID."'";

			if ($result = $conn->query($select)) {

				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

					$A_Sender = $row['A_Sender'];
					$A_Message_ID = $row["A_Message_ID"];
					$A_Subject = $row["A_Subject"];
					$A_Message = substr($row["A_Message"], 0, 10)."..";
					// $A_Message2 = substr($row["A_Message"], 0, 20)."<br>";
					// $A_Message2 = implode(' ',str_split($row["A_Message"]));
					$text = $row["A_Message"];
					$A_Message2 = wordwrap($text, 65, "<br />\n");
					$A_DateTime = $row["A_DateTime"];
					$end = date("g:i a", strtotime(".$A_DateTime."));
					$d = date('F d, Y', strtotime($A_DateTime));
					$A_DateTime = $d.' '.$end;
					$A_Status = $row['A_Status'];
					$A_Important = $row['A_Important'];
					$A_Trash = $row['A_Trash'];
					$T_ID = $row['T_ID'];

					if ($A_Important == 1 AND $A_Trash == 0 AND $A_Status == 1) {
						echo '<li class="list-group-item">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a class="m-r-10">'.$A_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$A_DateTime.'</time></small>
						</div>
						<p class="msg">'.$A_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasunread" title="Mark as Unread" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-square-dots' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $A_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>


						<?php
						echo '
						</li>';
					} elseif ($A_Important == 1 AND $A_Trash == 0 AND $A_Status == 0) {
						// code...
						echo '<li class="list-group-item unread">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$A_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$A_DateTime.'</time></small>
						</div>
						<p class="msg">'.$A_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasread" title="Mark as Read" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-square' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $A_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>
						<?php
						echo '
						</li>';
					}	elseif ($A_Important == 0 AND $A_Trash == 0 AND $A_Status == 1) {
						// code...
						echo '<li class="list-group-item">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$A_Subject.'</a>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$A_DateTime.'</time></small>
						</div>
						<p class="msg">'.$A_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button class="btn btn-primary" name="markasunread" title="Mark as Unread" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-square-dots' ></i></button>
							<button  class="btn btn-primary" name="markasimportant" title="Mark as Important" value="<?php echo $A_Message_ID; ?>"><i class='bx bxs-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $A_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>
						<?php
						echo '
						</li>';
					} elseif ($A_Important == 0 AND $A_Trash == 0 AND $A_Status == 0) {
						// code...
						echo '<li class="list-group-item unread">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$A_Subject.'</a>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$A_DateTime.'</time></small>
						</div>
						<p class="msg">'.$A_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasread" title="Mark as Read" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-square' ></i></button>
							<button  class="btn btn-primary" name="markasimportant" title="Mark as Important" value="<?php echo $A_Message_ID; ?>"><i class='bx bxs-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $A_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>
						<?php
						echo '
						</li>';
					}
					if (isset($_POST['viewmess'])){
						$T_ID = $_COOKIE['uID'];
						$read1 = $_POST['viewmess'];
						$update = "UPDATE adminemail SET A_Status = 1 WHERE A_Message_ID = '".$read1."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						$_SESSION['view_id'] = $_POST['viewmess'];
						echo '<script> location.href = "T_View_Message.php" </script>';
					}
					if (isset($_POST['markasimportant'])){
						$T_ID = $_COOKIE['uID'];
						$import = $_POST['markasimportant'];
						$update = "UPDATE adminemail SET A_Important = 1 WHERE A_Message_ID = '".$import."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['markasunimportant'])){
						$T_ID = $_COOKIE['uID'];
						$unimport = $_POST['markasunimportant'];
						$update = "UPDATE adminemail SET A_Important = 0 WHERE A_Message_ID = '".$unimport."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}
					elseif (isset($_POST['markasread'])){
						$T_ID = $_COOKIE['uID'];
						$read = $_POST['markasread'];
						$update = "UPDATE adminemail SET A_Status = 1 WHERE A_Message_ID = '".$read."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['markasunread'])){
						$T_ID = $_COOKIE['uID'];
						$unread = $_POST['markasunread'];
						$update = "UPDATE adminemail SET A_Status = 0 WHERE A_Message_ID = '".$unread."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['movetotrash'])) {
						$T_ID = $_COOKIE['uID'];
						$trash = $_POST['movetotrash'];
						$update = "UPDATE adminemail SET A_Trash = 1 WHERE A_Message_ID = '".$trash."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}

				}

			}

		}else{

			$select = "SELECT A_Sender,A_Message_ID,A_Subject,A_Message,A_DateTime,A_Status,A_Important,A_Trash,T_ID FROM adminemail WHERE T_ID ='".$T_ID."' ORDER BY A_Message_ID DESC";

			if ($result = $conn->query($select)) {

				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

					$A_Sender = $row['A_Sender'];
					$A_Message_ID = $row["A_Message_ID"];
					$A_Subject = $row["A_Subject"];
					$A_Message = substr($row["A_Message"], 0, 10)."..";
					// $A_Message2 = substr($row["A_Message"], 0, 20)."<br>";
					// $A_Message2 = implode(' ',str_split($row["A_Message"]));
					$text = $row["A_Message"];
					$A_Message2 = wordwrap($text, 65, "<br />\n");
					$A_DateTime = $row["A_DateTime"];
					$end = date("g:i a", strtotime(".$A_DateTime."));
					$d = date('F d, Y', strtotime($A_DateTime));
					$A_DateTime = $d.' '.$end;
					$A_Status = $row['A_Status'];
					$A_Important = $row['A_Important'];
					$A_Trash = $row['A_Trash'];
					$T_ID = $row['T_ID'];





					if ($A_Important == 1 AND $A_Trash == 0 AND $A_Status == 1) {
						echo '<li class="list-group-item">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a class="m-r-10">'.$A_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$A_DateTime.'</time></small>
						</div>
						<p class="msg">'.$A_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasunread" title="Mark as Unread" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-square-dots' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $A_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>


						<?php
						echo '
						</li>';
					} elseif ($A_Important == 1 AND $A_Trash == 0 AND $A_Status == 0) {
						// code...
						echo '<li class="list-group-item unread">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$A_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$A_DateTime.'</time></small>
						</div>
						<p class="msg">'.$A_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasread" title="Mark as Unread" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-square-dots' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $A_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>
						<?php
						echo '
						</li>';
					}	elseif ($A_Important == 0 AND $A_Trash == 0 AND $A_Status == 1) {
						// code...
						echo '<li class="list-group-item">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$A_Subject.'</a>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$A_DateTime.'</time></small>
						</div>
						<p class="msg">'.$A_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasunread" title="Mark as Unread" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-square-dots' ></i></button>
							<button  class="btn btn-primary" name="markasimportant" title="Mark as Unimportant" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $A_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>
						<?php
						echo '
						</li>';
					} elseif ($A_Important == 0 AND $A_Trash == 0 AND $A_Status == 0) {
						// code...
						echo '<li class="list-group-item unread">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$A_Subject.'</a>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$A_DateTime.'</time></small>
						</div>
						<p class="msg">'.$A_Message.'</p>
						</div>
						</div>';
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmess" title="View Message" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasread" title="Mark as Unread" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-square-dots' ></i></button>
							<button  class="btn btn-primary" name="markasimportant" title="Mark as Unimportant" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $A_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>
						<?php
						echo '
						</li>';
					}
					if (isset($_POST['viewmess'])){
						$T_ID = $_COOKIE['uID'];
						$read1 = $_POST['viewmess'];
						$update = "UPDATE adminemail SET A_Status = 1 WHERE A_Message_ID = '".$read1."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						$_SESSION['view_id'] = $_POST['viewmess'];
						echo '<script> location.href = "T_View_Message.php" </script>';
					}
					if (isset($_POST['markasimportant'])){
						$T_ID = $_COOKIE['uID'];
						$import = $_POST['markasimportant'];
						$update = "UPDATE adminemail SET A_Important = 1 WHERE A_Message_ID = '".$import."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['markasunimportant'])){
						$T_ID = $_COOKIE['uID'];
						$unimport = $_POST['markasunimportant'];
						$update = "UPDATE adminemail SET A_Important = 0 WHERE A_Message_ID = '".$unimport."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}
					elseif (isset($_POST['markasread'])){
						$T_ID = $_COOKIE['uID'];
						$read = $_POST['markasread'];
						$update = "UPDATE adminemail SET A_Status = 1 WHERE A_Message_ID = '".$read."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['markasunread'])){
						$T_ID = $_COOKIE['uID'];
						$unread = $_POST['markasunread'];
						$update = "UPDATE adminemail SET A_Status = 0 WHERE A_Message_ID = '".$unread."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['movetotrash'])) {
						$T_ID = $_COOKIE['uID'];
						$trash = $_POST['movetotrash'];
						$update = "UPDATE adminemail SET A_Trash = 1 WHERE A_Message_ID = '".$trash."' AND T_ID = '".$T_ID."'";
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
//start view message
function viewmessage(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {

		$T_ID = $_COOKIE['uID'];
		$A_Message_ID1 = 	$_SESSION['view_id'];
		$select = "SELECT * FROM adminemail WHERE T_ID = '".$T_ID."' AND A_Message_ID = '".$A_Message_ID1."' ";

		if ($result = $conn->query($select)) {
			if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$A_Sender = $row['A_Sender'];
				$A_Message_ID = $row["A_Message_ID"];
				$A_Subject = $row["A_Subject"];
				$A_Message = substr($row["A_Message"], 0, 10)."..";
				// $A_Message2 = substr($row["A_Message"], 0, 20)."<br>";
				// $A_Message2 = implode(' ',str_split($row["A_Message"]));
				$text = $row["A_Message"];
				$A_Message2 = wordwrap($text, 65, "<br />\n");
				$A_DateTime = $row["A_DateTime"];
				$end = date("g:i a", strtotime(".$A_DateTime."));
				$d = date('F d, Y', strtotime($A_DateTime));
				$A_DateTime = $d.' '.$end;
				$A_Status = $row['A_Status'];
				$A_Important = $row['A_Important'];
				$A_Trash = $row['A_Trash'];
				$T_ID = $row['T_ID'];

				echo "<h1 class='lead text-left'><b>Sender:</b> ".$A_Sender." <br><small>Date and Time sent: ".$A_DateTime."</small></h1>";
				echo "<h3 class='lead text-left'><b>Subject:</b> ".$A_Subject."</h3>";
				echo "<hr>";
				echo "<h4 class='lead text-left'><b>Message:</b> ".$text."</h4>";
				echo "<hr>";
				echo "<p class='text-left'><b>Files:</b></p>";
				$select = "SELECT * FROM a_email_files WHERE afile_fk = '".$A_Message_ID1."' ";

				if ($result = $conn->query($select)) {
					while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

						$file = $row['file'];


						if (!empty($file)) {
							?>
							<p class='text-left'><a href="../admin_uploads/<?php echo $file; ?>"><?php echo $file; ?></a></p>

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

//important start
function T_importantbadge(){ // important emails counter
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {
		$T_ID = $_COOKIE['uID'];
		$T_Type = 'Admin';

		$unreadNotif = "SELECT COUNT(A_Important) AS 'Unread Notifs' FROM adminemail WHERE A_Important = 1 AND T_ID = '".$T_ID."' AND A_Trash !=1";
		$select = "SELECT * FROM adminemail WHERE A_Important = 1 ORDER BY A_Message_ID DESC LIMIT 1";



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

function T_important(){

	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$full = $_COOKIE['Fname'];
		$last = $_COOKIE['Lname'];
		$T_ID = $_COOKIE['uID'];

		if (isset($_POST['searchemail1'])) {
			$search = $_POST['searchemail1'];

			$select = "SELECT * FROM adminemail WHERE A_Message LIKE '%".$search."%' OR A_Subject LIKE '%".$search."%' AND T_ID ='".$T_ID."' AND A_Important = 1";

			if ($result = $conn->query($select)) {

				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

					$A_Sender = $row['A_Sender'];
					$A_Message_ID = $row["A_Message_ID"];
					$A_Subject = $row["A_Subject"];
					$A_Message = substr($row["A_Message"], 0, 10)."..";
					$text = $row["A_Message"];
					$A_Message2 = wordwrap($text, 60, "<br>\n");
					$A_DateTime = $row["A_DateTime"];
					$end = date("g:i a", strtotime(".$A_DateTime."));
					$d = date('F d, Y', strtotime($A_DateTime));
					$A_DateTime = $d.' '.$end;
					$A_Status = $row['A_Status'];
					$A_Important = $row['A_Important'];
					$A_Trash = $row['A_Trash'];
					$T_ID = $row['T_ID'];

					if ($A_Important == 1 AND $A_Trash == 0 AND $A_Status == 1) {
						echo '<li class="list-group-item">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$A_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$A_DateTime.'</time></small>
						</div>
						<p class="msg">'.$A_Message.'</p>
						</div>
						</div>'
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmessimp" title="View Message" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasunread" title="Mark as Unread" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-square-dots' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $A_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>

						<?php
						echo'
						</li>';
					} elseif ($A_Important == 1 AND $A_Trash == 0 AND $A_Status == 0) {
						// code...
						echo '<li class="list-group-item unread">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$A_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$A_DateTime.'</time></small>
						</div>
						<p class="msg">'.$A_Message.'</p>
						</div>
						</div>'
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmessimp" title="View Message" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasread" title="Mark as Read" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-square' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $A_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>

						<?php
						echo'
						</li>';
					}
					if (isset($_POST['viewmessimp'])){
						$T_ID = $_COOKIE['uID'];
						$read1 = $_POST['viewmessimp'];
						$update = "UPDATE adminemail SET A_Status = 1 WHERE A_Message_ID = '".$read1."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						$_SESSION['view_id2'] = $_POST['viewmessimp'];
						echo '<script> location.href = "T_View_Important.php" </script>';
					}
					if (isset($_POST['markasunimportant'])){
						$T_ID = $_COOKIE['uID'];
						$import = $_POST['markasunimportant'];
						$update = "UPDATE adminemail SET A_Important = 0 WHERE A_Message_ID = '".$import."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}	elseif (isset($_POST['markasread'])){
						$T_ID = $_COOKIE['uID'];
						$read = $_POST['markasread'];
						$update = "UPDATE adminemail SET A_Status = 1 WHERE A_Message_ID = '".$read."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['markasunread'])){
						$T_ID = $_COOKIE['uID'];
						$unread = $_POST['markasunread'];
						$update = "UPDATE adminemail SET A_Status = 0 WHERE A_Message_ID = '".$unread."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['movetotrash'])) {
						$T_ID = $_COOKIE['uID'];
						$trash = $_POST['movetotrash'];
						$update = "UPDATE adminemail SET A_Trash = 1 WHERE A_Message_ID = '".$trash."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}

				}
			}
		}else{

			$select = "SELECT * FROM adminemail WHERE T_ID ='".$T_ID."' ORDER BY A_Message_ID DESC";

			if ($result = $conn->query($select)) {

				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

					$A_Sender = $row['A_Sender'];
					$A_Message_ID = $row["A_Message_ID"];
					$A_Subject = $row["A_Subject"];
					$A_Message = substr($row["A_Message"], 0, 10)."..";
					$text = $row["A_Message"];
					$A_Message2 = wordwrap($text, 60, "<br>\n");
					$A_DateTime = $row["A_DateTime"];
					$end = date("g:i a", strtotime(".$A_DateTime."));
					$d = date('F d, Y', strtotime($A_DateTime));
					$A_DateTime = $d.' '.$end;
					$A_Status = $row['A_Status'];
					$A_Important = $row['A_Important'];
					$A_Trash = $row['A_Trash'];
					$T_ID = $row['T_ID'];


					if ($A_Important == 1 AND $A_Trash == 0 AND $A_Status == 1) {
						echo '<li class="list-group-item">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$A_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$A_DateTime.'</time></small>
						</div>
						<p class="msg">'.$A_Message.'</p>
						</div>
						</div>'
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmessimp" title="View Message" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasunread" title="Mark as Unread" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-square-dots' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $A_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>

						<?php
						echo'
						</li>';
					} elseif ($A_Important == 1 AND $A_Trash == 0 AND $A_Status == 0) {
						// code...
						echo '<li class="list-group-item unread">
						<div class="media">
						<div class="media-body">
						<div class="media-heading">
						<a  class="m-r-10">'.$A_Subject.'</a>
						<span class="badge bg-red">Important</span>
						<small class="float-right text-muted"><time class="hidden-sm-down" >'.$A_DateTime.'</time></small>
						</div>
						<p class="msg">'.$A_Message.'</p>
						</div>
						</div>'
						?>
						<form method="post">
							<button  class="btn btn-primary" name="viewmessimp" title="View Message" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-alt' ></i></button>
							<button  class="btn btn-primary" name="markasread" title="Mark as Read" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-message-square' ></i></button>
							<button  class="btn btn-primary" name="markasunimportant" title="Mark as Unimportant" value="<?php echo $A_Message_ID; ?>"><i class='bx bx-label' ></i></button>
							<button  class="btn btn-danger" name="movetotrash" title="Move to Trash" value="<?php echo $A_Message_ID; ?>"><i class='bx bxs-trash-alt' ></i></button>
						</form>

						<?php
						echo'
						</li>';
					}
					if (isset($_POST['viewmessimp'])){
						$T_ID = $_COOKIE['uID'];
						$read1 = $_POST['viewmessimp'];
						$update = "UPDATE adminemail SET A_Status = 1 WHERE A_Message_ID = '".$read1."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						$_SESSION['view_id2'] = $_POST['viewmessimp'];
						echo '<script> location.href = "T_View_Important.php" </script>';
					}
					if (isset($_POST['markasunimportant'])){
						$T_ID = $_COOKIE['uID'];
						$import = $_POST['markasunimportant'];
						$update = "UPDATE adminemail SET A_Important = 0 WHERE A_Message_ID = '".$import."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}	elseif (isset($_POST['markasread'])){
						$T_ID = $_COOKIE['uID'];
						$read = $_POST['markasread'];
						$update = "UPDATE adminemail SET A_Status = 1 WHERE A_Message_ID = '".$read."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['markasunread'])){
						$T_ID = $_COOKIE['uID'];
						$unread = $_POST['markasunread'];
						$update = "UPDATE adminemail SET A_Status = 0 WHERE A_Message_ID = '".$unread."' AND T_ID = '".$T_ID."'";
						$conn->exec($update);
						echo "<meta http-equiv='refresh' content='0'>";
					}elseif (isset($_POST['movetotrash'])) {
						$T_ID = $_COOKIE['uID'];
						$trash = $_POST['movetotrash'];
						$update = "UPDATE adminemail SET A_Trash = 1 WHERE A_Message_ID = '".$trash."' AND T_ID = '".$T_ID."'";
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

//start view message
function viewimportantmessage(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {

		$T_ID = $_COOKIE['uID'];
		$A_Message_ID2 = 	$_SESSION['view_id2'];
		$select = "SELECT * FROM adminemail WHERE T_ID = '".$T_ID."' AND A_Message_ID = '".$A_Message_ID2."' ";

		if ($result = $conn->query($select)) {
			if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$A_Sender = $row['A_Sender'];
				$A_Message_ID = $row["A_Message_ID"];
				$A_Subject = $row["A_Subject"];
				$A_Message = substr($row["A_Message"], 0, 10)."..";
				// $A_Message2 = substr($row["A_Message"], 0, 20)."<br>";
				// $A_Message2 = implode(' ',str_split($row["A_Message"]));
				$text = $row["A_Message"];
				$A_Message2 = wordwrap($text, 65, "<br />\n");
				$A_DateTime = $row["A_DateTime"];
				$end = date("g:i a", strtotime(".$A_DateTime."));
				$d = date('F d, Y', strtotime($A_DateTime));
				$A_DateTime = $d.' '.$end;
				$A_Status = $row['A_Status'];
				$A_Important = $row['A_Important'];
				$A_Trash = $row['A_Trash'];
				$T_ID = $row['T_ID'];

				echo "<h1 class='lead text-left'><b>Sender:</b> ".$A_Sender." <br><small>Date and Time sent: ".$A_DateTime."</small></h1>";
				echo "<h3 class='lead text-left'><b>Subject:</b> ".$A_Subject."</h3>";
				echo "<hr>";
				echo "<h4 class='lead text-left'><b>Message:</b> ".$text."</h4>";
				echo "<hr>";
				echo "<p class='text-left'><b>Files:</b></p>";
				$select = "SELECT * FROM a_email_files WHERE afile_fk = '".$A_Message_ID2."' ";

				if ($result = $conn->query($select)) {
					while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

						$file = $row['file'];


						if (!empty($file)) {
							?>
							<p class='text-left'><a href="../admin_uploads/<?php echo $file; ?>"><?php echo $file; ?></a></p>
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

//trash start
function T_Trashbadge(){
	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);

	try {

		$T_Name = $_COOKIE['Fname']." ".$_COOKIE['Lname'];
		$T_Type = 'Admin';

		$unreadNotif = "SELECT COUNT(A_Trash) AS 'Unread Notifs' FROM adminemail WHERE A_Trash = 1 AND T_ID = '".$T_Name."'  ";
		$select = "SELECT * FROM adminemail WHERE A_Trash = 1 ORDER BY A_Message_ID DESC LIMIT 1";


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

function T_Trash(){

	$servername = "localhost";
	$UserName = "root";
	$Password = "";
	$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
	try {

		$full = $_COOKIE['Fname'];
		$last = $_COOKIE['Lname'];
		$T_ID = $_COOKIE['uID'];

		$select = "SELECT * FROM adminemail WHERE T_ID ='".$T_ID."' ORDER BY A_Message_ID DESC";

		if ($result = $conn->query($select)) {

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

				$A_Sender = $row['A_Sender'];
				$A_Message_ID = $row["A_Message_ID"];
				$A_Subject = $row["A_Subject"];
				$A_Message = substr($row["A_Message"], 0, 10)."..";
				$A_DateTime = $row["A_DateTime"];
				$end = date("g:i a", strtotime(".$A_DateTime."));
				$d = date('F d, Y', strtotime($A_DateTime));
				$A_DateTime = $d.' '.$end;
				$A_Status = $row['A_Status'];
				$A_Important = $row['A_Important'];
				$A_Trash = $row['A_Trash'];
				$T_ID = $row['T_ID'];

				if ($A_Trash == 1) {
					echo '<li class="list-group-item">
					<div class="media">
					<div class="media-body">
					<div class="media-heading">
					<a  class="m-r-10">'.$A_Subject.'</a>
					<small class="float-right text-muted"><time class="hidden-sm-down" >'.$A_DateTime.'</time></small>
					</div>
					<p class="msg">'.$A_Message.'</p>
					</div>
					</div>';
					?>
					<form method="post">
						<button  class="btn btn-primary" name="removefromtrash" title="Recycle" value="<?php echo $A_Message_ID; ?>">Remove from Trash</button>
						<button  class="btn btn-danger" name="deleteperm" title="Delete Permanently" type="submit" value=<?php echo $A_Message_ID; ?>>Delete Permanently</button>
					</form>

					<?php
					echo '
					</li>';
				}
				if (isset($_POST['removefromtrash'])) {
					$T_ID = $_COOKIE['uID'];
					$untrash = $_POST['removefromtrash'];
					$update = "UPDATE adminemail SET A_Trash = 0 WHERE A_Message_ID = '".$untrash."' AND T_ID = '".$T_ID."'";
					$conn->exec($update);
					echo "<meta http-equiv='refresh' content='0'>";
				}


			}
			if (isset($_POST['deleteperm'])) {
				$T_ID = $_COOKIE['uID'];
				$deleteperm = $_POST['deleteperm'];

				$delete = "DELETE FROM adminemail WHERE A_Message_ID = '".$deleteperm."' AND T_ID = '".$T_ID."'";
				$alter1 = "ALTER TABLE adminemail DROP A_Message_ID";
				$alter2 = "ALTER TABLE adminemail AUTO_INCREMENT = 1";
				$alter3 = "ALTER TABLE adminemail ADD A_Message_ID int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
				$conn->exec($delete);
				$conn->exec($alter1);
				$conn->exec($alter2);
				$conn->exec($alter3);
				echo "<meta http-equiv='refresh' content='0'>";
			}

		}
	}catch(PDOException $i){
		$errorMsg=  $i->getMessage();
			  echo "<meta http-equiv='refresh' content='0'>";
	}


}
//trash end

function T_Online(){

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
function T_Offline(){

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


$T_ID = $_COOKIE['uID'];
if (isset($_POST['markallasread2'])){
	$update = "UPDATE adminemail SET A_Status = 1 WHERE A_Status = 0 AND T_ID = '".$T_ID."'";
	$conn->exec($update);
	echo "<meta http-equiv='refresh' content='0'>";
}elseif (isset($_POST['markallasunread2'])){
	$update = "UPDATE adminemail SET A_Status = 0 WHERE A_Status = 1 AND T_ID = '".$T_ID."'";
	$conn->exec($update);
	echo "<meta http-equiv='refresh' content='0'>";
}

if (isset($_POST['markallasread3'])){
	$update = "UPDATE adminemail SET A_Status = 1 WHERE A_Status = 0 AND T_ID = '".$T_ID."' AND A_Important = 1";
	$conn->exec($update);
	echo "<meta http-equiv='refresh' content='0'>";
}elseif (isset($_POST['markallasunread3'])){
	$update = "UPDATE adminemail SET A_Status = 0 WHERE A_Status = 1 AND T_ID = '".$T_ID."' AND A_Important = 1";
	$conn->exec($update);
	echo "<meta http-equiv='refresh' content='0'>";
}
?>
