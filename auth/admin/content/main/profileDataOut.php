<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>

    <?php echo "<script src='https://code.jquery.com/jquery-1.12.4.js' integrity='sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=' crossorigin='anonymous'></script>";
        $_SESSION['lastvisiter'] = 0;
    ?>

    <script type="text/javascript">
        function loadOfflineUser() {
            $.get('/auth/admin/content/main/loaderOut.php', function (data) {
                
                if( data != 'end' ){
                    $('#userOffline').append( data );
                }
            });
        }

        $(document).ready(function(){
            loadOfflineUser();
        });
    </script>

    <div class="profileData">
        <div class="title">
            <h3>Время выхода</h3>
        </div>

        <table id="userOffline"></table>
    </div>

<?php } else {
    header("Location: /");
}; ?>