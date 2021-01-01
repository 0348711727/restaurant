<?php
include 'core/init.php';
include 'source/mysource.php';
include 'assets/template/header.php';
$p = new restaurant();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user = $userObj->userData($user_id);
}

if (!Users::isLoggedIn()) {
    echo '<script>alert("You need to login first.")</script>';
    echo '<script>window.location="login.php"</script>';
}

if (isset($_POST['choosetable'])) {
    $reservation_name = $_POST['reservation_name'];
    $reservation_phone = $_POST['reservation_phone'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $reservation_email = $_POST['reservation_email'];
    $reservation_table = $_POST['reservation_table'];
    $_SESSION['res_id'] = $_POST['res_id'];
}
?>
<title>Select Menu</title>

<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <center>
        <form action="confirm-booking.php" method="POST" id="formConfirm">
            <div class="container" style="border: 1px solid black;">
                <input type="text" name="reservation_name" value="<?php echo $reservation_name; ?>" />
                <input type="text" name="reservation_phone" value="<?php echo $reservation_phone; ?>" />
                <input type="text" name="reservation_date" value="<?php echo $reservation_date; ?>" />
                <input type="text" name="reservation_time" value="<?php echo $reservation_time; ?>" />
                <input type="text" name="reservation_email" value="<?php echo $reservation_email; ?>" />
                <input type="text" name="reservation_table" value="<?php echo $reservation_table; ?>" />
                <?php
                $sql = "select * from dish";
                $ta = $p->xuatmonan($sql);
                foreach ($ta as $key => $val) 
                {
                    
                ?>
                    <div class="row">
                        <div class="card col-md-12">
                            <div class="card-header">
                                <strong><?php echo $val['dishname']; ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></div>
                                <input type="hidden" name="reservation_dishname[]" value="<?php echo $val['dishname'];?>" />
                            <a href="#"><img src="assets/images/<?php echo $val['hinh']; ?>" alt=""></a>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">&nbsp;<?php echo $val['gia'] ?></li>
                                <li class="list-group-item">&nbsp;<?php echo $val['mota'] ?></li>
                                <li class="list-group-item">&nbsp;Số Lượng</li>
                                <li class="list-group-item">&nbsp;
                                    <input type="number" name="reservation_quantity[]" min="0" max="50" step="1" value="0">
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            </div>
            <div class="col-md-6">
                <input type="hidden" name="res_id" value="4">
                <input type="submit" value="Confirm" name="confirm" class="btn btn-primary py-3 px-5">
            </div>
        </form>

    </center>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>