<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

	include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/authorization.php';

	$category_result = $conn->query( "SELECT * FROM categories WHERE id=" . $_GET['id'] );
	$category = mysqli_fetch_assoc( $category_result );
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $category['title'] ?></li>
  </ol>
</nav>

<div class="row">

	<?php
		$sql = "SELECT * FROM products WHERE category_id=" . $_GET['id'] ;
		$result = $conn->query($sql);
		while ($row = mysqli_fetch_assoc($result)) {
			include $_SERVER['DOCUMENT_ROOT'] . '/parts/product_card.php';
		}
	?>				

</div> <!-- /.row -->
<?php           
	include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>	
