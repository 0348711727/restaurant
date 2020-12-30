<?php
    include 'core/init.php';
    

    if(isset($_POST['signup']))
    {
        $required = array('firstName','lastName','username','password','passwordAgain','gender','month','day','year');
        foreach($_POST as $key => $value)
        {
            if(empty($value) && in_array($key, $required) === true)
            {
                $errors['allFields'] = "Vui lòng điền đầy đủ thông tin";
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
            $rePassword = $_POST['passwordAgain'];
            $gender     = Validate::escape($_POST['gender']);
            $day     	= Validate::escape($_POST['day']);
            $month     	= Validate::escape($_POST['month']);
            $year     	= Validate::escape($_POST['year']);
            $birthday   = "{$year} - {$day} - {$month}";

			if(Validate::length($firstName,2,20))
			{
				$errors['names'] = "Tên nằm trong khoảng 2-20 ký tự";
			}
			else if(Validate::length($lastName,2,20))
			{
				$errors['names'] = "Tên nằm trong khoảng 2-20 ký tự";
			}
            else if(Validate::length($username,2,10))
			{
				$errors['username'] = "Username nằm trong khoảng 2-10 ký tự";
			}
			else if($userObj -> usernameExist($username))
			{
				$errors['username'] = "Username đã tồn tại";
			}

			if(!Validate::filterEmail($email))
			{
				$errors['email'] = "Định dạng email không hợp lệ";
			}
			else if($userObj -> emailExist($email)) 
			{
				$errors['email'] = "Email đã tồn tại";
			}
			else if($password != $rePassword)
			{
				$errors['password'] = "Mật khẩu không trùng khớp";
            }
            else
            {
                $hash = $userObj -> hash($password);
                $user_id = $userObj -> insert('users', array('firstName' => $firstName , 'lastName' => $lastName, 'username' => $username, 'email' => $email , 'password' => $hash , 'gender' => $gender , 'birthday' => $birthday ));
                $_SESSION['user_id'] = $user_id;
                $userObj->redirect('/verification');
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
    <link rel="icon" href="<?php echo BASE_URL; ?>/assets/images/favicon.icon">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Restaurant</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE_URL; ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/style.css"/>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/style1.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/signup-style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/owl.css">   
  </head>

  <body>
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-comment-alert"></i></label>
                                <input type="text" name="firstName" placeholder="First Name" value="<?php echo ((isset($firstName)) ? Validate::escape($firstName) : ''); ?>"/>
				                <input type="text" name="lastName" placeholder="Last Name" value="<?php echo ((isset($lastName)) ? Validate::escape($lastName) : ''); ?>"/>
                                <!-- Names Errors -->
                                <?php if(isset($errors['names'])): ?>
  		  		                <span class="alert alert-warning alert-dismissible"><?php echo $errors['names'] ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-comment-alert"></i></label>
                                <input type="text" name="username" placeholder="Username" value="<?php echo ((isset($username)) ? Validate::escape($username) : ''); ?>"/>
				                <!-- Username Error -->
				                <?php if(isset($errors['username'])): ?>
  		  		                <span class="alert alert-warning alert-dismissible"><?php echo $errors['username'] ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" placeholder="Email" value="<?php echo ((isset($email)) ? Validate::escape($email) : ''); ?>" />
				                <!-- Email Error -->
				                <?php if(isset($errors['email'])): ?>
  		  		                <span class="alert alert-warning alert-dismissible"><?php echo $errors['email'] ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" placeholder="Password"/>
                                
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="passwordAgain" placeholder="Confirm Password" />
				                <!-- Password Error -->
				                <?php if(isset($errors['password'])): ?>
  		  		                <span class="alert alert-warning alert-dismissible"><?php echo $errors['password'] ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                            <fieldset>
                            <br>
                               <!-- <input id="male" type="hidden" name="gender" value=""> -->
                                <input id="male" type="radio" name="gender" value="male">Male
                                <input id="female" type="radio" name="gender" value="female">Female      
                            </fieldset>
                            </div>

                            <div>
                            <fieldset class="date" >
                                Birthday
                                <select id="month_start" name="month" />
                                    <option  value="" selected>Month</option>    
                                    <option value="1">January</option>      
                                    <option value="2">February</option>      
                                    <option value="3">March</option>      
                                    <option value="4">April</option>      
                                    <option value="5">May</opcenter>      
                                    <option value="6">June</option>      
                                    <option value="7">July</option>      
                                    <option value="8">August</option>      
                                    <option value="9">September</option>      
                                    <option value="10">October</option>      
                                    <option value="11">November</option>      
                                    <option value="12">December</option>      
                                </select> -
                                
                                <select id="day_start"
                                        name="day" />
                                    <option  value="" selected>Day</option>    
                                    <option>1</option>      
                                    <option>2</option>      
                                    <option>3</option>      
                                    <option>4</option>      
                                    <option>5</option>      
                                    <option>6</option>      
                                    <option>7</option>      
                                    <option>8</option>      
                                    <option>9</option>      
                                    <option>10</option>      
                                    <option>11</option>      
                                    <option>12</option>      
                                    <option>13</option>      
                                    <option>14</option>      
                                    <option>15</option>      
                                    <option>16</option>      
                                    <option>17</option>      
                                    <option>18</option>      
                                    <option>19</option>      
                                    <option>20</option>      
                                    <option>21</option>      
                                    <option>22</option>      
                                    <option>23</option>      
                                    <option>24</option>      
                                    <option>25</option>      
                                    <option>26</option>      
                                    <option>27</option>      
                                    <option>28</option>      
                                    <option>29</option>      
                                    <option>30</option>      
                                    <option>31</option>      
                                </select>
                                
                                <select id="year_start"
                                        name="year" />
                                    <option  value="" selected>Year</option>    
                                    <option>1980</option>      
                                    <option>1981</option>      
                                    <option>1982</option>      
                                    <option>1983</option>      
                                    <option>1984</option>      
                                    <option>1985</option>      
                                    <option>1986</option>      
                                    <option>1987</option>      
                                    <option>1988</option>      
                                    <option>1989</option>     
                                    <option>1990</option>      
                                    <option>1991</option>      
                                    <option>1992</option>      
                                    <option>1993</option>      
                                    <option>1994</option>      
                                    <option>1995</option>      
                                    <option>1996</option>      
                                    <option>1997</option>      
                                    <option>1998</option>      
                                    <option>1999</option>
                                    <option>2000</option>      
                                    <option>2001</option>      
                                    <option>2002</option>      
                                    <option>2003</option>      
                                    <option>2004</option>      
                                    <option>2005</option>      
                                    <option>2006</option>      
                                    <option>2007</option>      
                                    <option>2008</option>      
                                    <option>2009</option>      
                                </select>
                                </fieldset>
                                <!-- All Fields error -->
                                <br>
                                <?php if(isset($errors['allFields'])): ?>
  		  		                <span class="alert alert-success alert-dismissible"><?php echo $errors['allFields'] ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?php echo BASE_URL; ?>/assets/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="<?php echo BASE_URL; ?>/index.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
        <center><p>Copyright © 2020 by SaiGon Restaurant & Hotel  <a href=""></a></p></center>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/vendor/jquery/jquery-ui.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/js/main.js"></script>
</body>
</html>