<?php
include('../security.php');

if (isset($_POST['register'])) {
  $username = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $job = $_POST['job'];
  $confirm_password = $_POST['confirmpassword'];

  $email_query = "SELECT * FROM `users` WHERE email='$email' ";
  $email_query_run = mysqli_query($connection, $email_query);
  if (mysqli_num_rows($email_query_run) > 0) {
    // $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
    // $_SESSION['status_code'] = "error";
    echo '<script>
    swal("Email Already Taken. Please Try Another one.");
    </script>';
    //header('Location: sign-up.php');
  } else {
    if ($password == $confirm_password) {
      $query = "INSERT INTO `users` (`username`,phone,Email,`password`,jop) VALUES ('$username','$phone','$email','$password','$job')";
      $query_run = mysqli_query($connection, $query);
      if ($query_run) {
        // header('Location: ../login/login.php');
      } else {
        header('Location: sign-up.php');
      }
    } else {
      header('Location: sign-up.php');
    }
  }
};

?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->



  <title>Sign Up</title>
</head>

<body>

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 myEdit">
            <div class="form-block">
              <div class="text-center mb-5">
                <h3>Register</h3>

              </div>
              <form action="#" method="post">
                <div class="form-group first">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control " placeholder="Enter Your Name" id="name" required>
                  <div class="username_alert alert alert-danger alert-dismissible fade show" role="alert">
                    <strong></strong> Username leanth must more than 8 characters.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
                <div class="form-group first">
                  <label for="job">Job</label>
                  <input type="text" name="job" class="form-control" placeholder="Type Your Current Job" id="job" required>
                </div>
                <div class="form-group first">
                  <label for="phone">Phone number</label>
                  <input type="text" name="phone" class="form-control" placeholder="Enter Your Current phone number" id="phone" required>
                </div>
                <div class="form-group first">
                  <label for="username">Email Address</label>
                  <input type="text" name="email" class="form-control" placeholder="Enter Your Email" id="email" required>
                  <div class="email_alert alert alert-danger alert-dismissible fade show" role="alert">
                    <strong></strong> Please Enter Valid Email.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Your Password" id="password" required>
                  <div class="password_alert alert alert-danger alert-dismissible fade show" role="alert">
                    <strong></strong> Password must be complex and more than 8 characters.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
                <div class="form-group last mb-3">
                  <label for="re-password">Re-type Password</label>
                  <input type="password" name="confirmpassword" class="form-control" placeholder="Re-type Your Password" id="confirmpassword" required>
                </div>

                <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Agree our <a href="#">Terms and Conditions</a></span>
                    <input type="checkbox" checked="checked" />
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="../login/login.php" class="forgot-pass">Have an account?
                      Login</a></span>
                </div>

                <input type="submit" name="register" value="Register" id="register" class="btn btn-block btn-primary myclr">



              </form>
            </div>
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    // if input are empty show swal error
    $(document).ready(function() {
      $("#register").click(function() {
        var name = $("#name").val();
        var job = $("#job").val();
        var address = $("#address").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var confirm_password = $("#confirmpassword").val();

        if (name == "" || job == "" || address == "" || email == "" || password == "" || confirm_password == "") {
          swal("Registration Failed", "Please fill all the fields", "error");
        }
      });
    });
    // username validation 
    $(document).ready(function() {
      $("#name").keyup(function() {
        var username = $("#name").val();
        if (username.length < 5 || username.length > 20 || username.indexOf(' ') != -1) {

          $(".username_alert").css("display", "block");
          $("#name").css("border", "1px solid red");
          $("#name").css("box-shadow", "0 0 3px red");
          $("#name").css("outline", "none");
          $(".username_alert").css("transition", "all 1s");

        } else {
          $(".username_alert").css("display", "none");
          $("#name").css("border", "1px solid green");
          $("#name").css("box-shadow", "0 0 3px green");
          $("#name").css("outline", "none");
        }
      });
    });
    // password validation
    $(document).ready(function() {
      $("#password").keyup(function() {
        var password = $("#password").val();
        if (password.length < 8 || password.length > 20 || password.search(/[a-z]/) == -1 || password.search(/[A-Z]/) == -1 || password.search(/[0-9]/) == -1) {
          $("#password").css("border", "1px solid red");
          $("#password").css("box-shadow", "0 0 3px red");
          $("#password").css("outline", "none");
          $(".password_alert").css("display", "block");
          $(".password_alert").css("transition", "all 1s");
        } else {
          $(".password_alert").css("display", "none");
          $("#password").css("border", "1px solid green");
          $("#password").css("box-shadow", "0 0 3px green");
          $("#password").css("outline", "none");
        }
      });
    });
    // confirm password validation
    $(document).ready(function() {
      $("#confirmpassword").keyup(function() {
        var confirm_password = $("#confirmpassword").val();
        var password = $("#password").val();
        if (confirm_password != password) {
          $("#confirmpassword").css("border", "1px solid red");
          $("#confirmpassword").css("box-shadow", "0 0 3px red");
          $("#confirmpassword").css("outline", "none");
        } else {
          $("#confirmpassword").css("border", "1px solid green");
          $("#confirmpassword").css("box-shadow", "0 0 3px green");
          $("#confirmpassword").css("outline", "none");
        }
      });
    });
    // job validation
    $(document).ready(function() {
      $("#job").keyup(function() {
        var job = $("#job").val();
        if (job.length < 5) {
          $("#job").css("border", "1px solid red");
          $("#job").css("box-shadow", "0 0 3px red");
          $("#job").css("outline", "none");
        } else {
          $("#job").css("border", "1px solid green");
          $("#job").css("box-shadow", "0 0 3px green");
          $("#job").css("outline", "none");
        }
      });
    });
    // email validation 
    $(document).ready(function() {
      $("#email").keyup(function() {
        var email = $("#email").val();
        if (email.length < 5 || email.indexOf("@") == -1 || email.indexOf(".") == -1) {

          $("#email").css("border", "1px solid red");
          $("#email").css("box-shadow", "0 0 3px red");
          $("#email").css("outline", "none");
          $(".email_alert").css("display", "block");
          $(".email_alert").css("transition", "all 1s");
        } else {
          $("#email").css("border", "1px solid green");
          $("#email").css("box-shadow", "0 0 3px green");
          $("#email").css("outline", "none");
          $(".email_alert").css("display", "none");
        }
      });
    });
  </script>
  <?php if (isset($_POST['register'])) {
    echo '<script>
    swal("Registration Successfully", "Thanks for your time", "success");
    </script>';
  }
  ?>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>