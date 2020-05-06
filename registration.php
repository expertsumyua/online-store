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
	// $sql_count_prod = "SELECT COUNT(1) FROM `products`";
	// $result_count_prod = $conn->query( $sql_count_prod );
	// $count_prod = mysqli_fetch_array( $result_count_prod );

	// // Переменной текущая страница присваива значение 0
	// $currentPage = 0;


	/* Помогает определить на какойстранице я нахожусь!!!*/
	//echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	//echo $_SERVER['REQUEST_URI'];
	//echo $_SERVER['HTTP_HOST'];


		/* REGISTER*/
	if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
		$password = md5($_POST['password']);
		$u_code = generateRandomString(20);
		// var_dump($password);

		// $sql_r = "INSERT INTO users (email, password, name, photo) VALUES ('" . $_POST["email"] . "', '" . $_POST["password"] ."','" .$_POST["name"]. "', 'img/user.png')";

		$sql = "SELECT * FROM users WHERE `email` LIKE '" . $_POST["email"] . "' AND `password` LIKE '" . $password ."'";
		$result = $conn->query($sql);
		if($result->num_rows == 0) {


		         /*LOGIN*/
	    	// $sql_users = "SELECT * FROM users WHERE login='" . $_POST['login'] . "' AND password='$password'" ;
	    	// $result = $conn->query($sql_users);

	    	// if($result->num_rows > 0) {
	    	// 	echo "Пользователь найден";
	    	// } else {
	    	// 	echo "ERROR!!!";
	    	// }

			$sql_r = "INSERT INTO users(login, password, email, confirm_mail) VALUES ('". $_POST['login'] ."' ,'". $password ."', '". $_POST['email'] ."', '". $u_code ."')";  

	        if(mysqli_query($connect, $sql_r)) {

	        	$link = "<a href='".$_SERVER['HTTP_HOST']."/?u_code=$u_code'>Confirm</a>";
            	mail($_POST['email'], 'You are registered!', $link);

	            $link = "/";
	            $title = "Поздравляем Вас с регистрацией!";
	            $message_modal = "Вы успешно зарегистрировались! Далее Вам необходимо пройти на свою почту и следовать согласно иструкции в отправленном Вам писме!";    
	            include "parts/messageModal.php";
	            ?>
	            <script> $(document).ready(function() {
	            $("#messageModal").modal('show'); 
	            });
	            </script>
	            <?php
	           }
            
        } else {
            //echo "<h2>произошла ошибка!!!</h2>" . mysqli_error($connect);
            $link = "";
            $title = "Ошибка регистрации";
            $message_modal = "Этот Email уже зарегистрирован нашей системе!";          
            include "parts/messageModal.php";
            ?>
            <script> $(document).ready(function() {
            $("#messageModal").modal('show'); 
            });
            </script>
            <?php
        }

	}


 //    function generateRandomString($length = 10) {
	//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	//     $charactersLength = strlen($characters);
	//     $randomString = '';
	//     for ($i = 0; $i < $length; $i++) {
	//         $randomString .= $characters[rand(0, $charactersLength - 1)];
	//     }
	//     return $randomString;
	// }

?>



    <div class="row m-2">

      	<div class="card">
        <h3 class="card-header" style="background-color: #343a40; color: #fff;">Регистрация</h3>
        <div class="card-body">

            <h4 class="card-title">Укажаите Email и пароль</h4>

            <form action="registration.php" method="POST">

              <div class="form-group">
                <label for="exampleInputName1">Login</label>
                <input type="text" name="login" class="form-control" id="exampleInputName1" placeholder="Введите ваш login" aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">Ваше имя необходимо для того, что бы к Вам могли обратиться.</small>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Email адрес</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Введите свой Email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Мы никогда не передадим вашу электронную почту кому-либо еще.</small>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
              </div>

              <div class="modal-footer">
                <a href="/" class="btn btn-secondary btn-lg" data-dismiss="modal">Отмена</a>
                <button type="button" class="btn btn-outline-secondary btn-lg" role="button" aria-pressed="true" data-toggle="modal" data-target="#exampleModal">Авторизация
                </button>
                <button type="submit" class="btn btn-success btn-lg" role="button" aria-pressed="true">Зарегистрироватся</button>
              </div>

            </form>          
         
        </div>
      </div>

  </div>



<?php  
	// Подключаем файл с феттером         
	include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>	