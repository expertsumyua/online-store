<?php
/* ===== Базовый фукционал: база данных ====*/
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
/*==========================================*/

$page = "delete";

/*====================== Удаление продукта  ========================*/
if (isset($_POST["submit"])) {
    //echo "<h2>yr1ourmuxpq</h2>";
    $sql_products ="DELETE FROM `products` WHERE id = " . $_POST["product_id"] ."";
    if($conn->query($sql_products)) {
         //echo "<h2>Вы удалили продукт</h2>";
        header("Location: /admin/products.php");
    }
}
/*=================================================================*/
?>