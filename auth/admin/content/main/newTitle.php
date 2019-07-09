<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>
    <?php echo "<script src='https://code.jquery.com/jquery-1.12.4.js' integrity='sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=' crossorigin='anonymous'></script>"; 
        $_SESSION['newArticles'] += 0;
    ?>

    <script type="text/javascript">
        
        function loadNewArticles() {
            $.get('/auth/admin/content/main/loadNewArticles.php', function (data) {
                if( data != 'end' ){
                    $('#addedArticles').append( data );
                }
            });
        }

        $(document).ready(function(){ 
            loadNewArticles();
        });

    </script>
     
    <div class="profileData">
        <div class="title">
            <h3>Новые статьи</h3>
        </div>
        <table id="addedArticles">
            <tr>
                <td><b>id</b></td>
                <td><b>Название статьи</b></td>
                <td><b>Время публикации</b></td>
                <td><b>Дата публикации</b></td>
                <!-- <td><b>Просмотры</b></td> -->
                <td><b>Имя машины</b></td>
            </tr>
        </table>
    </div>

<?php } else {
    header("Location: /");
}; ?>