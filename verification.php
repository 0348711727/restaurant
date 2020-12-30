<?php
	include 'core/init.php';
    $user_id = $_SESSION['user_id'];
	$user    = $userObj->userData($user_id);
	if (!Users::isLoggedIn())
	{
		echo '<script>alert("You need to login first.")</script>';
		echo '<script>window.location="login.php"</script>';
	}
	else
	{
		$verifyObj->checkbeforeVerification();
	}
    if(isset($_POST['email']))
    {
		$link = Verify::generateLink();
    	$message = "{$user->firstName}, Your account has been created, Vist this link to verify your account : <a href='http://localhost:88/restaurant/verification/{$link}'>Verify Link</a>";
		$verifyObj->sendToMail($user->email, $message);
		$userObj -> insert('verification',array('user_id' => $user_id , 'code' => $link));
		$userObj -> redirect('/verification?mail=sent');
	}
	if(isset($_GET['verify']))
	{
		$code = Validate::escape($_GET['verify']);
		$verify = $verifyObj->verifyCode($code);

		if($verify)
		{
			if($verify->createAt < date('Y-m-d'))
			{
				$errors['verify'] = "Link xác minh của bạn đã hết hạn";
			}
			else
			{
				$userObj -> update('verification', array('status' => '1' ), array('user_id' => $user_id ), array('code' => $code ) );
				$userObj -> redirect('/home.php');
			}
		}
		else
			{
				$errors['verify'] = "Link xác minh không tồn tại";
			}
	}
	
	if(isset($_POST['phone']))
	{
		$number = Validate::escape($_POST['number']);
		if(!empty($number))
		{
			if(preg_match("/^([0-9]+)$/",$number))
			{
				$number = urlencode($number);
				$code = $verifyObj->generateCode();
				$message = "$user->firstName, tai khoan cua ban da duoc tao, code : {$code} ";
				$result = $verifyObj->sendToPhone($number,$message); 
				$userObj->insert('verification', array('user_id' => $user_id, 'code' => $code));

				if($result)
				{
    				$userObj->update('users',array('phone' => $number), array('user_id'=>$user_id));
    				$userObj->redirect('/verification/phone');
				}
				else
				{
    				$errors['phone'] = "Bị lỗi , thử cách còn lại !";
    			}
			}
			else
			{
				$errors['phone'] = "Chỉ được nhập số";
			}
		}
		else
		{
			$errors['phone'] = "Nhập số điện thoại của bạn để nhận code";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Verification</title>
	<base href="http://localhost:88/restaurant/"/>
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/style2.css"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

</head>
<body class="body2">
<div class="p2-wrapper">
	<div class="sign-up-wrapper">
		<div class="sign-up-inner">
			<div class="sign-up-div">
				<div class="name">
					<?php
						if(isset($_GET['verify']) || !empty($_GET['verify']))
						{
							if(isset($errors['verify']))
							{
								echo '<h4>'.$errors['verify'].'</h4>';
							}
						}
						else{
					?>
				<h4>Tài khoản của bạn đã được tạo , hãy chọn 1 trong 2 cách sau đây để kích hoạt tài khoản của bạn</h4>
				<fieldset>
				<legend>Cách 1</legend>
				<?php if(isset($_GET['mail'])): ?>
					<h4>Email xác nhận đã được gửi vào hòm thư của bạn , hãy kiểm tra email để xác minh tài khoản</h4>
				<?php else: ?>
				<form method="POST" action="verification.php">
				<h3>Email Verification</h3>
				<input type="email" name="email" disabled placeholder="<?php echo $user->email;?>" value="<?php echo $user->email;?>"/>
 				<button type="submit" name="email" class="suc">Gửi email cho tôi</button>
				</form>
				<?php endif; ?>
				</fieldset>
				</div>
                 <!-- Email error field -->
                <?php if(isset($errors['email'])): ?>
				<span class="error-in"><b><?php echo $errors['email']; ?></b></span>
                <?php endif; ?>
			
				<fieldset>
					<legend>Cách 2</legend>
				<div>
					<h3>Phone Verification</h3>
					<form method="POST">
					+<input type="tel" name="number" placeholder="Nhập số điện thoại của bạn"/>
					<button type="submit" name="phone" class="suc">Gửi code bằng số điện thoại</button>
					</form>
				</div>
 				</fieldset>
 				<!-- Phone error field -->
				 <?php if(isset($errors['phone'])): ?>
				<span class="error-in"><b><?php echo $errors['phone']; ?></b></span>
                <?php endif; ?>
		</div>
				 <?php } ?>
	</div>
</div><!--WRAPPER ENDS-->
</body>
</html>