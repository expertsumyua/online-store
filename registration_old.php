<?php
/*============ Базовый фукционал: база данных ============*/
    include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
/*========================================================*/
/*
	1.Сделать форму регистрации - done
	2. Сделать отправку формы - done
	3. сделать отправку письма со ссылкой на подтверждение регистрации
	4. сделать страницу с подтверждением регистрации
*/
	//echo "Имя сервера - ".$_SERVER['SERVER_NAME']."<br />";	
	//echo "Имя ХОСТА - ".$_SERVER['HTTP_HOST']."<br />";

	if (isset($_GET['u_code'])) {
		$sql_users = "SELECT * FROM users WHERE confirm_mail='" . $_GET['u_code'] . "'";
		$result = $conn->query($sql_users);

		if($result->num_rows > 0) {
			$user = mysqli_fetch_assoc($result);
    		$sql ="UPDATE `users` SET `verifided` = '1' WHERE `id` = " . $user['id'];
    		if ($conn->query($sql)) {           
            	echo "Пользователь Верифицирован!";            
         	}
    	} 
	}

	/* REGISTER*/
	if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
		$password = md5($_POST['password']);
		$u_code = generateRandomString(20);
		// var_dump($password);

		/*REGISTER*/
    	$sql_users = "INSERT INTO users(login, password, email, confirm_mail) VALUES ('". $_POST['login'] ."' ,'". $password ."', '". $_POST['email'] ."', '". $u_code ."')";    	

    	if ($conn->query($sql_users)) {           
            echo "Пользователь зарегистрирован";
            //$link = "<a href='http://shop-expert.zzz.com.ua/registration.php?u_code=$u_code'>Confirm</a>";
            $link = "<a href='".$_SERVER['HTTP_HOST']."/registration.php?u_code=$u_code'>Confirm</a>";
            mail($_POST['email'], 'You are registered!', $link);
         }

         /*LOGIN*/
    	// $sql_users = "SELECT * FROM users WHERE login='" . $_POST['login'] . "' AND password='$password'" ;
    	// $result = $conn->query($sql_users);

    	// if($result->num_rows > 0) {
    	// 	echo "Пользователь найден";
    	// } else {
    	// 	echo "ERROR!!!";
    	// }
	}

	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>
	<form method="POST">
		<p>login<br/>
			<input type="text" name="login">
		</p>
		<p>Email<br/>
		<input type="text" name="email">
		</p>
		<p>Password<br/>
		<input type="password" name="password">
		</p>
		<button type="submit">Registration</button>
	</form>

</body>
</html>