<?php
/*===== Базовый фукционал: база данных =====*/
include "../../../configs/db.php";
/*==========================================*/

/*=============== Добавление задания в карту ========================*/
if (isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["content"]) && isset($_POST["category_id"])) {

    $sql_products = "INSERT INTO `products` (`title`, `description`, `content`, `category_id`) VALUES ('" . $_POST["title"] . "','" . $_POST["description"] . "', '" . $_POST["content"] . "', '" . $_POST["category_id"] . "');";
    if (mysqli_query($conn, $sql_products)) {
         //echo "<h2>Вы создали Задачу</h2>";
        header("Location: ../../products.php");

     }
} 
/*=================================================================*/
?>