<?php



if (isset($_POST['logout'])) {
  session_destroy();
  header('location: index.php');
}

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
  <link href="https://static.wixstatic.com/media/e1b08d_9630de59a9ae40c5954db56cb797b193~mv2.png/v1/fill/w_99,h_71,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/UnitedFront-LogoVector-BlackBg%20copy_edit.png" rel="icon" />


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

<body>
  <!-- ======= Top Bar ======= -->
  <!-- <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">info@example.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +1 5589 55488 55
      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section> -->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center headerT mainH">
    <div class="container d-flex align-items-center spaceEvenly">
      <div class="logo">
        <a href="index.html"><img src="https://static.wixstatic.com/media/e1b08d_9630de59a9ae40c5954db56cb797b193~mv2.png/v1/fill/w_99,h_71,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/UnitedFront-LogoVector-BlackBg%20copy_edit.png" alt="Gym Logo" /></a>
      </div>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" id="fakeHero" href="#hero">Home</a></li>

          <li><a class="nav-link scrollto" href="#about">About</a></li>

          <!-- <li>
            <a class="nav-link scrollto" href="#values">Values</a>
          </li> -->
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#package">Package</a></li>
          <!-- <li><a class="nav-link scrollto" href="#calender">Calender</a></li> -->
          <li><a class="nav-link scrollto" href="#schedule1">Schedule</a></li>

          <!-- <li class="dropdown">
              <a href="#"
                ><span>Drop Down</span> <i class="bi bi-chevron-down"></i
              ></a>
              <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="dropdown">
                  <a href="#"
                    ><span>Deep Drop Down</span>
                    <i class="bi bi-chevron-right"></i
                  ></a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Drop Down 2</a></li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
              </ul>
            </li> -->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li>
            <!-- Example single danger button -->
            <!-- <div class="btn-group">
              <a type="button" class="btn nav-link scrollto dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img style="width:80px;height: 80px; margin-top:20px;" src="assets/img/login.jpg" alt="User Imgae">
                Action
              </a>
              <div style="margin-top:100px;background-color: white;" class="dropdown-menu ">
                <form action="" method="POST">
                  <button type="submit" style="color: black;" class="dropdown-item " href="#">Logout</button>
                </form>

              </div>
            </div> -->

            <?php



            if (isset($_SESSION['trainer_id'])) {
              $trainer_id = $_SESSION['trainer_id'];
              $query = "SELECT * FROM trainer WHERE trainer_id = '$trainer_id'";
              $t = mysqli_query($db, $query);
              while ($tresult = mysqli_fetch_array($t)) {

            ?>
                <div class="btn-group">
                  <a type="button" class="btn nav-link scrollto dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img style="width:70px;height: 70px; margin-top:20px;margin-right:7px; border-radius:50%;" src="admin/newimgs/<?php echo $tresult['img']; ?>" alt="User Imgae">
                    <?php echo $tresult['name']; ?>
                  </a>
                  <div style="margin-top:100px;background-color: white;" class="dropdown-menu ">
                    <form action="header.php" method="POST">
                      <button type="submit" style="color: black;" class="dropdown-item " name="logout">Logout</button>
                    </form>

                  </div>
                </div>

              <?php
              }
            } else if (isset($_SESSION['customer_id'])) {
              $customer_id = $_SESSION['customer_id'];
              $query = "SELECT * FROM customer WHERE customer_id = '$customer_id'";
              $t = mysqli_query($db, $query);
              while ($tresult = mysqli_fetch_array($t)) {

              ?>
                <div class="btn-group">
                  <a type="button" class="btn nav-link scrollto dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img style="width:70px;height: 70px; margin-top:20px;margin-right:7px; border-radius:50%;" src="admin/newimgs/<?php echo $tresult['img']; ?>" alt="User Image">
                    <?php echo $tresult['name']; ?>
                  </a>
                  <div style="margin-top:100px;background-color: white;" class="dropdown-menu ">
                    <form action="header.php" method="POST">
                      <button type="submit" style="color: black;" class="dropdown-item " name="logout">Logout</button>
                    </form>

                  </div>
                </div>

            <?php

              }
            } else {
              echo "<a class='nav-link scrollto' href='login.php'>Login</a>";
            };

            ?>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
      <h1>Let's Live Better Together.</h1>
      <h2>
        It's time for change. At United Front Community Fitness, we stand
        together in unity. We Live Better – together.
      </h2>
      <a href="#package" class="btn-get-started scrollto">Avaliable Packages</a>

      <a href="#contact" class="btn-get-started btn_second scrollto">Contact Us</a>
    </div>
  </section>
  <!-- End Hero -->