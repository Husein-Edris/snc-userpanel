<?php
include('../security.php');
?>

<!doctype html>
<html lang="en">

<head>
  <title>Loan Calculator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="../fonts/icomoon/style.css">

  <script src="https://kit.fontawesome.com/0899424668.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">

  <link rel="stylesheet" href="../css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="../css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="../css/aos.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="./calc_css/clac-style.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  
  <div id="overlayer"></div>
  <div class="calcload">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    
    <header class="site-navbar site-navbar-target m-auto" role="banner">

      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="../index.php" class="h2 mb-0" style="color:#fd7e14">SNC<span
                  class="text-primary orange">.</span> </a>
            </h1>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" style="text-align: right;" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#" class="nav-link" onclick="document.location.href = '../index.php';">Home</a></li>
                <li><a href="#" id="loan-calc" class="nav-link" onclick="document.location.href = '../loan-calculator/loan.calc.php';">Loan Calcultor</a></li>
                <?php if( isset($_SESSION['username']) && !empty($_SESSION['username']) )
                {
                  ?>
                    <li>
                      <form action="../logoutCURD.php" method="post">
                        <button type="submit" name="logout_btn" class="btn btn-link">Sign Out</button>
                      </form>
                    </li>
                  <?php }else{ ?>
                    <li><a href="#" class="nav-link" onclick="document.location.href = '../login/login.php';">Login</a></li>
                    <li><a href="#" class="nav-link" onclick="document.location.href = '../signup/sign-up.php';">Sign Up</a></li>
              <?php } ?>
              </ul>
            </nav>
          </div>

          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#"
              class="site-menu-toggle js-menu-toggle float-right" style="color: #fd7e14;"><span
                class="icon-menu h3"></span></a></div>

        </div>
      </div>
    </header>




    <div class="site-section" id="next" style="padding-top: 100px;">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="">
            <img src="../images/flaticon-svg/svg/003-notes.svg" alt="Free Website Template by Free-Template.co"
              class="img-fluid w-25 mb-4">
            <h3 class="card-title">Insurance Consulting</h3>
            <p>Many people take no care of their money till they come nearly to the end of it, and others do just the
              same with their time.</p>
          </div>
          <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="100">
            <img src="../images/flaticon-svg/svg/005-megaphone.svg" alt="Free Website Template by Free-Template.co"
              class="img-fluid w-25 mb-4">
            <h3 class="card-title">Financial Management</h3>
            <p>Can't do enough online shopping! No pesky sales people and it's so much fun to get presents delivered to
              my door.</p>
          </div>
          <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="200">
            <img src="../images/flaticon-svg/svg/002-rich.svg" alt="Free Website Template by Free-Template.co"
              class="img-fluid w-25 mb-4">
            <h3 class="card-title">Income Monitoring</h3>
            <p>If you don't take good care of your credit, then your credit won't take good care of you.</p>
          </div>
        </div>
        <!-- Loan Calculator -->
        <section class="section">
          <div class="container">
            <div class="content col-1g-12 text-center">
              <h1>Simple Loan Calculator</h1>
              <p>
                The Simple Loan Calculator will determine your estimated payments
                for loan amounts, interest rates and terms.
              </p>
            </div>

            <div class="columns2">
              <div class="column ">
                <div class="card">
                  <div class="card-content ">
                    <form id="loan-form" class="content col-1g-12">
                      <div class="level">
                        <!-- Left side -->
                        <div class="level-left is-marginless">
                          <div class="level-item">
                            <p class="number">1</p>
                            Loan Amount
                          </div>
                        </div>

                        <!-- Right side -->
                        
                        <div class="level-right col-1g-12">
                          <div class="level-item">
                            <div class="field">
                              <div class="control has-icons-left ">
                                <input class="input" id="amount" type="number" />
                                <span class="icon is-small is-left">
                                  <i class="fa fa-dollar-sign"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="level">
                        <!-- Left side -->
                        <div class="level-left is-marginless">
                          <div class="level-item">
                            <p class="number">2</p>
                            Interest Rate
                          </div>
                        </div>

                        <!-- Right side -->
                        
                        <div class="level-right">
                          <div class="level-item">
                            <div class="field">
                              <div class="control has-icons-right">
                                <!-- <input type="" class="input" id="interest" type="number" /> -->
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-percentage"></i></label>
                                  </div>
                                  <select style="width: 190px;" class="custom-select" id="interest">
                                  <?php
                                    $connection = mysqli_connect("localhost", "root", "", "snc-database");
                                    $query = "SELECT * FROM `bank`";
                                    $query_run = mysqli_query($connection, $query);
                                  ?>
                                  <?php
                                  if (mysqli_num_rows($query_run) > 0) {
                                    $tmpCount = 0;
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                      $tmpCount++;
                                      ?>
                                    <!-- ///////////////////// -->
                                    <option value="<?php echo $row['interest']; ?>"><?php echo $row['bankname']; ?></option>
                                    <!-- ///////////////////// -->
                                    <?php
                                    }
                                  } else {
                                    echo "No Record Found";
                                  }
                                  ?>

                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="level">
                        <!-- Left side -->
                        <div class="level-left is-marginless">
                          <div class="level-item">
                            <p class="number">3</p>
                            Number Of Years
                          </div>
                        </div>

                        <!-- Right side -->
                        <div class="level-right">
                          <div class="level-item">
                            <div class="field">
                              <div class="control has-icons-left">
                                <input class="input" id="years" type="number" />
                                <span class="icon is-small is-left">
                                  <i class="fa fa-calendar"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="control">
                        <button class="button is-large is-fullwidth is-primary is-outlined calculate-button">
                          Calculate
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Loan Calculator -->


          <!-- RESULTS -->
          <section class="section content col-1g-12 text-center">
            <h1 class="title ">Calculated Results</h1>
            <div class="columns is-multiline">

              <div class="column is-12-tablet is-12-desktop is-4-widescreen">
                <div class="notification is-primary has-text">
                  <p id="monthlyPayment" class="title is-1">$</p>
                  <p class="subtitle is-4">Monthly Payments</p>
                </div>
              </div>

              <div class="column is-12-tablet is-12-desktop is-4-widescreen">
                <div class="notification is-info has-text">
                  <p id="totalInterest" class="title is-1">$</p>
                  <p class="subtitle is-4">Total Interest</p>
                </div>
              </div>

              <div class="column is-12-tablet is-12-desktop is-4-widescreen">
                <div class="notification is-link has-text">
                  <p id="totalPayment" class="title is-1">$</p>
                  <p class="subtitle is-4">Total Payments</p>
                </div>
              </div>

            </div>
          </section>
          <!-- End RESULTS -->
      </div>
      </section>
    </div>
  </div>


  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-5">
              <h2 class="footer-heading mb-4">About Us</h2>
              <p>Before you spend, earn. Before you invest, investigate. … Before you retire, save.
            </div>
            <div class="col-md-3 ml-auto">
              <h2 class="footer-heading mb-4">Quick Links</h2>
              <ul class="list-unstyled">
                <li><a href="#about-section" class="smoothscroll">Terms</a></li>
                <li><a href="#about-section" class="smoothscroll">Policy</a></li>
                <li><a href="#about-section" class="smoothscroll">About Us</a></li>
                <li><a href="#services-section" class="smoothscroll">Services</a></li>
                <li><a href="#testimonials-section" class="smoothscroll">Testimonials</a></li>
                <li><a href="#contact-section" class="smoothscroll">Contact Us</a></li>
              </ul>
            </div>
            <div class="col-md-3 footer-social">
              <h2 class="footer-heading mb-4">Follow Us</h2>
              <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
          <form action="#" method="post" class="footer-subscribe">
            <div class="input-group mb-3">
              <input type="text" class="form-control border-secondary text-white bg-transparent"
                placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary text-black" type="button" id="button-addon2">Send</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <div class="border-top pt-5">
            <p class="copyright"><small>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart text-danger"
                  aria-hidden="true"></i> by <a href="https://chat.whatsapp.com/KTT8Ur1hxrRCdguFkhNS1s"
                  target="_blank">GROUP 2</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>

          </div>
        </div>

      </div>
    </div>
  </footer>

  </div>

  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.countdown.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.fancybox.min.js"></script>
  <script src="../js/jquery.sticky.js"></script>
  <script src="../js/isotope.pkgd.min.js"></script>
  <script src="../js/jquery-3.3.1.min.js"></script>


  <script src="../js/main.js"></script>
  <script src="./clac_js/app.js"></script>



</body>

</html>