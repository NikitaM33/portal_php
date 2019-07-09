<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>

    <div class="wrapper">
        <div class="menu">
            <?php require '../../ur_menu.php' ?>
        </div>

        <div class="content">
            <?php require 'corp_menu/corp_menu.php' ?>
            Корпоративная жизнь
        </div>
    </div>

<?php } else {
    header("Location: /");
}; ?>