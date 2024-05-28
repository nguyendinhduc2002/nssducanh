<?php
    session_start();

    //remove all session
    session_unset();
    
    //destroy
    session_destroy();
    
    // Chuyển hướng đến trang đăng nhập hoặc trang chính
	header("refresh:0; url='index.php'");
	exit;
?>