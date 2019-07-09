<?php session_start();
    
    if($_SESSION['logged_user']){ ?>
    <?php require '../../../../db.php' ?>
    
    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>
    <?php echo "<script src='https://code.jquery.com/jquery-1.12.4.js' integrity='sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=' crossorigin='anonymous'></script>";?>
    
    <div class="wrapper">
        <div class="menu">
            <?php require '../../admin.php' ?>
        </div>

        <div class="content">
            <?php require 'news_menu/news_menu.php' ?>

            <div>
                <h1>Новости</h1>
            </div>

            <!-- Таблицы статистики -->
            <div class="newsWrapper">

                <!-- Таблица с информацией по новым статьям -->
                <?php require '../main/newTitle.php' ?>

                <!-- Таблица с информацией по старым статьям -->
                <?php //require '../main/oldTitle.php' ?>

                <!-- Таблица с информацией по удаленным статьям -->
                <?php require '../main/delitedTitle.php' ?>

            </div>
        </div>
    </div>

    <script src="mailing/ajaxMailing/ajaxMailing.js"></script>
    
<?php } else {
    header("Location: /");
}; ?>