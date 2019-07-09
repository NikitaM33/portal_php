<?php
    require '../../../../../db.php';

    $usersMail = R::findAll('users', "ORDER BY email DESC");
    $newArticle = R::findLast('articles');
    $obj = "Новостная рассылка Филберт";
    $body = "Новая статья появилась на портале Филберт: <a href='#'>\"$newArticle->title\"</a>";
    $headers = 'From: Filbert mailing' . "\r\n" .
                'Reply-To: n.melchenkov@filbert.pro' . "\r\n" . 
                'MIME-Version: 1.0' . "\r\n" . 
                'Content-type: text/html; charset=UTF-8' . "\r\n";
    
    for($i = 0; $i <= count($usersMail); $i++){
        mail($usersMail[$i]->email, $obj, $body, $headers);
    }
    header('location: ../create_news.php');
?>