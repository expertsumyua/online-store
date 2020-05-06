<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

$page = $_GET['page'];
//$offset = $page * 6;

$limit = 6;
$offset = $page * 6;


$sql = "SELECT * FROM products LIMIT ". $limit ." OFFSET " . $offset;
$result= $conn->query($sql);

while ($row = mysqli_fetch_assoc($result)) {
	include $_SERVER['DOCUMENT_ROOT'] . '/parts/product_card.php';
}

?>