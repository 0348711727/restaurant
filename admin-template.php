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
      if($_SESSION['phanquyen'] == 3)
      {
        
      }
      else
      {
        echo "<script>window.location='adminlogin.php';</script>";
      }
  }
?>
<html>
<head>
<base href="http://localhost:88/restaurant/"/>
<link rel="stylesheet" href="assets/css/stylead.css">
<link rel="stylesheet" href="assets/css/updatenv.css">
</head>
<body>
<header>
<label for="">
	<i class="fas fa-bar" id="sidebar_btn"></i>
</label>
<div class="left-area"> 
<h3>Hello <?php echo $_SESSION['name']; ?></h3>

</div>
<div class="right-area">
<a href="logout.php" class="logout_btn">Logout</a>
</div>
</header>
	<div class="sidebar">
	<center>

	<img src="assets/images/<?php echo $_SESSION['anhdaidien'];?>" class="profile-image" alt="Anh dai dien">
	<h4><?php echo $_SESSION['name']; ?></h4>
	</center>
    <?php 
		if(isset($_SESSION['user']) && isset($_SESSION['phanquyen']))
		{
			if($_SESSION['phanquyen'] == 3)
			{
            echo '<a href="Admin/qldonhang.php">Quản lý đơn đặt phòng</a><br>';
            echo '<a href="#">Quản lý hóa đơn</a><br>';
		}
	}
		else{
			echo '<script>window.location= "adminlogin.php";</script>';
		}
?>
</body>

</html>


