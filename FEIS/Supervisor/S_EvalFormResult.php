<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<?php session_start();
if (!$_SESSION['Login_Status']) {
  header ("Location: ../login.php");
}
?>
<?php include "php/S_notifs_func.php"; ?>

<html lang="en" dir="ltr">
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


	<!-- Footer CSS -->
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="../Footer/style.css?v=<?php echo time(); ?>">
	<!-- Evo Calendar CSS -->
	<link rel="stylesheet" type="text/css" href="../css-evo/evo-calendar.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../css-evo/evo-calendar.orange-coral.css?v=<?php echo time(); ?>">

	<!-- Chart JS -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<!-- Sweet Alert -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<link rel="stylesheet" type="text/css" href="mail-css/inbox-style.css?v=<?php echo time(); ?>">
<link rel="stylesheet" type="text/css" href="mail-css/notif-style.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style media="screen">
.swal2-popup { font-size: 1.7rem !important; }

</style>
<style media="screen">
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
	width: 80%;
	padding: 10px;
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

<style>
/* Float four columns side by side */
.column5 {
	width: 10%;
	padding: 20px 10px;
}

/* Remove extra left and right margins, due to padding in columns */


/* Clear floats after the columns */
.row5:after {
	content: "";
	display: table;
	clear: both;
}

