<?php
class restaurant
	{
		function ketnoicsdl(){
			$conn = mysqli_connect("localhost", "minhnghia", "123456", "restaurant");
			if (!$conn){
				die("kkncsdl");
				exit();
			}
			else
			{
				mysqli_set_charset($conn, "utf8");
				return $conn;
			}
		}
		function login($user, $pass)
		{
			$link = $this ->ketnoicsdl();
			$pass_md5 = md5($pass);
			$tv = "SELECT * FROM account where user= '$user' and pass = '$pass_md5'";
			$kq = mysqli_query($link,$tv);
			$i = mysqli_num_rows($kq);
			if($i>0){
				while($row = mysqli_fetch_array($kq))
				{
					session_start();
					$_SESSION['id']= $row['id'];
					$_SESSION['user'] = $row['user'];
					$_SESSION['pass'] = $row['pass'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['phanquyen'] = $row['phanquyen'];
					$_SESSION['anhdaidien'] = $row['anhdaidien'];
					if($row['phanquyen'] == 2)
					{
						echo '<script>alert("Đăng nhập thành công");</script>';
						echo '<script>window.location= "nhanvien-template.php";</script>';
					}
					elseif($row['phanquyen'] == 3)
					{
						echo '<script>alert("Đăng nhập thành công");</script>';
						echo '<script>window.location= "admin-template.php";</script>';
					}
					elseif($row['phanquyen'] == 5 )
					{
						echo '<script>alert("Đăng nhập thành công");</script>';
						echo '<script>window.location= "quantri-template.php";</script>';
					}
					else
					{
						echo '<script>alert("Đăng nhập thành công");</script>';
						echo '<script>window.location= "index.php";</script>';
					}
				}
				// echo '<script>alert("Đăng nhập thành công")</script>';
				// echo '<script>window.location= "index.php";</script>';
			}
			else
			{
				echo '<script>alert("Đăng nhập không thành công ! Xin mời đăng nhập lại !");</script>';
				echo '<script>window.location = "adminlogin.php";</script>';	
			}
		}
		// function dangky($name, $user, $email, $pass, $repass)
		// {
		// 	$link = $this->ketnoicsdl();
		// 	$pass=md5($pass);
		// 	if($name == "" || $user =="" || $email == "" || $pass =="" || $repass == "")
		// 	{
		// 		echo '<script>alert("Vui lòng nhập đầy đủ thông tin");</script>';
		// 	}
		// 	else
		// 	{ 
		// 		$sql ="Select * from account where user = '$user' or email = '$email'";
		// 		$result = mysqli_query($link, $sql);
		// 		$a = mysqli_num_rows($result);
		// 		if($a >0)
		// 		{
		// 			echo '<script>alert("Tài khoản hoặc email đã tồn tại");</script>';
		// 		}
		// 		else
		// 		{
		// 			$sql1 ="Insert into account(id, name, user, email, pass, phanquyen)
		// 			values(' ','$name','$user','$email','$pass','1')";
		// 			if(mysqli_query($link, $sql1))
		// 			{
		// 				echo '<script>alert("Đăng ký thành công");</script>';
		// 			    echo '<script>window.location="login.php";</script>';
		// 			}
		// 			else
		// 			{
		// 				echo '<script>alert("Đăng ký không thành công");</script>';
		// 			}
		// 		}
		// 	}
		// }
		public function logout(){
			if(isset($_SESSION["user"]))
			{
				session_destroy();
			}
			echo '<script>window.location.href="index.php";</script>';
		}
		public function xuatmonan($sql){
			$link =$this->ketnoicsdl();
			$tv1 =mysqli_query($link, $sql);
			$tv2 =mysqli_fetch_all($tv1, MYSQLI_ASSOC);
			return $tv2;
		}
		public function themxoasua($sql){
			$link=$this->ketnoicsdl();
			$tv1 =mysqli_query($link, $sql);
			$tv2 =mysqli_fetch_all($tv1, MYSQLI_ASSOC);
			return $tv2;
		}
		public function huyphong($sql, $sql2){
			$link=$this->ketnoicsdl();
			mysqli_query($link, $sql);
			mysqli_query($link, $sql2); 
		}
		public function getdetailacc($id)
		{
			$link=$this->ketnoicsdl();
			$tv =mysqli_query($link, "select * from account where id='$id'");
			return $tv;
		}
		//cập nhật thông tin tài khoản của quản trị viên
		public function updatedetailacc($id, $name, $user, $email, $phanquyen)
		{
			$link=$this->ketnoicsdl();
			$tv =mysqli_query($link, "update account set name ='$name', user='$user', email='$email',phanquyen='$phanquyen' where id='$id'");
			return $tv;
		}
		public function xuatphong(){
			$link =$this->ketnoicsdl();
			$tv1 =mysqli_query($link, "Select * from room where stt = 0");
			$tv2 =mysqli_fetch_all($tv1, MYSQLI_ASSOC);
			return $tv2;
		}
	
	public function detailroom($id){
		$link =$this->ketnoicsdl();
			$tv1 =mysqli_query($link, "Select * from room where idroom = ".$id."");
			return $tv1;
	}
	public function updatedetailroom($id, $ttroom, $ttoan)
		{
			$link=$this->ketnoicsdl();
			mysqli_query($link, "update hoadon set statusroom = ".$ttroom." , stt=".$ttoan." where id=".(int)$id."");
			
		}
	public function bookroom($name, $gia, $depart,$returnroom,$songuoi,$inforroom, $userid){
		$link = $this->ketnoicsdl();
		mysqli_query($link, "insert into hoadon(id, thongtin, gia, tgnhan, tgtra,songuoi, statusroom, idroom, stt,userid, trangthaihuyphong) 
		value('','$name','$gia','$depart','$returnroom','$songuoi','0', '$inforroom','0', '$userid','1')");
		$last_id = mysqli_insert_id($link);
		if(isset($last_id))
		{
			mysqli_query($link, "update room set stt = 1 where idroom = '$inforroom'");
		}   
		return $last_id;
	}
	
	public function chatbot($i)
	{	
		$link = $this->ketnoicsdl();
		$res = mysqli_query($link,"select * from message where userid = '$i'");
		if(mysqli_num_rows($res)>0)
		{
			$html='';
			while($row=mysqli_fetch_assoc($res)){
			$message=$row['message'];
			$added_on=$row['added_on'];
			$strtotime=strtotime($added_on);
			$time=date('h:i A',$strtotime);
			$type=$row['type'];
			if($type=='user')
			{
				$class="messages-me";
				$imgAvatar="user_avatar.png";
				$name="Me";
			}
			else
			{
				$class="messages-you";
				$imgAvatar="bot_avatar.png";
				$name="Chatbot";
			}
			$html.='<li class="'.$class.' clearfix"><span class="message-img"><img src="assets/images/'.$imgAvatar.'" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">'.$name.'</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'.$time.'</span></small> </div><p class="messages-p">'.$message.'</p></div></li>';
			}
			echo $html;
		}
	}
	public function getdetailroom()
		{
			$link=$this->ketnoicsdl();
			$tv =mysqli_query($link, "select * from hoadon h join users u on h.userid = u.user_id");
			return $tv;
		}
	}
?>