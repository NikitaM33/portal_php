<?php session_start();
    if($_SESSION['logged_user']){ ?>

    <?php echo "<link rel='stylesheet' href='../../../../css/style.css'>" ?>

    <div class="wrapper">
        <div class="menu">
            <?php require '../../admin.php'; ?>
        </div>

        <div class="content">
            <?php require 'vacation_menu/vacation_menu.php' ?>

            <form action="/auth/admin/vacation/create_vacation.php" class="newsForm">
                <strong><h1>Добавить вакансию</h1></strong>
                <p>
                    <h2>Название вакансии</h2>
                    <input type="text" placeholder="Введите название">
                </p>

                <p>
                    <h2>ЗП</h2>
                    <input type="text" placeholder="Введите сумму">
                </p>

                <p>
                    <h2>Описание вакансии</h2>
                    <textarea name="" id="" placeholder="Введите текст"></textarea>
                </p>

                <p>
                    <button type="submit" name="do_vacation"><b>Опубликовать</b></button>
                </p>
            </form>
        </div>
    </div>

<?php } else {
    header("Location: /");
}; ?>