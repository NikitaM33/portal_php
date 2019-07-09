<!-- content-start============ -->

<!-- <div class="content"> -->
    <!-- админ контент -->
    <?php if( isset($_SESSION['logged_user']) && $_SESSION['logged_user'] -> type == '1' ) : ?>
        <div class="welcomeWrapper">
            <h2><?php print getenv("COMPUTERNAME"); ?> вошел в <?php echo $_SESSION['logged_user'] -> login; ?> панель  </h2>
        </div>
        <?php 
            require 'auth/admin/content/content_admin.php';
            // require 'auth/admin/content/news/main_news.php';
        ?>


    <!-- урп контент -->
    <?php elseif( isset($_SESSION['logged_user']) && $_SESSION['logged_user'] -> type == '2' ) : ?>

        <h2><?php print getenv("COMPUTERNAME"); ?> вошел в <?php echo $_SESSION['logged_user'] -> login; ?>  панель  </h2>
        <?php include('auth/urp_menu/content_urp/content_urp.php'); ?>


    <!-- ур контент -->
    <?php elseif( isset($_SESSION['logged_user']) && $_SESSION['logged_user'] -> type == '3' ) : ?>
        <h2><?php print getenv("COMPUTERNAME"); ?> вошел в <?php echo $_SESSION['logged_user'] -> login; ?>  панель  </h2>


    <!-- анал контент -->
    <?php elseif( isset($_SESSION['logged_user']) && $_SESSION['logged_user'] -> type == '4' ) : ?>
        <h2><?php print getenv("COMPUTERNAME"); ?> вошел в <?php echo $_SESSION['logged_user'] -> login; ?>  панель  </h2>

    <?php else : ?>

        <div class="gretting">
            <h2><?php echo $config['title']?></h2>
        </div>

    <?php endif; ?>

<!-- </div> -->

<!-- content-end============ -->