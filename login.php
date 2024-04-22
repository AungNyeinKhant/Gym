<?php

session_start();


include("admin/include/config.php");

if (isset($_POST['login'])) {
	$email = $_POST['ademail'];
	//echo $email;
	$password = $_POST['adpassword'];
	//echo $password;

	if (isset($_POST['trainer'])) {
		$trainer = $_POST['trainer'];
	} else {
		$trainer = 0;
	}




	if ($trainer == "trainer") {

		$query = "SELECT * FROM trainer WHERE status=1  ";
		$adresult = mysqli_query($db, $query);

		while ($adanswer = mysqli_fetch_array($adresult)) {
			$dbemail = $adanswer['email'];
			$dbpassword = $adanswer['password'];

			if ($email == $dbemail && $password == $dbpassword) {
				$_SESSION['trainer_id'] = $adanswer['trainer_id'];
				$_SESSION['trainer_name'] = $adanswer['name'];
				$_SESSION['trainer_img'] = $adanswer['img'];

				header("location: index.php");
				break;
			}
		};


		echo "<script> alert('Incorrect try again')</script>";
	} else {
		$query = "SELECT * FROM customer WHERE status=1  ";

		$adresult = mysqli_query($db, $query);

		while ($adanswer = mysqli_fetch_array($adresult)) {
			$dbemail = $adanswer['email'];
			$dbpassword = $adanswer['password'];

			if ($email == $dbemail && $password == $dbpassword) {
				$_SESSION['customer_id'] = $adanswer['customer_id'];
				$_SESSION['customer_name'] = $adanswer['name'];
				$_SESSION['customer_img'] = $adanswer['img'];


				header("location: index.php");
				break;
			}
		};


		echo "<script> alert('Incorrect try again')</script>";
	}
};



?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<title>UNITED FRONT COMMUNITY FITNESS</title>
	<meta content="" name="description" />
	<meta content="" name="keywords" />

	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon" />
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

	<!-- Vendor CSS Files -->
	<link href="assets/vendor/aos/aos.css" rel="stylesheet" />
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet" />


	<!-- =======================================================

    
  
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="background-image: url('assets/img/login.jpg');
height: 100%;
background-position: center;
background-repeat: no-repeat;
background-size: cover;">
	<div class="container">
		<div class="row">

			<div class="col-md-6">
				<div class="loginRight">
					<div class="row">
						<div class=" col-2">
							<img class="img-fluid" src="https://static.wixstatic.com/media/e1b08d_9630de59a9ae40c5954db56cb797b193~mv2.png/v1/fill/w_99,h_71,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/UnitedFront-LogoVector-BlackBg%20copy_edit.png" alt="Gym Logo">
						</div>
						<div style="text-align: center; margin-bottom: 50px;" class="col-8">
							<h3 style="color: white;">Welcomed From United Front Login</h3>
						</div>
						<div class="col-2">
							<img class="img-fluid" src="https://static.wixstatic.com/media/e1b08d_9630de59a9ae40c5954db56cb797b193~mv2.png/v1/fill/w_99,h_71,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/UnitedFront-LogoVector-BlackBg%20copy_edit.png" alt="Gym Logo">
						</div>
					</div>

					<!-- form Start Here -->
					<form class="user" method="POST">
						<div class="form-group">
							<input type="email" class="form-control" id="ademail" name="ademail" aria-describedby="emailHelp" placeholder="Email">
							<br /><br />
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="exampleInputPassword" name="adpassword" placeholder="Password">
							<!-- <small class="form-text text-muted">Do not share your password with others.</small> -->
							<br />
						</div>
						<div class="form-group">

							<input id="trainer" class="" type="checkbox" value="trainer" name="trainer" style="width: 20px;height: 20px;">
							<label for="trainer" style="color: #5b7c99;">Tick only if you are a trainer</label>
						</div>
						<br />

						<div class="form-group">
							<button type="submit" name="login" style="background-color: #2C806F;color : whitesmoke;width: 100%;" class="btn  btn-block">Login</button>
						</div>

					</form>
				</div>
			</div>

			<div class="col-md-6">
				<!-- <img class="img-fluid" src="assets/img/loginFinal.jpg" alt="Gym login img"> -->
			</div>

		</div>
	</div>
</body>

</html>