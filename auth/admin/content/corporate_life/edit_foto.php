<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php
        require "../../../../db.php";
    ?>

    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>

    <div class="wrapper">
        <div class="menu">
            <?php require '../../admin.php'; ?>
        </div>

        <div class="content">
            <?php require 'corp_menu/corp_menu.php' ?>
            <h1>Редактировать фото</h1>
            <h4><?php 
                $articles_list = R::findAll('bulletin', "ORDER BY pubdate DESC");
                foreach($articles_list as $articles){
                echo $articles -> title;
                echo '<br>';
                }
            ?>
            </h4>
        </div>
    </div>

<?php } else {
    header("Location: /");
}; ?>