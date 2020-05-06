<?php
include "../../../configs/db.php";
//$page = "products";
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="http://shop.local/admin/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="http://shop.local/admin/assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin panel</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="http://shop.local/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="http://shop.local/admin/assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="http://shop.local/admin/assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="/admin" class="simple-text">
                        Shop
                    </a>
                </div>

                <ul class="nav">
                    <li class="nav-item <?php if ($page == "home") { echo 'active'; }?>">
                        <a class="nav-link" href="/admin">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($page == "users") { echo 'active'; }?>">
                        <a class="nav-link" href="users.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($page == "products") { echo 'active'; }?>">
                        <a class="nav-link" href="../../products.php">
                            <i class="nc-icon nc-app"></i>
                            <p>Products</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($page == "categories") { echo 'active'; }?>">
                        <a class="nav-link" href="./typography.html">
                            <i class="nc-icon nc-bullet-list-67"></i>
                            <p>Categories</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nc-icon nc-key-25"></i>
                            <p>Log out</p>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">

                    <div class="row">

                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Add product</h4>                                   
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Options</th>
                                        </thead>
                                        <tbody>
       
                                            <tr>
                                                <td>#</td>
                                                <td><input name="taskname" type="text" class="form-control" placeholder="Введите наименование товара!"></td>
                                                <td><input name="taskname" type="text" class="form-control" placeholder="Здесь пдолжно быть описание!"></td>
                                                <td><input name="taskname" type="text" class="form-control" placeholder="Категория товара!"></td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                      <a href="options/products/edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">ADD new</a>
                                                    </div>                                                                
                                                </td>
                                            </tr>
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Products</h4>                                   
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Options</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql = "SELECT * FROM products";
                                                $result = $conn->query($sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $row['id'] ?></td>
                                                            <td><?php echo $row['title'] ?></td>
                                                            <td><?php echo $row['description'] ?></td>
                                                            <td><?php echo $row['category_id'] ?></td>
                                                            <td>
                                                                <div class="btn-group" role="group" aria-label="Basic example" disabled>
                                                                  <a href="options/products/edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Edit</a>
                                                                  <a href="options/products/delete.php?id=<?php echo $row['id'] ?>"type="button" class="btn btn-secondary">Delete</a>
                                                                </div>                                                                
                                                            </td>
                                                        </tr>
                                                    <?php
                                                }                                                
                                            ?>                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                       


                    </div>

                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    eXpert Inc
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="#">eXpert</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
    
</body>
<!--   Core JS Files   -->
<script src="../../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script>

</html>
