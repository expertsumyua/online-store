<?php
/*===== Базовый фукционал: база данных =====*/
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
/*==========================================*/
//echo "<h2>Вы собираете отредактировать Категорию</h2>";
/*=============== Редактирования продукции  ========================*/
if(isset($_POST["submit"])) {
    //echo "<h2>Вы собираете отредактировать Категорию</h2>";
    $sql_categories = "UPDATE `categories` SET title = '" . $_POST["title"] . "' WHERE id =" . $_POST["сategory_id"] . ";";
    if ($conn->query($sql_categories)) {
       	//echo "<h2>Вы отредактировали Категорию</h2>";
        header("Location: /admin/categories.php");
     }
}
/*=================================================================*/
?>