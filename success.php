<?php
include 'core/init.php';
include 'source/mysource.php';
include 'assets/template/menu.php';

if(isset($_SESSION['user_id']))
	{
		$user_id = $_SESSION['user_id'];
        $user = $userObj->userData($user_id);
    }

if (!Users::isLoggedIn())
{
  echo '<script>alert("You need to login first.")</script>';
  echo '<script>window.location="login.php"</script>';
}

if(isset($_POST['sub_booking']))
{
    
    $tableObj->insertBooking();
    echo '<script>alert("booking completed.")</script>';
    $userObj->redirect('/index.php');
}
?>