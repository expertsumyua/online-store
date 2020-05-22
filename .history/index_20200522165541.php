<?php
/*============ Базовый фукционал: база данных ============*/
	include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
/*========================================================*/

/*================== Это Шапка сайта =====================*/
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/authorization.php';

/*========================================================*/

/*==== Это Шапка сайта, в ней находится

так жеи АВТОРИЗАЦИЯ =======================*/
// include "parts_site/site_header.php";
// include "authorization.php";
/*=========================================*/

	/*=========================================================
					Подключаемся к базе данны 
		и считываем количество строк в таблице с продуктами
	==========================================================*/
	$sql_count_prod = "SELECT COUNT(1) FROM `products`";
	$result_count_prod = $conn->query( $sql_count_prod );
	$count_prod = mysqli_fetch_array( $result_count_prod );

	// Переменной текущая страница присваива значение 0
	$currentPage = 0;

?>
<!-- Хлебные крошки -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Все</li>
  </ol>
</nav>
<!-- Выводим пардуктына экран -->
<div class="row" id="products">

	<?php
		$limit = 6;
		// Запрашиваем 6 первых продктов
		$sql = "SELECT * FROM products LIMIT ". $limit;
		$result = $conn->query($sql);
		// Выводим циклом вайл по одному каждый продукт
		while ($row = mysqli_fetch_assoc($result)) {
			include $_SERVER['DOCUMENT_ROOT'] . '/parts/product_card.php';
		}
	?>
</div> <!-- /.row -->
<!-- Этими переменными пеедаются данные в JS файл для обработки  -->
<input type="hidden" value="<?php echo $count_prod[0]?>" id="count_products">
<!-- Переменная котораяпеедаёт текущее количеств прдуктов базе -->
<input type="hidden" value="1" id="current-page">

<div class ="row justify-content-md-center m-3">	
	<!-- Кнопка "Показать еще" -->
	<button class="btn btn-primary btn-lg" id="show-more">Показать ещё 6 товаров</button>

</div>
<hr/>
<div class ="row justify-content-md-center m-3">
	<div class="btn-group" role="group" aria-label="Basic example">
		<!-- Кнопка назад в начале не видна -->
		  <button type="button" class="btn btn-secondary" style="display: none" id="previous"><== Previous</button>
		  <button type="button" class="btn btn-secondary" id="next">Next ==></button>
	</div>
</div>
<hr/>


<?php  
	// Подключаем файл с феттером         
	include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>	