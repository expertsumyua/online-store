<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

	include $_SERVER['DOCUMENT_ROOT'] . '/parts/header.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/authorization.php';

	$sql = "SELECT * FROM products WHERE id=" . $_GET['id'] ;
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	$category_result = $conn->query( "SELECT * FROM categories WHERE id=" . $row['category_id'] );
	$category = mysqli_fetch_assoc( $category_result );
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item">
    	<a href="cat.php?id=<?php echo $category['id'] ?>">
    		<?php echo $category['title'] ?>    		
    	</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $row['title'] ?></li>
  </ol>
</nav>

<div class="row">

	<div class="col-12">
		<div class="card ">
			<!-- <img src="..." class="card-img-top" alt="..."> -->
			<div class="card-body">
			    <h5 class="card-title">
			    		<?php echo $row['title'] ?>	
			    </h5>
			    <p class="card-text"><?php echo $row['description'] ?></p>
			    <p class="card-text"><?php echo $row['content'] ?></p>
			    <a href="#" class="btn btn-primary">В корзину</a>
			</div>
		</div>
	</div>	
	

</div> <!-- /.row -->
<?php           
	include $_SERVER['DOCUMENT_ROOT'] . '/parts/footer.php';
?>	
