<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>


    <?php 
        // этот код написать в ячейке история входов
        // $online = R::load('online', 8);
        // $online -> date;
        // $online = R::findAll('online',' ORDER BY date DESC LIMIT 1 ');

        // $online = R::findLast('online');
        // $online = R::findAll('online', 'ORDER BY time DESC LIMIT 4');
        // $online = R::loadAll('online', array(28));


        // Кто онлайн на сайте, скрипт на PHP
        // How to Show Live Online User using PHP with Ajax Jquery - 2
        // -->Онлайн пользователей!!!!!!!!!<--

    ?>

<!-- [PHP] Пишем свой движок 2.0. Подгрузка данных AJAX #9 -->
<?php echo "<script src='https://code.jquery.com/jquery-1.12.4.js' integrity='sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=' crossorigin='anonymous'></script>";
    $_SESSION['loader'] = 0;
?>

    <script type="text/javascript">
    
        function loadOnlineUser() {
            $.get('/auth/admin/content/main/loader.php', function (data) {
                if( data != 'end' ){
                    $('#userOnline').append( data );
                }
            });
        }

        $(document).ready(function(){ 
            loadOnlineUser();
        });

    </script>

    <div class="profileData">
        <div class="title">
            <h3>Время входа</h3>
            <!-- Включить таймаут сессии -->
        </div>
        <!-- <button onclick="loadOnlineUser()">Обновить</button> -->
        <table id="userOnline"></table>
    </div>

<?php } else {
    header("Location: /");
}; ?>