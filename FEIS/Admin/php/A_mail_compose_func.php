<?php
$servername = "localhost";
$UserName = "root";
$Password = "";
$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
date_default_timezone_set('Asia/Manila');

$receiverA = $subjecT = $messageA = NULL;
try {
	if(isset($_POST['emailsub'])){

		echo "
		<script>
		Swal.fire(
			'Success!',
			'Email Sent Successfully',
			'success'
		);
		</script>
		";

		$full = $_COOKIE['Fname'];
		$last = $_COOKIE['Lname'];
		$A_ID = $_COOKIE['uID'];
		$sender1 =  $_COOKIE['Fname']." ".$_COOKIE['Lname'];
		$receiverA =  $_POST['receiverA'];
		$subjectA =  $_POST['subjectA'];
		$messageA =  $_POST['messageA'];
		$emailA2 =  $_POST['emailA2'];
		$emailA3 =  $_POST['emailA3'];

		$unreadNotif = "SELECT * FROM user WHERE Email = '".$receiverA."' AND A_Type = 'Teacher'";

		if ($result = $conn->query($unreadNotif)) {

			if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$first = $row['F_Name'];
				$last = $row['L_Name'];
				$T_ID = $row['User_ID'];
				$super = $first." ".$last;

				if (!empty($subjectA AND $messageA)) { //To check if the subjecT and messageA has content

					$insert = "INSERT INTO adminemail (A_ID,A_Sender, A_Subject, A_Message, T_ID, A_Receiver , A_Email) VALUES('".$A_ID."','".$sender1."','".$subjectA."','".$messageA."','".$T_ID."','".$super."','".$receiverA."')";
					$conn->exec($insert);
					$message_id = $conn->lastInsertId();

					REQUIRE 'phpmailer/PHPMailerAutoload.php';
					REQUIRE 'phpmailer/class.phpmailer.php';
					REQUIRE 'phpmailer/class.smtp.php';
					$email = new PHPMailer;
					$email -> isSMTP();
					$email -> SMTPAuth=true;
					$email -> Host='smtp.gmail.com';
					$email -> Port='465';
					$email -> SMTPSecure='ssl';
					$email -> isHTML();
					$email -> Username='feisweb2@gmail.com';
					$email -> Password='feisweb1234';
					$email -> setFrom('feisweb2@gmail.com',$sender1);
					$email -> Subject=$subjectA;
					$email -> Body= $messageA;
					$email -> addAddress($receiverA);
					$email-> addCC($emailA2, "Some CC Name");
					$email-> addBCC($emailA3, "Some BCC Name");

					$total = count($_FILES['file']['tmp_name']);
					for($i=0;$i<$total;$i++){
						$fileName = $_FILES['file']['name'][$i];
						$ext = pathinfo($fileName, PATHINFO_EXTENSION);
						$fileDest = '../admin_uploads/'.$fileName;
						if($ext === 'pdf' || 'jpeg' || 'JPG' || 'pptx' || 'png' || 'docx'){
							move_uploaded_file($_FILES['file']['tmp_name'][$i], $fileDest);
							$email->addAttachment("../admin_uploads/".$fileName);

						}else{
							echo 'File type is not allowed';
						}

						$insert = "INSERT into a_email_files (afile_fk,file) VALUES('".$message_id."','".$fileName."')";
						$conn->exec($insert);
					}


					$email -> Send();

				}else{								//Will print if the subjecT or messageA is empty
					echo "Please fill in all contents";
				}
			}
		}


	}
}catch(PDOException $e){
	$errorMsg=  $e->getMessage();
	echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
}

?>
