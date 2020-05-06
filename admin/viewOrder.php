<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

$page = "viewOrders";

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';

if (isset($_GET) and $_SERVER["REQUEST_METHOD"]=="GET") {

    $sql_orders = "SELECT * FROM orders WHERE id= '" . $_GET['id'] . "'";
    $order = mysqli_fetch_assoc($conn->query($sql_orders));

    $sql = "SELECT * FROM users WHERE id= '" . $order['user_id'] . "'";
    $user = mysqli_fetch_assoc($conn->query($sql));
}
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">HOME</a></li>
    <li class="breadcrumb-item"><a href="/admin/userOrders.php">USER ORDERS</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Order</li>
  </ol>
</nav>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="nc-icon nc-palette"></i>
                        <span class="d-lg-none">Order Data</span>
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="nc-icon nc-planet"></i>
                        <span class="notification">5</span>
                        <span class="d-lg-none">Notification</span>
                    </a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="#">Notification 1</a>
                        <a class="dropdown-item" href="#">Notification 2</a>
                        <a class="dropdown-item" href="#">Notification 3</a>
                        <a class="dropdown-item" href="#">Notification 4</a>
                        <a class="dropdown-item" href="#">Another notification</a>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                       <!--  <i class="nc-icon nc-zoom-split"></i>
                        <span class="d-lg-block">&nbsp;Search</span> -->
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                        <span class="no-icon">Account</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="no-icon">Dropdown</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                        <span class="no-icon">Log out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        

        <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order Data # <?php echo $order['id']; ?></h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"># User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user['id'] ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">LOGIN</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user['login'] ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Phone</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $user['phone'] ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Email</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user['email'] ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0 font-weight-bold text-primary">Order table</h5>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-striped table-light table-hover">
        
                        <thead>
                            <!-- Шапка таблицы -->
                            <tr class="table-active">
                              <th scope="col"># Product</th>
                              <th scope="col">Title</th>
                              <th scope="col">Count</th>
                              <th scope="col">Total cost</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Выводим по одному данные в таблицу из Куки
                                if (isset($order['products'])) {
                                    $basket = json_decode($order['products'], true);
                                    //var_dump($basket);
                                    for($i = 0; $i < count($basket['products']); $i++) {
                                        $sql = "SELECT * FROM `products` WHERE id=" . $basket['products'][$i]['product_id'];
                                        $result = $conn->query( $sql );
                                        $product = mysqli_fetch_array( $result );
                                        ?>
                                            <tr>
                                                <td><?php echo $product['id'] ?></td>
                                                <td><?php echo $product['title'] ?></td>

                                                <td><?php echo $basket['products'][$i]['count']; ?></td>

                                                <td><?php echo $basket['products'][$i]['costs']; ?></td>                                
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>           

                        </tbody>
                        <caption>
                            <tr class="table-active">
                                <th>Total cost</th>
                                <th></th>
                                <th></th>           
                                <th id="total-costs"><?php echo $basket["total_costs"] ?></th>
                            </tr>
                        </caption>
                    </table>

                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h3 class="m-0 font-weight-bold text-primary">STATUS ORDER</h3>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="text-gray-400">Change</i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Change status:</div>                      
                        <?php 
                            if ($order['status'] != 'NEW') {
                            ?>
                            <div onclick="changeStatus('NEW', <?php echo $order['id']; ?>)" class="dropdown-item">
                            <i class="fa fa-clock-o fa-1x text-danger"></i>NEW
                            </div>
                            <?php
                        }
                        ?>
                        <?php 
                            if ($order['status'] != 'Processing') {
                            ?>
                            <div onclick="changeStatus('Processing', <?php echo $order['id']; ?>)" class="dropdown-item">
                            <i class="fa fa-refresh fa-spin fa-1x fa-fw text-warning"></i>Processing
                            </div>
                            <?php
                        }
                        ?>
                        <?php 
                            if ($order['status'] != 'Sent') {
                            ?>
                            <div onclick="changeStatus('Sent', <?php echo $order['id'] ?>)" class="dropdown-item">
                            <i class="fa fa-truck fa-1x fa-fw text-success"></i>Sent
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">


                  <div class="chart-pie text-center">
                    
                     
                        <?php 
                            if ($order['status'] == 'NEW') {
                            ?>
                                <div id="status-order">
                                    <span class="mr-5">
                                      <i class="fa fa-clock-o fa-5x text-danger"></i>
                                    </span>
                                    <div class="fa-3x text-danger text-center">NEW</div>
                                </div>
                            <?php
                        }
                        ?>
                        <?php 
                            if ($order['status'] == 'Processing') {
                            ?>  <div id="status-order">
                                    <span class="mr-5">
                                      <i class="fa fa-refresh fa-spin fa-5x fa-fw text-warning"></i>
                                    </span>
                                    <div class=" fa-3x text-warning text-center">Processing</div>
                                </div>                                
                            <?php
                        }
                        ?>
                        <?php 
                            if ($order['status'] == 'Sent') {
                            ?>  <div id="status-order">
                                    <span class="mr-5">
                                      <i class="fa fa-truck fa-5x fa-fw text-success"></i>
                                    </span>
                                    <div class="fa-3x text-success text-center">Sent</div>
                                </div>                                
                            <?php
                        }
                        ?>

                  </div>       



                  <div class="mt-4 text-center">
                    <span class="mr-2">
                      <i class="fa fa-clock-o fa-1x text-danger"></i> NEW
                    </span>        
                    <span class="mr-2">
                      <i class="fa fa-refresh fa-spin fa-1x fa-fw text-warning"></i> Processing
                    </span>
                    <span class="mr-2">
                      <i class="fa fa-truck fa-1x fa-fw text-success"></i> Sent
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- <button onclick="changeStatus()" class="btn btn-danger">Delete</button> -->
         
<?php           
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>
<script src="changeStatus.js" ></script>