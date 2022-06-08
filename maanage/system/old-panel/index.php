<?php
ob_start();
ob_end_flush();
session_start();

include('connection.php');


if ($_SESSION['login'] != 'OK' ){
	header("location:login.php" );
	exit();
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
		<title>موقع افكادو </title>

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

		<!-- Rightsidebar css -->
		<link href="../assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!-- Sidebar Accordions css -->
		<link href="../assets/plugins/accordion1/css/easy-responsive-tabs.css" rel="stylesheet">

		<!-- Owl Theme css-->
		<link href="../assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

		<!-- Morris  Charts css-->
		<link href="../assets/plugins/morris/morris.css" rel="stylesheet" />

		<!---Font icons css-->
		<link href="../assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
		<link href="../assets/plugins/iconfonts/icons.css" rel="stylesheet" />
		<link  href="../assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">

		<link rel="stylesheet" href="../assets/fonts/font.css">

	</head>

	<body class="app sidebar-mini rtl">

		<!--Global-Loader-->
		<div id="global-loader">
			<img src="../assets/images/icons/loader.svg" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">

				<!--app-header-->
				<div class="app-header header d-flex">
					<div class="container-fluid">
						<div class="d-flex">
						    <a class="header-brand" href="index.html">
								<img src="../../wp-content/uploads/2020/02/light.png" class="header-brand-img main-logo" alt="">
							</a><!-- logo-->
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
							
							
							<div class="d-flex order-lg-2 mr-auto header-rightmenu">
								<div class="dropdown">
									<a  class="nav-link icon full-screen-link" id="fullscreen-button">
										<i class="fe fe-maximize-2"></i>
									</a>
								</div><!-- full-screen -->

							</div>
						</div>
					</div>
				</div>
				<!--app-header end-->

				<!-- Sidebar menu-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar toggle-sidebar">
					<div class="app-sidebar__user pb-0">
						<div class="user-body">
							<span class="avatar avatar-xxl brround text-center cover-image" data-image-src="../assets/images/users/female/33.png"></span>
						</div>
						<div class="user-info">
							<a href="#" class="ml-2"><span class="text-dark app-sidebar__user-name font-weight-semibold">Zainab</span><br>
								<span class="text-muted app-sidebar__user-name text-sm">Managment</span>
							</a>
						</div>
					</div>

					<div class="tab-menu-heading siderbar-tabs border-0  p-0">
						<div class="tabs-menu ">
							<!-- Tabs -->
							<ul class="nav panel-tabs">
								<li class=""><a href="#index1" class="active" data-toggle="tab"><i class="fa fa-home fs-17"></i></a></li>
								<li><a href="logout.php" title="logout"><i class="fa fa-power-off fs-17"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
						<div class="tab-content">
							<div class="tab-pane active " id="index1">
								<ul class="side-menu toggle-menu">
									<li class="slide">
										<a class="side-menu__item"  data-toggle="slide" href="index.php"><i class="side-menu__icon typcn typcn-device-desktop"></i><span class="side-menu__label">الرئيسية</span></a>
									</li>
									<li class="slide">
										<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon typcn typcn-th-large-outline"></i><span class="side-menu__label">المنتجات</span><i class="angle fa fa-angle-left"></i></a>
										<ul class="slide-menu">
											<li><a href="add_new.php" class="slide-item">إضافة منتج جديد</a></li>
											<li><a href="display_products.php" class="slide-item"> عرض كافة المنتجات </a></li>
										</ul>
									</li>
									<li>
										<a class="side-menu__item" href="new_order.php"><i class="side-menu__icon fa fa-server"></i><span class="side-menu__label">الطلبات الجديدة</span></a>
									</li>
									<li>
										<a class="side-menu__item" href="last_order.php"><i class="side-menu__icon fa fa-folder-open"></i><span class="side-menu__label">الطلبات السابقة</span></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</aside>
				<!--sidemenu end-->

                <!-- app-content-->
				<div class="app-content  my-3 my-md-5 toggle-content">
					<div class="side-app">


						<div class="row" style="margin-bottom: 5%;margin-top: 10%;">
							<div class="col-md-12">
							
								<img src="../../wp-content/uploads/2020/02/light.png" alt="">

							</div>
						</div>


					</div><!--End side app-->


					<!--footer-->
					<footer class="footer">
						<div class="container">
							<div class="row align-items-center flex-row-reverse">
								<div class="col-lg-12 col-sm-12   text-center">
									Designed by <a href="https://it.ubc-iraq.com/">United Business Corner - IT</a> 
								</div>
							</div>
						</div>
					</footer>
					<!-- End Footer-->

				</div>
				<!-- End app-content-->
			</div>
		</div>
		<!-- End Page -->

		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

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

		<!--Moment js-->
		<script src="../assets/plugins/moment/moment.min.js"></script>

		<!-- Daterangepicker js-->
		<script src="../assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

		<!--Side-menu js-->
		<script src="../assets/plugins/toggle-sidebar/sidemenu.js"></script>

		<!-- Sidebar Accordions js -->
		<script src="../assets/plugins/accordion1/js/easyResponsiveTabs.js"></script>

		<!-- Custom scroll bar js-->
		<script src="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--Owl Carousel js -->
		<script src="../assets/plugins/owl-carousel/owl.carousel.js"></script>
		<script src="../assets/plugins/owl-carousel/owl-main.js"></script>

		<!-- Rightsidebar js -->
		<script src="../assets/plugins/sidebar/sidebar.js"></script>

		<!-- Charts js-->
		<script src="../assets/plugins/chart/chart.bundle.js"></script>
		<script src="../assets/plugins/chart/utils.js"></script>

		<!--Time Counter js-->
		<script src="../assets/plugins/counters/jquery.missofis-countdown.js"></script>
		<script src="../assets/plugins/counters/counter.js"></script>

		<!--Morris  Charts js-->
		<script src="../assets/plugins/morris/raphael-min.js"></script>
		<script src="../assets/plugins/morris/morris.js"></script>

		<!-- Custom-charts js-->
		<script src="../assets/js/index1.js"></script>

		<!-- Custom js-->
		<script src="../assets/js/custom.js"></script>
	</body>
</html>