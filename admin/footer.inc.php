  <!-- Start Footer Area -->
  <footer id="htc__footer">
      <!-- Start Footer Widget -->
      <div class="footer__container bg__cat--1">
          <div class="container">
              <div class="row">
                  <!-- Start Single Footer Widget -->
                  <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="footer">
                          <h2 class="title__line--2">ABOUT US</h2>
                          <div class="ft__details">
                              <p>Welcome to the computer world website.Here we provide detail of our product and you can buy the same.The service section allowes you to book service.</p>
                              <div class="ft__social__link">
                                  <ul class="social__link">
                                      <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>

                                      <li><a href="#"><i class="icon-social-instagram icons"></i></a></li>

                                      <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>

                                      <li><a href="#"><i class="icon-social-google icons"></i></a></li>

                                      <li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- End Single Footer Widget -->
                  <!-- Start Single Footer Widget -->
                  <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                      <div class="footer">
                          <h2 class="title__line--2">information</h2>
                          <div class="ft__inner">
                              <ul class="ft__list">
                                  <li><a href="Aboutus.php">About us</a></li>
                                  <li><a href="my_order.php">Delivery Information</a></li>
                                  <li><a href="Privacy & Policy.php">Privacy & Policy</a></li>
                                  <li><a href="term.php">Terms & Condition</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <!-- End Single Footer Widget -->
                  <!-- Start Single Footer Widget -->
                  <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                      <div class="footer">
                          <h2 class="title__line--2">My Account</h2>
                          <div class="ft__inner">
                              <ul class="ft__list">
                                  <li><a href="profile.php">My Account</a></li>
                                  <li><a href="cart.php">My Cart</a></li>
                                  <?php if (isset($_SESSION['USER_LOGIN'])) {
                                        echo '<li><a href="logout.php">Logout</a></li>';
                                    } else {
                                        echo '<li><a href="../Computer_world/Login.php">Login/Register</a></li>';
                                    } ?>
                                  <li><a href="<?php echo SITE_PATH ?>checkout.php">Checkout</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <!-- End Single Footer Widget -->
                  <!-- Start Single Footer Widget -->
                  <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                      <div class="footer">
                          <h2 class="title__line--2">Our service</h2>
                          <div class="ft__inner">
                              <ul class="ft__list">
                                  <li><a href="service.php">Service</a></li>
                                  <li><a href="my_service.php">My Service</a></li>
                                  
                              </ul>
                          </div>
                      </div>
                  </div>
                  <!-- End Single Footer Widget -->
                  <!-- Start Single Footer Widget -->
                  <div class="col-md-3 col-sm-6 col-xs-12 xmt-40 smt-40">
                      <div class="footer">
                          <h2 class="title__line--2">NEWSLETTER </h2>
                          <div class="ft__inner">
                              <div class="news__input">
                                  <input style="color:white;" type="text" placeholder="Your Mail*">
                                  <div class="send__btn">
                                      <a class="fr__btn" href="#">Send Mail</a>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>
                  <!-- End Single Footer Widget -->
              </div>
          </div>
      </div>
      <!-- End Footer Widget -->
      <!-- Start Copyright Area -->
      <div class="htc__copyright bg__cat--5">
          <div class="container">
              <div class="row">
                  <div class="col-xs-12">
                      <div class="copyright__inner">
                          <p>Copyright &copy;<a href="">Computer World</a> <?php echo date('Y') ?> All right reserved.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Copyright Area -->
  </footer>
  <!-- End Footer Style -->
  </div>
  <!-- Body main wrapper end -->

  <!-- Placed js at the end of the document so the pages load faster -->

  <!-- jquery latest version -->
  <script src="js/vendor/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap framework js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- All js plugins included in this file. -->
  <script src="js/plugins.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <!-- Waypoints.min.js. -->
  <script src="js/waypoints.min.js"></script>
  <!-- Main js file that contents all jQuery plugins activation. -->
  <script src="js/main.js"></script>
  <script src="jquery.zoom.min.js"></script>
  <script src="jquery.zoom.js"></script>
  <script src="js/custom.js"></script>



  </body>

  </html>