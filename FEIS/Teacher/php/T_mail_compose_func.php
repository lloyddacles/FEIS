<?php
$servername = "localhost";
$UserName = "root";
$Password = "";
$conn = new PDO("mysql:host=$servername;dbname=feis", $UserName, $Password);
date_default_timezone_set('Asia/Manila');

$receiverT = $subjecT = $messageT = NULL;
try {
	if(isset($_POST['emailsub'])){


		$full = $_COOKIE['Fname'];
		$last = $_COOKIE['Lname'];
		$T_ID = $_COOKIE['uID'];
		$sender1 =  $_COOKIE['Fname']." ".$_COOKIE['Lname'];
		$receiverT =  $_POST['receiverT'];
		$subjectT =  $_POST['subjectT'];
		$messageT =  $_POST['messageT'];
		$emailT2 =  $_POST['emailT2'];
		$emailT3 =  $_POST['emailT3'];

		$unreadNotif = "SELECT * FROM user WHERE Email = '".$receiverT."' AND A_Type = 'Admin'";

		if ($result = $conn->query($unreadNotif)) {

			if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$first = $row['F_Name'];
				$last = $row['L_Name'];
				$A_ID = $row['User_ID'];
				$super = $first." ".$last;

				if (!empty($subjectT AND $messageT)) { //To check if the subjecT and messageT has content

						$insert = "INSERT INTO tcemail (T_ID,T_Sender, T_Subject, T_Message, A_ID, T_Receiver , T_Email) VALUES('".$T_ID."','".$sender1."','".$subjectT."','".$messageT."','".$A_ID."','".$super."','".$receiverT."')";
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
						$email -> Subject=$subjectT;
						$email -> Body= $messageT;
						$email -> addAddress($receiverT);
						$email-> addCC($emailT2, "Some CC Name");
						$email-> addBCC($emailT3, "Some BCC Name");

							$total = count($_FILES['file']['tmp_name']);
						   for($i=0;$i<$total;$i++){
						     $fileName = $_FILES['file']['name'][$i];
						     $ext = pathinfo($fileName, PATHINFO_EXTENSION);
						     $fileDest = '../teacher_uploads/'.$fileName;
						     if($ext === 'pdf' || 'jpeg' || 'JPG' || 'pptx' || 'png' || 'docx'){
						         move_uploaded_file($_FILES['file']['tmp_name'][$i], $fileDest);
										 $email->addAttachment("../teacher_uploads/".$fileName);

						     }else{
						       echo 'File type is not allowed';
						     }

						     $insert = "INSERT into t_email_files (tfile_fk,file) VALUES('".$message_id."','".$fileName."')";
						     $conn->exec($insert);
						   }

						$email -> Send();

				}else{								//Will print if the subjecT or messageT is empty
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
