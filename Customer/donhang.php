<html>
<head>
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
    <base href="http://localhost:88/restaurant/">
    <link rel="stylesheet" href="./css/style.css">
    <?php
    session_start();
    include('../source/mysource.php');    
    $p =new restaurant();
    if(isset($_SESSION['user_id']))
    {
        
    }
    else
    {
        echo "<script>window.location='login.php';</script>";
    }
    ?>
</head>
<body>
<table style="border:1px solid black;">	
<?php
$sql ="select * from hoadon
                where userid = ".$_SESSION["user_id"]."";
$ta=$p-> themxoasua($sql);
?>
	<tr>
		<th>Thông tin</th>
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
                            echo 'Chưa thanh toán. Hãy thanh toán trực tiếp với nhân viên';
                        }
                        else
                        {
                            echo "Đã thanh toán";
                        }
                        ?></td>
            <td><?php 
            $val['tgnhan'] = str_replace("/", "-", $val['tgnhan']);
            $today= strtotime('today');
            $enday = strtotime($val['tgnhan']);
            if($enday - $today >= 7200)
            {
                echo "Hủy phòng";
            }
            else
            {
                echo "Không cho phép hủy";
            }

                        ?></td>
			</tr>
		<?php } ?>
</table>
<?php
// if(isset($_POST['user']))
// {
// 	$id=$_GET['id'];
// 	$name = $_POST['fullname'];
// 	$user = $_POST['user'];
// 	$email =$_POST['email'];
// 	$phanquyen= $_POST['permission'];
// 	$p->updatedetailacc($id, $name, $user, $email, $phanquyen);
// }
// if(isset($_POST['user'])||isset($_POST['email'])){
// 	echo "<script>alert('Cập nhật thành công');</script>";
// 	echo '<script>window.location= "admin-template.php";</script>';
// }
?>
<div class="doremon">
       <div class="item">
        
        <div class="dau">
        </div>
        <div class="tronn">
        
        </div>
       
        <div class="mui"></div>
        <div class="muin"></div> 
        <div class="muin1"></div>
        <div class="muirau"></div>
        <div class="mat1"></div>
        <div class="matn1"></div>
        <div class="matn11"></div>
        <div class="mom"></div>
        <div class="mom1"></div>
        <div class="td1"></div>
        <div class="td2"></div>
        <div class="mom2">
            <div class="border">
                <div class="tim"></div>
                <div class="tim1"></div>
                <div class="tim2"></div>
            </div>
            
        </div>
        <div class="rau"></div>
        <div class="rau1"></div>
        <div class="rau2"></div>
        <div class="rau3"></div>
        <div class="rau4"></div>
        <div class="rau5"></div>
        <div class="mat2"></div>
        <div class="matn2"></div>
        <div class="matn22"></div>
        <div class="empty1"></div>
        <div class="vong"></div>
        <div class="chuong">
            <div class="chuong-item1"></div>
            <div class="chuong-item2"></div>
            <div class="lo-chuong"></div>
            <div class="gach"></div>
        </div>
        <div class="than"></div>
        <div class="tay">
            <div class="tay1">
                <div class="cong1"></div>
                <div class="taytron"></div>
              
            </div>
            <div class="tay2">
                <div class="cong2"></div>
                <div class="taytron2"></div>
                
            </div>
        </div>
        <div class="chan">
            <div class="chan1"></div>
            <div class="empty3"></div>
            <div class="empty4"></div>
            <div class="chan2"></div>
            <div class="empty5"></div>
            <div class="empty6"></div>
            <div class="empty7"></div>
            <div class="dep"></div>
            <div class="dep1"></div>
        </div>
        <div class="empty"></div>
        <div class="bung"></div>
        <div class="tui">
            <div class="tui-item"></div>
        </div>
        <div class="quaytron">
            <div class="quaytron1"></div>
        </div>
        <div class="quay"></div>
        <div class="quay2"></div>
    </div>
 
    <span class="empty10"></span>
    </div>
</body>

</html>