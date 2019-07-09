<?php

include "includes/config/config.php";
require "libs/rb-mysql.php";

R::setup( 'mysql:host=localhost;dbname=portal_bd',
        'root', '30GjldbujduthfrkF' );
if ( !R::testConnection() ) {
        exit ( "Нет соединения с базой данных" );
}

// $session_max_time = ini_set('session.gc_maxlifetime', 60);
// $session_life_time = ini_set('session.cookie_lifetime', 0);
// session_set_cookie_params(0);


session_start();