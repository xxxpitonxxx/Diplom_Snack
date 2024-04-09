<?
session_start();

include 'dbconnect.php';

$db = dbconn();
$category = $_GET['category'];

//echo $category;
//if(!empty($_SESSION['login']))
//{
//
//}

$getAllCategories = $db->query("SELECT * FROM category");


if ($_POST['add']) {

  $productname = $_POST['productname'];
  $cost = $_POST['cost'];
  $ves = $_POST['ves'];
  $article = $_POST['article'];
  $sostav = $_POST['sostav'];
  $description = $_POST['description'];
  $category_id = $_POST['category'];
  $popular = $_POST['popular'];

  if(empty($popular)) {
    $popular = 0;
  }
  //var_dump($_POST);

  if (!empty($productname) and !empty($cost) and !empty($ves) and !empty($article) and !empty($sostav) and !empty($description) and !empty($category_id) and !empty($popular)) {

    


    $uploaddir = 'files/';
    $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
      //  echo 'ok';
    } else {
      echo 'ne ok';
    }
  }

  $query = $db->query("INSERT INTO `tovar` (`Название`, `Цена`, `Вес`, `photo`, `Артикул`, `Состав`, `Описание` , `category_id` , `popular`) 
                                       VALUES ('$productname','$cost','$ves','$uploadfile','$article','$sostav','$description' ,'$category_id' ,'$popular')");

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
  <title>Добавление товара</title>

</head>

<body>

  <? include "header.php" ?>




  <div class="back">

    <h1 class="textNew">Добавить товар</h1>
    <br>





    <div class="but">
      <div class="container">

        <form method="post" enctype="multipart/form-data">

          <select class="form-select form-select-lg mb-3" name="category">
          <?while($category = $getAllCategories->fetch_assoc()){?>


            <option href="tovar.php?category=2" value="<?=$category['id']?>"><?=$category['category']?></option>
            
          <?}?>
          </select>
          
          <input class="reginput1" type="text" name="productname" placeholder="Введите название" required>

          <input class="reginput1" type="text" name="cost" placeholder="Введите цену" required>
          <input class="reginput1" type="text" name="ves" placeholder="Введите вес" required>
          
          <div class="input-group mb-3 comment-third">
            <input type="file" class="form-control" name="photo" id="inputGroupFile02" value="Выбери фото" required>
          </div>
          
          <input class="reginput1" type="text" name="article" placeholder="Введите артикул" required>
          <textarea class="reginput1" name="sostav" placeholder="Введите состав" cols="40" rows="8"
            required></textarea>
          <textarea class="reginput1" name="description" placeholder="Введите описание" cols="40" rows="8"
            required></textarea>
           
            <input class="reginput1" type="text" name="popular" placeholder="Введите 1 если товар популярный">


          <div class="comment mt-3">
            <input type="submit" class="btn btn-danger" value="Добавить" name="add">
          </div>

          <h5>*Все поля обязательны к заполнению</h5>
          <br>
          <br>
        </form>

      </div>
    </div>
  </div>




  <?include "footer.php"?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>