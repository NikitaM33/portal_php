<?php 
    require '../../../../db.php';


    $day = date('d.m.Y');
    // Тут менять количество выводимых записей офлайн...
    $lastvisit = R::findAll('online', "ORDER BY time DESC LIMIT 30");

    // ...и тут менять количество офлайн
    $_SESSION['lastvisiter'] += 30;
    foreach($lastvisit as $user){
        if($user->date == $day && $user->lastvisit == true)
        echo "<tr>
            <td><h4>".$user->login_id."</h4></td>
            <td>" .$user->date. "</td>
            <td>"
                .mb_substr($user -> time, 0, 8, 'utf-8').
            "</td>
        </tr>";
    }
?>