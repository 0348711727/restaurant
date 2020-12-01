<?php 
require_once "source/mysource.php";
$p =new restaurant();
if(isset($_POST['user']))
{
	$id=$_GET['id'];
	$name = $_POST['fullname'];
	$user = $_POST['user'];
	$email =$_POST['email'];
	$phanquyen= $_POST['permission'];
}
$p->updatedetailacc($id, $name, $user, $email, $phanquyen);
if(isset($_POST['user'])||isset($_POST['email'])){
	echo "<script>alert('Cập nhật thành công');</script>";
	echo '<script>window.location= "admin-template.php";</script>';
}
?>
