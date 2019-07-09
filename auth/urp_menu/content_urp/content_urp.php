<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php echo "<link rel='stylesheet' href='../../../css/style.css'>" ?>


    <div class="content">
        <div class="profilesWrapper">

            <!-- Вакансии -->

            

            <!-- Новые статьи -->

            <div class="uploadInfo">
                
                <?php require 'main/newTitle.php' ?>

                <!-- Старые статьи -->

                <?php require 'main/oldTitle.php' ?>

                <!-- Удаленные статьи -->

                <?php require 'main/delitedTitle.php' ?>
            </div>

        </div>
    </div>

<?php } else {
    header("Location: /");
}; ?>