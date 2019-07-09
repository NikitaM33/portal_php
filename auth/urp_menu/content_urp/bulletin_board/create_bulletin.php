<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>

    <div class="wrapper">
        <div class="menu">
            <?php require '../../urp_menu.php'; ?>
        </div>

        <div class="content">
            <?php require 'menu_bulletin/menu_bulletin.php' ?>
            <form action="/auth/urp_menu/content_urp/bulletin_board/create_bulletin.php" class="newsForm">
                <strong><h1>Новое объявление</h1></strong>
                <p>
                    <h2>Заголовок</h2>
                    <input type="text" placeholder="Введите заголовок">
                </p>

                <p>
                    <h2>Текст</h2>
                    <textarea name="" id="" placeholder="Введите текст"></textarea>
                </p>

                <p>
                    <button type="submit" name=""><b>Опубликовать</b></button>
                </p>
            </form>
        </div>
    </div>

<?php } else {
    header("Location: /");
}; ?>