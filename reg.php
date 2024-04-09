<?

include 'dbconnect.php';

if(!empty($_SESSION['login']))
{
    //echo 'Hello '.$_SESSION['login'];
}
if ($_POST['reg']) {

    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $pass_repeat = $_POST['pass-repeat'];
    $email = $_POST['email'];
    $name = $_POST['name'];

    if (!empty($login) and !empty($pass) and !empty($pass_repeat) and !empty($email) and !empty($name)) {

        $db = dbconn();
            
            if($pass == $pass_repeat) {

            $pass=md5($pass);    

            $query = $db->query("INSERT INTO `Users`(`login`, `pass`, `email`, `name`) 
            VALUES ('$login','$pass','$email','$name')");

                //проверка на совпадение логинов
                if($query) {
                    header("location: /"); 
                } else {
                    //echo'логин уже существует';
                }

            } else{
               echo'Пароли не совпадают';
            }

        }
    }




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <title>Document</title>
    
</head>

<body class="back">
<?include "header.php"?>

      <h1 class="t1 authH1">Регистрация</h1>

<?if($_SESSION['auth'] != true){?>

    <div class="container mmm">

    <div class="authform">

    <form method="post" >

        <input class="reginput1" type="text" class="t2" name="login" placeholder="Введите логин" required>
        <input class="reginput1" type="password" class="t2" name="pass" placeholder="Введите пароль" required>
        <input class="reginput1" type="password" class="t2" name="pass-repeat" placeholder="Повторите пароль" required>
        <input class="reginput1" type="text" class="t2" name="email" placeholder="Введите email" required>
        <input class="reginput1" type="text" class="t2" name="name" placeholder="Введите имя" required>
        <input class="reginput btn btn-dark t2" type="submit" value="Регистрация" name="reg">
        <br>
        <br>
        <h6>*Все поля обязательны к заполнению</h6>
    </form>
    <?}?>

    </div>
    </div>


   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>





