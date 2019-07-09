<?php 
    session_start();
    
    if($_SESSION['logged_user']){ ?>
    <?php echo "<link rel='stylesheet' href='../../../css/style.css'>" ?>


        <?php

            // $maxlifetime = ini_get("session.gc_maxlifetime");
            // $cookielifetime = ini_get("session.cookie_lifetime");

            // echo $maxlifetime.'<br>';
            // echo $cookielifetime;


        ?>

<?php echo "<script src='https://code.jquery.com/jquery-1.12.4.js' integrity='sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=' crossorigin='anonymous'></script>";?>
    
    <!-- Таймаут сессии закрывает приложение через 15 минут  -->

    <script type="text/javascript">
        window.setTimeout("location=('../../../logout.php');",900000);
    </script>

    <div class="content">
        <div class="profilesWrapper">
            <div class="timeInfo">

                <!-- Время входа -->

                <?php require 'main/profileDataIn.php' ?>

                <!-- Время выхода -->

                <?php require 'main/profileDataOut.php' ?>
            </div>

            <hr>

            <!-- Новые статьи -->

            <div class="uploadInfo">
                
                <?php require 'main/newTitle.php' ?>

                <!-- Старые статьи -->

                <?php require 'main/oldTitle.php' ?>

                <!-- Удаленные статьи -->

                <?php require 'main/delitedTitle.php' ?>
            </div>

        </div>
    </div>

<?php } else {
    header("Location: /");
}; ?>