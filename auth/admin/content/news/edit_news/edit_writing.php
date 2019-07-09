<?php session_start();
    if($_SESSION['logged_user']){ ?>
    <?php 
        require '../../../../../db.php';
        echo "<link rel='stylesheet' href='../../../../../css/style.css'>";

        if(isset($_GET['edit_id'])){
            $uploadArt = R::findOne('articles', 'id = ?', array($_GET['edit_id']));
        }

        if(isset($_POST['apply'])){
            $artHeader = htmlspecialchars($_POST['artHeader']);
            $text = htmlspecialchars($_POST['text']);
            $img = $_POST['articlImg'];

            $machineName = getenv("COMPUTERNAME");
            $day = date('d.m.Y');
            $time = date('H:i:s');

            // Проверка на пустоту полей должна быть

            // if(empty($artHeader) || empty($artHeader))

            $editing_art = R::load('articles', $_GET['edit_id']);

            $editing_art->title = $artHeader;
            // $editing_art->image = $img;
            $editing_art->text = $text;
            $editing_art->pubdate = $day;
            $editing_art->pubtime = $time;
            $editing_art->machine_name = $machineName;
            
            R::store($editing_art);

            // Добавить проверку на изменение строки mysqli_afected_rows
            // Сделать перенаправление на другую страницу после нажатия на кнопку

            header("Location: /auth/admin/content/news/edit_news/edit_news.php");
            exit;

            // $success = "Статья отредактирована";
        }
    ?>

    <div class="wrapper">
        <div class="menu">
            <?php require '../../../admin.php'; ?>
        </div>

        <div class="content">
            <?php require '../news_menu/news_menu.php' ?>

            <div>
                <h1>Редактировать статью</h1>
            </div>

            <form action="" class="newsForm" method="POST" name="editNews">
                <strong><h2>Отредактировать статью</h2></strong>
                <p>
                    <h4>Отредактировать название</h4>
                    <input type="text" placeholder="Введите азвание" name="artHeader"
                    class="artHeader" value="<?=$uploadArt->title?>" />
                    <span style="color: red;"><?=$error_artHeader?></span>
                </p>

                <p>
                    <h4>Изменить изображение</h4>
                    <input type="file" name="articlImg"
                    class="articlImg" />
                    <span style="color: red;"><?=$error_articleHeader?></span>
                </p>

                <p>
                    <h4>Отредактировать текст</h4>
                    <textarea name="text" id="" placeholder="Введите текст" 
                     class="articleArea"><?=$uploadArt->text?></textarea>
                     <span style="color: red;"><?=$error_text?></span>
                </p>

                <p>
                    <button type="submit" name="apply"><b>Применить правки</b></button>
                    <!-- <span style="color: green"><?=$success?></span> -->
                </p>
            </form>

        </div>
    </div>

<?php } else {
    header("Location: /");
    exit;
}; ?>