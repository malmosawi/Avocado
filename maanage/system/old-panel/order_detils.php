
<?php
ob_start();
ob_end_flush();
session_start();

include('connection.php');


if ($_SESSION['login'] != 'OK' ){
	header("location:login.php" );
// 	exit();
}
// لمنع دخول الصفحة بدون تسجيل دخول


if(isset($_GET['order'])){

	$pro = $_GET['order'] ;


	$sql_pro="SELECT * from `order` WHERE `order_id` = '$pro'";
	$quer_pro=mysqli_query($con, $sql_pro);
	$orderDe=mysqli_fetch_assoc($quer_pro);


	$sqlProd="SELECT * from `order_details` LEFT JOIN `products` ON `order_details`.`product_id` = `products`.`product_id` WHERE `order_details`.`order_id`  = '$pro'   ";
	$querProd=mysqli_query($con, $sqlProd);
}

if (isset($_GET['delete'])) {

	$delete = $_GET['delete'];
  
	$sql_delete="DELETE FROM `order` WHERE `order_id` = '$delete'";
	$quer_delete=mysqli_query($con, $sql_delete) or die(mysqli_error($con));

	$sqlAllCon="DELETE FROM `order_details` WHERE `order_id` = '$delete'";
	$querAllcon=mysqli_query($con, $sqlAllCon) or die(mysqli_error($con));


	header("location:new_order.php");
  
  }



  if(isset($_POST['edit'])){



	if ($_FILES['p1']['size'] > 0) {
		$target_file = $target_dir . basename($_FILES["p1"]["name"]);
		$ta = substr($target_file, -1);
		if ($ta === 'x') {
			$filename_p1 = uniqid() . ".jpg";
			$target_dir = "../../product_img/";
			$target_file = $target_dir . basename($filename_p1);
		} else {
			$filename_p1 = uniqid() . ".png";
			$target_dir = "../../product_img/";
			$target_file = $target_dir . basename($filename_p1);
		}
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
		$check = getimagesize($_FILES["p1"]["tmp_name"]);
		if ($check !== false) {
			$uploadOk = 1;
		}
		if ($uploadOk == 0) {
			//echo "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($_FILES["p1"]["tmp_name"], $target_file)) {
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				// echo "Sorry, there was an error uploading your file.";
			}
		}
	}

	if ($_FILES['p2']['size'] > 0) {
		$target_file = $target_dir . basename($_FILES["p2"]["name"]);
		$ta = substr($target_file, -1);
		if ($ta === 'x') {
			$filename_p2 = uniqid() . ".jpg";
			$target_dir = "../../product_img/";
			$target_file = $target_dir . basename($filename_p2);
		} else {
			$filename_p2 = uniqid() . ".png";
			$target_dir = "../../product_img/";
			$target_file = $target_dir . basename($filename_p2);
		}
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
		$check = getimagesize($_FILES["p2"]["tmp_name"]);
		if ($check !== false) {
			$uploadOk = 1;
		}
		if ($uploadOk == 0) {
			//echo "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($_FILES["p2"]["tmp_name"], $target_file)) {
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				// echo "Sorry, there was an error uploading your file.";
			}
		}
	}

	if ($_FILES['p3']['size'] > 0) {
		$target_file = $target_dir . basename($_FILES["p3"]["name"]);
		$ta = substr($target_file, -1);
		if ($ta === 'x') {
			$filename_p3 = uniqid() . ".jpg";
			$target_dir = "../../product_img/";
			$target_file = $target_dir . basename($filename_p3);
		} else {
			$filename_p3 = uniqid() . ".png";
			$target_dir = "../../product_img/";
			$target_file = $target_dir . basename($filename_p3);
		}
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
		$check = getimagesize($_FILES["p3"]["tmp_name"]);
		if ($check !== false) {
			$uploadOk = 1;
		}
		if ($uploadOk == 0) {
			//echo "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($_FILES["p3"]["tmp_name"], $target_file)) {
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				// echo "Sorry, there was an error uploading your file.";
			}
		}
	}

	if ($_FILES['p4']['size'] > 0) {
		$target_file = $target_dir . basename($_FILES["p4"]["name"]);
		$ta = substr($target_file, -1);
		if ($ta === 'x') {
			$filename_p4 = uniqid() . ".jpg";
			$target_dir = "../../product_img/";
			$target_file = $target_dir . basename($filename_p4);
		} else {
			$filename_p4 = uniqid() . ".png";
			$target_dir = "../../product_img/";
			$target_file = $target_dir . basename($filename_p4);
		}
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
		$check = getimagesize($_FILES["p4"]["tmp_name"]);
		if ($check !== false) {
			$uploadOk = 1;
		}
		if ($uploadOk == 0) {
			//echo "Sorry, your file was not uploaded.";
		} else {
			if (move_uploaded_file($_FILES["p4"]["tmp_name"], $target_file)) {
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				// echo "Sorry, there was an error uploading your file.";
			}
		}
	}




	$one = $_POST['one'];
	$two = $_POST['two'];
	$three = $_POST['three'];
	$four = $_POST['four'];
	$five = $_POST['five'];


	if( $filename_p1 == ''){ $pho_one = $one;}else{ $pho_one = $filename_p1 ;}
	if( $filename_p2 == ''){ $pho_two = $two;}else{ $pho_two = $filename_p2 ;}
	if( $filename_p3 == ''){ $pho_three = $three;}else{ $pho_three = $filename_p3 ;}
	if( $filename_p4 == ''){ $pho_four = $four;}else{ $pho_four = $filename_p4 ;}

	$p_name		=$_POST['p_name'];
	$p_price	=$_POST['p_price'];
	$p_type		=$_POST['p_type'];
	$p_brief	=$_POST['p_brief'];
	$rank		=$_POST['rank'];
	$details	=$_POST['details'];
	$show 		=$_POST['show'];
	$ingredients=$_POST['ingredients'];

	for ($i=0; $i <= 2; $i++) { 
		$type .= $p_type[$i].' ' ; 
	}


	$sql_update="UPDATE `products` SET `product_name` = '$p_name',
										`product_price` = '$p_price',
										`product_class` = '$type',
										`brief` = '$p_brief',
										`details` = '$details',
										`ingredients`= '$ingredients',
										`rank`	 = '$rank',
										`photo1` = '$pho_one',
										`photo2` = '$pho_two',
										`photo3` = '$pho_three',
										`photo4` = '$pho_four',
										`show` = '$show' WHERE `product_id` = '$pro'";
	$quer_update=mysqli_query($con, $sql_update);


	$sql_pro="SELECT * from `products` WHERE `product_id` = '$pro'";
	$quer_pro=mysqli_query($con, $sql_pro);

	$data_pro = mysqli_fetch_assoc($quer_pro);
}

