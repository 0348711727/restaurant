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
    $reservation_name = $_POST['reservation_name'];
    $reservation_phone = $_POST['reservation_phone'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $reservation_email = $_POST['reservation_email'];
    $reservation_table = $_POST['reservation_table'];
    $reservation_dishname = $_POST['reservation_dishname'];
    $reservation_quantity = $_POST['reservation_quantity'];
    echo '<script>alert("Booking completed !.")</script>';
    $tableObj->insertBooking();
    $results = $tableObj->changeStatusTable();
    $userObj->redirect('/index.php');
}
else
{
    $userObj->redirect('/booking-table.php');
}
?>