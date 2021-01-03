<?php 
    require_once "../source/mysource.php";    
    $id = $_GET["id"];
    $p =new restaurant;
	$detailacc= $p->getdetailroom($id);
    foreach($detailacc as $key =>$val)
?>
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
<div class="content">
	<form action="qldonhang.php?id=<?php echo $val['id']; ?>" method="POST">
		<table >
			<tr>
				<td colspan="2">
					<h3>Cập nhật trạng thái phòng</h3>
					<input type="hidden" name="id" value="">
				</td>
			</tr>
			<tr>
				<td nowrap="nowrap">Tên khách hàng :</td>
				<td><input name="fullname" id="fullname" value="<?php echo $val['firstName'].' '.$val['lastName'];?> "readonly="readonly"></td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Tên phòng :</td>
				<td><input name="nameroom" id="nameroom" value="<?php echo $val['thongtin'];?> "readonly="readonly"></td>
			</tr>
            <tr>
				<td nowrap="nowrap">Giá :</td>
				<td><input type="text" id="gia" name="gia" value="<?php echo $val['gia'];?>" readonly="readonly"></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Thời gian nhận :</td>
				<td><input type="text" id="tgnhan" name="tgnhan" value="<?php echo $val['tgnhan'];?>"readonly="readonly"></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Thời gian trả :</td>
				<td><input type="text" id="tttra" name="tttra" value="<?php echo $val['tgtra'];?>"readonly="readonly"></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Số người :</td>
				<td><input type="text" id="songuoi" name="songuoi" value="<?php echo $val['songuoi'];?>"readonly="readonly"></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Trạng thái nhận phòng :</td>
				<td><input type="text" id="ttnhanphong" name="ttnhanphong" value="<?php echo $val['statusroom'];?>"></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Trạng thái thanh toán :</td>
				<td><input type="text" id="ttthanhtoan" name="ttthanhtoan" value="<?php echo $val['stt'];?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Cập nhật trạng thái"></td>
			</tr>
		</table>
	</form>
	</div>