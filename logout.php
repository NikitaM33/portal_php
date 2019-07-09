<?php
    require "db.php";
    require "includes/user_logout/user_logout.php";
    unset($_SESSION['logged_user']);
    header('location: /');
?>