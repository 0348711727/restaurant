<base href="http://localhost:88/restaurant/"/>
<?php  
include('source/mysource.php');

$p = new restaurant;
$id = $_POST['idphong'];
$ta=$p->detailroom($id);
foreach($ta as $key=>$val){ 
	echo'<img src="assets/images/'.$val['hinh'].'">';
	echo $val['gia'];
	echo $val['name'];
	echo $val['mota'];
}
?>
<html>
<body>

</body>