/* Style the counter cards */
.card5 {
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
	padding: 16px;
	text-align: center;
	background-color: #fff;
}
@media screen and (max-width: 600px) {
	.column5 {
		width: 100%;
		display: block;
		margin-bottom: 20px;
	}
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
				<a href="S_Index.php">
					<i class='bx bx-box' ></i>
					<span class="links_name">Dashboard</span>
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
					<a href="S_TRecords.php">
						<i class="far fa-address-book"></i>
						<span class="links_name">Training Records </span>
					</a>

					<li class="sub" id="myDIV1">
						<a href="S_ERecords.php">
							<i class="far fa-address-card"></i>
							<span class="links_name">Employment Records</span>
						</a>
					</li>

					<li class="sub" id="myDIV2">
						<a href="S_SRecords.php">
							<i class="fas fa-book"></i>
							<span class="links_name">Subject Records</span>
						</a>
					</li>

					<li class="sub" id="myDIV3">
						<a href="S_RRecords.php">
							<i class="fas fa-id-card-alt"></i>
							<span class="links_name">Registration Records</span>
						</a>
					</li>

					<li class="sub" id="myDIV4">
						<a href="S_ARecords.php">
							<i class="fas fa-users-cog"></i>
							<span class="links_name">Account Records</span>
						</a>
					</li>


				</li>

			</li>
			<li onclick="evaluation()" id="main2">
				<a class="active">
					<i class="fas fa-poll"></i>
					<span class="links_name">Evaluation</span><i style="margin-left:42px;" class='bx bxs-down-arrow bx-xs'></i>
				</a>

				<li class="sub" id="eval">
					<a href="S_EvalFormResult.php">
						<i class="far fa-sticky-note"></i>
						<span class="links_name">Evaluation Results </span>
					</a>

				</li>
				<li class="sub" id="eval1">
					<a href="S_EvalSchedule.php">
						<i class="fas fa-poll-h"></i>
						<span class="links_name">Evaluation</span>
					</a>
				</li>


			</li>

			<li>
				<a href="S_Notification.php">
					<i class="fas fa-bell"></i>
					<span class="links_name">Notifications</span>
				</a>
			</li>
			<li>
				<a href="S_Profile.php">
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
	<section class="home-section" style="min-height: 126vh;">
		<nav>
			<div class="sidebar-button">
				<i class='bx bx-menu sidebarBtn'></i>
				<span class="dashboard">Evaluation Result</span>
			</div>

			<div class="profile-details">
      <?php include 'Index_Assets/all.php'; ?>
      </div>
		</nav>
		<br><br><br><br><br>

		<style media="screen">
		/* Float four columns side by side */
		.columns2 {
			float: left;
			width: 50%;
		}

		/* Remove extra left and right margins, due to padding in columns */


		/* Clear floats after the columns */
		.rows2:after {
			content: "";
			display: table;
			clear: both;
		}

		/* Style the counter cards */
		.cards2 {
			box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
			padding: 16px;
			text-align: left;
			background-color: #fff;
		}
		@media screen and (max-width: 600px) {
			.columns2 {
				width: 100%;
				display: block;
				margin-bottom: 20px;
			}
		}

		</style>

		<!-- Card 3 -->
		<style media="screen">
		/* Float four columns side by side */
		.columns3 {
			float: left;
			width: 100%;
		}

		/* Remove extra left and right margins, due to padding in columns */


		/* Clear floats after the columns */
		.rows3:after {
			content: "";
			display: table;
			clear: both;
		}

		/* Style the counter cards */
		.cards3 {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
			padding: 16px;
			text-align: left;
			background-color: #fff;
		}


		#pointer{
			cursor: pointer;
		}
		#pointer:hover{
			opacity: 0.8;
			border: 2px #C5C5C5 solid;
			padding: 14.8px;
			cursor: pointer;
		}

		@media screen and (max-width: 600px) {
			.columns3 {
				width: 100%;
				display: block;
				margin-bottom: 20px;
			}

		}

		</style>

		<style media="screen">
		/* Float four columns side by side */
		.column1 {
			width: 25%;
			padding: 50px;
		}

		/* Remove extra left and right margins, due to padding */
		.row1 {margin: 0 -5px;}

		/* Clear floats after the columns */
		.row1:after {
			content: "";
			display: table;
			clear: both;
		}

		/* Responsive columns */
		@media screen and (max-width: 600px) {
			.column1 {
				width: 100%;
				display: block;
				margin-bottom: 20px;
			}
		}

		/* Style the counter cards */
		.card1 {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			padding: 16px;
			text-align: center;
			background-color: #f1f1f1;
		}

		</style>
		<center>
			<!-- Card 1 -->
			<div class="rows">
				<div class="columns">
					<div class="cards">
						<!-- Card 2 -->
						<div class="rows2">
							<div class="card-header" style="background-color: #343F66; color: white; padding:10px;">
								<div class="row">
									<div class="col-sm-6">
										<select class="form-control" id="teacher">
											<option value="0" selected disabled>Select Teacher</option>
											<?php include 'Eval_Assets/Eval_Teacher.php'; ?>
										</select>
									</div>
									<div class="col-sm-6" style="text-align:right;">
										<strong id="score">Percent: 0% &nbsp; Total:00/30 &nbsp;</strong>
										<a href="S_EvalHistory.php" class="btn btn-success" >Back</a>
									</div>
								</div>
							</div>
							<div class="columns2">

								<div class="cards2" style="padding:0px;">
									<!-- Card 3 -->
									<div class="rows3">
										<div class="columns3">
											<div class="cards3">
												<strong id="evaluator">Evaluator :</strong>
											</div>

											<div class="cards3">
												<strong id="evaluated">Teacher :</strong>
											</div>
											<button style="width:100%; outline:none; border:none;"class="cards3" id="A">
												A: Start Up
											</button>
											<button style="width:100%; outline:none; border:none;"class="cards3" id="B">
												B: Body
											</button>
											<button style="width:100%; outline:none; border:none;"class="cards3" id="C">
												C: Assessment/Exercies
											</button>
											<button style="width:100%; outline:none; border:none;"class="cards3" id="D">
												D: Conclusion
											</button>
											<button style="width:100%; outline:none; border:none;"class="cards3" id="E">
												E: Relationship
											</button>
											<button style="width:100%; outline:none; border:none;"class="cards3" id="FT">
												Feedback: Teaching Strategies
											</button>
											<button style="width:100%; outline:none; border:none;"class="cards3" id="FL">
												Feedback: Learning Impact
											</button>
											<button style="width:100%; outline:none; border:none;"class="cards3" id="FM">
												Feedback: Medium Use and How They Added to the learning Experience &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											</button>
											<button style="width:100%; outline:none; border:none;"class="cards3" id="FC">
												Feedback: Comment
											</button>

										</div>

									</div>
									<!-- Card 3 end -->

								</div>
							</div>
							<div class="columns2">
								&nbsp;
							</div>
							<div class="columns2">
								<!-- Pie Graph -->
								<canvas id="Pie"></canvas>
							</div>
						</div>
						<!-- Card 2 End -->

					</div>
				</div>
			</div>
			<!-- Card 1 End -->
		</center>

		<!-- Modal A -->
		<div class="modal fade" id="A_Modal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" >
						A: Start Up
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal B -->
		<div class="modal fade" id="B_Modal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" >
						B: Body
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal C -->
		<div class="modal fade" id="C_Modal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" >
						C: Assessment/Exercises
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal D -->
		<div class="modal fade" id="D_Modal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" >
						D: Conclusion
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal E -->
		<div class="modal fade" id="E_Modal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" >
						E: Relationship
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal FT -->
		<div class="modal fade" id="FT_Modal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" >
						Feedback: Teaching Strategies
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal FL -->
		<div class="modal fade" id="FL_Modal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" >
						Feedback: Learning Impact
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal FM -->
		<div class="modal fade" id="FM_Modal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" >
						Feedback: Medium Use And How They Added to the learning Experience
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal FC-->
		<div class="modal fade" id="FC_Modal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" >
						Feedback: Comment
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<?php include '../Footer/footer.php'; ?>

	</section>

	<script src="Eval_Assets/js/Result.js?v=<?php echo time(); ?>">	</script>


	<script type='text/javascript'>
	var pie = document.getElementById('Pie').getContext('2d');
	var crt = new Chart(pie, {
		type: 'pie',
		data: {
			labels: [
				'A: Start Up',
				'B: Body',
				'C: Assessment/Exercies',
				'D: Conclusion',
				'E: Relationship'
			],
			datasets: [{
				label: 'My First Dataset',
				data: ['0', '0', '0', '0','0'],
				backgroundColor: [
					'rgb(255, 99, 132)',
					'rgb(255, 159, 64)',
					'rgb(255, 205, 86)',
					'rgb(75, 192, 192)',
					'rgb(54, 162, 235)'
				],
				hoverOffset: 7
			}]
		}
	});
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

	<!-- Pie Chart1 -->


</body>
</html>
