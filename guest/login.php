<?php
    require "../db.php";

    $data = $_POST;
    if( isset($data['do-login']) ){
        $errors = array();
        $user = R::findOne('users', 'login = ?', array($data['login']));

        if($user){
            // пароль существует
            if( password_verify($data['password'], $user->password) ){
                // Все хорошо, логиним пользователя
                $_SESSION['logged_user'] = $user;
                require "../includes/user_log/user_log.php";
                header("location: /");
                exit;

            } else {
                $errors[] = 'Пароль введен не верно';
            }
        } else {
            $errors[] = 'Пользователь с таким логином не найден';
        }

        if( !empty($errors) ){
            echo '<div style="color: red; text-align: center;">'.array_shift($errors).'</div><hr>';
        }
    }

?>

<?php echo "<link rel='stylesheet' href='../css/style.css'>"; ?>

<div class="loginWrapper">
    <form action="/guest/login.php" method="POST" class="loginForm">
        <strong><h1>Вход</h1></strong>
        <p>
            <p><strong>Логин</strong></p>
            <input type="text" name="login" value="<?php echo @$data['login']; ?>" placeholder="Введите логин">
        </p>

        <p>
            <p><strong>Пароль</strong></p>
            <input type="password" name="password" placeholder="Введите пароль">
        </p>

        <p>
            <button type="submit" name="do-login"><b>Войти</b></button>
            <a href="/logout.php" class="goBackSignup">Назад</a>
        </p>
    </form>
</div>