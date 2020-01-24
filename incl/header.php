
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title id="titletext">Blank Page - Ace Admin</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="../assets/datatables/css/dataTables.bootstrap.min.css" />
    	<!-- <link rel="stylesheet" href="../assets/sweetalert/css/sweetalert.css" /> -->
    	<link rel="stylesheet" href="../assets/css/jquery-ui.min.css" />
    	<link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.min.css" />
<!-- 		<link rel="stylesheet" href="../assets/jqueryui/jquery-ui.min.css" /> -->
		<link rel="stylesheet" href="../assets/css/ui.jqgrid.min.css" />
		<link rel="stylesheet" href="../assets/css/fullcalendar.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="../assets/js/jquery-2.1.4.min.js"></script>

		<script src="../assets/jquery/js/jquery.js"></script>
		<script src="../assets/jquery/js/jquery.min.js"></script>
		<script src="../assets/jqueryui/jquery-ui.min.js"></script>
		<script src="../assets/datatables.min.js"></script>
        <script src="../assets/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../assets/datatables/js/dataTables.bootstrap.min.js"></script>
<!-- 		<script src="../assets/datatables/js/jquery.dataTables.min.js"></script> -->
		<script src="../assets/js/ace-extra.min.js"></script>

<!-- 		<script src="../assets/js/bootstrap.min.js"></script> -->
		<script src="../assets/sweetalert2/sweetalert2.all.min.js"></script>
		
		<script src="../assets/Buttons-1.6.0/js/dataTables.buttons.min.js"></script>
		<script src="../assets/Buttons-1.6.0/js/buttons.flash.min.js"></script>
		<script src="../assets/Buttons-1.6.0/js/buttons.html5.min.js"></script>
		<script src="../assets/Buttons-1.6.0/js/buttons.print.min.js"></script>
		<script src="../assets/Buttons-1.6.0/js/buttons.colVis.min.js"></script>
		<script src="../assets/js/dataTables.select.min.js"></script>
		<script src="../assets/js/jquery.validate.min.js"></script>
		<!-- <script src="../assets/js/bootstrap-datepicker.min.js"></script>	 -->
		<script src="../assets/js/moment.min.js"></script>	
		<script src="../assets/js/fullcalendar.min.js"></script>	
		<!-- <script src="../assets/js/fullcalendar.print.min.css"></script>	 -->
		<!-- <script src="../assets/js/fullcalendar.min.js"></script>	 -->
		<script src="../assets/js/bootbox.js"></script>

		<script src="../assets/jspdf/jspdf.js"></script>
		<script src="../assets/jspdf/jspdf.debug.js"></script>
		<script src="../assets/jspdf/jspdf.customfonts.min.js"></script>
		<script src="../assets/jspdf/jspdf.plugin.autotable.min.js"></script>
		<script src="../assets/jspdf/jquery.tabletojson.min.js"></script>
		<!--  -->
<!-- <script src="../assets/js/buttons/datatables.min.js"></script>
<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="../assets/js/dataTables.buttons.min.js"></script>
<script src="../assets/js/buttons.flash.min.js"></script>
<script src="../assets/js/buttons.html5.min.js"></script>
<script src="../assets/js/buttons.print.min.js"></script>
<script src="../assets/js/buttons.colVis.min.js"></script>
<script src="../assets/js/dataTables.select.min.js"></script> -->
		<!--  -->




		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							SAP DMS
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">






						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $_SESSION["user"]["uname"]; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<!-- <li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li> -->

								<li class="divider"></li>

								<li> 
									<a href="../controllers/controller_logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
			
	



				