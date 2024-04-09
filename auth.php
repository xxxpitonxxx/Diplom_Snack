<?session_start();

include 'dbconnect.php';

if (!empty($_SESSION['login'])) {
  //echo 'Hello '.$_SESSION['login'];
}
if ($_POST['auth']) {

  $login = $_POST['login'];
  $pass = md5($_POST['pass']);

  //var_dump($pass);

  if (!empty($login) and !empty($pass)) {

    $db = dbconn();
    
    $query = $db->query("SELECT * FROM `Users` WHERE `login` = '$login' AND `pass` = '$pass' ");
    if ($query) {
      $data = mysqli_fetch_assoc($query);
      
      $_SESSION['auth'] = true;
      $_SESSION['login'] = $data['login'];
      $_SESSION['role'] = $data['role'];
     
      header('Location: /index.php');

    } else {
      echo 'Данные не верны';
    }

  }
}

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
  
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>

<body class="back">
<?

    include 'header.php';
    ?>
  
  
  <h1 class="t1 authH1">Авторизация</h1>
 
  <div class="container mmm">


    <div class="authform">

      <form method="post">

        <input class="authinput" type="text" name="login" placeholder="Введите логин" required> <br>
        <input class="authinput" type="password" name="pass" placeholder="Введите пароль" required> <br>
        <input class="authinput btn btn-dark" type="submit" value="Войти" name="auth"> <br>
        <br>
      
      </form>

      <div class="">
        <a class="btn btn-dark" href="reg.php">Регистрация</a> <br>
        <br>
        <h6>*Все поля обязательны к заполнению</h6>

        <? if ($_SESSION['auth'] == true) { ?>
          <a class="btn btn-dark mt-3" href="desroy.php">Выход</a>
        <? } ?>
      </div>
    </div>
  

    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>