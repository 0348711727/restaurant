<html>
<head>
    <base href="http://localhost:88/restaurant/">
    <style>
        table{
            margin:auto;
            margin-top: 50px;;
        }
        table, tr, th, td{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            text-align: center;
        }    
    </style>
    <?php
    session_start();
    include('../source/mysource.php');    
    $p =new restaurant();
    if(isset($_SESSION['user_id']) || isset($_SESSION['phanquyen']))
    {
        if($_SESSION['phanquyen'] == 3)
        {
            
        }
        else
        {
            
        }
    }
    ?>
</head>
<body>
<table style="border:1px solid black;">	
<?php
$sql ="select * from hoadon h inner join users u on h.userid=u.user_id";
$ta=$p-> themxoasua($sql);
?>
	<tr>
        <th>Thông tin khách hàng</th>
		<th>Thông tin phòng</th>
		<th>Giá</th>
		<th>Thời gian nhận</th>
		<th>Thời gian trả</th>
		<th>Số người</th>
        <th>Trạng thái nhận phòng</th>
        <th>Trạng thái thanh toán</th>
	</tr>
	<?php
		foreach($ta as $key=>$val)
		{?>
		<tr>
            <?php $_SESSION['first'] = $val['firstName'];  ?>
            <td><?php echo $val['firstName'].' '.$val['lastName']; ?></td>
			<td><?php echo $val['thongtin']; ?></td>
			<td><?php echo $val['gia']; ?></td>
			<td><?php echo $val['tgnhan']; ?></td>
			<td><?php echo $val['tgtra']; ?></td>
            <td><?php echo $val['songuoi']; ?></td>
            <td><?php if($val['statusroom'] == 0)
                        {
                      echo 'Phòng chưa được nhận';  
                    }else
                    {
                        echo "Phòng đã được nhận";
                    }?></td>
            <td><?php if($val['stt'] == 0)
                        {
                            echo 'Chưa thanh toán';
                        }
                        else
                        {
                            echo "Đã thanh toán";
                        }
                        ?></td>
            <td><a href="Admin/editdonhang.php?id=<?php echo $val['id']; ?>">Cập nhật</td>
			</tr>
		<?php } ?>
</table>
<?php
if(isset($_POST['ttnhanphong']) && isset($_POST['ttthanhtoan']) )
{
	$id=$_GET['id'];
	$ttroom = $_POST['ttnhanphong'];
    $ttoan = $_POST['ttthanhtoan'];
	$p->updatedetailroom($id, $ttroom, $ttoan);
// if(isset($_POST['user'])||isset($_POST['email'])){
	echo "<script>alert('Cập nhật thành công');</script>";
	// echo '<script>window.location= "admin-template.php";</script>';
// }
}
?>

</body>

</html>