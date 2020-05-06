<?php
/*
	1. Добавить кнопку для удаления товара - done
	2. Пройтись по всему массиву товаров
	3. Проверить id товара и удалить твар

*/
	if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
		if(isset($_COOKIE['basket'])) {
			$basket = json_decode($_COOKIE['basket'], true);


			// echo "<pre>";
			// var_dump($basket['basket']);

			for($i=0; $i < count($basket['products']); $i++){
				if($basket['products'][$i]['product_id'] == $_POST['id']) {
					$basket['products_count']-= $basket['products'][$i]['count'];
					$basket["total_costs"] -= $basket["products"][$i]["costs"];					
					unset($basket['products'][$i]);
					sort($basket['products']);
				}
			}

			$jsonProduct = json_encode($basket);		

			// Очистить Куки
			setcookie("basket", "", 0, "/");
			// Добавляем Куки
			setcookie("basket", $jsonProduct, time() +60*60*24*30, "/");


			//var_dump($basket['basket']);

			// подчитываем количество записей в массие
			echo json_encode([
				// подчитываем количество записей в массие спомощью функции count(....)
				"count" => $basket["products_count"]
				//"count" => $basket_count
			]);		

		}
		
	}


?>