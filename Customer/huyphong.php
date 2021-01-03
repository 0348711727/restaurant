<?php 
    require_once "../source/mysource.php";    
    $id = $_GET["id"];
	$p =new restaurant;
	$sql = "update hoadon set trangthaihuyphong = '0' where id = '$id'";
	$sql2 = "update room set stt = '0' where id='$id'";
	$p->huyphong($sql,$sql2);
	echo "<script>window.location='./donhang.php'</script>";
?>
