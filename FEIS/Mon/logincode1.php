<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

$u = "Username";
$e = "Email";
  	$code = null;
	try{

		//Send Code Button (START)
		if (isset($_POST['code'])) {
			$conn = new PDO("mysql:host=$servername;dbname=feis",$username, $password);
			$conn = new PDO("mysql:host=$servername;dbname=feis",$username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$use = $_POST['uname'];

		 if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,13}/",$use)) {
      $u = "Invalid Username Format";
      $modal = "#myModal";

    }else{

    	$account = $_POST['email'];
		if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,5}/",$account)) {
      $e = "Invalid email format";
     $modal = "#myModal";

   	}else{

   		//Auto Generated Code
			$code = rand(100000,50000000);

			//Cookies for email, code and user id
			setcookie("kod", $code);
			setcookie("wan", $account);
			setcookie("tu", $use);

//Email for activating account
			$sql = "SELECT * FROM user WHERE Email = '".$account."' and Username = '".$use."' ";
			if ($result = $conn->query($sql)) {
				if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
         			$fname = $row['F_Name'];
		    require 'phpmailer/PHPMailerAutoload.php';
		    $mail = new PHPMailer;
		 	$mail-> isSMTP();
		    $mail-> Host='smtp.gmail.com';
		    $mail-> Port='465';
		    $mail-> SMTPAuth=true;
		    $mail-> SMTPSecure='ssl';

		    $mail-> Username='systemforschool@gmail.com';
		    $mail-> Password='systemforschool089';

		    $mail-> setFrom('systemforschool@gmail.com','Mr Knowbody');
		    $mail-> addAddress($account);

		    $mail-> isHTML();
		    $mail-> Subject='PHP Mailer';
		    $mail-> Body='<h3>Dear '.$fname.'</h3><h3 align=center>Here is the Verification Code</h3><br><h3 align=center>'.$code.'</h3><h3 align=center><h3 align=center>Yours truly,<br>FEIS Administrator</h3>';

		    $mail -> Send();

        	$mod = "#myModal";

	  		echo "<script>
          $(document).ready(function(){
            $('".$mod."').modal('show');
             document.getElementById('a').value = '".$use."';
            document.getElementById('b').value = '".$account."';
          });


        </script>";
		}else{
			echo '<script>alert("Inputed Values Not Match");</script>';
			$modal = "#myModal";
		}

		}



   	}

    }







		}
		//Send Code Button (END)

			//Submit Button (START)
			if (isset($_POST['Submit'])) {
	    			if ($_POST['num']== $_COOKIE['kod']) {
	    					echo '<script>alert("Hello");</script>';
							echo '<script type="text/javascript">
					         window.location.href="reset.php";
					      </script>';
	    				}else{
	    					echo '<script>alert("Somethings Wrong");</script>';
	    				}
	    		}
	    	//Submit Button (END)


	}catch(PDOException $e){
  		 	$errorMsg=  $e->getMessage();
   			echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
    }
?>
