<?php
/*===== Базовый фукционал: база данных =====*/
include "../../../configs/db.php";
/*==========================================*/


/*=============== Редактирования продукции  ========================*/
if (isset($_POST["product_id"]) && isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["content"]) && isset($_POST["category_id"])) {
    //echo "<h2>yr1ourmuxpq</h2>";
    $sql_products = "UPDATE `products` SET title = '" . $_POST["title"] . "', description = '" . $_POST["description"] . "', content = '" . $_POST["content"] . "', category_id = '" . $_POST["category_id"] . "' WHERE id =" . $_POST["product_id"] . ";";
    if (mysqli_query($conn, $sql_products)) {
         //echo "<h2>Вы отредактировали Задачу</h2>";
        header("Location: ../../products.php");
    }
}
/*=================================================================*/
?>