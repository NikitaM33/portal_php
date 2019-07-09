<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>

    <div class="profileData">
        <div class="title">
            <h3>Удаленные статьи</h3>
        </div>
        <table>
            <tr>
                <td><h5>admin</h5></td>
                <td><h4>Название статьи</h4></td>
                <td>09:17</td>
                <td>05.06.2019</td>
            </tr>

            <tr>
                <td><h5>urp</h5></td>
                <td><h4>Название статьи</h4></td>
                <td>14:28</td>
                <td>05.06.2019</td>
            </tr>

            <tr>
                <td><h5>ur</h5></td>
                <td><h4>Название статьи</h4></td>
                <td>14:28</td>
                <td>05.06.2019</td>
            </tr>
        </table>
    </div>

<?php } else {
    header("Location: /");
}; ?>