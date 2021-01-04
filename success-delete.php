<?php
    include 'core/init.php';


    
    $reservation_id = $_POST['id'];
    $adminObj->deleteInfo($reservation_id);
?>