<?php 
   require 'cookies.php';
// Счётчик онлайна на PHP! Сколько пользователей на сайте?

//     $cookie_key = 'online_cache';
//     $ip = $_SERVER['REMOTE_ADDR'];
//     $online = R::findOne('users', 'ip = ?', array($ip));

//     // echo '<pre>'; print_r($_COOKIE); exit();

//     if ( $online ){
//         // update
//             $time = time();
//             $online -> lastvisit = $time;
//             R::store($online);
        
//     } else {
//         // create
//         $time = time();
//         $date = date('d.m.Y');
//         $hour = date('H:i:s');
//         $online = R::dispense('users');
//         $online -> lastvisit = $time;
//         $online -> ip = $ip;
//         $online -> date = $date;
//         $online -> time = $hour;
//         $online -> login = $_SESSION['logged_user'];
//         R::store($online);
//         CookieManager::store($cookie_key, json_encode(array(
//             'id' => $online -> id,
//             'lastvisit' => $time
//         )));
//     }

//     $online_count = R::count('users', "lastvisit >" . ( time() - (3600) ))
// ?>