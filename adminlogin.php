<?php
  include 'core/init.php';
  include('source/mysource.php');
  $p = new restaurant();
  $p -> ketnoicsdl();
  if(isset($_SESSION['user_id']))
  {
        echo "<script>window.location='index.php'</script>";
  }
  elseif(isset($_SESSION['phanquyen']))
  {
      if($_SESSION['phanquyen'] == 5)
      {
        echo "<script>window.location='quantri-template.php';</script>";
      }
      elseif($_SESSION['phanquyen'] == 3)
      {
        echo "<script>window.location='admin-template.php';</script>";
      }
      else
      {
        echo "<script>window.location='nhanvien-template.php';</script>";
      }
  }
  // Kiểm tra nếu có session rồi nếu nhập /login.php chuyển về giao diện trang chủ          
?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Restaurant</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/signup-style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    
  </head>

  <body>
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="assets/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="user" id="user" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="nut" id="signin" class="form-submit" value="Login"/>
                            </div>
                        </form>
                        <?php
                            error_reporting(0);
                            $user = $_POST['user'];
                            $pass = $_POST['pass'];
                           if(isset($_POST['nut'])){
                            $p -> login($user, $pass);
                           }
                        ?>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><img src="https://img.icons8.com/doodle/48/000000/facebook-new.png"/></a></li>
                                <li><a href="#"><img src="https://img.icons8.com/bubbles/50/000000/twitter.png"/></a></li>
                                <li><a href="#"><img src="https://img.icons8.com/clouds/50/000000/google-logo.png"/></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <center><p>Copyright © 2020 by SaiGon Restaurant & Hotel  <a href=""></a></p></center>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/jquery-ui.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>