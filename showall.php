<base href="http://localhost:88/restaurant/"/>
<?php  
session_start();
include('source/mysource.php');

$p = new restaurant;
$id = $_POST['idphong'];
$ta=$p->detailroom($id);
$_SESSION['depart'] = $_POST['tgnhan'];
$_SESSION['return'] = $_POST['tgtraphong'];
foreach($ta as $key=>$val){ 
	echo'<img src="assets/images/'.$val['hinh'].'">."<br>"';
	echo 'Tên Phòng:'. $val['name']."<br>";
	echo 'Giá:'. $val['gia']."<br>";
	echo 'Mô tả: '. $val['mota']."<br>";
}
?>
<html>
<body>

</body>



