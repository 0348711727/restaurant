<?php
include 'core/init.php';
if(isset($_SESSION['user_id']))
  {
        echo "<script>window.location='index.php'</script>";
  }
  elseif(isset($_SESSION['phanquyen']))
  {
      if($_SESSION['phanquyen'] == 5)
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
require_once "source/mysource.php";

$p =new restaurant();
if(isset($_SESSION['phanquyen'])|| isset($_SESSION['user_id']))
{
	if($_SESSION['phanquyen'] == 5)
	{
		
	}
	else if($_SESSION['phanquyen'] != 5)
	{
		echo "<script>window.location='adminlogin.php'</script>";
	}
}
?>
<style>
		table{
            margin:auto;
            margin-top:-150px;
			margin-left: 450px;
        }
        table, tr, th, td{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            text-align: center;
        } 
</style>
<table style="border:1px solid black;">	
<?php
$sql ="select * from account where phanquyen != 1";
if(isset($_GET["id"])){
	$id= $_GET['id'];
}
$ta=$p-> themxoasua($sql);
?>
	<tr>
		<th>Tên</th>
		<th>User</th>
		<th>Email</th>
		<th>Phân Quyền</th>
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
			<td><a href="edit.php?id=<?php echo $val['id']; ?>">Sửa</td>
			</tr>
		<?php } ?>
</table>
<?php 
		if(isset($_SESSION['user']) || isset($_SESSION['phanquyen']))
		{
			if($_SESSION['phanquyen']==5)
			{
			echo '<a href="updatenv.php">Cập nhật thông tin nhân viên</a>';
		}
		}
		else{
			echo '<script>window.location= "adminlogin.php";</script>';
		}
?>
<?php
if(isset($_POST['user']))
{
	$id=$_GET['id'];
	$name = $_POST['fullname'];
	$user = $_POST['user'];
	$email =$_POST['email'];
	$phanquyen= $_POST['permission'];
	$p->updatedetailacc($id, $name, $user, $email, $phanquyen);
}
if(isset($_POST['user'])||isset($_POST['email'])){
	echo "<script>alert('Cập nhật thành công');</script>";
	echo '<script>window.location= "admin-template.php";</script>';
}
?>
