<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

$page = $_GET['page'];

$num = 6;
$start = $page * $num - $num;


$sql = "SELECT * FROM products LIMIT ". $num ." OFFSET " . $start;
$result= $conn->query($sql);

while ($row = mysqli_fetch_assoc($result)) {
	include $_SERVER['DOCUMENT_ROOT'] . '/parts/product_card.php';
}

?>