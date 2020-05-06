<?php
// данные для подключения к базе данных
 $server = "localhost";


/*"https://shop-from-expert.000webhostapp.com/"*/
// $username = "id12844093_shopexpert";
// $password = "12345";
// $dbName = "id12844093_shopfromexpert";



/*"http://shop-expert.zzz.com.ua/"*/
 // $username = "expertshop";
 // $password = "Shop12345";
 // $dbName = "expertshop";



/*"http://shop.local/"*/
$username = "root";
$password = "";
$dbName = "shop";




// Создать соединение
// Подключение к базе данных chat
$connect = new mysqli($server, $username, $password, $dbName);

// Создать соединение
$conn = new mysqli($server, $username, $password, $dbName);

// Проверьте подключение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
В случае, если кодировка сайта и базы данных не совпадает (часть текста на сайте выводится нормально, а часть текста из базы - в виде непонятных знаков). Необходимо в скрипте, который подключается к базе данных добавить команды, которые укажут MySQL серверу кодировку, в которой выводить текст. В зависимости от того, какую библиотеку PHP вы используете команды будут выглядеть так:
*/
/*
mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
mysqli_query($connect, "SET CHARACTER SET 'utf8'");
*/
// или

// кодирвка базы данных
//mysqli_set_charset($connect, 'utf8');
mysqli_set_charset($conn, 'utf8');
?>