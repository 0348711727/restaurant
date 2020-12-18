<?php 
  include 'core/init.php';
  include('source/mysource.php');
  // Kiểm tra nếu có session rồi nếu nhập /login.php chuyển về giao diện trang chủ
  // $_SESSION['user']==true ;
  // $_SESSION['user_id']==true;
  // ob_start();
  // if($_SESSION['user'] != true)
  // {
  //   header("LOCATION:login.php");
  // }

 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>SaiGon Restaurant & Hotel</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
	  <link rel="stylesheet" href="assets/css/home-dbed2292b752.css">
    <link rel="stylesheet" href="assets/css/theme-agoda-f3bd55072538.css">
    <link rel="stylesheet" href="assets/css/signup.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>SaiGon <em>Restaurant & Hotel</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More&nbsp;</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="about-us.php">About Us</a>
                      <a class="dropdown-item" href="blog.php">Blog</a>
                    </div>
                </li>
                
                
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
              <?php if(isset($_SESSION['user']) || isset($_SESSION['user_id'])){ ?>
                <li class="nav-item"><a class="nav-link" href="book-table.php">Book A Meal</a></li>
                <li class="nav-item"><a class="nav-link" href="book-room.php">Book A Room</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><?php if(isset($_SESSION['user'])){echo $_SESSION["name"];}else{echo $_SESSION['firstname'];} ?></a></li>

              <?php }else{ ?>
                <li class="nav-item"><a class="nav-link" href="register.php">Sign Up</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="adminlogin.php">Admin Login</a></li>
              <?php } ?>
              <li class="nav-item"><a class="nav-link" href="chatbot.php">Chat</a></li>
            </ul>
          </div>
        </div>
		  
      </nav>
		<div data-element-name="covid19-banner" class="sc-AxirZ ifhlag"><span class="sc-AxheI elyVCV">Chúng tôi biết kế hoạch du lịch của quý khách có thể chịu ảnh hưởng của COVID-19. Hãy kiểm tra giới hạn đi lại ở địa phương trước khi đặt chuyến đi của quý khách.</span><a target="_blank" href="/vi-vn/coronavirus" data-element-name="covid19-banner-btn" class="sc-AxirZ dWUEbb"><span class="sc-AxheI elyVCV sc-AxirZ gTDyUd">Tìm hiểu thêm</span></a></div>
    </header>
	  

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Find a room for your holiday</h4>
            <h2>Booking now</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Fugiat Aspernatur</h4>
            <h2>Laboriosam reprehenderit ducimus</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Saepe Omnis</h4>
            <h2>Quaerat suscipit unde minus dicta</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Sự kiện&nbsp;</h2>
            </div>
          </div>
          <div class="col-md-4">
            <div class="product-item">
              <a href="book-table.php"><img src="assets/images/other-1-370x270.jpg" alt=""></a>
              <div class="down-content">
                <a href="book-table.php"><h4>Booking</h4></a>

                <p></p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="book-table.html"><img src="assets/images/other-2-370x270.jpg" alt=""></a>
              <div class="down-content">
                <a href="book-table.html"><h4>Sự Kiện &nbsp;</h4>
                </a>
                <p>Event</p>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-item">
              <a href="book-table.html"><img src="assets/images/other-3-370x270.jpg" alt=""></a>
              <div class="down-content">
                <a href="book-table.html"><h4>Hội Họp&nbsp;</h4>
                </a>

                <p>Meeting</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Us</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <p>Yêu là phải nói, đói là phải ăn. Còn chần chừ gì mà không ghe nhà hàng dùng thử chứ?</p>
              <ul class="featured-list">
                <li><a href="#">Brand new</a></li>
                <li><p>+84348711727</p><a href="#">Head Chef Nhật Quang </a></li>
                <li><p>+84123456789</p><a href="#">Sous Chef Minh Nghĩa</a></li>
              </ul>
              <a href="about-us.php" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/about-1-570x350.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="services" style="background-image: url(assets/images/other-image-fullscren-1-1920x900.jpg);" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest blog posts</h2>

              <a href="blog.php">read more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="assets/images/blog-1-370x270.jpg" class="img-fluid" alt=""></a>

              <div class="down-content">
                <h4>Great experience</h4>
                <p style="margin: 0;">Anh Thu &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="assets/images/blog-2-370x270.jpg" class="img-fluid" alt=""></a>

              <div class="down-content">
                <h4>The head chef is handsome and he is so kind</h4>

                <p style="margin: 0;">Quynh Nhu &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="service-item">
              <a href="#" class="services-item-image"><img src="assets/images/blog-3-370x270.jpg" class="img-fluid" alt=""></a>

              <div class="down-content">
                <h4>Sous chef is really nice</h4>

                <p style="margin: 0;">Van Hai &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Leave a comment to show us your experience.</h4>
                  <p>Once again, thank you for visiting us. Please to see you again.</p>
                </div>
                <div class="col-lg-4 col-md-6 text-right">
                  <a href="contact.php" class="filled-button">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2020 by SaiGon Restaurant & Hotel  <a href=""></a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/signup.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>
</html>