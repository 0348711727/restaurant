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
    $reservation_id = $_REQUEST['id'];
    $adminObj ->editInfo($reservation_id);
    $userObj->redirect('/qldatmon.php')
    
?>