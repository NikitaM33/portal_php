<?php session_start();
    if($_SESSION['logged_user']){ ?>



    <h1>Отдел обучения</h1>

    

<?php } else {
    header("Location: /");
}; ?>