<?php session_start();
    if($_SESSION['logged_user']){ ?>
    <?php require '../../../../../db.php' ?>
    <?php echo "<link rel='stylesheet' href='../../../../../css/style.css'>" ?>

    <?php
        if(isset($_GET['edit_id'])){
            
        }

        if(isset($_POST['apply'])) {
            $articleHeader = htmlspecialchars($_POST['artHeader']);
            $text_body = htmlspecialchars($_POST['text']);


            // Для того чтобы текст сохранялся в полях при перезагрузке страницы

            // $_SESSION['articleHeader'] = $articleHeader;
            // "<input value="$_SESSION['articleHeader'];" />";
            // $_SESSION['text_body'] = $text_body;

            $error_articleHeader = "";
            $error_text_body = "";
            $error = false;

            if(strlen($articleHeader) == 0) {
                $error_articleHeader = "Название статьи не введено";
                $error = true;
            }

            if(strlen($text_body) == 0) {
                $error_text_body = "Статья не введена";
                $error = true;
            }

            if(!$error) {
                $machineName = getenv("COMPUTERNAME");
                $day = date('d.m.Y');
                $time = date('H:i:s');

                $users = R::load('users', 1);

                $edited_articles = R::dispense('edited_articles');
                $edited_articles->title = $articleHeader;
                $edited_articles->text = $text_body;
                $edited_articles->image = NULL;
                $edited_articles->pubdate = $day;
                $edited_articles->pubtime = $time;
                $edited_articles->machine_name = $machineName;

                $users->ownArticlesList[] = $edited_articles;
                
                R::store($users);

                $success = "Статья отредактирована";
            }
        };
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
                    class="artHeader" />
                    <span style="color: red;"><?=$error_artHeader?></span>
                </p>

                <p>
                    <h4>Отредактировать текст</h4>
                    <textarea name="text" id="" placeholder="Введите текст" 
                     class="articleArea"><?=$_SESSION['text']; ?></textarea>
                     <span style="color: red;"><?=$error_text?></span>
                </p>

                <p>
                    <button type="submit" name="apply"><b>Применить правки</b></button>
                    <span style="color: green"><?=$success?></span>
                </p>
            </form>

        </div>
    </div>

<?php } else {
    header("Location: /");
}; ?>