<?php
/* ===== Базовый фукционал: база данных ====*/
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
/*==========================================*/

$page = "delete";

/*====================== Удаление продукта  ========================*/
if (isset($_POST["submit"])) {
    //echo "<h2>Вы собираете удалить Категорию</h2>";
    $sql_categories ="DELETE FROM `categories` WHERE id = " . $_POST["сategory_id"] ."";
    if($conn->query( $sql_categories)) {
        //echo "<h2>Вы удалили категорию</h2>";
        header("Location: /admin/categories.php");
    }
}
/*=================================================================*/
?>