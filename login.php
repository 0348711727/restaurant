<?php
    include('source/mysource.php');
    include 'core/init.php';
    if(isset($_SESSION['user_id']) || isset($_SESSION['user']))
    {
        echo'<script>window.location="index.php"</script>';
    }
    else
    {

    }
	Database::instance()->prepare('select * from users')->execute();
	// $user = $userObj -> get('users',array('user_id' => 1));
	// echo $user->username;
	if(isset($_POST['login'])){
		$email = Validate::escape($_POST['email']);
		$password = Validate::escape($_POST['password']);

		if(empty($email) or empty($password)){
			$error = "Nhập vào email và password để đăng nhập !";
		}
		else{
			if(!Validate::filterEmail($email))
			{
				$error = "Email không hợp lệ";
			}
			else
			{
				if($user = $userObj->emailExist($email))
				{
					$hash = $user->password ;
					if(password_verify($password, $hash))
					{
						//login
                        $_SESSION['user_id'] = $user->user_id ;
                        $_SESSION['firstname'] = $user->firstName ;
                        $_SESSION['lastname'] = $user->lastName;
                        $_SESSION['phone'] = $user->phone;
                        $_SESSION['email'] = $user->email;
                        // $_SESSION['timenow'] = date("Y-M-D H:i:s");
						$userObj -> redirect('/index.php');
					}
					else
					{
						$error = 'Email hoặc mật khẩu không đúng';
					}
				}
				else
				{
					$error ='không có tài khoản nào tồn tại với email này';
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
    <base href="http://localhost:88/restaurant/"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Restaurant</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/signup-style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    
  </head>

  <body>
    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="assets/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login Guest</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" placeholder="Your Email"/>
                            </div>

                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                        
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="signin" class="form-submit" value="Login"/>
                            </div>
                            <div class="r-pass">
                                <br>
                                <a href="account/recovery/">I forget my Password</a>
                            </div>
                            <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><img src="https://img.icons8.com/doodle/48/000000/facebook-new.png"/></a></li>
                                <li><a href="#"><img src="https://img.icons8.com/bubbles/50/000000/twitter.png"/></a></li>
                                <li><a href="#"><img src="https://img.icons8.com/clouds/50/000000/google-logo.png"/></a></li>
                            </ul>
                        </div>
                        </form>
                        
                        <?php if(isset($error)): ?>
			            <div class="error shake-horizontal"><?php echo $error; ?></div>
                        <?php endif; ?>
                        
			            </div>
                        
                        
                    </div>
                </div>
                <center><p>Copyright © 2020 by SaiGon Restaurant & Hotel  <a href=""></a></p></center>
            </div>
        </section>
        
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/jquery-ui.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>