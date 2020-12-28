<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    

    

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="assets/css/owl.css">
	  <link rel="stylesheet" href="assets/css/home-dbed2292b752.css">
    <link rel="stylesheet" href="assets/css/theme-agoda-f3bd55072538.css">
    <link rel="stylesheet" href="assets/css/signup.css">

  </head>

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
              <?php 
              if(isset($_SESSION['user']) || isset($_SESSION['user_id'])){ 
                ?>
                  <li class="nav-item"><a class="nav-link" href="book-table.php">Book A Meal</a></li>
                  <li class="nav-item"><a class="nav-link" href="book-room.php">Book A Room</a></li>
                  <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                  <li class="nav-item"><a class="nav-link" href="home.php">
                  <?php 
                    if(isset($_SESSION['user'])){echo $_SESSION["name"];}else{echo $_SESSION['firstname'].' '.$_SESSION['lastname'];} 
                  ?></a></li>

              <?php }
              else
              { 
                ?>
                <li class="nav-item"><a class="nav-link" href="register.php">Sign Up</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="adminlogin.php">Admin Login</a></li>
              <?php 
             }  ?>
              <li class="nav-item"><a class="nav-link" href="chatbot.php">Chat</a></li>
            </ul>
          </div>
        </div>
		  
      </nav>
		<div data-element-name="covid19-banner" class="sc-AxirZ ifhlag"><span class="sc-AxheI elyVCV">Chúng tôi biết kế hoạch du lịch của quý khách có thể chịu ảnh hưởng của COVID-19. Hãy kiểm tra giới hạn đi lại ở địa phương trước khi đặt chuyến đi của quý khách.</span><a target="_blank" href="/vi-vn/coronavirus" data-element-name="covid19-banner-btn" class="sc-AxirZ dWUEbb"><span class="sc-AxheI elyVCV sc-AxirZ gTDyUd">Tìm hiểu thêm</span></a></div>
    </header>