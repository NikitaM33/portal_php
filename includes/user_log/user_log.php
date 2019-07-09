<?php 

    $online = R::findOne('online', 'ip = ?', array($ip));
    $ip = $_SERVER['REMOTE_ADDR'];
              

            if ( $online ){
                // update
                $time = time();
                $online -> lastvisit = $time;
                R::store($online);
                
            } else {
                // create
                $time = time();
                $date = date('d.m.Y');
                $hour = date('H:i:s');
                $online = R::dispense('online');
                // $online -> lastvisit = $time;
                $online -> ip = $ip;
                $online -> date = $date;
                $online -> time = $hour;
                $online -> login = $_SESSION['logged_user'];
                $online -> machineName = getenv("COMPUTERNAME");
                R::store($online);
                // CookieManager::store($cookie_key, json_encode(array(
                //     'id' => $online -> id,
                //     'lastvisit' => $time
                // )));
            }
            $online_count = R::count('online', "lastvisit >" . ( time() - (3600) ));
    //     }
    // }
?>