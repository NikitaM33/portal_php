<?php
    require "../db.php";
    // require "../header.php";

    $data = $_POST;
    if( isset($data['do-signup']) ){
        // проверка на пустоту инпутов
        $errors = array();
        if( trim($data['login']) == '' ){
            $errors[] = 'Логин введен не верно';
        }

        if( $data['password'] == '' ){
            $errors[] = 'Пароль введен не верно';  
        }

        if( $data['password_2'] != $data['password'] ){
            $errors[] = 'Повторный пароль введен не верно';
        }

        if( R::count('users', "login = ?", array($data['login'])) > 0 ){
            $errors[] = 'Пользователь с таким логином уже существует';
        }

        if( R::count('users', "password = ?", array($data['password'])) > 0 ){
            $errors[] = 'Пользователь с таким паролем уже существует';
        }

        if( $data['type'] == '' ){
            $errors[] = 'Тип не присвоен';  
        }

        // создание нового пользователя и шифровка пароля в БД

        if( empty($errors) ){
            // все хорошо, регистрируем
             $user = R::dispense( 'users' );
             $user->login = $data['login'];
             $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
             $user->type = $data['type'];
             R::store($user);
             echo '<div style="color: green;">Успешная регистрация</div><hr>';
             
        } else {
            echo '<div style="color: red; text-align: center;">'.array_shift($errors).'</div><hr>';
        }
    }

    function go_back( $url ) {
        exit( '{"go" : "'.$url.'"}' );
    }
?>

<?php echo "<link rel='stylesheet' href='../css/style.css'>"; ?>

<div class="signupWrapper">
    
<form action="/guest/signup.php" method="POST" class="signupForm">
    <strong><h1>Регистрация нового пользователя</h1></strong>
    <p>
        <p><strong>Логин</strong></p>
        <input type="text" name="login" value="<?php echo @$data['login']; ?>" placeholder="Введите логин">
    </p>

    <p>
        <p><strong>Пароль</strong></p>
        <input type="password" name="password" placeholder="Введите пароль">
    </p>

    <p>
        <p><strong>Введите пароль еще раз</strong></p>
        <input type="password" name="password_2" placeholder="Введите пароль">
    </p>
    
    <p>
        <p><strong>Присвойте тип</strong></p>
        <input type="text" name="type" placeholder="Введите тип">
    </p>

    <p>
        <button type="submit" name="do-signup"><b>Зарегестрировать</b></button>
        <a href="/logout.php" class="goBackSignup">Назад</a>
    </p>
</form>

</div>