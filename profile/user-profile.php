<?php
include('../security.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <title>SNC</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
     <link rel="stylesheet" href="fonts/icomoon/style.css">

     <script src="https://kit.fontawesome.com/0899424668.js" crossorigin="anonymous"></script>
     <!-- Google Fonts -->
     <link href="https://fonts.gstatic.com" rel="preconnect">
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/jquery-ui.css">
     <link rel="stylesheet" href="../css/owl.carousel.min.css">
     <link rel="stylesheet" href="../css/owl.theme.default.min.css">
     <link rel="stylesheet" href="../css/owl.theme.default.min.css">

     <link rel="stylesheet" href="../css/jquery.fancybox.min.css">

     <link rel="stylesheet" href="../css/bootstrap-datepicker.css">

     <link rel="stylesheet" href="../fonts/flaticon/font/_flaticon.css">

     <link rel="stylesheet" href="../css/aos.css">

     <link rel="stylesheet" href="./css/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="./css/bootstrap-icons/bootstrap-icons.css">


     <link rel="stylesheet" href="./css/profilemain.css">
</head>

<body>




     <div class="site-wrap">
          <div class="site-mobile-menu site-navbar-target">
               <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                         <span class="icon-close2 js-menu-toggle"><i class="fa-solid fa-xmark"></i></span>
                    </div>
               </div>
               <div class="site-mobile-menu-body"></div>
          </div>

          <!-- js-sticky-header -->
          <header class="site-navbar site-navbar-target m-auto" role="banner">

               <div class="container">
                    <div class="row align-items-center">

                         <div class="col-6 col-xl-2">
                              <h1 class="mb-0 site-logo"><a href="../index.php" class="h2 mb-0">SNC<span
                                             class="text-primary orange">.</span> </a>
                              </h1>
                         </div>

                         <div class="col-12 col-md-10 d-none d-xl-block">
                              <nav class="site-navigation position-relative text-right" style="text-align: right;"
                                   role="navigation">

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

                         <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;">
                              <a href="#" class="site-menu-toggle js-menu-toggle float-right"><span
                                        class="icon-menu h3"><i class="fa-solid fa-bars"></i></span></a>
                         </div>

                    </div>
               </div>
          </header>

          <main id="main" class="main">
               <section class="section profile">
                    <div class="row">
                         <div class="col-xl-4">

                              <div class="card">
                                   <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                        <img src="./assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                                        <?php
                                             $connection = mysqli_connect("localhost","root","","snc-database");
                                             $userid =  $_SESSION['userid'];
                                             $query = "SELECT  * FROM users WHERE id = $userid";
                                             $query_run = mysqli_query($connection,$query);
                                             if(mysqli_num_rows($query_run) > 0)

                                             {
                                               while($row = mysqli_fetch_assoc($query_run)){
                                                ?>
                                                <h2><?php echo $row['username'];?></h2>
                                                <h3><?php echo $row['jop'];?></h3>
                                                <?php
                                                }
                                             }
                                             else{
                                                  echo "No Data avilable";
                                             }
                                             ?>
                                        <div class="social-links mt-2">
                                             <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                             <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                             <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                             <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <div class="col-xl-8">
                              <div class="card">
                                   <div class="card-body pt-3">
                                        <!-- Bordered Tabs -->
                                        <ul class="nav nav-tabs nav-tabs-bordered">

                                             <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button></li>

                                             <li class="nav-item"><button class="nav-link" data-bs-toggle="tab"  data-bs-target="#profile-edit">Edit Profile</button></li>

                                             <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button></li>

                                        </ul>
                                        

                                        <div class="tab-content pt-2">

                                             <div class="tab-pane fade show active profile-overview"
                                                  id="profile-overview">

                                                  <h5 class="card-title">Profile Details</h5>

                                                  <?php
                                             $connection = mysqli_connect("localhost","root","","snc-database");
                                             $userid =  $_SESSION['userid'];
                                             $query = "SELECT  * FROM users WHERE id = $userid";
                                             $query_run = mysqli_query($connection,$query);
                                             if(mysqli_num_rows($query_run) > 0)

                                             {
                                               while($row = mysqli_fetch_assoc($query_run)){
                                                ?>

                                                  <div class="row">
                                                       <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                                       <div class="col-lg-9 col-md-8"> <?php echo $row['username'];?>
                                                       </div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-lg-3 col-md-4 label">Job</div>
                                                       <div class="col-lg-9 col-md-8"><?php echo $row['jop'];?></div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-lg-3 col-md-4 label">Phone</div>
                                                       <div class="col-lg-9 col-md-8"><?php echo $row['phone'];?>
                                                       </div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-lg-3 col-md-4 label">Email</div>
                                                       <div class="col-lg-9 col-md-8"><?php echo $row['email'];?>
                                                       </div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="col-lg-3 col-md-4 label">Salary</div>
                                                       <div class="col-lg-9 col-md-8"><?php echo $row['salary'];?>
                                                       </div>
                                                  </div>
                                                  
                                             </div>
                                             <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                                  <!-- Profile Edit Form -->
                                                       <form action="edituser.php" method="POST" enctype="multipart/form-data">
                                                            <input type="text" type="hidden" style="display: none;" name="edit_id" value="<?php echo $row['id']?>">
                                                            <div class=" row mb-3">
                                                                 <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                                                 <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                                            </div>
                                                            <div class="row mb-3">
                                                                 <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                                                 <div class="col-md-8 col-lg-9">
                                                                      <input name="editname" type="text" class="form-control" id="fullName" value="<?php echo $row['username'];?>">
                                                                 </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                 <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                                                 <div class="col-md-8 col-lg-9">
                                                                      <input name="editjop" type="text" class="form-control" id="Job" value="<?php echo $row['jop'];?>">
                                                                 </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                 <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                                                 <div class="col-md-8 col-lg-9">
                                                                      <input name="editphone" type="text" class="form-control" id="Phone" value="<?php echo $row['phone'];?>">
                                                                 </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                 <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                                 <div class="col-md-8 col-lg-9">
                                                                      <input name="editemail" type="email" class="form-control" id="Email" value="<?php echo $row['email'];?>">
                                                                 </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                 <label for="Email" class="col-md-4 col-lg-3 col-form-label">Salary</label>
                                                                 <div class="col-md-8 col-lg-9">
                                                                      <input name="editsalary" type="text" class="form-control" id="Email" value="<?php echo $row['salary'];?>">
                                                                 </div>
                                                            </div>
                                                            <div class="text-center">
                                                                 <button type="submit" name="editbtn" class="btn btn-outline-dark my-color">Save Changes</button>
                                                            </div>
                                                       </form>
                                                            <?php
                                                            }
                                                       }
                                                       else{
                                                            echo "No Data avilable";
                                                       }
                                                       ?>
                                                       
                                             
                                                  <!-- End Profile Edit Form -->

                                             </div>
                                             <div class="tab-pane fade pt-3" id="profile-change-password">
                                                  <!-- Change Password Form -->
                                                  <form>

                                                       <div class="row mb-3">
                                                            <label for="currentPassword"
                                                                 class="col-md-4 col-lg-3 col-form-label">Current
                                                                 Password</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                 <input name="password" type="password"
                                                                      class="form-control" id="currentPassword">
                                                            </div>
                                                       </div>

                                                       <div class="row mb-3">
                                                            <label for="newPassword"
                                                                 class="col-md-4 col-lg-3 col-form-label">New
                                                                 Password</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                 <input name="newpassword" type="password"
                                                                      class="form-control" id="newPassword">
                                                            </div>
                                                       </div>

                                                       <div class="row mb-3">
                                                            <label for="renewPassword"
                                                                 class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                                 New
                                                                 Password</label>
                                                            <div class="col-md-8 col-lg-9">
                                                                 <input name="renewpassword" type="password"
                                                                      class="form-control" id="renewPassword">
                                                            </div>
                                                       </div>

                                                       <div class="text-center">
                                                            <button type="submit"
                                                                 class="btn btn-outline-dark my-color">Change
                                                                 Password</button>
                                                       </div>
                                                  </form><!-- End Change Password Form -->

                                             </div>

                                        </div><!-- End Bordered Tabs -->

                                   </div>
                              </div>

                         </div>
                    </div>
               </section>

          </main>

     </div>




     <script src="../js/jquery-3.3.1.min.js"></script>
     <script src="../js/jquery-ui.js"></script>
     <script src="../js/popper.min.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <script src="../js/owl.carousel.min.js"></script>
     <script src="../js/jquery.countdown.min.js"></script>
     <script src="../js/jquery.easing.1.3.js"></script>
     <script src="../js/aos.js"></script>
     <script src="../js/jquery.fancybox.min.js"></script>
     <script src="../js/jquery.sticky.js"></script>
     <script src="../js/isotope.pkgd.min.js"></script>
     <script src="../js/main.js"></script>
     <script src="./js/profilemain.js"></script>
     <script src="./css/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>