<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<?php include "php/A_notifs_func.php"; ?>

<html lang="en" dir="ltr">
<?php session_start();
if (!$_SESSION['Login_Status']) {
  header ("Location: ../login.php");
}
if ($_SESSION['Acc']) {

 header ("Location: A_Index.php");
}

?>
<head>
	<meta charset="UTF-8">
	<title> Responsiive Admin Dashboard | CodingLab </title>
	<link rel="shortcut icon" href="../images/logo.png">
	<link rel="stylesheet" href="../sidebar/style.css?v=<?php echo time(); ?>">
	<!-- Boxicons CDN Link -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Footer CSS -->
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="../Footer/style.css?v=<?php echo time(); ?>">
<link rel="stylesheet" type="text/css" href="mail-css/inbox-style.css?v=<?php echo time(); ?>">
<link rel="stylesheet" type="text/css" href="mail-css/notif-style.css?v=<?php echo time(); ?>">
	<!-- Evo Calendar CSS -->
	<link rel="stylesheet" type="text/css" href="../css-evo/evo-calendar.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css-evo/evo-calendar.orange-coral.css?v=<?php echo time(); ?>">

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<style media="screen">
.swal2-popup { font-size: 1.7rem !important; }
textarea {
	width: 100%;
	height: 300px;
	padding: 10px;
}
.logo-img {
	width: min(50vw, 200px);
	width: 45px;
	margin: 8px;
}
/* Float four columns side by side */
.columns {
	width: 75%;
	padding: 20px 10px;
}

/* Remove extra left and right margins, due to padding in columns */


/* Clear floats after the columns */
.rows:after {
	content: "";
	display: table;
	clear: both;
}

/* Style the counter cards */
.cards {
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
	padding: 16px;
	text-align: left;
	background-color: #fff;
}
@media screen and (max-width: 600px) {
	.columns {
		width: 100%;
		display: block;
		margin-bottom: 20px;
	}
}



/* The container */
.container {
	display: block;
	position: relative;
	padding-left: 35px;
	margin-bottom: 12px;
	cursor: pointer;
	font-size: 16px;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
	position: absolute;
	opacity: 0;
	cursor: pointer;
	height: 0;
	width: 0;
}

/* Create a custom checkbox */
.checkmark {
	position: absolute;
	top: 0;
	left: 0;
	height: 25px;
	width: 25px;
	background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
	background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
	background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
	content: "";
	position: absolute;
	display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
	display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
	left: 9px;
	top: 5px;
	width: 5px;
	height: 10px;
	border: solid white;
	border-width: 0 3px 3px 0;
	-webkit-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	transform: rotate(45deg);
}
</style>

