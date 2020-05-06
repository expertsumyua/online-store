<?php
/*
	1. Добавить кнопку для удаления товара - done
	2. Пройтись по всему массиву товаров
	3. Проверить id товара и удалить твар

*/
	if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
		//var_dump($_POST['id']);
		//var_dump($_POST['count']);
		if(isset($_COOKIE['basket'])) {
			$basket = json_decode($_COOKIE['basket'], true);


			// echo "<pre>";
			// var_dump($basket['basket']);

			for($i=0; $i < count($basket['products']); $i++){
				if($basket['products'][$i]['product_id'] == $_POST['id']) {

					$diffCount = $basket['products'][$i]['count'] - $_POST['count'];
					$basket['products_count']-= $diffCount;

					$basket["total_costs"] -= $basket["products"][$i]["costs"];

					$basket['products'][$i]['count'] = $_POST['count'];
					$basket["products"][$i]["costs"] = $basket["products"][$i]["product_cost"]*$basket["products"][$i]["count"];

					$basket["total_costs"] += $basket["products"][$i]["costs"];			
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