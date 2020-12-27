<?php  
include('./source/mysource.php');

$p = new restaurant;
$link = $p ->ketnoicsdl();
$id = $_POST['idphong'];
$sql = "select * from room where idroom = '$id' and stt = 1";
$a = mysqli_query($link, $sql);
$result = mysqli_num_rows($a);
if($result>0)
{
	echo 1;
}
else
{
	$ta=$p->detailroom($id);
	foreach($ta as $key=>$val){ 
		
		echo'<img src="assets/images/'.$val['hinh'].'">."<br>"';
		echo 'Tên Phòng:'. $val['name']."<br>";
		echo 'Giá:'. $val['gia']."<br>";
		echo 'Mô tả: '. $val['mota']."<br>";
	}
}
?>




