<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Login Page - Ace Admin</title>

	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

	<!-- text fonts -->
	<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="assets/css/ace.min.css" />

	<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
	<script src="assets/js/jquery-2.1.4.min.js"></script>

</head>

<body class="login-layout blur-login">
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-container">
						<div class="center">
							<h1>
								
								<span class="white" id="id-text2">Distribution Management System</span>
							</h1>

							<h4 class="light-blue" id="id-company-text">S.A.P. Distributors</h4>
						</div>

						<div class="space-6"></div>

						<div class="position-relative">
							<div id="login-box" class="login-box visible widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header blue lighter bigger">
											<i class="ace-icon fa fa-angle-double-right green"></i>
											Please Enter Your Information
										</h4>

										<div class="space-6"></div>

										<form>
											<fieldset>
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" id="textname" class="form-control" placeholder="Username" />
														<i class="ace-icon fa fa-user"></i>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="password" id="textpass" class="form-control" placeholder="Password" />
														<i class="ace-icon fa fa-lock"></i>
													</span>
												</label>

												<div class="space"></div>

												<div class="clearfix">

													<button type="button" id="btnsubmit" class="width-35 pull-right btn btn-sm btn-primary">
														<i class="ace-icon fa fa-key"></i>
														<span class="bigger-110">Login</span>
													</button>
												</div>

												<div class="space-4"></div>
											</fieldset>
										</form>


									</div>

									<div class="toolbar clearfix">
										<div>
											<a href="#" data-target="#forgot-box" class="forgot-password-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												I forgot my password
											</a>
										</div>


									</div>
								</div>
							</div>

							<div id="forgot-box" class="forgot-box widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header red lighter bigger">
											<i class="ace-icon fa fa-key"></i>
											Retrieve Password
										</h4>

										<div class="space-6"></div>
										<p>
											Contact System Administrator to reset password
										</p>
										<p>

										</p>


									</div>

									<div class="toolbar center">
										<a href="#" data-target="#login-box" class="back-to-login-link">
											Back to login
											<i class="ace-icon fa fa-arrow-right"></i>
										</a>
									</div>
								</div>
							</div>


						</div>


					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="assets/js/jquery-2.1.4.min.js"></script>


	<script type="text/javascript">
		if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
	</script>


	<script type="text/javascript">
		jQuery(function($) {
			$(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible'); 
				$(target).addClass('visible'); 
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#btnsubmit").click(function() { 

				var uname = $("#textname").val();
				var pass = $("#textpass").val();
				$.post("controllers/controller_login.php", {
					uname: uname,
					pass: pass
				}, function(data, status) {
					if (data == "1") {
						alert("Invalid Username or Password");
					}
					if (data == "2") {
						alert("Inactive User Account");
					}
					if (data == "3") {
						window.location.href = "controllers/controller_route.php";
					} else {
					}
				});
			});
			
		});
	</script>
</body>

</html>