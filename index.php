<?php
//session
session_start();
//connect DB
include("admin/include/config.php");

if (isset($_SESSION['customer_id'])) {

  //  customer edit in comment
  $hideuser = $_SESSION['customer_name'];
  //echo $hideuser;
} else if (isset($_SESSION['trainer_id'])) {
  //  for customer edit in comment
  $hideuser = $_SESSION['trainer_name'];
  //echo $hideuser;
}
//customer register functions
if (isset($_POST["tbtn"])) {

  $name = $_POST["tname"];
  //echo "$name";
  $phone = $_POST["tphone"];
  //echo "$phone";
  $gender = $_POST["tgender"];
  //echo "$gender";
  $email = $_POST["temail"];
  //echo "$email";
  $password = $_POST["tpassword"];
  //echo "$password";
  $address = $_POST["taddress"];
  //echo "$address";
  $nrc = $_POST["tnrc"];




  //$image
  $filename = $_FILES["timage"]["name"];

  $tempname = $_FILES["timage"]["tmp_name"];

  $folder = "admin/newimgs/" . $filename;



  //echo "$bankname";


  //get all data from form
  //$uploadquery = "INSERT INTO customer (name,imgfile,phone,address,bankname,bankno,gmail,password,gender,status) VALUES ($name,$filename,$phone,$address,$bankname,$bankno,$email,$password,$gender,1) ";
  $sql = "INSERT INTO customer (name,img,phone,gender,nrc,address,email,password,status) VALUES ('$name','$filename','$phone','$gender','$nrc','$address','$email','$password',1) ";
  //$sql = "INSERT INTO `customer` ( `name`, `imgfile`, `phone`, `address`, `bankname`, `bankno`, `gmail`, `password`, `gender`, `status`) VALUES ($name,$filename,$phone,$address,$bankname,$bankno,$email,$password,$gender, '1');";


  //$sql = "INSERT INTO user(name,email,address,phone,zip,status) VALUES('$name','$email','$address', '$phone', '$zip',1) ";
  mysqli_multi_query($db, $sql);
  // echo "<p style='color:red;'>Saved</p>";
  // echo "<br />";


  if (move_uploaded_file($tempname, $folder)) {
    echo "<script> alert('Uploaded successfully!')</script>";
  } else {
    echo "<script> alert('Failed to upload!')</script>";
  }

  //echo "<script>alert('Saved');</script>";
}

//customer register end here

//Package Purchase function
if (isset($_POST["sbtn"])) {


  if (isset($_SESSION['customer_id'])) {
    $customer = $_SESSION['customer_name'];
  }

  if ($_POST['trainer'] == 0) {

    $trainer = "No Trainer";
    $trainerPrice = 0;
  } else {
    $trainer_id = $_POST['trainer'];
    $trainerSql = "SELECT * FROM trainer WHERE trainer_id='$trainer_id'";
    $tresult1 = mysqli_query($db, $trainerSql);
    $trainerR = mysqli_fetch_array($tresult1);

    $trainer = $trainerR['name'];
    $trainerPrice = $trainerR['trainerp'];
  }

  $package_id = $_POST['package'];
  $packageSql = "SELECT * FROM package WHERE package_id='$package_id'";
  $presult1 = mysqli_query($db, $packageSql);
  $packageR = mysqli_fetch_array($presult1);

  $package = $packageR['name'];
  $packagePrice = $packageR['price'];

  $schedule = $_POST['schedule'];

  $total = $trainerPrice + $packagePrice;

  $sql = "INSERT INTO schedule (customer,trainer,package,schedule,total,status) VALUES ('$customer','$trainer','$package','$schedule','$total',1) ";

  $check = mysqli_multi_query($db, $sql);

  if ($check) {
    echo "<script>
      alert('Total Price: (Package Price: $ $packagePrice + Trainer Price: $ $trainerPrice) = $  $total,')
    </script>";
    //echo "world";
  } else {
    echo "Hiii";
  }
  /*
    echo "<hr style='border-color: black;' />";
    echo "<h3>";
    echo "Package Price: $" . $packagePrice;
    echo "</h3>";

    echo "<h3>";
    echo "Trainer Price: $" . $trainerPrice;
    echo "</h3>";

    echo "<br />";

    echo "<h1>";
    echo "Total Price: $" . $total;
    echo "</h1>";
    */
}
//Package Purchase Function end

// Comment add Function
if (isset($_POST['postBtn'])) {

  if (isset($_SESSION['customer_id'])) {
    $username = $_SESSION['customer_name'];
    $userimg = $_SESSION['customer_img'];
  } else if (isset($_SESSION['trainer_id'])) {
    $username = $_SESSION['trainer_name'];
    $userimg = $_SESSION['trainer_img'];
  } else {
    header("location: index.php");
  }

  $comment_about = $_POST['comment_about'];

  $commentQuery = "INSERT INTO comment (username,img,about,status) VALUES ('$username','$userimg','$comment_about',1);";
  mysqli_multi_query($db, $commentQuery);
}
//comment function end here
?>

<?php

include("header.php")

?>

