<?php
    require "db.php";
    require "includes/config/config.php";
?>

<!-- Простой чат на PHP. Часть 1 - 
Как подружить js c php  с помощью вебсокетов -->

<!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title><?=$title?></title>
            <link rel="stylesheet" href="css/style.css">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
            <!-- Возможно удалить -->
            <!-- <script type="text/javascript" src="includes/js/jQuerySlim.js"></script> -->
            <script src='https://code.jquery.com/jquery-1.12.4.js' integrity='sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=' crossorigin='anonymous'></script>
            <script src="includes/js/script.js"></script>
            <script src="https://kit.fontawesome.com/c000142a0f.js"></script>
        </head>
        <body>
            <div class="wrapper">
                
                <div class="menu">
                    <?php require "header.php"; ?>
                </div>

                <div class="content">
                    <?php require "content.php"; ?>
                </div>

                <div class="footer">
                    <?php require "footer.php"; ?>
                </div>
            </div>
        </body>
    </html>