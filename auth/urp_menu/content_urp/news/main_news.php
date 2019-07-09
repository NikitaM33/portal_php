<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>

    <div class="wrapper">
        <div class="menu">
            <?php require '../../urp_menu.php' ?>
        </div>

        <div class="content">
            <?php require 'news_menu/news_menu.php' ?> <!-- Меню Новости УРП -->

            <!-- Таблицы статистики -->
            <div class="newsWrapper">

                <?php require '../main/newTitle.php' ?> <!-- Таблица с информацией по новым статьям -->

                <?php require '../main/oldTitle.php' ?> <!-- Таблица с информацией по старым статьям -->

                <?php require '../main/delitedTitle.php' ?> <!-- Таблица с информацией по удаленным статьям -->

            </div>
        </div>
    </div>

<?php } else {
    header("Location: /");
}; ?>