<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>

    <div class="wrapper">
        <div class="menu">
            <?php require '../../admin.php' ?>
        </div>

        <div class="content">
            <?php require 'bulletin_menu/bulletin_menu.php' ?>
            доска объявлений
        </div>
    </div>

<?php } else {
    header("Location: /");
}; ?>