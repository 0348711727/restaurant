<?php
    include 'core/init.php';
    
    if(isset($_SESSION['phanquyen']))
    {
        if($_SESSION['phanquyen'] == 3)
        {
            
        }
        else
        {
            echo "<script>window.location='adminlogin.php';</script>";
        }
    }

    if(isset($_POST['update']))
    {
        $required = array('firstName','lastName','username','email','password');
        foreach($_POST as $key => $value)
        {
            if(empty($value) && in_array($key, $required))
            {
                $errors['allFields'] = "Yêu cầu điền tất cả các khung";
                break;
            }
        }
        if(empty($errors['allFields']))
        {
			$firstName  = Validate::escape($_POST['firstName']);
			$lastName   = Validate::escape($_POST['lastName']);
			$username   = Validate::escape($_POST['username']);
			$email     	= Validate::escape($_POST['email']);
			$password   = $_POST['password'];

			if(Validate::length($firstName,2,20))
			{
				$errors['names'] = "Tên nằm trong khoảng 2-20 ký tự";
			}
			else if(Validate::length($lastName,2,20))
			{
				$errors['names'] = "Tên nằm trong khoảng 2-20 ký tự";
			}

			if(Validate::length($username,2,10))
			{
				$errors['username'] = "Username nằm trong khoảng 2-10 ký tự";
			}
			else if($username != $user -> username && $userObj -> usernameExist($username))
			{
				$errors['username'] = "Username đã tồn tại";
			}

			if(!Validate::filterEmail($email))
			{
				$errors['email'] = "Định dạng email không hợp lệ";
			}
			else if($email != $user -> email && $userObj -> emailExist($email)) 
			{
				$errors['email'] = "Email đã tồn tại";
			}
			else 
			{
				if(password_verify($password, $user -> password))
				{
					// cập nhật lại user
					$userObj -> update('users',array('firstName' => $firstName, 'lastName' => $lastName, 'username' => $username, 'email' => $email),array('user_id' => $user_id));	 
					$userObj -> redirect('/account/settings');
				}
				else {
					$errors['password'] = "Sai mật khẩu";
				}
			}
		}
		
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update your account</title>
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/style2.css"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

</head>
<body class="body2">
<div class="home-nav">
	<a href="<?php echo BASE_URL; ?>/qldatmon.php">Trở Về Trang Quản Lý</a>
</div>
<div class="p2-wrapper">
	<div class="sign-up-wrapper">
		<div class="sign-up-inner">
			<div class="sign-up-div">
			  <form method="POST">
				<div class="name">
				    <h3>Change Email</h3>
				    <input type="text" name="firstName" placeholder="First Name" value="<?php echo Validate::escape($user -> firstName); ?>"/>
				    <input type="text" name="lastName" placeholder="Last Name" value="<?php echo Validate::escape($user -> lastName); ?>"/>
				</div>
				<!-- Name Error -->
				<?php if(isset($errors['names'])): ?>
				 <span class="error-in"><?php echo $errors['names'] ?></span>
				<?php endif; ?>
				<div>
				<h3>Change User Name</h3>
				<input type="text" name="username" placeholder="UserName" value="<?php echo Validate::escape($user -> username); ?>"/>
 				</div>
				<!-- Username Error -->
				<?php if(isset($errors['username'])): ?>
				 <span class="error-in"><?php echo $errors['username'] ?></span>
				<?php endif; ?>
				<div>
				<h3>Change Email</h3>
				<input type="email" name="email" placeholder="Email" value="<?php echo Validate::escape($user -> email); ?>" />
				<!-- Email Error -->
				<?php if(isset($errors['email'])): ?>
				 <span class="error-in"><?php echo $errors['email'] ?></span>
				<?php endif; ?>
				</div>


				<div>
				<h3>Enter your password to update your account</h3>
				<input type="password" name="password" placeholder="Password"/>
				
				<!-- Password Errors -->
				<?php if(isset($errors['password'])): ?>
				 <span class="error-in"><?php echo $errors['password'] ?></span>
				<?php endif; ?>
				</div>

				<!-- Required Fields Errors -->
                <?php if(isset($errors['allFields'])): ?>
 				<span class="error-in"><?php echo $errors['allFields'] ?></span>
                <?php endif; ?>
				<div class="btn-div">
				<button value="sign-up" name="update">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div><!--WRAPPER ENDS-->
</body>
</html>