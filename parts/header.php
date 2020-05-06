<?php
    function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
  return $randomString;
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<title>Shop</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Shop-master</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacts.php">Contacts</a>
      </li>
    </ul>

      <form class="form-inline my-0 my-lg-0">
        <!-- <input class="form-control mr-sm-2" type="search" placeholder="Поиск..." aria-label="Search">
        <button class="btn btn-outline-success my-0 mr-sm-2" type="submit">Найти</button> -->

        <?php
            if (isset($_GET['u_code']) && $_GET['u_code'] != "") {
                $sql_users = "SELECT * FROM users WHERE confirm_mail='" . $_GET['u_code'] . "'";
                $result = $conn->query($sql_users);

                if($result->num_rows > 0) {
                    $user = mysqli_fetch_assoc($result);
                    $sql ="UPDATE `users` SET `verifided` = '1' WHERE `id` = " . $user['id'];
                    if ($conn->query($sql)) {
                        setcookie("user_id", $user["id"], time() +60*60*24*30);

                        //header("Location: /profile.php");
                        //echo "<h2>Вы вошли в систему</h2>";
                        $link = "/";
                        $title = "Верификация прошла успешно!";
                        $message_modal = "Вы успешно верифицировались! Проходите и делайте покупки!";    
                        include "parts/messageModal.php";
                        ?>
                        <script> $(document).ready(function() {
                        $("#messageModal").modal('show'); 
                        });
                        </script>
                        <?php

                       // echo "Пользователь Верифицирован!";            
                    }
                } 
            }

            if(isset($_COOKIE["user_id"])) {
                  // вывести всю строку по указаннму id
                  $sql_u = "SELECT * FROM users WHERE id=" . $_COOKIE["user_id"];
                  // выполняю SQL запрос
                  $result_u = mysqli_query($connect, $sql_u);
                  // записываем в переменную массив с данными пользователя 
                  $user = mysqli_fetch_assoc($result_u);
                  ?>
                  <a href="/exit.php" class="btn btn-outline-danger my-2 my-sm-0">
                    <?php echo $user["login"];?> &#187;</a> <!-- Выйти -->
                    <?php
              } else {
                  ?>
                  <button type="button" class="btn btn-outline-danger my-2 my-sm-0" role="button" aria-pressed="true" data-toggle="modal" data-target="#exampleModal">
                      Войти
                  </button> <!-- Войти -->
                  <?php
              }
        ?>

    </form>
    <form class="form-inline my-2 my-lg-0">
        <a class="cart-item ml-3" href="basket.php" id="go-basket">
            <i class="nc-icon nc-planet"></i>
            <?php
                // если массив кукисов есть, то
                // Основной ВАРИАНТ и ВАРИАНТ 2
                if ( isset($_COOKIE['basket']) ) {
                
                // ВАРИАНТ 1
                //if ( isset($_COOKIE['basket_count']) ) {

                    // пеобразовываем JSON формат (строку) в массив $basket и
                    //$basket = json_decode($_COOKIE['basket'], true);
                    // приваиваем переменной количество элнмантов массив
                    //$count = count($basket['basket']);

                    // ВАРИАНТ 1
                    //$count = $_COOKIE['basket_count'];

                    // ВАРИАНТ 2
                    $basket = json_decode($_COOKIE['basket'], true);
                    $count = $basket["products_count"];
                    
                    ?>  <!--  выводим  значения переменной count в span  -->
                        <span class="notification"><?php echo $count ?></span>
                    <?php
                } else {
                    ?>  <!-- если массива кукисов нет то тогд пишем 0 -->
                        <span class="notification">0</span>
                    <?php
                }
            ?>
            <!-- <span class="d-lg-none">Notification</span> -->
            <!-- отображаем картинку корзики -->
            <img src="/img/cart.png" width="32">
        </a>
    </form>

  </div>
</nav>

<div class="container">
  	
  	<div class="row m-2">

		<div class="col-3">
      <?php
        if ($_SERVER['REQUEST_URI'] != "/registration.php") {
           // Кодключаем файл с навигацией по категориям
        include $_SERVER['DOCUMENT_ROOT'] . '/parts/cat_nav.php';
        }
       
      ?>
		</div> <!-- /.col-3 -->

		<div class="col-9">

			<div class="container">