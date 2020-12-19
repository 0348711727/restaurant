<?php 
require_once "source/mysource.php";
include 'core/init.php';
$p =new restaurant();
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
