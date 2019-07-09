<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>

    <?php require 'auth/online_counter/online_counter.php'; ?>

    <?php 

        // $online = R::findOne('users', 'login = ?', array($data['login']));
        // $userName = $_SESSION['logged_user'] -> login;
        // $online -> date = date('d.m.Y');
        // $online -> time = date('H:i');
    
        // if ( $online ){

        // }

        // Кто онлайн на сайте, скрипт на PHP
        // How to Show Live Online User using PHP with Ajax Jquery - 2
        // -->Онлайн пользователей!!!!!!!!!<--
        $online 

    ?>

    <div class="profileData">
        <div class="title">
            <h3>Сейчас на сайте <?php echo $online_count ?></h3>
        </div>
        <table>
            <tr>
                <td><h4><?php echo $_SESSION['logged_user'] -> login; ?></h4></td>
                <td><?php echo $online -> date; ?></td>
                <td><?php
                    echo mb_substr($online -> time, 0, 8, 'utf-8'); ?>
                </td>
            </tr>
        </table>
    </div>

<?php } else {
    header("Location: /");
}; ?>