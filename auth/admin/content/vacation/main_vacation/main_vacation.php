<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php echo "<link rel='stylesheet' href='../../../../../css/style.css'>" ?>

    <div class="wrapper">
        <div class="menu">
            <?php require '../../../admin.php' ?>
        </div>

        <div class="content">
            <?php require '../vacation_menu/vacation_menu.php' ?>
            Статистика вакансий
        </div>
    </div>

<?php } else {
    header("Location: /");
}; ?>