<?
include 'dbconnect.php';
session_start();
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


<body>
<?
session_start();
?>
<?include "header.php"?>


         
      
<div class="back">
<br>
<h1 class="">Корзина покупок.</h1>



<div class="container">


<div class="basket_men mt-4 fs-3">
<div class="basket_foto">Фото</div>
<div>Наименование </div>
<div>Количество </div>

<div>Цена</div>
</div>
<?php

if($_POST['countAdd']) {


  $_SESSION['basket'][$_POST['arr_key']]['count'] = $_POST['new_count'];
}

//var_dump($_SESSION['basket']);
if($_SESSION['basket'] != null) {

  $res=0;
  $n=0;
  $arr=0;
  $x=0;

  foreach ($_SESSION['basket'] as $key=>$stuff) {
   
    
    ?> <?if ($stuff['count']>0) {?>
    <div class="basket_men  mt-4 border border-white border-success basket_men_height">
    
    <img class="foto1 basket_foto" src ="<?=$stuff['photo']?>">
    <h3><?=$stuff['name']?></h3>
    
    
    <div class="d-flex justify-content-between">
    <h3><?=$stuff['count']?></h3>
    <form method="post">
      <input type="text" hidden name = "arr_key" value="<?=$key?>">
      <input class="basket_input" type="text" name = "new_count" placeholder="шт">
      <input type="submit" name="countAdd" value="+">
    </form>
    </div>
    <h3><?=$stuff['price']?></h3>
  </div>
  <?    
  $arr=explode('₽',$stuff['price']);
    $x=(int)$arr[0]*$stuff['count'];
    $n=$n+1;
    $res=$res+$x;
    
  ?>    
    <?
  }
}
}

?>
<div class="d-flex justify-content-between">
<button class="btn btn-outline-danger fs-4 mt-4 mb-4">
    <div class="name_basketmain ">Заказать</div>
</button> 
    <div class="total fs-4 mt-4 ">Сумма к оплате <?echo $res;?> руб</div>
</div>



    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5 card1">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
            <a href="index.php"><i class="fas fa-gem me-3 textBasket" ></i><i class="textBasket">Snack</i><i class="fa-regular fa-handshake textBasket"></i><i class="textBasket">cake</i></a>
            </h6>
            <p>
                По интересующим вопросам обращайтесь по телефону: +7(4842) 91-91-91 или напишите нам на почту snack-cake.@mail.ru 
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
            <a class="textBasket" href="index.php">Продукция</a>
            </h6>
            <p>
              <a href="tovar.php?category=5" class="text-reset">Мороженое</a>
            </p>
            <p>
              <a href="tovar.php?category=1" class="text-reset">Пирожные</a>
            </p>
            <p>
              <a href="tovar.php?category=9" class="text-reset">Торты</a>
            </p>
            <p>
              <a href="tovar.php?category=8" class="text-reset">Ассорти</a>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
            <a class="textBasket" href="Howbuy.php">Покупателям</a>
            </h6>
            <p>
              <a href="#!" class="text-reset"></a>
            </p>
            <p>
              <a href="Howbuy.php" class="text-reset">Как сделать заказ</a>
            </p>
            <p>
              <a href="cash.php" class="text-reset">Способ оплаты</a>
            </p>
            <p>
              <a href="delivery.php" class="text-reset">Доставка</a>
              <p>
              <a href="priz.php" class="text-reset">Акции</a>
            </p>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4"><a class="textBasket" href="Contact.php">Контакты</a></h6>
            <p><i class=""></i><i class="fa fa-home" aria-hidden="true"></i>     Калуга, Россия</p>
            <p>
              <i class=""></i>
              <i class="" aria-hidden="true"></i><i class="fa fa-envelope" aria-hidden="true"></i>     snack-cake.@mail.ru
            </p>
            <p><i class=""></i><i class="fa fa-envelope" aria-hidden="true"></i>     +7(4842) 91-91-91</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>










