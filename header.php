<?session_start();?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">
</head>



<nav class="navbar navbar-expand-lg  colorFot">
        <div class="container card1">
          <a class="navbar-brand" href="index.php"><div class="textcolor">Snack<i class="fa-regular fa-handshake textcolor"></i>cake</div></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 navHead">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="textcolor">Наша продукция</div>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="tovar.php?category=5">Мороженое</a></li>
                      <li><a class="dropdown-item" href="tovar.php?category=1">Пирожные</a></li>
                      <li><a class="dropdown-item" href="tovar.php?category=9">Торты</a></li>
                      <li><a class="dropdown-item" href="tovar.php?category=4">Пончики</a></li>
                      <li><a class="dropdown-item" href="tovar.php?category=7">Пироги</a></li>
                      <li><a class="dropdown-item" href="tovar.php?category=2">Чизкейки</a></li>
                      <li><a class="dropdown-item" href="tovar.php?category=3">Круассаны</a></li>
                      
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="tovar.php?category=8">Ассорти</a></li>
                    </ul>
                  </li>
                
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="priz.php"><div class="textcolor">Акции <i class="fas fa-gift textcolor"></i></div></a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="Howbuy.php"><div class="textcolor">Как купить</div></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="aboutUs.php"><div class="textcolor">О компании</div></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="Contact.php"><div class="textcolor">Контакты</div></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="comment.php"><div class="textcolor">Отзывы</div></a>
              </li>


            </ul>
            
            <div class="but1">
            <button onclick="window.location.href = 'basket.php'" class="btn btn-outline-danger" type="submit">Корзина <?php if ($_SESSION['basket'] != null) {?> <i class="fas fa-cart-shopping"></i><?} ?></button>
            <?if(isset($_SESSION['auth'])){?>
              <form action="desroy.php" method="get">
                <button onclick="" class="btn btn-outline-danger"  type="submit">Выйти <i class=""></i></button> 
              </form>
              
            <?}else{?>
              <button onclick="window.location.href = 'auth.php';" class="btn btn-outline-danger"  type="submit">Войти <i class="fas fa-arrow-right-to-bracket"></i></button>

            
              <?}?>  
          </div>
            
          </div>
        </div>
      </nav>
      
      

      


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>















