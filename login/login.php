<?php
include('../security.php');

$style = "";
$showstyle = "";


if (isset($_POST['login'])) {

  $username = $_POST['username'];

  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

  $result = mysqli_query($connection, $sql);

  $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result)) {
      echo "<script>alert('Login Successful');</script>";
      $_SESSION['username'] = $row['username'];
      $_SESSION['userid'] = $row['id'];
      $style = "style='display:none;'";
      $_SESSION['hidestyle'] = $style;
      $showstyle = "style='display:inline-block;'";
      $_SESSION['showstyle'] = $showstyle;
      header('Location: ../index.php');
    } else {
      echo "<script>alert('Login Failed');</script>";
    }
  function input_data($data) { 
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}


?>





<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">

  <title>Login Page</title>
</head>

<body>

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpeg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login to <strong>SNC</strong></h3>
            <p class="mb-4">Our Service Network Center will be always at your service and support.</p>
            <?php
              if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
                echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                unset($_SESSION['status']);
              }
            ?>
            <form action="#" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Your Username" id="username">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Your Password" id="password">
              </div>

              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked" />
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
              </div>

              <input type="submit" name="login" value="Log In" class="btn btn-block btn-primary">
              <span class="ml-auto"><a href="../signup/sign-up.php" class="forgot-pass">Don't have an account?
                  Sign Up</a></span>

            </form>
          </div>
        </div>
      </div>
    </div>


  </div>



  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="text/javascript">
    // if login button is clicked and the username or password fields are empty then show an swal alert box with error message and stay on the same page
    // $(document).ready(function() {
    //   $("#login").click(function() {
    //     var username = $("#username").val();
    //     var password = $("#password").val();
    //     if (username == "" || password == "") {
    //       Swal.fire({
    //         icon: 'error',
    //         title: 'Oops...',
    //         text: 'Username or Password is empty!',
    //       })
    //     }
    //   });
    // });
  </script>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>