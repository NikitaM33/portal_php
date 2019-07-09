<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php
        require "../../../../../db.php";
        

        // $article = R::load('articles', 71);
        // R::trash($article);

        $articles_list = R::findAll('articles', "ORDER BY pubtime DESC");
        // if(isset($_GET['del_id'])) {
            // var_dump($_GET['del_id']);
            
            // $delete = R::exec("DELETE FROM `articles` WHERE `id` = {$del_id}");
            // $article = R::load('articles', $del_id);
            // var_dump($del_id);
            // var_dump($article);

            // if($delete) {
            //     $_SESSION['res'] = 'Статья удалена';
            //     header('Location: /auth/admin/content/news/edit_news/edit_news.php');
            //     exit();
            // } else {
            //     exit('Неудалено');
            // }
            // https://intop24.ru/article_15_lesson_6.php
            // Че то не удаляется(((
        // };

        foreach($articles_list as $articles){
            echo "
            <tr>
                <td>$articles->title</td>
                <td>$articles->users_id</td>
                <td>$articles->machine_name</td>
                <td>
                    <a href='/auth/admin/content/news/edit_news/edit_writing.php?edit_id={$articles->id}' class='edit'>
                        <svg style='width:24px;height:24px' viewBox='0 0 24 24'>
                            <path fill='#333333' d='M16.84,2.73C16.45,2.73 16.07,2.88 15.77,3.17L13.65,5.29L18.95,10.6L21.07,8.5C21.67,7.89 21.67,6.94 21.07,6.36L17.9,3.17C17.6,2.88 17.22,2.73 16.84,2.73M12.94,6L4.84,14.11L7.4,14.39L7.58,16.68L9.86,16.85L10.15,19.41L18.25,11.3M4.25,15.04L2.5,21.73L9.2,19.94L8.96,17.78L6.65,17.61L6.47,15.29' />
                        </svg>
                    </a>

                    <a href='?del_id={$articles->id}' class='delete'>
                        <svg style='width:24px;height:24px' viewBox='0 0 24 24'>
                            <path fill='#333333' d='M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z' />
                        </svg>
                    </a>
                </td>
            </tr>";
        }
    ?>


<?php } else {
    header("Location: /");
}; ?>