<? session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">
</head>


<body class="back">
    <?
    session_start();
    ?>
    <? include "header.php" ?>

    <br>
    <h1>Ваши отзывы</h1>


    <div class="comment">

        <div class="container">


            <form class="" method="post">
                <h2>Нам очень важно ваше мнение!</h2>
                <br>
                <div class="card-sec "><textarea class="t2 t4 com_back" name="message" placeholder="Оставьте отзыв о нашем интернет магазине"
                    required></textarea></div><br>
                <input class="authinput btn btn-danger t2" type="submit" value="Отправить">
            </form>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>

<?php


include 'dbconnect1.php';
// Проверка формы на пустоту
if (!empty($_POST['message'])) {
    // Подключение к базе данных
    $db = dbconn();
    // Подготовка данных
    $name = $db->real_escape_string($_SESSION['login']);
    $email = $db->real_escape_string($_SESSION['email']);
    $message = $db->real_escape_string($_POST['message']);
    // Запрос к базе данных
    $sql = "INSERT INTO `reviews`(`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";
    // Выполнение запроса
    if ($db->query($sql)) {
        // echo "Ваш отзыв отправлен!";
    } else {
        //echo "Ошибка: " . $sql . "<br>" . $db->error;
    }
    // Закрытие подключения
    $db->close();
}
?>


<div class="container">
    <br>
    <br>
    <?php
    // Подключение к базе данных
    $db = dbconn();
    // Запрос к базе данных
    $sql = "SELECT * FROM reviews ORDER BY date DESC";
    // Выполнение запроса
    $result = $db->query($sql);
    ?>


    <?php
    if ($result->num_rows > 0) {
        // Вывод данных построчно
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="card-sec card  comment-sec">
                <div class="card-body com_back">

                <h3><?=$row['name']?></h3>
                <?=$row['date'] ?><br>
                <br>
                <h3><?=$row['message']?></h3>
                </div>
            </div><br/>
            <?
            //echo '<p><strong>' . $row['name'] . '</strong> ' . $row['date'] . '<br>' . $row['message'] . '</p>';
        }
    } else {
        //echo "Отзывов пока нет.";
    }
    // Закрытие подключения
    $db->close();
    ?>

</div>