<main id="main">
  <!-- ======= About Section ======= -->
  <!-- <section id="about" class="about">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
              <img src="assets/img/about.jpg" class="img-fluid" alt="" />
            </div>
            <div
              class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content"
              data-aos="fade-right"
            >
              <h3>
                Voluptatem dignissimos provident quasi corporis voluptates sit
                assumenda.
              </h3>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
              <ul>
                <li>
                  <i class="bi bi-check-circle"></i> Ullamco laboris nisi ut
                  aliquip ex ea commodo consequat.
                </li>
                <li>
                  <i class="bi bi-check-circle"></i> Duis aute irure dolor in
                  reprehenderit in voluptate velit.
                </li>
                <li>
                  <i class="bi bi-check-circle"></i> Ullamco laboris nisi ut
                  aliquip ex ea commodo consequat. Duis aute irure dolor in
                  reprehenderit in voluptate trideta storacalaperda mastiro
                  dolore eu fugiat nulla pariatur.
                </li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                aute irure dolor in reprehenderit in voluptate velit esse cillum
                dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum
              </p>
            </div>
          </div>
        </div>
      </section> -->
  <!-- End About Section -->

  <!-- My own United Front Community -->
  <div class="container-fluid myOwn">
    <div class="sec1">
      <h1>
        United Front Community Fitness declares it's time to transform our
        lives and join together in solidarity. By uniting, we can achieve a
        higher quality of life for all! #LiveBetter
      </h1>
      <p>
        The benefits of living an active lifestyle have never been more
        important than today. United Front Community Fitness has come
        together to encourage community members to join forces and make a
        stand for better lives by getting fit and staying healthy! Together,
        community members can empower each other to reach their health
        goals. Our community-focused program helps community members set
        realistic goals while having fun at the same time. Join us in our
        mission and get fit with us! It's time to break down barriers and
        come together to create a healthier community. #LiveBetter with
        United Front Community Fitness!
      </p>
    </div>

    <div id="services" class="container sec2">
    </div>

  </div>

  <!-- <div class="row">
    <div class="part1 col-sm-4">
      <div class="p1img">
        <img src="assets/img/icons/shield1.jpg" alt="Military Logo" />
      </div>
      <h4>Military Promotion</h4>
      <p>
        We recognize the hard work and dedication that comes with being
        a first responder or part of the military community, and we want
        to thank them by providing discounts on our services. Our
        community-focused resources make it easy for members to reach
        their fitness goals together.
      </p>
    </div>
    <div class="part2 col-sm-4">
      <div class="p1img">
        <img src="assets/img/icons/Dumbell.jpg" alt="Dumbell Icon" />
      </div>
      <h4>Fitness</h4>
      <p>
        W e believe that community is the key to getting fit. With a
        wide range of facilities, classes and personal trainers at your
        disposal you are sure to get the most out of your fitness goals.
      </p>
    </div>
    <div class="part3 col-sm-4">
      <div class="p1img">
        <img src="assets/img/icons/community1.jpg" alt="Community Icon" />
      </div>
      <h4>Community</h4>
      <p>
        United Front Community Fitness is proud to be the best community
        fitness center in Central Florida. For those looking to make the
        jump towards a healthier lifestyle, look no further!
      </p>
    </div>
  </div> -->

  <!-- End My own United Front Community -->

  <!-- Video + text 2 side -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 VdContainer">
        <div class="VdSec1">
          <img src="assets/img/youngLiftingWeight.png" alt="Young age Playing gym" />
        </div>
      </div>
      <div class="col-md-6 VdSec2">
        <h1>Lift with<br />confidence.<br />Sweat with<br />purpose.</h1>
        <p>
          The moment you step into the United Front Community Fitness you
          will be inspired to push a little harder, sweat a little longer,
          and believe in yourself a little more. With each day, you will
          lift with confidence and sweat with purpose alongside a community
          that’s here to support you – no matter what.
        </p>
        <a class="btn btn-light" href="#package">Explore Packages</a>
      </div>
    </div>
  </div>
  <!-- End Video + text 2 side -->

  <!-- Black bar with free trial -->
  <div class="container-fluid BlackTrial">
    <h1>
      <a href="#contact">JOIN US TO MAKE YOUR BODY<br />STRONGER,BETTER AND HEALTIER</a>
    </h1>
  </div>
  <!-- ======= End Black Bar ======== -->

  <!-- ====== Sketch + Text ========= -->
  <div id="about" class="container-fluid Sketch_Container">
    <h1 style="
            text-align: center;
            margin: 30px 0;
            font-weight: bolder;
            color: #2c806f;
            font-size: 65px;
          ">
      About us
    </h1>
    <div class="row">
      <div class="col-md-6 VdSec2">
        <h1>WE ARE<br />UNITED FRONT<br />COMMUNITY<br />FITNESS</h1>
        <p style="margin: 55px auto">
          We don’t have time for negativity, and we don’t stand for anything
          less than you deserve. We are here to help one another build
          something lasting and special.
        </p>
        <p>
          We are deeply rooted and growing stronger every day. Our brand of
          fitness is one that strives for longevity. We prepare you today so
          that you can do the things that you love tomorrow.
        </p>
      </div>
      <div class="col-md-6">
        <div class="sketchImg">
          <img src="https://static.wixstatic.com/media/e1b08d_7f720485449f4bb283032d02b12d78f8~mv2.jpg/v1/fill/w_669,h_854,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/e1b08d_7f720485449f4bb283032d02b12d78f8~mv2.jpg" alt="Drawing Sketch on the Wall" />
        </div>
      </div>
    </div>


    <!-- ========= Comment Section ======== -->
    <div class="container" style="background-color: #EEECF6;padding: 12px;margin: 50px auto;">

      <!-- Comment Show -->



      <div class="comment_container">

        <?php
        $cmtPickQuery = "SELECT * FROM comment WHERE status = 1";
        $cmtR = mysqli_query($db, $cmtPickQuery);

        while ($cmtResult = mysqli_fetch_array($cmtR)) {
        ?>
          <div class="comment">
            <div class="row">
              <div class="user1 col-2">
                <div class="user_img">
                  <img style="width: 100%;height: 100%;" src="admin/newimgs/<?php echo $cmtResult['img'] ?>" alt="User img">

                </div>
                <div class="user_name"><?php echo $cmtResult['username'] ?></div>
              </div>
              <div class=" col-1">

                <div class="dropdown <?php

                                      if ($cmtResult['username'] == $hideuser) {
                                      } else {
                                        echo "hidenseek";
                                      }

                                      ?>">
                  <a class="btn ellipsis  " href="#" role="button" data-toggle="dropdown" aria-expanded="false">

                    <img class="img-fluid" src="assets/img/ellipsis-vertical-solid.svg" alt="Vertical Ellipsis">

                  </a>

                  <div class="dropdown-menu" style="margin-right: 50px;">
                    <a class="dropdown-item" href="admin/cmtDel.php?pass=<?php echo $cmtResult['comment_id']; ?>">Delete</a>


                  </div>
                </div>

              </div>


            </div>
            <div class="comment_body">
              <?php echo $cmtResult['about'] ?>
            </div>

          </div>

        <?php
        }

        ?>

      </div>

      <!-- Comment Input -->
      <div class="form-group">

        <form action="" method="POST">
          <div class="row">
            <div class="col-10">
              <textarea name="comment_about" class="form-control" id="comment_about" cols="30" rows="10" placeholder="You may share your thoughts with others..."></textarea>

            </div>
            <div class="col-1">
              <button <?php
                      if (isset($_SESSION['customer_id'])) {
                        //
                      } else if (isset($_SESSION['trainer_id'])) {
                        //
                      } else {
                        echo "disabled";
                      }
                      ?> class="btn btn-primary" name="postBtn" id="postBtn" type="submit">Post</button>

              <?php
              if (isset($_SESSION['customer_id'])) {
                //
              } else if (isset($_SESSION['trainer_id'])) {
                //
              } else {
                echo "<p style='font-size:9px;color: red;'>Please login to share your thoughts</p>";
              }
              ?>
            </div>
          </div>
        </form>
      </div>

    </div>




  </div>

  <!-- ====== End Sketch + Text ====== -->

  <!-- ====== Values 4 part ======== -->
  <!-- <div id="values" class="container-fluid valuesContainer">
    <h1 style="font-size: 55px; margin: 110px auto; font-weight: bolder">
      VALUES COMMUNITY TRANSPARENCY
    </h1>
    <div class="row">
      <div class="col-sm-3 darkValue">
        <div class="V1Icon">
          <img src="assets/img/icons/BDumbell.jpg" alt="Black Dumbell" />
        </div>
        <h4>NCMETCON<br />GPP</h4>
        <p style="color: aliceblue">
          Our flagship High-Intensity GPP program designed on a 60 minute
          timeline. The most refined GPP program out there. Train to be
          ready for anything!
        </p>
        <button class="btn btn-light" type="button">Free Class</button>
      </div>
      <div class="col-sm-3 whiteValue">
        <div class="V1Icon">
          <img src="assets/img/icons/arm.jpg" alt="Muscle icon" />
        </div>
        <h4>NCX<br />STRENGTH X<br />CONDITIONING</h4>
        <p>
          The revolution in functional fitness you’ve been waiting for. NCX
          combines daily classic strength training and functional
          conditioning
        </p>
        <button class="btn btn-light" type="button">Free Class</button>
      </div>
      <div class="col-sm-3 darkValue">
        <div class="V1Icon">
          <img src="assets/img/icons/shoewhite.jpg" alt="Shoe" />
        </div>
        <h4>NCGO <br />DUMBBELLS X<br />BODYWEIGHT</h4>
        <p>
          NCGO is the best High-Intensity Interval Training (HIIT) program
          for athletes to hit at home, on the road, or just getting after it
          on.
        </p>
        <button class="btn btn-light" type="button">Free Class</button>
      </div>
      <div class="col-sm-3 whiteValue">
        <div class="V1Icon">
          <img src="assets/img/icons/Graph.png" alt="Improving Graph" />
        </div>
        <h4>NCCOMPETE <br />COMPETITOR'S<br />TRACK</h4>
        <p>
          A carefully balanced prescription of conditioning, gymnastic skill
          development, and strength training for the competitor.
        </p>
        <button class="btn btn-light" type="button">Free Class</button>
      </div>
    </div>
  </div> -->
  <!-- ====== End Values 4 part ======= -->

  <!-- ======= Why Us Section ======= -->
  <!-- <section id="why-us" class="why-us">
        <div class="container">
          <div class="row">
            <div class="col-lg-4" data-aos="fade-up">
              <div class="box">
                <span>01</span>
                <h4>Lorem Ipsum</h4>
                <p>
                  Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et
                  consectetur ducimus vero placeat
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 mt-4 mt-lg-0"
              data-aos="fade-up"
              data-aos-delay="150"
            >
              <div class="box">
                <span>02</span>
                <h4>Repellat Nihil</h4>
                <p>
                  Dolorem est fugiat occaecati voluptate velit esse. Dicta
                  veritatis dolor quod et vel dire leno para dest
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 mt-4 mt-lg-0"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <div class="box">
                <span>03</span>
                <h4>Ad ad velit qui</h4>
                <p>
                  Molestiae officiis omnis illo asperiores. Aut doloribus vitae
                  sunt debitis quo vel nam quis
                </p>
              </div>
            </div>
          </div>
        </div>
      </section> -->
  <!-- End Why Us Section -->

  <!-- ======= Clients Section ======= -->
  <!-- <section id="clients" class="clients">
        <div class="container" data-aos="zoom-in">
          <div class="row d-flex align-items-center">
            <div class="col-lg-2 col-md-4 col-6">
              <img
                src="assets/img/clients/client-1.png"
                class="img-fluid"
                alt=""
              />
            </div>

            <div class="col-lg-2 col-md-4 col-6">
              <img
                src="assets/img/clients/client-2.png"
                class="img-fluid"
                alt=""
              />
            </div>

            <div class="col-lg-2 col-md-4 col-6">
              <img
                src="assets/img/clients/client-3.png"
                class="img-fluid"
                alt=""
              />
            </div>

            <div class="col-lg-2 col-md-4 col-6">
              <img
                src="assets/img/clients/client-4.png"
                class="img-fluid"
                alt=""
              />
            </div>

            <div class="col-lg-2 col-md-4 col-6">
              <img
                src="assets/img/clients/client-5.png"
                class="img-fluid"
                alt=""
              />
            </div>

            <div class="col-lg-2 col-md-4 col-6">
              <img
                src="assets/img/clients/client-6.png"
                class="img-fluid"
                alt=""
              />
            </div>
          </div>
        </div>
      </section> -->
  <!-- End Clients Section -->

  <!-- ======= Services Section ======= -->
  <!-- <section id="services" class="services">
        <div class="container">
          <div class="section-title">
            <span>Services</span>
            <h2>Services</h2>
            <p>
              Sit sint consectetur velit quisquam cupiditate impedit suscipit
              alias
            </p>
          </div>

          <div class="row">
            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch"
              data-aos="fade-up"
            >
              <div class="icon-box">
                <div class="icon"><i class="bx bxl-dribbble"></i></div>
                <h4><a href="">Lorem Ipsum</a></h4>
                <p>
                  Voluptatum deleniti atque corrupti quos dolores et quas
                  molestias excepturi
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0"
              data-aos="fade-up"
              data-aos-delay="150"
            >
              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="">Sed ut perspiciatis</a></h4>
                <p>
                  Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <div class="icon-box">
                <div class="icon"><i class="bx bx-tachometer"></i></div>
                <h4><a href="">Magni Dolores</a></h4>
                <p>
                  Excepteur sint occaecat cupidatat non proident, sunt in culpa
                  qui officia
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4"
              data-aos="fade-up"
              data-aos-delay="450"
            >
              <div class="icon-box">
                <div class="icon"><i class="bx bx-world"></i></div>
                <h4><a href="">Nemo Enim</a></h4>
                <p>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui
                  blanditiis
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <div class="icon-box">
                <div class="icon"><i class="bx bx-slideshow"></i></div>
                <h4><a href="">Dele cardo</a></h4>
                <p>
                  Quis consequatur saepe eligendi voluptatem consequatur dolor
                  consequuntur
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4"
              data-aos="fade-up"
              data-aos-delay="750"
            >
              <div class="icon-box">
                <div class="icon"><i class="bx bx-arch"></i></div>
                <h4><a href="">Divera don</a></h4>
                <p>
                  Modi nostrum vel laborum. Porro fugit error sit minus sapiente
                  sit aspernatur
                </p>
              </div>
            </div>
          </div>
        </div>
      </section> -->
  <!-- End Services Section -->

  <!-- ======== Tate Section ====== -->
  <div id="team">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 VdContainer">
          <div class="VdSec1">
            <!-- assets/img/youngLiftingWeight.png -->
            <img src="https://static.wixstatic.com/media/e1b08d_94ca70616d2f478595eecfbc498f3778~mv2.jpg/v1/fill/w_667,h_811,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/e1b08d_94ca70616d2f478595eecfbc498f3778~mv2.jpg" alt="Adult playing at gym" />
          </div>
        </div>
        <div class="col-md-6 VdSec2">
          <h1>NEVER SETTLE</h1>
          <p>
            We believe that how you do anything is how you do everything. We
            are always striving to put our absolute best into everything we do
            no matter the task, and we never settle for anything less than our
            best effort.
          </p>
          <h1>CULTURE</h1>
          <p>
            We promote a culture of integrity and diversity. We do the right
            thing because it is the right thing to do, and we hold one another
            to a high standard of living. We celebrate the uniqueness of each
            individual team and community member, and we accept one another
            without judgment, bias, or prejudice.
          </p>
          <!-- <button class="btn btn-light" type="button">Free Class</button> -->
        </div>
      </div>
    </div>

    <div class="container">
      <h1 style="
            text-align: center;
            margin: 30px 0;
            font-weight: bolder;
            color: #2c806f;
            font-size: 65px;
          ">Our Top Trainers According To Feedbacks</h1>

      <div class="row">
        <?php

        $BTquery = "SELECT * FROM trainer WHERE status =1 AND extras = 1 LIMIT 3";
        $BTr = mysqli_query($db, $BTquery);

        while ($BTresult = mysqli_fetch_array($BTr)) {




        ?>
          <div class="col-md-4">
            <div class="card">
              <img style="max-height: 336px;" src="admin/newimgs/<?php
                                                                  echo $BTresult['img'];
                                                                  ?>" class="card-img-top" alt="Trainer Img">
              <div class="card-body">
                <h5 class="card-title">
                  <?php
                  echo $BTresult['name'];
                  ?>
                </h5>
                <p class="card-text"> <b>Gender : </b> <?php echo $BTresult['gender'];  ?></p>
                <p class="card-text"> <b>Trainer ID : </b> <?php echo $BTresult['wt_id'];  ?></p>
                <a href="#package" class="btn " style="background-color: #2C806F;color : white;">Explore Classes</a>
              </div>
            </div>
          </div>

        <?php

        };

        ?>

      </div>

    </div>

  </div>

  <!-- ======= Tate's 3 sections ====== -->
  <div class="container-fluid Tsec">
    <div class="row">
      <div class="col-sm-4">
        <h1>FITNESS</h1>
        <p>
          We believe that the combination of physical, social, and emotional
          fitness has transformative power. We build strong human beings on
          the inside and out, and we embrace fitness as part of who we are.
        </p>
      </div>
      <div class="col-sm-4">
        <h1>INNOVATION</h1>
        <p>
          We are committed to moving forward with relentless persistence and
          an open mind. We push the limits of what we think is possible and
          never settle for the status quo.
        </p>
      </div>
      <div class="col-sm-4">
        <h1>TEAMWORK</h1>
        <p>
          We work together in a collaborative, encouraging, and respectful
          manner. We are a powerful team in which the sum of all parts is
          greater than one single member.
        </p>
      </div>
    </div>
  </div>

  <div class="container">
    <h1 style="
            font-size: 55px;
            margin: 110px auto;
            font-weight: bolder;
            text-align: center;
          ">
      LIVE BETTER. TRAIN HARDER. SWEAT TOGETHER.
    </h1>
  </div>

  <!-- ======== Package Section ====== -->
  <div class="container" id="package">
    <h3 style="font-weight: bolder;color: #2C806F;">Avaliable Packages You can Purchase : </h3>
    <div class="row">

      <?php

      $packQuery = "SELECT * FROM package WHERE status = 1 ";
      $pr = mysqli_query($db, $packQuery);

      while ($packageResult = mysqli_fetch_array($pr)) {
      ?>

        <div class="col-md-4">
          <div class="card">
            <img style="height: 201px;" src="admin/newimgs/<?php echo $packageResult['img']; ?>" class="card-img-top" alt="Trainer Img">
            <div class="card-body">
              <h5 class="card-title">
                <?php
                echo $packageResult['name'];
                ?>
              </h5>
              <p class="card-text" style="height: 150px;overflow: scroll;">
                <?php echo $packageResult['about']  ?>
              </p>

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $packageResult['package_id']  ?>">
                Purchase
              </button>

            </div>
          </div>
        </div>

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?php echo $packageResult['package_id']  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you wanna purchase "<?php echo $packageResult['name']  ?>"?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" enctype="multipart/form-data" method="POST">
                <div class="modal-body">


                  <!-- Schedule Register Start -->






                  <div class="col">
                    <label for="trainer">Choose trainer</label>
                    <select class="form-control" name="trainer" id="trainer">
                      <option value="0" selected>No Trainer</option>
                      <?php

                      $sql = "SELECT * FROM trainer WHERE status= 1;";
                      $r = mysqli_query($db, $sql);


                      while ($result = mysqli_fetch_array($r)) {





                      ?>
                        <option value="<?php echo $result["trainer_id"]   ?>"><?php echo $result["name"]   ?></option>


                      <?php

                      };

                      ?>
                    </select>
                  </div>


                  <!-- Error Start HEre -->
                  <input type="hidden" name="package" value="<?php echo $packageResult['package_id']; ?>">

                  <!-- Error End Here -->

                  <div class="form-group">
                    <label for="">Schedule</label><br />
                    <div class="row">
                      <div class="col-4">
                        <input id="schedule" class="" type="radio" value="Morning 9:00 A.M - 1:00P.M" name="schedule">
                        <label for="schedule">Morning 9:00 A.M - 1:00P.M</label>
                      </div>
                      <div class="col-4">
                        <input style="margin-left: 30px;" id="schedule" class="" type="radio" value="Afternoon 1:00P.M - 4:00P.M" name="schedule">
                        <label for="schedule">Afternoon 1:00P.M - 4:00P.M</label>
                      </div>
                      <div class="col-4">
                        <input style="margin-left: 30px;" id="schedule" class="" type="radio" value="Evening 4:00 P.M - 9:00P.M" name="schedule">
                        <label for="schedule">Evening 4:00 P.M - 9:00P.M</label>
                      </div>
                    </div>

                  </div>


                  <br /><br />

                  <p style="font-size: 13px;color:red;">
                    <?php

                    if (isset($_SESSION['customer_id'])) {
                      //
                    } else if (isset($_SESSION['trainer_id'])) {
                      echo "Trainers cannot purchase packages.";
                    } else {
                      echo "Please <a href='login.php'>login</a> your account to purchase.";
                    }

                    ?>
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button name="sbtn" id="sbtn" type="submit" class="btn btn-primary" <?php
                                                                                      if (isset($_SESSION['customer_id'])) {
                                                                                        //
                                                                                      } else if (isset($_SESSION['trainer_id'])) {
                                                                                        echo "disabled";
                                                                                      } else {
                                                                                        echo "disabled";
                                                                                      }
                                                                                      ?>>Purchase</button>
                  <!-- <button  class="btn btn-primary" style="margin-left: 15px;" type="submit">Register</button> -->




                  <!-- Schedule Register End -->


                </div>
              </form>
            </div>
          </div>
        </div>


      <?php

      };


      ?>


    </div>
  </div>





  <!-- ======= Cta Section ======= -->
  <section id="cta" class="cta">
    <div class="container" data-aos="zoom-in">
      <div class="text-center">
        <h3></h3>
        <p>
          "My favorite place to get a great workout and release some stress.
          I enjoy being challenged. The coaches are good about correcting
          form and being supportive during the workouts. I love how creative
          they are with their space and how clean they keep it! Everyone is
          super nice you’ll definitely feel welcomed from day one!"
        </p>
        <!-- <a class="cta-btn" href="#">Call To Action</a> -->
      </div>
    </div>
  </section>
  <!-- End Cta Section -->

  <!-- ============ Schedule ========== -->
  <div class="container" id="schedule1">
    <?php

    if (isset($_SESSION['customer_id'])) {

    ?>

      <h1 style="font-weight: bolder;color: #2C806F;text-align: center;font-size: 65px;">Schedule</h1>

      <h3>For Customer : <?php echo $_SESSION['customer_name'];  ?></h3>

      <table class="table" style="margin: 50px 0;">
        <thead class="thead-dark" style="background-color: black; color: white; text-align: center;">
          <tr>
            <!-- <th scope="col">user_id</th> -->


            <th scope="col">Trainer Name</th>
            <th scope="col">Package</th>
            <th scope="col">Schedule</th>
            <th scope="col">Monthly Fee(Total)</th>

          </tr>

        </thead>
        <tbody style="text-align: center;">
          <?php
          $cname = $_SESSION['customer_name'];
          $query = "SELECT * FROM schedule WHERE status='1' AND customer='$cname'";
          $n = mysqli_query($db, $query);

          while ($normal = mysqli_fetch_array($n)) {



          ?>




            <tr>
              <!-- <th scope="row"></th> -->



              <td><?php echo $normal["trainer"]   ?></td>
              <td><?php echo $normal["package"]   ?></td>
              <td><?php echo $normal["schedule"]   ?></td>
              <td>$<?php echo $normal["total"]   ?></td>

            </tr>



          <?php

          };


          ?>
        </tbody>
      </table>



    <?php
    } else if (isset($_SESSION['trainer_id'])) {

    ?>
      <h1 style="font-weight: bolder;color: #2C806F;text-align: center;font-size: 65px;">Schedule</h1>

      <h3>For Trainer : <?php echo $_SESSION['trainer_name'];  ?></h3>

      <table class="table" style="margin: 50px 0;">
        <thead class="thead-dark" style="background-color: black; color: white; text-align: center;">
          <tr>
            <!-- <th scope="col">user_id</th> -->


            <th scope="col">Customer Name</th>
            <th scope="col">Package</th>
            <th scope="col">Schedule</th>


          </tr>

        </thead>
        <tbody style="text-align: center;">
          <?php
          $tname = $_SESSION['trainer_name'];
          $query = "SELECT * FROM schedule WHERE status='1' AND trainer='$tname'";
          $n = mysqli_query($db, $query);

          while ($normal = mysqli_fetch_array($n)) {



          ?>




            <tr>
              <!-- <th scope="row"></th> -->



              <td><?php echo $normal["customer"]   ?></td>
              <td><?php echo $normal["package"]   ?></td>
              <td><?php echo $normal["schedule"]   ?></td>


            </tr>



          <?php

          };


          ?>
        </tbody>
      </table>

    <?php
    }

    ?>

    <!--  ======== Calender ======== -->
    <div id="calender" class="container Calender">
      <h1>CALENDAR</h1>
      <br />
      <h3>MONDAY, WEDNESDAY & FRIDAY</h3>
      <br />
      <p>6AM NCMETCON</p>
      <p>7AM NCCOMPETE</p>
      <p>9AM NCMETCON</p>
      <br />
      <p>4PM, 5PM, 6PM, 7PM NCMETCON</p>
      <p>5PM KIDS</p>
      <p>TEENS 6PM</p>
      <br />

      <h3>TUESDAY & THURSDAY</h3>
      <br />
      <p>6AM WEIGHLIFTING</p>
      <p>9AM NCMETCON</p>
      <br />
      <p>4PM, 5PM, 6PM NCMETCON</p>
      <p>6PM KIDS WEIGHTLIFTING</p>
      <p>7PM KIDS WEIGHTLIFTING</p>
      <br /><br />

      <h3>SATURDAY</h3>
      <p>8AM WEIGHTLIFTING</p>
      <p>9:30PM NCMETCON</p>
      <br /><br />
      <h3>24/7 ACCESS FOR UNLIMITED<br />MEMBERS ONLY</h3>
    </div>
  </div>










  <!-- ======= Portfolio Section ======= -->
  <!-- <section id="portfolio" class="portfolio">
        <div class="container">
          <div class="section-title">
            <span>Portfolio</span>
            <h2>Portfolio</h2>
            <p>
              Sit sint consectetur velit quisquam cupiditate impedit suscipit
              alias
            </p>
          </div>

          <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-app">App</li>
                <li data-filter=".filter-card">Card</li>
                <li data-filter=".filter-web">Web</li>
              </ul>
            </div>
          </div>

          <div
            class="row portfolio-container"
            data-aos="fade-up"
            data-aos-delay="150"
          >
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img
                src="assets/img/portfolio/portfolio-1.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <a
                  href="assets/img/portfolio/portfolio-1.jpg"
                  data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"
                  title="App 1"
                  ><i class="bx bx-plus"></i
                ></a>
                <a
                  href="portfolio-details.html"
                  class="details-link"
                  title="More Details"
                  ><i class="bx bx-link"></i
                ></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <img
                src="assets/img/portfolio/portfolio-2.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <a
                  href="assets/img/portfolio/portfolio-2.jpg"
                  data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"
                  title="Web 3"
                  ><i class="bx bx-plus"></i
                ></a>
                <a
                  href="portfolio-details.html"
                  class="details-link"
                  title="More Details"
                  ><i class="bx bx-link"></i
                ></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img
                src="assets/img/portfolio/portfolio-3.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <a
                  href="assets/img/portfolio/portfolio-3.jpg"
                  data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"
                  title="App 2"
                  ><i class="bx bx-plus"></i
                ></a>
                <a
                  href="portfolio-details.html"
                  class="details-link"
                  title="More Details"
                  ><i class="bx bx-link"></i
                ></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img
                src="assets/img/portfolio/portfolio-4.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <a
                  href="assets/img/portfolio/portfolio-4.jpg"
                  data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"
                  title="Card 2"
                  ><i class="bx bx-plus"></i
                ></a>
                <a
                  href="portfolio-details.html"
                  class="details-link"
                  title="More Details"
                  ><i class="bx bx-link"></i
                ></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <img
                src="assets/img/portfolio/portfolio-5.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <a
                  href="assets/img/portfolio/portfolio-5.jpg"
                  data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"
                  title="Web 2"
                  ><i class="bx bx-plus"></i
                ></a>
                <a
                  href="portfolio-details.html"
                  class="details-link"
                  title="More Details"
                  ><i class="bx bx-link"></i
                ></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img
                src="assets/img/portfolio/portfolio-6.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <a
                  href="assets/img/portfolio/portfolio-6.jpg"
                  data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"
                  title="App 3"
                  ><i class="bx bx-plus"></i
                ></a>
                <a
                  href="portfolio-details.html"
                  class="details-link"
                  title="More Details"
                  ><i class="bx bx-link"></i
                ></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img
                src="assets/img/portfolio/portfolio-7.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <a
                  href="assets/img/portfolio/portfolio-7.jpg"
                  data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"
                  title="Card 1"
                  ><i class="bx bx-plus"></i
                ></a>
                <a
                  href="portfolio-details.html"
                  class="details-link"
                  title="More Details"
                  ><i class="bx bx-link"></i
                ></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img
                src="assets/img/portfolio/portfolio-8.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <a
                  href="assets/img/portfolio/portfolio-8.jpg"
                  data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"
                  title="Card 3"
                  ><i class="bx bx-plus"></i
                ></a>
                <a
                  href="portfolio-details.html"
                  class="details-link"
                  title="More Details"
                  ><i class="bx bx-link"></i
                ></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <img
                src="assets/img/portfolio/portfolio-9.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <a
                  href="assets/img/portfolio/portfolio-9.jpg"
                  data-gallery="portfolioGallery"
                  class="portfolio-lightbox preview-link"
                  title="Web 3"
                  ><i class="bx bx-plus"></i
                ></a>
                <a
                  href="portfolio-details.html"
                  class="details-link"
                  title="More Details"
                  ><i class="bx bx-link"></i
                ></a>
              </div>
            </div>
          </div>
        </div>
      </section> -->
  <!-- End Portfolio Section -->

  <!-- ======= Pricing Section ======= -->
  <!-- <section id="pricing" class="pricing">
        <div class="container">
          <div class="section-title">
            <span>Pricing</span>
            <h2>Pricing</h2>
            <p>
              Sit sint consectetur velit quisquam cupiditate impedit suscipit
              alias
            </p>
          </div>

          <div class="row">
            <div
              class="col-lg-4 col-md-6"
              data-aos="zoom-in"
              data-aos-delay="150"
            >
              <div class="box">
                <h3>Free</h3>
                <h4><sup>$</sup>0<span> / month</span></h4>
                <ul>
                  <li>Aida dere</li>
                  <li>Nec feugiat nisl</li>
                  <li>Nulla at volutpat dola</li>
                  <li class="na">Pharetra massa</li>
                  <li class="na">Massa ultricies mi</li>
                </ul>
                <div class="btn-wrap">
                  <a href="#" class="btn-buy">Buy Now</a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in">
              <div class="box featured">
                <h3>Business</h3>
                <h4><sup>$</sup>19<span> / month</span></h4>
                <ul>
                  <li>Aida dere</li>
                  <li>Nec feugiat nisl</li>
                  <li>Nulla at volutpat dola</li>
                  <li>Pharetra massa</li>
                  <li class="na">Massa ultricies mi</li>
                </ul>
                <div class="btn-wrap">
                  <a href="#" class="btn-buy">Buy Now</a>
                </div>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 mt-4 mt-lg-0"
              data-aos="zoom-in"
              data-aos-delay="150"
            >
              <div class="box">
                <h3>Developer</h3>
                <h4><sup>$</sup>29<span> / month</span></h4>
                <ul>
                  <li>Aida dere</li>
                  <li>Nec feugiat nisl</li>
                  <li>Nulla at volutpat dola</li>
                  <li>Pharetra massa</li>
                  <li>Massa ultricies mi</li>
                </ul>
                <div class="btn-wrap">
                  <a href="#" class="btn-buy">Buy Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
  <!-- End Pricing Section -->

  <!-- ======= Team Section ======= -->
  <!-- <section id="team" class="team">
        <div class="container">
          <div class="section-title">
            <span>Team</span>
            <h2>Team</h2>
            <p>
              Sit sint consectetur velit quisquam cupiditate impedit suscipit
              alias
            </p>
          </div>

          <div class="row">
            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch"
              data-aos="zoom-in"
            >
              <div class="member">
                <img src="assets/img/team/team-1.jpg" alt="" />
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <p>
                  Magni qui quod omnis unde et eos fuga et exercitationem. Odio
                  veritatis perspiciatis quaerat qui aut aut aut
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch"
              data-aos="zoom-in"
            >
              <div class="member">
                <img src="assets/img/team/team-2.jpg" alt="" />
                <h4>Sarah Jhinson</h4>
                <span>Product Manager</span>
                <p>
                  Repellat fugiat adipisci nemo illum nesciunt voluptas
                  repellendus. In architecto rerum rerum temporibus
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 d-flex align-items-stretch"
              data-aos="zoom-in"
            >
              <div class="member">
                <img src="assets/img/team/team-3.jpg" alt="" />
                <h4>William Anderson</h4>
                <span>CTO</span>
                <p>
                  Voluptas necessitatibus occaecati quia. Earum totam
                  consequuntur qui porro et laborum toro des clara
                </p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
  <!-- End Team Section -->
