<?php session_start();
    if($_SESSION['logged_user']){ ?>
    <?php require '../../../../db.php' ?>
    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>
    <?php //echo $_SESSION['logged_user']->login; ?>

    <?php
        if(isset($_POST['send'])) {
            $articleHeader = htmlspecialchars($_POST['articleHeader']);
            $text_body = htmlspecialchars($_POST['text_body']);


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

                $users = R::load('users', 2);

                $newArticle = R::dispense('articles');
                $newArticle->title = $articleHeader;
                $newArticle->text = $text_body;
                $newArticle->image = NULL;
                $newArticle->pubdate = $day;
                $newArticle->pubtime = $time;
                $newArticle->machine_name = $machineName;

                $users->ownArticlesList[] = $newArticle;
                
                R::store($users);

                $success = "Статья опубликована";
                $alarmBtn = "<form action='mailing/mailing.php' method='POST' class='mailing-button' accept-charset='UTF-8'>
                                <div>
                                    <h4>Оповестить всех о новой статье?</h4>
                                </div>
                                    
                                <p>
                                    <button type='submit'>Оповестить</button>
                                </p>
                            </form>";
            }
        };
    ?>

    <div class="wrapper">
        <div class="menu">
            <?php require '../../urp_menu.php'; ?>
        </div>

        <div class="content">
            <?php require 'news_menu/news_menu.php' ?>

            <p>
                <?=$alarmBtn?>
            </p>

            <p>
                
            </p>

            <form action="" class="newsForm" method="POST" name="createNews">
                <strong><h1>Новости</h1></strong>
                <p>
                    <h2>Название статьи</h2>
                    <input type="text" placeholder="Введите заголовок" name="articleHeader"
                    class="articleHeader" />
                    <span style="color: red;"><?=$error_articleHeader?></span>
                </p>

                <p>
                    <h2>Статья</h2>
                    <textarea name="text_body" id="" placeholder="Введите текст" 
                     class="articleArea"><?=$_SESSION['text_body']; ?></textarea>
                     <span style="color: red;"><?=$error_text_body?></span>
                </p>

                <p>
                    <button type="submit" name="send"><b>Опубликовать</b></button>
                    <span style="color: green"><?=$success?></span>
                </p>
            </form>

        </div>
    </div>

<?php } else {
    header("Location: /");
}; ?>