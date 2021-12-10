<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	try{
		$conn = new PDO("mysql:host=$servername;dbname=feis",$username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if (isset($_POST['b'])) {
			$np = $_POST['newpass'];
			$wan = $_COOKIE['wan'];
			$tu = $_COOKIE['tu'];

				$sql = "UPDATE user set Password = '".$np."' WHERE Username = '".$tu."' AND Email = '".$wan."' ";
				$conn->exec($sql);

				require 'phpmailer/PHPMailerAutoload.php';
			    $mail = new PHPMailer;
			 	$mail-> isSMTP();
			    $mail-> Host='smtp.gmail.com';
			    $mail-> Port='465';
			    $mail-> SMTPAuth=true;
			    $mail-> SMTPSecure='ssl';

			    $mail-> Username='systemforschool@gmail.com';
			    $mail-> Password='systemforschool089';

			    $sql2 = "SELECT Email FROM user WHERE User_ID = '".$tu."' ";
			    $result2 = $conn->query($sql2);
				$email = $result2->fetchColumn();

			    $mail-> setFrom('systemforschool@gmail.com','Mr Knowbody');
			    $mail-> addAddress($wan);

			    $sql3 = "SELECT F_Name FROM user WHERE User_ID = '".$tu."' ";
			    $result3 = $conn->query($sql3);
				$fname = $result3->fetchColumn();

			    $mail-> isHTML();
			    $mail-> Subject='PHP Mailer';
			    $mail-> Body='<h3>Dear '.$fname.'</h3><h3 align=center>Youve just successfully changed your password. If you did not perform such activity, kindly contact the FEIS administrator immediately.</h3><h3 align=center>Yours truly,<br>FEIS Administrator</h3>';

			    $mail -> Send();
				echo '<script type="text/javascript">alert("Changes Occur Succesfully");
		           window.location.href="login.php";
		           </script>';
		}
	}catch(PDOException $e){
  		 	$errorMsg=  $e->getMessage();
   			echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
    }
?>