</main>
<!-- End #main -->

<!-- ======= Footer ======= -->
<!-- <footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="footer-info">
                <h3>Day</h3>
                <p>
                  A108 Adam Street <br />
                  NY 535022, USA<br /><br />
                  <strong>Phone:</strong> +1 5589 55488 55<br />
                  <strong>Email:</strong> info@example.com<br />
                </p>
                <div class="social-links mt-3">
                  <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                  <a href="#" class="facebook"
                    ><i class="bx bxl-facebook"></i
                  ></a>
                  <a href="#" class="instagram"
                    ><i class="bx bxl-instagram"></i
                  ></a>
                  <a href="#" class="google-plus"
                    ><i class="bx bxl-skype"></i
                  ></a>
                  <a href="#" class="linkedin"
                    ><i class="bx bxl-linkedin"></i
                  ></a>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li>
                  <i class="bx bx-chevron-right"></i> <a href="#">Home</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i> <a href="#">About us</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i> <a href="#">Services</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="#">Terms of service</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="#">Privacy policy</a>
                </li>
              </ul>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Our Services</h4>
              <ul>
                <li>
                  <i class="bx bx-chevron-right"></i> <a href="#">Web Design</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="#">Web Development</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="#">Product Management</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i> <a href="#">Marketing</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="#">Graphic Design</a>
                </li>
              </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>Our Newsletter</h4>
              <p>
                Tamen quem nulla quae legam multos aute sint culpa legam noster
                magna
              </p>
              <form action="" method="post">
                <input type="email" name="email" /><input
                  type="submit"
                  value="Subscribe"
                />
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Day</span></strong
          >. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </footer> -->
<!-- End Footer -->

<?php

include("footer.php");

?>