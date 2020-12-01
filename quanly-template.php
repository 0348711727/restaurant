<?php
session_start();
include('source/mysource.php');
  $p = new restaurant();
  $p -> ketnoicsdl();
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
			if($_SESSION['phanquyen'] == 2){
            echo '<a href="#">Xem hóa đơn</a><br>';
			echo '<a href="#">Thống kê doanh thu</a><br>';
		}
		}
		else{
			echo '<script>window.location= "login.php";</script>';
		}
?>

	
<?php
$sql ="select * from account";
$ta=$p-> themxoasua($sql);
foreach($ta as $key=>$val)
{

?>
	<div class="content">
	<form action="" method="">
<table>
<td>Họ tên<?php echo $val['name'];  ?></td>
<td>Email</td>
<td>SDT</td>
<td></td>
<td></td>
	</table>
	</form>
	</div>
<?php }?>
</body>

</html>


