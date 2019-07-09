<?php 
    require '../../../../db.php';

    $day = date('d.m.Y');
    // Тут менять количество выводимых записей онлайн...
    $usersDate = R::findAll('online', "ORDER BY time DESC LIMIT 30");

    // ...и тут менять количество онлайн
    $_SESSION['loader'] += 30;
    foreach($usersDate as $user=>$date){
        if($date->date == $day && $date->lastvisit == NULL)
        echo "<tr>
            <td><h4>".$date->login_id."</h4></td>
            <td>" .$date->date. "</td>
            <td>"
                .mb_substr($date->time, 0, 8, 'utf-8').
            "</td>
        <td>" .$date->machineName. "</td>";
    }

?>