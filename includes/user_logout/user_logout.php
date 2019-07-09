<?php 
    $offline = R::findOne('online', 'ip = ?', array($ip));
    $ip = $_SERVER['REMOTE_ADDR'];
              

            if ( $offline ){
                // update
                $time = time();
                $offline -> lastvisit = $time;
                R::store($offline);
                
            } else {
                // create
                $time = time();
                $date = date('d.m.Y');
                $hour = date('H:i:s');
                $offline = R::dispense('online');
                $offline -> lastvisit = $time;
                $offline -> ip = $ip;
                $offline -> date = $date;
                $offline -> time = $hour;
                $offline -> login = $_SESSION['logged_user'];
                $offline -> machineName = getenv("COMPUTERNAME");
                R::store($offline);
                // CookieManager::store($cookie_key, json_encode(array(
                //     'id' => $online -> id,
                //     'lastvisit' => $time
                // )));
            }
            // $online_count = R::count('online', "lastvisit >" . ( time() - (3600) ));
?>