if(isset($_GET['supply'])){

	$idSupply = $_GET['supply'];

	$sqlupdate="UPDATE `order` SET `order_status` = 3 WHERE `order_id` = '$idSupply' ";
	$qeruypdate=mysqli_query($con, $sqlupdate);

	echo "<script>alert('تم تجهيز الطلب بنجاح')</script>";
	
	
	header("location:new_order.php");

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

		<!-- Sidebar Accordions css -->
		<link href="../assets/plugins/accordion1/css/easy-responsive-tabs.css" rel="stylesheet">

		<!-- Rightsidebar css -->
		<link href="../assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!---Font icons css-->
		<link href="../assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
		<link href="../assets/plugins/iconfonts/icons.css" rel="stylesheet" />
		<link  href="../assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">

		<!--Select2 css -->
		<link href="../assets/plugins/select2/select2.min.css" rel="stylesheet" />

		<!-- Time picker css-->
		<link href="../assets/plugins/time-picker/jquery.timepicker.css" rel="stylesheet" />

		<!-- Date Picker css-->
		<link href="../assets/plugins/date-picker/spectrum.css" rel="stylesheet" />

		<!-- File Uploads css-->
        <link href="../assets/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />

		<!--Mutipleselect css-->
		<link rel="stylesheet" href="../assets/plugins/multipleselect/multiple-select.css">

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
								<li><a href="login.html" title="logout"><i class="fa fa-power-off fs-17"></i></a></li>
							</ul>
						</div>
					</div>

					<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
						<div class="tab-content">
							<div class="tab-pane active " id="index1">
								<ul class="side-menu toggle-menu">
									<li>
										<a class="side-menu__item"  href="index.php"><i class="side-menu__icon typcn typcn-device-desktop"></i><span class="side-menu__label">الرئيسية</span></a>
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
					

						<!-- page-header -->
						<div class="page-header">
							<ol class="breadcrumb"><!-- breadcrumb -->
								<li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
								<li class="breadcrumb-item active" aria-current="page"> الطلبات</li>
                                <li class="breadcrumb-item active" aria-current="page">طلب رقم : <?php echo $orderDe['order_num'] ; ?></li>

							</ol><!-- End breadcrumb -->
						</div>
						<!-- End page-header -->




						<!-- row -->
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="mb-0 card-title">كافة تفاصيل المنتج</h3>
                                         

									</div>
									<div class="card-body">
										<form action="#" method="POST" novalidate="" enctype="multipart/form-data">
										<div class="row">
											
											<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">اسم العميل</label>
													<input type="text" readonly class="form-control" name="p_name" value="<?php echo $orderDe['cust_name']; ?>" placeholder="اكتب هنا">
												</div>
												
												<div class="form-group">
													<label class="form-label">رقم الهاتف</label>
													<input type="text" readonly class="form-control" name="p_price" placeholder="اكتب هنا" value="<?php echo $orderDe['cost_phone']; ?>" >
												</div>

												<div class="form-group">
													<label class="form-label">العنوان</label>
													<input type="text" readonly class="form-control" name="rank" placeholder="اكتب هنا" value="<?php echo $orderDe['cost_addres']; ?>" >
												</div>

											</div>
																						
											<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">المبلغ الكلي</label>
													<input type="text" readonly class="form-control" name="rank" placeholder="اكتب هنا" value="<?php echo number_format($orderDe['total_amount']); ?>" >
												</div>

												<div class="form-group">
													<label class="form-label">تاريخ ووقت الطلب</label>
													<input type="text" readonly class="form-control" name="rank" placeholder="اكتب هنا" value="<?php echo $orderDe['date_order']; ?>" >
												</div>
    
                                                <div class="form-group">
													<label class="form-label">الملاحظات</label>
													<input type="text" readonly class="form-control" name="rank" placeholder="" value="<?php echo $orderDe['ornote']; ?>" >
												</div>

											</div>
										</div>

										<hr style="width: 50%;">

										<div class="row">
										
											<div class="col-md-12">
												<table class="table table-bordered" style="text-align:center;">
													<thead>
														<tr>
															<th>ت</th>
															<th>اسم المادة</th>
															<th>سعر المفرد</th>
															<th>الكمية</th>
															<th>السعر الكلي</th>
														</tr>
													</thead>
													<tbody>
														<?php
															$i = 0 ;
															$total = 0 ;
															while( $row = mysqli_fetch_assoc($querProd)){
																$i++ ;
																echo '
																	<tr>
																		<td>'.$i.'</td>
																		<td>'.$row['product_name'].'</td>
																		<td>'.$row['product_price'].'</td>
																		<td>'.$row['product_quantity'].'</td>
																		<td>'.$row['product_quantity'] * $row['product_price'].' </td>
																	</tr>
																
																';

																$total += ($row['product_quantity'] * $row['product_price']);
															}
														
														
														?>
													</tbody>
													<tfoot>
														<tr>
															<td colspan="4">المجموع الكلي </td>
															<td><?php echo number_format($total); ?> </td>
														</tr>
													</tfoot>
												</table>
											</div>

										</div>

										
									
											<?php if($orderDe['order_status'] != 3 ): ?>
											<div class="row">
												<div class="col-md-12" style="text-align:center;">
												
												<?php echo '<a style="width: 21%;"  onclick=\'return confirm("هل انت متأكد من تجهيز الطلب ؟ ")\'	href="order_detils.php?supply=' . $orderDe['order_id'] . '" style="width: 21%;"  class="btn btn-warning mt-4 mt-sm-0" type="button">تجهيز</a>'?>
												<?php echo '<a onclick=\'return confirm("هل انت متأكد من عملية الحذف ؟ ")\'	href="order_detils.php?delete=' . $orderDe['order_id'] . '" style="width: 21%;"  class="btn btn-danger mt-4 mt-sm-0" type="submit">حذف</a>'?>

		
												</div>
											</div>
											<?php endif ; ?>
										</form>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>



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

		<!-- Rightsidebar js -->
		<script src="../assets/plugins/sidebar/sidebar.js"></script>

		<!-- File uploads js -->
		<script src="../assets/plugins/fileuploads/js/dropify.js"></script>
		<script src="../assets/plugins/fileuploads/js/dropify-demo.js"></script>

		<!--Select2 js -->
		<script src="../assets/plugins/select2/select2.full.min.js"></script>
		<script src="../assets/js/select2.js"></script>

		<!--Time Counter js-->
		<script src="../assets/plugins/counters/jquery.missofis-countdown.js"></script>
		<script src="../assets/plugins/counters/counter.js"></script>

		<!-- Timepicker js -->
		<script src="../assets/plugins/time-picker/jquery.timepicker.js"></script>
		<script src="../assets/plugins/time-picker/toggles.min.js"></script>

		<!-- Datepicker js -->
		<script src="../assets/plugins/date-picker/spectrum.js"></script>
		<script src="../assets/plugins/date-picker/jquery-ui.js"></script>
		<script src="../assets/plugins/input-mask/jquery.maskedinput.js"></script>

		<!--MutipleSelect js-->
		<script src="../assets/plugins/multipleselect/multiple-select.js"></script>
		<script src="../assets/plugins/multipleselect/multi-select.js"></script>

		<!-- Custom js-->
		<script src="../assets/js/custom.js"></script>

	</body>
</html>
?>