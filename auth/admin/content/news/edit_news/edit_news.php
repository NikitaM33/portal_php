<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php
        require "../../../../../db.php";
    ?>

    <?php echo "<link rel='stylesheet' href='../../../../../css/style.css'>" ?>
    <?php echo "<script src='https://code.jquery.com/jquery-1.12.4.js' integrity='sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=' crossorigin='anonymous'></script>";?>

    

    <div class="wrapper">
        <div class="menu">
            <?php require '../../../admin.php'; ?>
        </div>

        <div class="content">
            <?php require '../news_menu/news_menu.php';
                $_SESSION['editArticles'] = 0;

                // Редактирование статьи
                // if(isset($_GET['edit_id']))
                

                // Удаление статьи
                if(isset($_GET['del_id']))
                $delete = R::exec("DELETE FROM `articles` WHERE `id` = {$_GET['del_id']}");
            ?>

            <script type="text/javascript">
        
                function loadEditArticles() {
                    $.get('/auth/admin/content/news/edit_news/edit_treatment.php', function (data) {
                        if( data != 'end' ){
                            $('#editArticles').append( data );
                        }
                    });
                }

                $(document).ready(function(){ 
                    loadEditArticles();
                });

            </script>

            <div>
                <h1>Редактировать статью</h1>
            </div>

            <div class="auxiliary-wrapper">
                <h2 class="underline"><p>Список статей</p></h2>

                <!-- <button onclick="loadEditArticles()">Больше статей</button> -->
                
                <div  class='article-title'>
                    <table id="editArticles">
                        <tr>
                            <td><b>Название</b></td>
                            <td><b>id автора</b></td>
                            <td><b>Имя машины</b></td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php } else {
    header("Location: /");
}; ?>