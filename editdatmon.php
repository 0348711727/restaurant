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
    if(isset($_POST['editdatmon'])) 
    {
        $reservation_name = $_POST['reservation_name'];
        $reservation_phone = $_POST['reservation_phone'];
        $reservation_date = $_POST['reservation_date'];
        $reservation_time = $_POST['reservation_time'];
        $reservation_email = $_POST['reservation_email'];
        $reservation_table = $_POST['reservation_table'];
		$reservation_dish = $_POST['reservation_dish'];
		$reservation_quantity = $_POST['reservation_quantity'];
    }
    

    	$admin_id = $_SESSION['phanquyen'];
     	$admin    = $adminObj ->bookingData($admin_id);
    // if(isset($_POST['update']))
    // {
	// 	$reservation_name = $_POST['reservation_name'];
    //     $reservation_phone = $_POST['reservation_phone'];
    //     $reservation_date = $_POST['reservation_date'];
    //     $reservation_time = $_POST['reservation_time'];
    //     $reservation_email = $_POST['reservation_email'];
    //     $reservation_table = $_POST['reservation_table'];
	// 	$reservation_dish = $_POST['reservation_dish'];
	// 	$reservation_quantity = $_POST['reservation_quantity'];
	// 	$reservation_id = $_POST['reservation_id'];
	// 	$adminObj->editInfo();
	// }
	if(isset($_POST['editdatmon']))
    {
       	$reservation_name = $_POST['reservation_name'];
        $reservation_phone = $_POST['reservation_phone'];
        $reservation_date = $_POST['reservation_date'];
        $reservation_time = $_POST['reservation_time'];
        $reservation_email = $_POST['reservation_email'];
        $reservation_table = $_POST['reservation_table'];
        $reservation_dish = $_POST['reservation_dish'];
        $reservation_quantity = $_POST['reservation_quantity'];
        $reservation_id = $_POST['reservation_id'];
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
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
			  <form method="POST" action="success-edit.php">
				<div class="name">
					<input type="hidden" name="id" placeholder="ID" value="<?php echo $reservation_id; ?> " required/>
				    <h3>Change Name</h3>
				    <input type="text" name="name" placeholder="Name" value="<?php echo $reservation_name; ?> " required/>
                    <h3>Change Phone</h3>
                    <input type="text" name="phone" placeholder="Phone" value="<?php echo $reservation_phone; ?>" required/>
				</div>
				<!-- Name Error -->
				<?php if(isset($errors['name'])): ?>
				 <span class="error-in"><?php echo $errors['name'] ?></span>
				<?php endif; ?>
				<div>
                    <h3>Change Email</h3>
                    <input type="email" name="email" placeholder="Email" value="<?php echo $reservation_email; ?>" required/>
				 </div>
				 <!-- Email Error -->
				 <?php if(isset($errors['email'])): ?>
				 <span class="error-in"><?php echo $errors['email'] ?></span>
				<?php endif; ?>
                <div>
                    <h3>Change Date</h3>
                    <input type="date" name="date" placeholder="Date" value="<?php echo $reservation_date; ?>" required/>
 				</div>
				<div>
				<!-- Date Error -->
					<?php if(isset($errors['date'])): ?>
				 <span class="error-in"><?php echo $errors['date'] ?></span>
				<?php endif; ?>
                    <h3>Change Time</h3>
                    <input type="time" name="time" placeholder="Time" value="<?php echo $reservation_time; ?>" required/>
				<!-- Time Error -->
				<?php if(isset($errors['time'])): ?>
				 <span class="error-in"><?php echo $errors['time'] ?></span>
				<?php endif; ?>
				</div>
                <div>
                    <h3>Change Table</h3>
                    <input type="text" name="table" placeholder="Table" value="<?php echo $reservation_table; ?>" required/>
				 </div>
				 <!-- Table Error -->
				 <?php if(isset($errors['table'])): ?>
				 <span class="error-in"><?php echo $errors['table'] ?></span>
				<?php endif; ?>
                 <div>
                    <h3>Change Dishes</h3>
                    <input type="text" name="dishes" placeholder="Dishes" value="<?php echo $reservation_dish; ?>" required/>
				 </div>
				 <!-- Dishes Error -->
				 <?php if(isset($errors['dish'])): ?>
				 <span class="error-in"><?php echo $errors['dish'] ?></span>
				<?php endif; ?>
                 <div>
                    <h3>Change Quantity</h3>
                    <input type="number" name="quantity" placeholder="Quantity" value="<?php echo $reservation_quantity; ?>" required/>
				 </div>
				 <!-- Quantity Error -->
				 <?php if(isset($errors['quantity'])): ?>
				 <span class="error-in"><?php echo $errors['quantity'] ?></span>
				<?php endif; ?>
				 <?php if(isset($errors['allFields'])): ?>
 				<span class="error-in"><?php echo $errors['allFields'] ?></span>
                <?php endif; ?>
				<div class="btn-div">
					<button value="update" name="update">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div><!--WRAPPER ENDS-->
</body>
</html>