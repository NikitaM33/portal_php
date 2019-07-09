

    <!-- header menu-start========== -->

    <!-- <div class="menu"> -->

        <!-- админ меню -->

        <?php if( isset($_SESSION['logged_user']) && $_SESSION['logged_user'] -> type == '1' ) : ?>

            <?php 
                require "auth/admin/admin.php";
            ?>
            


        <!-- урп меню -->

        <?php elseif( isset($_SESSION['logged_user']) && $_SESSION['logged_user'] -> type == '2' ) : ?>

            <?php require "auth/urp_menu/urp_menu.php" ?>


        <!-- ур меню -->

        <?php elseif( isset($_SESSION['logged_user']) && $_SESSION['logged_user'] -> type == '3' ) : ?>

            <?php require "auth/ur_menu/ur_menu.php" ?>


        <!-- анал меню -->

        <?php elseif( isset($_SESSION['logged_user']) && $_SESSION['logged_user'] -> type == '4' ) : ?>

            <?php require "auth/anal_menu/anal_menu.php" ?>


        <!-- общее меню -->

        <?php else : ?>
            <a href="/guest/login.php">Вход</a>
            <a href="/guest/signup.php">Регистрация</a>
        <?php endif; ?>

    <!-- </div> -->

    <!-- header menu-end========== -->