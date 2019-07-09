<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>

    <div class="profileData">
        <div class="title">
            <h3>Время выхода</h3>
        </div>

        <table>
            <tr>
                <td><h4>admin</h4></td>
                <td>05.06.2019</td>
                <td>18:59</td>
            </tr>

            <tr>
                <td><h4>urp</h4></td>
                <td>05.06.2019</td>
                <td>18:09</td>
            </tr>

            <tr>
                <td><h4>ur</h4></td>
                <td>05.06.2019</td>
                <td>17:55</td>
            </tr>
        </table>
    </div>

<?php } else {
    header("Location: /");
}; ?>