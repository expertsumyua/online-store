<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

	/*
	1. Получить товар по которому кликнул пользователь
	2. Добавить массив товаров
	3. Добавить массив в куки
	*/
	// проверяем сщуствует ли запрос $_POST

	
	// Усли Пост запрос существует и существует метод ПОСТ, то 
	if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
		// Поключаемсяк к талице с товарами в базе и запрашиваем все даные с индксам в пост запрове
		$sql = "SELECT * FROM products WHERE id=" . $_POST['id'];
		// Подключаемся 
		$result = $conn->query($sql);
		// Пребразовываем данные из базы в массив
		$product = mysqli_fetch_assoc($result);
		
		/*======== Добавление в козину ===============*/
		// // Если Кукис существует (т.е. если в корзне уже чтото есть), то
		// if (isset($_COOKIE['basket'])) {
		// 	// пеобразовываем JSON формат (строку) в массив $basket и
		// 	$basket = json_decode($_COOKIE['basket'], true);
		// 	// добавляем в массив $basket следующий $product
		// 	$basket["basket"][] = $product['id'];
		// } else { // иначе (если корзина путая)
		// 	//создаем массив $basket и записываем в него $product
		// 	$basket = ["basket" => [ $product['id'] ] ];
		// }
		/*======== Добавление в козину - конец =============*/

		/*======== Добавление в козину ===============*/
		// Если Кукис существует (т.е. если в корзне уже чтото есть), то
											// ВАРИАНТ 1
		if (isset($_COOKIE['basket']) /*&& isset($_COOKIE['basket_count'])*/) {
			// пеобразовываем JSON формат (строку) в массив $basket и
			$basket = json_decode($_COOKIE['basket'], true);

			// ВАРИАНТ 1
			// $basket_count = $_COOKIE['basket_count'];
			
			/*
				1. Пройтись по всему массиву корзины - done
				2. Проверить есть ли совпадение по id - done
				3. Если совпадения есть: увеличить товар
			*/
			$issetProduct = 0;
			for($i = 0; $i < count($basket['products']); $i++) {
				if( $basket["products"][$i]["product_id"] == $product['id']) {				
					$basket["products"][$i]["count"]++;
					$basket["products"][$i]["costs"] = $basket["products"][$i]["product_cost"]*$basket["products"][$i]["count"];
					$issetProduct = 1;
					
					// ВАРИАНТ 1
					// $basket_count++;
					
					// ВАРИАНТ 2
					$basket["products_count"]++;
					$basket["total_costs"] += $product['cost'];
				}
			}
			if ($issetProduct != 1) {
				// Добавляем в массив "basket" "product_id" и "count"
				$basket['products'][] = 	[
											  "product_id" => $product['id'] ,
											  "product_cost" => $product['cost'],
											  "count" => 1,
											  "costs" => $product['cost']
										];
				// ВАРИАНТ 1
				// $basket_count++;

				// ВАРИАНТ 2
				$basket["products_count"]++;
				$basket["total_costs"] += $product['cost'];
			}
			// // добавляем в массив basket следующий $product
			// $basket["basket"][] = $product['id'];
		} else { // иначе (если корзина путая)
			//создаем массив "basket" и записываем в него $product['id'] и count
			$basket =	[	
							"products" =>	[ 
											[ "product_id" => $product['id'] ,
											  "product_cost" => $product['cost'],
											  "count" => 1,
											  "costs" => $product['cost'] ]
										],
						// ВАРИАНТ 2
						"products_count"=> 1,
						"total_costs" => $product['cost']
						];
			// ВАРИАНТ 1
			// $basket_count = 1;
		}
		/*======== Добавление в козину - конец =============*/


		// преобразование массива в JSON формат (в строкус разделителяии)
		$jsonProduct = json_encode($basket);		

		// Очистить Куки
		setcookie("basket", "", 0, "/");
		// Добавляем Куки
		setcookie("basket", $jsonProduct, time() +60*60*24*30, "/");

		// ВАРИАНТ 1
		// setcookie("basket_count", "", 0, "/");
		// ВАРИАНТ 1
		// setcookie("basket_count", $basket_count, time() + 60*60, "/");

		//var_dump($_COOKIE['basket']);

		//echo "Товар добавлен";

		// echo json_encode([
		// 	// подчитываем количество записей в массие спомощью функции count(....)
		// 	"count" => count($basket['basket'])
		// 	//"count" => $basket_count
		// ]);	

		//echo $jsonProduct;

		// ВАРИАНТ 1
		// echo $basket_count;

		// ВАРИАНТ 2
		// подчитываем количество записей в массие
		echo json_encode([
			// подчитываем количество записей в массие спомощью функции count(....)
			"count" => $basket["products_count"]
			//"count" => $basket_count
		]);	
	}
	

?>