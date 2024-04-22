<!-- My New Footer -->
<!-- ======= Contact Section ======= -->
<footer id="webf" class="webf">
  <section id="contact" class="contact">
    <div class="container">
      <!-- <div class="section-title">
              <span>Contact</span>
              <h2>Contact</h2>
              <p>
                Sit sint consectetur velit quisquam cupiditate impedit suscipit
                alias
              </p>
            </div> -->

      <!-- <div class="row" data-aos="fade-up">
              <div class="col-lg-6">
                <div class="info-box mb-4">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div>
  
              <div class="col-lg-3 col-md-6">
                <div class="info-box mb-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>contact@example.com</p>
                </div>
              </div>
  
              <div class="col-lg-3 col-md-6">
                <div class="info-box mb-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55</p>
                </div>
              </div>
            </div> -->

      <!-- <div class="row" data-aos="fade-up">
        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form regForm">
            <h1 style="text-align: center">Register Here</h1>
            <div class="row">
              <div class="col-md-6 form-group">
                <label for="name">Full Name*</label><br />
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required />
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="name">Email*</label><br />
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required />
              </div>
            </div>
            <div class="form-group mt-3">
              <label for="name">Password*</label><br />
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" required />
            </div>
            <div class="form-group mt-3">
              <label for="name">Phone*</label><br />
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone no" required />
            </div>
            <div class="form-group mt-3">
              <label for="name">Address*</label><br />
              <input type="text" class="form-control" name="address" id="address" placeholder="Address" required />
            </div>
            <div class="form-group mt-3">
              <label for="name">Message for our community*</label><br />
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">
                Your message has been sent. Thank you!
              </div>
            </div>
            <div class="text-center">
              <button type="submit">Register</button>
            </div>
          </form>
        </div> -->

      <div class="row">
        <div class="col-lg-6">
          <h1 style="text-align: center;color:  #5b7c99; ">Customer Register Form</h1>
          <form action="" enctype="multipart/form-data" method="POST">

            <div class="form-group" for="tname">
              <label for="tname">FUll Name</label>
              <input id="tname" class="form-control" type="text" name="tname" required>
              <ul class="input-requirements">
                <li>Must only contain letters (no special characters and numbers)</li>
              </ul>
            </div>




            <div class="row">
              <div class="form-group col-6" for="tphone">
                <label for="tphone">Phone no</label>
                <input id="tphone" class="form-control" type="text" name="tphone">
                <ul class="input-requirements">
                  <li>Must only contain numbers (no special characters and letters)</li>
                </ul>
              </div>
              <div class="form-group col-6">
                <label for="tgender">Gender</label>
                <select class="form-control" name="tgender" id="tgender">
                  <option value="" disabled selected>Select</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
                <!-- <input id="gender" class="form-control" type="text" name="cgender"> -->
              </div>
            </div>
            <div class="form-group" for="temail">
              <label for="temail">Email</label>
              <input id="temail" class="form-control" type="email" name="temail" required>
              <ul class="input-requirements">
                <li>Only letters and numbers are allowed</li>
                <li>Must only contain '@' in an email </li>
              </ul>
            </div>
            <div class="form-group" for="tpassword">
              <label for="tpassword">Password</label>
              <input id="tpassword" class="form-control" type="password" name="tpassword" required>
              <ul class="input-requirements">
                <li>At least 5 characters long (and less than 20 characters)</li>
                <li>Contains at least 1 number</li>
                <li>Contains at least 1 lowercase letter</li>
                <li>Contains at least 1 uppercase letter</li>
                <li>Contains a special character (e.g. @ !)</li>
              </ul>
            </div>
            <div class="form-group" for="taddress">
              <label for="taddress">Address</label>
              <input id="taddress" class="form-control" type="text" name="taddress">
              <ul class="input-requirements">
                <li>Must only contain letters,numbers and . (no special characters )</li>
              </ul>
            </div>


            <div class="row">
              <div class="form-group col-6" for="tnrc">
                <label for="tnrc">NRC</label>
                <input id="tnrc" class="form-control" type="text" name="tnrc" placeholder="8/la.la.la(n)836829">
                <ul class="input-requirements">
                  <li>Must only contain /,(,),letters and numbers (no other special characters )</li>
                </ul>
              </div>

              <div class="form-group col-6">
                <label for="timage">Your image</label>
                <input id="timage" class="form-control" type="file" name="timage">
              </div>


            </div>
            <br /><br />


            <button name="tbtn" id="tbtn" class="btn btn-primary" style="margin-left: 15px;" type="submit">Register</button>



          </form>
        </div>



        <div class="col-lg-6">
          <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61099.82631774432!2d96.13465973363098!3d16.83929209925737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1930fffc8f2c7%3A0x91f419f7a53e1fbe!2sUltra%20Fitness!5e0!3m2!1sen!2smm!4v1685199121145!5m2!1sen!2smm" frameborder="0" style="border: 0; width: 100%; height: 556px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <div class="phnum">
            <i class="bi bi-phone-fill phone-icon"></i>
            <span>+9599312735</span>
            <br /><br />
            <i class="bi bi-envelope-fill"></i>
            <span>uffitness@gmail.com</span>
          </div>

          <!-- <iframe
                class="mb-4 mb-lg-0"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                frameborder="0"
                style="border: 0; width: 100%; height: 384px"
                allowfullscreen
              ></iframe> -->
        </div>
      </div>
    </div>

    <hr />

    <div class="cpyRight">
      <p style="color: white; text-align: center">
        &copy;2023 Design by <span>ANK</span>
      </p>
    </div>
    </div>
  </section>
</footer>
<!-- End Contact Section -->

<!-- End of my new footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>

</html>