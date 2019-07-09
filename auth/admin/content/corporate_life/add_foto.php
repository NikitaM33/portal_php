<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>
    <?php
        if ( isset($_FILES['image']) ) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));

            $expensions = array("jpeg","jpg","png");
            if ( $file_size > 2097152 ) {
                $errors[] = 'Файл не должен привышать 2Мб';
            }

            if ( empty($errors) == true ) {
                move_uploaded_file($file_tmp, "../../../images/" . $file_name);
                // echo 'Success';
            } else {
                print $errors;
            }
        }
    ?>

    <div class="wrapper">
        <div class="menu">
            <?php require '../../admin.php'; ?>
        </div>

        <div class="content">
            <?php require 'corp_menu/corp_menu.php' ?>
            <form action="add_foto.php" method="post" enctype="multipart/form-data" class="newsForm">
                <strong><h1>Новый альбом</h1></strong>
                <p>
                    <h2>Название альбомак</h2>
                    <input type="text" placeholder="Введите заголовок">
                </p>

                <p>
                    <h2>Загрузить фото</h2>
                    <input type="file" name="image">
                </p>

                <p>
                    <button type="submit"><b>Опубликовать</b></button>
                </p>
            </form>

            <!-- <div><img src="images/unicorn.jpg" alt=""></div> -->
        </div>
    </div>

<?php } else {
    header("Location: /");
}; ?>