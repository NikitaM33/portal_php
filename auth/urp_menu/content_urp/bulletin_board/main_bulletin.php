<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>

    <div class="wrapper">
        <div class="menu">
            <?php require '../../urp_menu.php' ?>
        </div>

        <div class="content">
            <?php require 'menu_bulletin/menu_bulletin.php' ?>
            доска объявлений
        </div>
    </div>

<?php } else {
    header("Location: /");
}; ?>