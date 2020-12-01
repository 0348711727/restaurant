<?php
    include '../core/init.php';
    // kiểm tra nếu user đã loggedin
    if(!$userObj->isLoggedIn())
    {
        $userObj->redirect('/index.php');
    }
    else
    {
        $userObj->logout();
    }
?>