<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	<!-- Если гетзапрос отсутсвет то тогда категория все активная -->
	<a class="nav-link <?php if(!isset($_GET['id'])) {?> active <?php } ?>" href="/">Всё</a>
	<?php
	// Подключаемся к таблице с категоиями в базе
		$sql = "SELECT * FROM categories";
		$result = $conn->query($sql);
		// Выводим категории циклом вайл и
		while ($row = mysqli_fetch_assoc($result)) {
			// если есть гет запро и он равен елементу массив из талбица категории 
			if(isset($_GET['id']) && $_GET['id'] == $row['id']){
				// то тогда Выводим
				echo "<a class='nav-link active' href='/cat.php?id=" . $row['id'] . "'>" . $row['title'] . "</a>";
			} else {
				echo "<a class='nav-link' href='/cat.php?id=" . $row['id'] . "'>" . $row['title'] . "</a>";
			}				
		}
	?>				
</div>