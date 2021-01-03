<?php
include 'core/init.php';
include 'source/mysource.php';
include 'assets/template/header.php';
$p = new restaurant();

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
if (isset($_POST['confirm']))
{
    $reservation_name = $_POST['reservation_name'];
    $reservation_phone = $_POST['reservation_phone'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $reservation_email = $_POST['reservation_email'];
    $reservation_table = $_POST['reservation_table'];
    $reservation_dishname = $_POST['reservation_dishname'];
    $reservation_quantity = $_POST['reservation_quantity'];
    $_SESSION['res_id'] = $_POST['res_id'];
}


?>
<title>Confirm</title>

<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    
        <form action="success.php" method="POST">
            <div class="container">
                <label for="">Email address</label>
                <input type="email" class="form-control" name="reservation_email" value="<?php echo $reservation_email ?>" placeholder="Enter email" readonly>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="container">
                <label for="">Name</label>
                <input type="text" class="form-control" name="reservation_name" value="<?php echo $reservation_name;?>" readonly>
            </div>
            <div class="container">
                <label for="">Phone</label>
                <input type="text" class="form-control" name="reservation_phone" value="<?php echo $reservation_phone;?>" readonly>
            </div>
            <div class="container">
                <label for="">Date</label>
                <input type="text" class="form-control" name="reservation_date" value="<?php echo $reservation_date;?>"  readonly>
            </div>
            <div class="container">
                <label for="">Time</label>
                <input type="text" class="form-control" name="reservation_time" value="<?php echo $reservation_time;?>"  readonly>
            </div>
            <div class="container">
                <label for="">Table Booking</label>
                <input type="text" class="form-control" name="reservation_table" value="<?php echo $reservation_table;?>"  readonly>
            </div>
            <div class="container">
                <?php for($i = 0; $i < count($reservation_dishname); $i++)
                { 
                    if(($reservation_quantity[$i]) > 0 )
                    {
                        ?>
                            <label for="">Món</label>
                                <input type="text" class="form-control" name="reservation_dishname" value="<?php echo $reservation_dishname[$i];?>"  readonly>
                            <label for="">Số Lượng</label>
                                <input type="text" class="form-control" name="reservation_quantity" value="<?php echo $reservation_quantity[$i];?>"  readonly>
                            <br>
                        <?php 
                    }
                } 
                ?>
                
            </div>
            <div class="container">
                <input type="hidden" name="res_id" value="4">
                <button type="submit" value="sub_booking" name="sub_booking" class="btn btn-primary">Submit</button>
            </div
            
        </form>
</body>




