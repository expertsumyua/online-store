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

			$jsonProduct = json_encode($basket);		

			// Очистить Куки
			setcookie("basket", "", 0, "/");
			// Добавляем Куки
			setcookie("basket", $jsonProduct, time() +60*60*24*30, "/");	


			echo json_encode([
				// подчитываем количество записей в массие 
				"total_costs" => $basket["total_costs"]
				//"count" => $basket_count
			]);			

		}
		
	}


?>