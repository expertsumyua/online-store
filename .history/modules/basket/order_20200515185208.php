<?php
/*
1. Проверяем есть ли в базе даных пользователь с номером, 
    что ввел пользователь
2. Если нет, то регистрируем нового
3. Добавляем заказ с базу данных с привязкой к пользователю
*/

?>

<?php
/*====================== Базовый фукционал: база данных ======================*/
    include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/configs/settings.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/configs/bot_configs.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/modules/telegram/send-message.php';
/*============================================================================*/

/*========================= Добавление заказа в базу =========================*/
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {

    $sql_users = "SELECT * FROM `users` WHERE `phone` LIKE '" . $_POST["phone"] . "' OR `email` LIKE '" . $_POST["email"] . "'";
    $result = $conn->query($sql_users);
    
    $user_id = 0;

    if(isset($_COOKIE["user_id"])){

        $user_id = $_COOKIE["user_id"];

    } else if ($result->num_rows > 0) {

        $user = mysqli_fetch_assoc($result);
        $user_id = $user['id'];

    } else {

        $sql = "INSERT INTO `users` (`login`, `phone`, `email`) VALUES ('" . $_POST['username'] . "', '" . $_POST['phone'] . "', '" . $_POST['email'] . "')";
        //var_dump($sql);
        if( $conn->query($sql) ) {
            $user_id = $conn->insert_id;
            echo "User added!";
        } else {
            echo "EROR!!!  User NOT added!";
        }
    }       

    $sql_orders = "INSERT INTO `orders` (`user_id`, `products`, `address`, `status`) VALUES ('" . $user_id . "' , '" . $_COOKIE['basket'] . "', '" . $_POST['address'] . "', 'NEW');";
    if (mysqli_query($conn, $sql_orders)) {
        //echo "<h2>Вы создали Задачу</h2>";
        setcookie("basket", "", 0, "/");
        //echo "Заказ оформлен";
        // ВАРИАНТ 1
        //setcookie("basket_count", "", 0, "/");
        message_to_telegram('Новый заказ!');

      //   header("Location: /");

     }
} 
/*=================================================================*/


?>