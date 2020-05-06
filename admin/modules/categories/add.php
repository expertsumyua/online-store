<?php
/*===== Базовый фукционал: база данных =====*/
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
/*==========================================*/
///echo "<h2>Вы собираете добавить Категорию</h2>";
/*=============== Добавление задания в карту ========================*/
if(isset($_POST["submit"])) {
    $sql_categories = "INSERT INTO `categories` (`title`) VALUES ('" . $_POST["title"] . "');";
    if ($conn->query($sql_categories)) {
        //echo "<h2>Вы добавили Категорию</h2>";
        header("Location: /admin/categories.php");
     }
} 
/*=================================================================*/
?>