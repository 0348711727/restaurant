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
<style>
table, tr,td, th
{
	border: 1px solid black;
}
table
{
	border:1px solid black;
	border-collapse: collapse;
	margin-left:300px;
	margin-top: -100px;
}

</style>
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
		if(isset($_SESSION['user']))
		{
			if($_SESSION['phanquyen']==5)
			{
			echo '<a href="updatenv.php">Cập nhật thông tin nhân viên</a>';
		}
		}
		else{
			echo '<script>window.location= "login.php";</script>';
		}
?>
<table style="border:1px solid black;">	
<?php
$sql ="select * from account where phanquyen != 1";
if(isset($_GET["id"])){
	$id= $_GET['id'];
}
$ta=$p-> themxoasua($sql);
?>
<table>
	<tr>
		<th>Tên</th>
		<th>User</th>
		<th>Email</th>
		<th>Phân Quyền</th>
		<th>Hình Đại Diện</th>
		<th>Action</th>
	</tr>
	<?php
		foreach($ta as $key=>$val)
		{?>
		<tr>
			<td><?php echo $val['name']; ?></td>
			<td><?php echo $val['user']; ?></td>
			<td><?php echo $val['email']; ?></td>
			<td><?php echo $val['phanquyen']; ?></td>
			<td><?php echo $val['anhdaidien']; ?></td>
			<td><a href="edit.php?id=<?php echo $val['id']; ?>">Sửa</td>
			</tr>
		<?php } ?>
</table>

</body>

</html>


