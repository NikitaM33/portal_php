<?php 
    require '../../../../db.php';

    // $users = R::load('users', 1); //Зависимости id и admin реализованы с помощью отношений в БД
    $users = R::findAll('articles', "ORDER BY pubtime DESC LIMIT 30");

    foreach($users as $articles){
        echo "<tr>
            <td><h5>".$articles->users_id."</h5></td>
            <td><h4>".mb_substr($articles->title, 0, 15, 'utf-8')."</h4></td>
            <td>".mb_substr($articles->pubtime, 0, 5, 'utf-8')."</td>
            <td>".$articles->pubdate."</td>
            <td>".$articles->machine_name."</td>
        </tr>";
    }
?>