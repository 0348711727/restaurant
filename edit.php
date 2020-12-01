<?php 
    require_once "source/mysource.php";    
    $id = $_GET["id"];
    $p =new restaurant;
	$detailacc= $p->getdetailacc($id);
    foreach($detailacc as $key =>$val)
?>
<div class="content">
	<form action="updatenv.php?id=<?php echo $val['id']; ?>" method="POST">
		<table>
			<tr>
				<td colspan="2">
					<h3>Cập nhật thông tin nhân viên</h3>
					<input type="hidden" name="id" value="">
				</td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Họ tên :</td>
				<td><input name="fullname" id="fullname" value="<?php echo $val['name'];?>"></td>
			</tr>
            <tr>
				<td nowrap="nowrap">User :</td>
				<td><input type="text" id="user" name="user" value="<?php echo $val['user'];?>" readonly="readonly"></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Địa chỉ email :</td>
				<td><input type="text" id="email" name="email" value="<?php echo $val['email'];?>"></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Quyền :</td>
				<td>
					<select id="permission" name="permission">
						<option value="-1"></option>
						<option value="1" >Thành viên thường</option>
						<option value="2" >Nhân viên</option>
						<option value="3" >Admin cấp 1</option>
						<option value="5" >Quản trị viên</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Cập nhật thông tin"></td>
			</tr>
		</table>
	</form>
	</div>