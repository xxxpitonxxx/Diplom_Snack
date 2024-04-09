

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


<body>
<?
session_start();
?>
<?include "header.php"?>
      


  <div class="container">
  

<div class="map">	
	<div class="wrp">
		<div class="map-box">
			<h2>Наши контакты</h2>
			<p>г. Калуга, Ленина 7</p>
			<p><a href="tel:+7 (495) 123-45-67">+7 (4842) 91-91-91</a></p>
			<p><a href="mailto:info@site.com">snack-cake.@mail.ru</a></p>
		</div>
	</div>
	<div id="map"></div>
</div>
 
<script src="//api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU"></script>
<script>
ymaps.ready(init); 
function init(){
	var myMap = new ymaps.Map("map",{center: [54.531758, 36.276711],zoom: 15});
	
	// Элементы управления картой
	//myMap.controls.add("zoomControl").add("typeSelector").add("mapTools");
	
	ymaps.geocode("г. Калуга, Ленина 7").then(function (res) {
		var coord = res.geoObjects.get(0).geometry.getCoordinates();
		var myPlacemark = new ymaps.Placemark(coord, {}, {
			iconImageHref: "/img/map.png",
			iconImageSize: [54, 74],
			iconImageOffset: [-27, -74]
		});
		myMap.geoObjects.add(myPlacemark);
		myMap.setCenter(coord);	
			
		// Сдвиг центра карты вправо
		var newcoord = myMap.getGlobalPixelCenter();
		newcoord[0] -= 150;
		myMap.setGlobalPixelCenter(newcoord);				
	});
}
</script>
</div>



<?include "footer.php"?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>