<body>

	<!-- SideBar -->
	<div class="sidebar">
		<div class="logo-details">
			<!-- <i class='bx bxl-flutter'></i> -->
			<img src="../images/logo.png" class="logo-img">
			<span class="logo_name">FEIS</span>
		</div>
		<ul class="nav-links">
			<li>
				<a href="A_Index.php">
					<i class='bx bx-box' ></i>
					<span class="links_name">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="A_Notification.php">
					<i class='bx bxs-bell-ring pulse-button' ></i>
					<span class="links_name">Notifications</span> <span class="badge2"><?php Abadgecount(); ?></span>
				</a>
			</li>
			<li>
				<a href="A_Mail_compose.php" class="active">
					<i class='bx bx-message pulse-button'></i>
					<span class="links_name">Messages</span> <span class="badge2"><?php emailbadgecountA(); ?></span>
				</a>
			</li>
			<li>
				<a href="schedule/Schedule.php">
					<i class="fas fa-calendar-alt"></i>
					<span class="links_name">Class Schedule</span>
				</a>
			</li>
			<li onclick="myFunction()" id="main">
				<a >
					<i class="fas fa-clipboard"></i>
					<span class="links_name">Records </span><i style="margin-left:60px;" class='bx bxs-down-arrow bx-xs'></i>
				</a>

				<li class="sub" id="myDIV">
					<a href="A_TRecords.php">
						<i class="far fa-address-book"></i>
						<span class="links_name">Training Records </span>
					</a>

					<li class="sub" id="myDIV1">
						<a href="A_ERecords.php">
							<i class="far fa-address-card"></i>
							<span class="links_name">Employment Records</span>
						</a>
					</li>

					<li class="sub" id="myDIV2">
						<a href="A_SRecords.php">
							<i class="fas fa-book"></i>
							<span class="links_name">Subject Records</span>
						</a>
					</li>

					<li class="sub" id="myDIV3">
						<a href="A_RRecords.php">
							<i class="fas fa-id-card-alt"></i>
							<span class="links_name">Registration Records</span>
						</a>
					</li>

					<li class="sub" id="myDIV4">
						<a href="A_ARecords.php">
							<i class="fas fa-users-cog"></i>
							<span class="links_name">Account Records</span>
						</a>
					</li>


				</li>

			</li>
			<li onclick="evaluation()" id="main2">
				<a>
					<i class="fas fa-poll"></i>
					<span class="links_name">Evaluation</span><i style="margin-left:42px;" class='bx bxs-down-arrow bx-xs'></i>
				</a>

				<li class="sub" id="eval">
					<a href="A_EvalFormResult.php">
						<i class="far fa-sticky-note"></i>
						<span class="links_name">Evaluation Results </span>
					</a>

				</li>
				<li class="sub" id="eval1">
					<a href="A_EvalSchedule.php">
						<i class="fas fa-poll-h"></i>
						<span class="links_name">Evaluation</span>
					</a>
				</li>


			</li>


			<li>
				<a href="A_Profile.php">
					<i class="far fa-user-circle"></i>
					<span class="links_name">Profile</span>
				</a>
			</li>
				<form method="post">
			<li class="log_out">


					<button type="button" name="log" id="log" value="log">
						<i class='bx bx-log-out'></i>
						<span class="links_name">Logout</span>
					</button>
			</li>
			</form>

		</ul>
	</div>
	<!-- Top Bar -->
	<section class="home-section">
		<nav>
			<div class="sidebar-button">
				<i class='bx bx-menu sidebarBtn'></i>
				<span class="dashboard">Evaluation Dashboard</span>
			</div>

			<div class="profile-details">
      <?php include 'Index_Assets/all.php'; ?>
      </div>
		</nav>
		<br><br><br>
		<style media="screen">
		#scroll{
			border-radius: 50%;
			z-index: 99;
			height:50px;
			width: 50px;
			position: fixed;
			left: 1750px;
			top: 850px;
			display: none;
		}
		</style>


		<center>
			<form method="post">
				<?php include 'Eval_Reg/a_eval.php'; ?>
				<?php include 'Eval_Reg/b_eval.php'; ?>
				<?php include 'Eval_Reg/c_eval.php'; ?>
				<?php include 'Eval_Reg/d_eval.php'; ?>
				<?php include 'Eval_Reg/e_eval.php'; ?>
				<?php include 'Eval_Reg/feedback.php'; ?>
				<?php include 'Eval_Reg/learning.php'; ?>
				<?php include 'Eval_Reg/medium.php'; ?>
				<?php include 'Eval_Reg/eval.php'; ?>

				<?php include 'Eval_Edit/show_a.php'; ?>
				<?php include 'Eval_Edit/show_b.php'; ?>
				<?php include 'Eval_Edit/show_c.php'; ?>
				<?php include 'Eval_Edit/show_d.php'; ?>
				<?php include 'Eval_Edit/show_e.php'; ?>
				<?php include 'Eval_Edit/show_f.php'; ?>
				<?php include 'Eval_Edit/show_l.php'; ?>
				<?php include 'Eval_Edit/show_m.php'; ?>
				<?php include 'Eval_Edit/show_eval.php'; ?>
				<button id="scroll" type="button" class="btn btn-info" name="button"><i class='bx bxs-up-arrow'></i></button>
				<div class="rows">
					<div class="columns">
						<div class="cards" style="background-color: #343F66; color: white;">
							<div class="form-group">
								<label for="formGroupExampleInput1" style="padding-left: 10px;">Teacher</label>
								<select class="form-control" name="tc" readonly>
								<?php include 'Eval_Edit/Eval_Teacher.php'; ?>
								</select>
								<br>
								<button type="button" class="btn btn-primary" name="button" id="clear">Clear</button>
								<button class="btn btn-success" name="edit_eval">Save</button>
								<button class="btn btn-danger" name="edit_eval" value="exit">Save and Exit</button>
							</div>
						</div>
					</div>
				</div>
				<!-- A Evaluation -->

				<div class="rows">
					<div class="columns">
						<div class="cards" style="background-color: #343F66; color: white;">
							<div class="row">
								<div class="col-sm-4">
									A: Start Up
								</div>
								<div class="col-sm-8" style="text-align:right;">
									<button type="button" class="btn btn-info" id="acheck" name="button">Check All</button>
								</div>
							</div>
						</div>
						<div class="cards">
							<label class="container">1: Gained Learner Attention
								<?php echo $pic1; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">2: Shared goals/outline for the day, clearly communicates learning competencies and objectives.
								<?php echo $pic2; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">3: Assessed prior knowledge
								<?php echo $pic3; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">4: Connected to previous learning
								<?php echo $pic4; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">5: Puctual
								<?php echo $pic5; ?>
								<span class="checkmark"></span>
							</label>
						</div>
					</div>
				</div>

				<!-- B Evaluation -->
				<div class="rows">
					<div class="columns">
						<div class="cards" style="background-color: #343F66; color: white;">
							<div class="row">
								<div class="col-sm-4">
									B: Body
								</div>
								<div class="col-sm-8" style="text-align:right;">
									<button class="btn btn-info" id="bcheck" type="button" name="button">Check All</button>
								</div>
							</div>
						</div>
						<div class="cards">
							<label class="container">6: Variety of delivery techniques including asking thought - provoking questions.
								<?php echo $bpic1; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">7: Explains the concepts within the group of the learners.
								<?php echo $bpic2; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">8: Clear, current, relevant, content, and examples.
								<?php echo $bpic3; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">9: Students active participation.
								<?php echo $bpic4; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">10: Enthusiasm, passion for subject.
								<?php echo $bpic5; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">11: Demonstration of adequate knowledge about the course and taught with competence.
								<?php echo $bpic6; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">12: Smooth trasition between topics.
								<?php echo $bpic7; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">13: Encouraging mannerism, has a clear and well modulated voice.
								<?php echo $bpic8; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">14: Articulate and proficient in the language of instruction.
								<?php echo $bpic9; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">15: Effective time- management.
								<?php echo $bpic10; ?>
								<span class="checkmark"></span>
							</label>
						</div>

					</div>
				</div>

				<!-- C Evaluation -->
				<div class="rows">
					<div class="columns">
						<div class="cards" style="background-color: #343F66; color: white;">
							<div class="row">
								<div class="col-sm-4">
									C: Assesment/ Exercises
								</div>
								<div class="col-sm-8" style="text-align:right;">
									<button class="btn btn-info" id="ccheck" type="button" name="button">Check All</button>
								</div>
							</div>
						</div>
						<div class="cards">
							<label class="container">16: Clear intruction and expectations.
								<?php echo $cpic1; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">17: Defined time frame.
								<?php echo $cpic2; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">18: Acknowledgement of effort.
								<?php echo $cpic3; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">19: Relevance to topic.
								<?php echo $cpic4; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">20: Relevant to real- life situation.
								<?php echo $cpic5; ?>
								<span class="checkmark"></span>
							</label>
						</div>
					</div>
				</div>

				<!-- D Evaluation -->
				<div class="rows">
					<div class="columns">
						<div class="cards" style="background-color: #343F66; color: white;">
							<div class="row">
								<div class="col-sm-4">
									D: Conclusion
								</div>
								<div class="col-sm-8" style="text-align:right;">
									<button class="btn btn-info" id="dcheck" type="button" name="button">Check All</button>
								</div>
							</div>
						</div>
						<div class="cards">
							<label class="container">21: Ended on time.
								<?php echo $dpic1; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">22: Summarized key points.
								<?php echo $dpic2; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">23: Sense of completion felt, review of learning outcomes, how well the information was learned.
								<?php echo $dpic3; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">24: Reminder of assignments, if any...
								<?php echo $dpic4; ?>
								<span class="checkmark"></span>
							</label>
						</div>
						<div class="cards">
							<label class="container">25: Introduction of upcoming topics.
								<?php echo $dpic5; ?>
								<span class="checkmark"></span>
							</label>
						</div>
					</div>
				</div>

				<!-- E Evaluation -->
				<div class="rows">
					<div class="columns">
						<div class="cards" style="background-color: #343F66; color: white;">
							<div class="row">
								<div class="col-sm-4">
									E: Relationship
								</div>
								<div class="col-sm-8" style="text-align:right;">
									<button class="btn btn-info" id="echeck" type="button" name="button">Check All</button>
								</div>
							</div>
						</div>
					<div class="cards">
						<label class="container">26: Attendance.
							<?php echo $epic1; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">27: Class atmosphere of attentiveness and respect.
							<?php echo $epic2; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">28: Knows and users student names.
							<?php echo $epic3; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">29: Positive reaponsive to questions.
							<?php echo $epic4; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">30: Balance of attention/connection with all of the students and not just to few.
							<?php echo $epic5; ?>
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
			</div>

			<!-- FeedBack Evaluation -->
			<div class="rows">
				<div class="columns">
					<div class="cards" style="background-color: #343F66; color: white;">
						<div class="row">
							<div class="col-sm-4">
								<strong>	FEEDBACK: </strong>Teaching Strategies
							</div>
							<div class="col-sm-8" style="text-align:right;">
								<button class="btn btn-info" id="fcheck" type="button" name="button">Check All</button>
							</div>
						</div>
					</div>
					<div class="cards">
						<label class="container">Knowledge evident.
							<?php echo $fpic1; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Posed good questions.
							<?php echo $fpic2; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Encourage active participation.
							<?php echo $fpic3; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Connected with the learners.
							<?php echo $fpic4; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Managed student issues/behaviours.
							<?php echo $fpic5; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Connected topics to daily events.
							<?php echo $fpic6; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Text and/or hand out materials where connected and/or referenced.
							<?php echo $fpic7; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Demonstrated respect.
							<?php echo $fpic8; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Addressed varied learning styles/preferences.
							<?php echo $fpic9; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Expectaion were clear
							<?php echo $fpic10; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Enthusiasm evident.
							<?php echo $fpic11; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Listened carefully.
							<?php echo $fpic12; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Personally connected with the group.
							<?php echo $fpic13; ?>
							<span class="checkmark"></span>
						</label>
					</div>

				</div>
			</div>

			<!-- FeedBack Evaluation -->
			<div class="rows">
				<div class="columns">
					<div class="cards" style="background-color: #343F66; color: white;">
						<div class="row">
							<div class="col-sm-4">
								<strong>	FEEDBACK: </strong>Learning Impact
							</div>
							<div class="col-sm-8" style="text-align:right;">
								<button class="btn btn-info" id="lcheck" type="button" name="button">Check All</button>
							</div>
						</div>
					</div>
					<div class="cards">
						<label class="container">Students raise questions to push understanding/gain clarity.
							<?php echo $lpic1; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Learners able to challenge others via question/critique/exceptions raise by peer and/or teacher.
							<?php echo $lpic2; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Evidence of integrating previous materials.
							<?php echo $lpic3; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Self directed task completion.
							<?php echo $lpic4; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Prepared for class(e.g. Questions raise from reading or task assignment.).
							<?php echo $lpic5; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Efforts to be attentive/focused on what is happening in class.
							<?php echo $lpic6; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Personal example/application shared.
							<?php echo $lpic7; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Augment offered resources.
							<?php echo $lpic8; ?>
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
			</div>

			<!-- FeedBack Evaluation -->
			<div class="rows">
				<div class="columns">
					<div class="cards" style="background-color: #343F66; color: white;">
						<div class="row">
							<div class="col-sm-4">
								<strong>	FEEDBACK: </strong>Medium Use and How They Added to the Learning Experience
							</div>
							<div class="col-sm-8" style="text-align:right;">
								<button class="btn btn-info" id="mcheck" type="button" name="button">Check All</button>
							</div>
						</div>
					</div>
					<div class="cards">
						<label class="container">Audio
							<?php echo $mpic1; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Visual
							<?php echo $mpic2; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Kinesthetic
							<?php echo $mpic3; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Listened carefully.
							<?php echo $mpic4; ?>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="cards">
						<label class="container">Personally connected with the group.
							<?php echo $mpic5; ?>
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
			</div>

			<!-- FeedBack Evaluation -->
			<div class="rows">
				<div class="columns">
					<div class="cards" style="background-color: #343F66; color: white;">
						<strong>	FEEDBACK: </strong> Your Comment (required)
					</div>
					<div class="cards">
						<div class="form-group">
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" > <?php echo $com; ?></textarea>
						</div>
					</div>

				</div>
			</div>


			<div class="rows">
				<div class="columns">
					<div class="cards" style="background-color: #343F66; color: white;">
						<div class="form-group">
							<label for="exampleFormControlInput1">Teacher</label>
							<input type="text" class="form-control" name="teacher" id="tc" value="<?php echo $tc; ?>" readonly>
							<br>
							<button type="button" class="btn btn-primary" name="button" id="clear">Clear</button>
							<button class="btn btn-success" name="edit_eval">Save</button>
							<button class="btn btn-danger" name="edit_eval" value="exit">Save and Exit</button>
						</div>
					</div>
				</div>
			</div>

	</form>
</center>


<!-- Footer -->
<?php include '../Footer/footer.php'; ?>

</section>

<script type="text/javascript" src="Eval_edit/script.js?v=<?php echo time(); ?>"></script>

<script >
var mybutton = document.getElementById("scroll");
window.onscroll = function() {scrollFunction()};

$('#scroll').click(function(event) {
	document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
});
function scrollFunction() {

	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		mybutton.style.display = "block";
	} else {
		mybutton.style.display = "none";
	}
}
</script>

<!-- SIDEBAR JS -->
<!-- SIDEBAR JS -->
<script src="../sidebar/script.js"></script>
<script>
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
	sidebar.classList.toggle("active");
	if(sidebar.classList.contains("active")){
		sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
	}else
	sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
</script>

</body>
</html>
