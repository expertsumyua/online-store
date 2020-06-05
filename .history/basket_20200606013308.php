<?php
/*
1. Вывести блок с корзиной - в шапке сайта - done
2. Сделать таблицу в базе данных для хранениязаказов - done
3. Добавление товара в корзину
	3.1. сделать клик по кнопке добавить в корзину - done
	3.2. Добавить товар в Куки корзины - done
	3.3. Отобразить: что товар добавился на карзине
4. Сделать страницу корзины
5. Сделать оформление заказа
*/

?>
<?php
/*============ Базовый фукционал: база данных ============*/
	include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/configs/settings.php';
/*========================================================*/

	if(isset($_COOKIE["user_id"])) {
		$sql_users = "SELECT * FROM users WHERE id='" . $_COOKIE["user_id"] . "'";
		$result = $conn->query($sql_users);
		if ($result->num_rows > 0) {
			$user = mysqli_fetch_assoc($result);
			$username = $user['login'];
			$email = $user['email'];
			$phone = $user['phone'];        	
        	//$user_id = $user['id'];
    	}

	} else {
		$username = "John Doe";
		$email = "John@Doe.com";
		$phone = "";
	}

/*================== Это Шапка сайта =====================*/
include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';
/*========================================================*/
?>

<div class="row" id="products">

	<table class="table table-striped table-light table-hover">
		
		<thead>
			<!-- Шапка таблицы -->
			<tr class="table-active">
			  <th scope="col"># Product</th>
			  <th scope="col">Title</th>
			  <th scope="col">Count</th>
			  <th scope="col">Total cost</th>
			  <th scope="col">Options</th>
			</tr>
		</thead>
		<tbody>
			<?php

			// echo "<pre>";
			// var_dump($basket['basket']);

			// Выводим по одному данные в таблицу из Куки
				if (isset($_COOKIE['basket'])) {
					$basket = json_decode($_COOKIE['basket'], true);
					//var_dump($basket);
					for($i = 0; $i < count($basket['products']); $i++) {
						$sql = "SELECT * FROM `products` WHERE id=" . $basket['products'][$i]['product_id'];
						$result = $conn->query( $sql );
						$product = mysqli_fetch_array( $result );
						?>
							<tr>
								<td><?php echo $product['id'] ?></td>
								<td><?php echo $product['title'] ?></td>

								<td oninput="recountProductBasket(this, <?php echo $product['id'] ?>)">
									<input type="number" name="count" min="1" value="<?php echo $basket['products'][$i]['count'] ?>">
								</td>

								<td><?php echo $basket['products'][$i]['costs']; ?></td>

								<td><button onclick="deleteProductBasket(this, <?php echo $product['id'] ?>)" class="btn btn-danger">Delete</button></td>
							</tr>
						<?php
					}
				}

			?>
			

		</tbody>
		<caption>
			<tr class="table-active">
				<th>Total cost</th>
				<th></th>
				<th></th>				
				<?php
					if (isset($_COOKIE['basket'])) {
						$basket = json_decode($_COOKIE['basket'], true);
						?>
							<th id="total-costs"><?php echo $basket["total_costs"] ?></th>
						<?php
					}
				?>
				<th></th>
			</tr>
		</caption>
	</table>

</div> <!-- /.row -->

<div class="container-fluid">


	<hr/>
	<!-- блок с дааными о юзере пеед отправкой -->
	<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            <div class="card-header">
	                <h4 class="card-title">Оформление заказа</h4>
	            </div>
	            <div class="card-body">
	                <form action="/modules/basket/order.php" method="POST">
	                    <div class="row">
	                        <div class="col-md-12 pr-1">
	                            <div class="form-group">
	                                <label>Your Name</label>
	                                <input name="username" type="text" class="form-control" placeholder="Name" value="<?php echo $username ?>">
	                            </div>
	                        </div>

	                    </div>
	                    <div class="row">
	                        <div class="col-md-8 pr-1">
	                            <div class="form-group">
	                                <label for="exampleInputEmail1">Email address</label>
	                                <input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo $email ?>">
	                            </div>
	                        </div>
	                        <div class="col-md-4 pl-1">
	                            <div class="form-group">
	                                <label>Phone</label>
	                                <input name="phone" type="text" class="form-control" placeholder="Phone" value="<?php echo $phone ?>">
	                            </div>
	                        </div>
	                    </div>	                    
	                    <div class="row">
	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <label>Address</label>
	                                <input name="address" type="text" class="form-control" placeholder="Home Address" value="Ukraine, Sumy, Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
	                            </div>	                            
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col-md-12">
	                            <div class="form-group">
	                                <label>Сomments</label>
	                                <textarea rows="3" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
	                            </div>
	                        </div>
	                    </div>
	                    <button name="submit" type="submit" class="btn btn-info btn-fill pull-right">Checkout</button>
	                    <div class="clearfix"></div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>

</div>
	


<?php           
	include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>	