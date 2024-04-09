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


<? include "header.php" ?>
<body class="colorcard">
  <?
  session_start();
  include 'dbconnect.php';


  
  /*добавили*/
  if ($_POST['bask']) {

    $arr = [
      "name" => $_POST['product_name'],
      "photo" => $_POST['product_photo'],
      "ves" => $_POST['product_ves'],
      "price" => $_POST['product_price'],
      "count" => 1
    ];


    if ($_SESSION['basket'] == null) {
      $_SESSION['basket'] = [];
      

    }
    array_push($_SESSION['basket'], $arr);
    //Оставлю на потом
    // } else {

    //   for($i = 0; $i< $_SESSION['basket']; $i++) {
    //     if($_SESSION['basket'][$i]['name'] === $_POST['product_name']) {
    //       $_SESSION['basket'][$i]['count'] ++;
    //       break;
    //     } else {
    //       array_push($_SESSION['basket'], $arr);
    //     }
    //   }

    // }
    


    $user = $_SESSION['login'];


  
  }
  

  ?>

  
  <?
  $id = $_GET['id'];
  $type = $_GET['type'];
  $db = dbconn();

  $query = $db->query("SELECT * FROM `tovar` WHERE `id`='$id'");
  while ($row = $query->fetch_assoc()) {
    ?>

    <form method="post" class="row  gy-1" enctype="multipart/form-data">
      <input type="text" hidden name="product_id" value=<?= $row['id'] ?>>
      <input type="text" hidden name="product_name" value="<?= $row['Название'] ?>">
      <input type="text" hidden name="product_photo" value="<?= $row['photo'] ?>">
      <input type="text" hidden name="product_ves" value="<?= $row['Вес'] ?>">
      <input type="text" hidden name="product_price" value="<?= $row['Цена'] ?>">


      <br>
      <h1>
        <p class="card-title text mt-3">
          <?= $row['Название'] ?>
        </p>
      </h1>
      <br>

      <div class="card mb-3 mt-3 podr" style="max-width: 800px;">
        <div class="row card1  back shadowcard">
          <div class="col-md-4 card_foto mt-3">
            <img src="<?= $row['photo'] ?>" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body bor">

              <p class="card-text">Цена:
                <?= $row['Цена'] ?>
              </p>
              <p class="card-text">Артикул:
                <?= $row['Артикул'] ?>
              </p>
              <p class="card-text">Описание<br>
                <?= $row['Описание'] ?>
              </p>
              <p class="card-text">Состав<br>
                <?= $row['Состав'] ?>
              </p>
              <div class="tovarcard">
                <input type="submit" href="basket.php" class="btn btn-outline-warning but" value="В корзину" name="bask">



                <a href="comment.php" class="btn btn-outline-warning but">Напишите отзыв</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>



      <?

      ?>
      <br>
      <!-- <img class="img" src="<?= $row['photo'] ?>" alt=""> -->
    </form>
  <?
  }

  ?>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>