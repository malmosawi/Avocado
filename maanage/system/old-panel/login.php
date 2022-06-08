<?php
ob_start();
ob_end_flush();
session_start();

include('connection.php');
$l = 1;




if (isset($_POST['login'])) {





	$pass =  mysqli_real_escape_string($con, $_POST['pass']);
	$user =  mysqli_real_escape_string($con, $_POST['user']);

	$sql = "SELECT `id` FROM `users` WHERE `user_name`='$user' AND BINARY `password`='$pass' ";

	$result = $con->query($sql);


	if ($result->num_rows > 0) {
		$ro = $result->fetch_assoc();
		$_SESSION['id'] = $ro['id'];
		$_SESSION['login'] = 'OK';

		$id_u = $_SESSION['id'];


		header("location:index.php");
	} else {
		$l = 0;
	}
}

?>


<!doctype html>
<html lang="en" dir="rtl">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="Hogo– Creative Admin Multipurpose Responsive Bootstrap4 Dashboard HTML Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="html admin template, bootstrap admin template premium, premium responsive admin template, admin dashboard template bootstrap, bootstrap simple admin template premium, web admin template, bootstrap admin template, premium admin template html5, best bootstrap admin template, premium admin panel template, admin template"/>

		<!-- Favicon -->
		<link rel="icon" href="../assets/images/brand/favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" />

		<!-- Title -->
		<title>موقع افكادو</title>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">

		<!-- Dashboard css -->
		<link href="../assets/css/style.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!-- Sidemenu css -->
		<link href="../assets/plugins/toggle-sidebar/full-sidemenu.css" rel="stylesheet" />

		<!--Daterangepicker css-->
		<link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

		<!-- Sidebar Accordions css -->
		<link href="../assets/plugins/accordion1/css/easy-responsive-tabs.css" rel="stylesheet">

		<!-- Rightsidebar css -->
		<link href="../assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!---Font icons css-->
		<link href="../assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
		<link href="../assets/plugins/iconfonts/icons.css" rel="stylesheet" />
		<link  href="../assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">

		<link rel="stylesheet" href="../assets/fonts/font.css">

	</head>
	<body class="bg-account">
	    <!-- page -->
		<div class="page">
			<!-- page-content -->
			<div class="page-content">
				<div class="container text-center text-dark">
					<div class="row">
						<div class="col-lg-4 d-block mx-auto">
							<div class="row">
								<div class="col-xl-12 col-md-12 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="text-center mb-6">
												<img src="../../wp-content/uploads/2020/02/light.png" class="" alt="">
											</div>
											<h3>تسجيل دخول</h3>
											<?php
										if ($l == 0) {
											echo '
													<div class="alert alert-danger mb-2" role="alert">
														<span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
														<span class="alert-inner--text"><strong>خطأ !</strong> أسم المستخدم أو كلمة المرور خطأ</span>
													</div>
													';
										} else {
										}


										?>
										<form action="login.php" method="POST">
											<div class="input-group mb-3">
												<span class="input-group-addon bg-white"><i class="fa fa-user"></i></span>
												<input type="text" name="user" class="form-control" placeholder="اسم المستخدم">
											</div>
											<div class="input-group mb-4">
												<span class="input-group-addon bg-white"><i class="fa fa-unlock-alt"></i></span>
												<input type="password" name="pass" class="form-control" placeholder="كلمة المرور">
											</div>
											<div class="row">
												<div class="col-12">
													<input name="login" type="submit"  value="تسجيل الدخول" class="btn btn-primary btn-block">
												</div>
											</div>
										</form>
											<div class="mt-6 btn-list">
												<button type="button" class="btn btn-icon btn-facebook"><i class="fa fa-facebook"></i></button>
												<button type="button" class="btn btn-icon btn-instagram"><i class="fa fa-instagram"></i></button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- page-content end -->
		</div>
		<!-- page End-->

		<!-- Jquery js-->
		<script src="../assets/js/vendors/jquery-3.2.1.min.js"></script>

		<!--Bootstrap.min js-->
		<script src="../assets/plugins/bootstrap/popper.min.js"></script>
		<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Jquery Sparkline js-->
		<script src="../assets/js/vendors/jquery.sparkline.min.js"></script>

		<!-- Chart Circle js-->
		<script src="../assets/js/vendors/circle-progress.min.js"></script>

		<!-- Star Rating js-->
		<script src="../assets/plugins/rating/jquery.rating-stars.js"></script>

		<!-- Sidebar Accordions js -->
		<script src="../assets/plugins/accordion1/js/easyResponsiveTabs.js"></script>

		<!--Moment js-->
		<script src="../assets/plugins/moment/moment.min.js"></script>

		<!-- Daterangepicker js-->
		<script src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

		<!-- Custom scroll bar js-->
		<script src="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- Custom js-->
		<script src="../assets/js/custom.js"></script>

	</body>
</html>