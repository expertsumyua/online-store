<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

$page = "userOrders";

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">HOME</a></li>
    <li class="breadcrumb-item active" aria-current="page">User Orders</li>
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
                        <span class="d-lg-none">Dashboard</span>
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
                        <i class="nc-icon nc-zoom-split"></i>
                        <span class="d-lg-block">&nbsp;Search</span>
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
        

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">ORDER TABLE</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="orderTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr class="table-info">
                                <th># Order</th>
                                <th>User</th>
                                <th>Date and time</th>
                                <th>Status</th>
                                <th>Total cost</th>
                            </tr>
                        </thead>                 
                        <tbody>
                            <?php
                            $sql_orders = "SELECT * FROM orders";
                            $result_orders = $conn->query($sql_orders);
                            while ($order = mysqli_fetch_assoc($result_orders)) {
                            ?>                            
                                <tr onclick="window.location.href='/admin/viewOrder.php?id=<?php echo $order['id'] ?>'; return false">
                                    <td><?php echo $order['id'] ?></td>                                    
                                    <td><?php
                                        $sql = "SELECT * FROM users WHERE id= '" . $order['user_id'] . "'";
                                        $user = mysqli_fetch_assoc($conn->query($sql));
                                        echo $user['login']
                                    ?></td>
                                    <td><?php echo $order['created_at'] ?></td>
                                    <td class="<?php if ($order['status'] == "NEW") { echo "bg-danger"; } else if ($order['status'] == "Processing") { echo "bg-warning"; } else { echo "bg-success"; }?>">
                                        <?php echo $order['status'] ?>
                                    </td>
                                    <td><?php 
                                        $basket = json_decode($order['products'], true);
                                        echo $basket["total_costs"]
                                    ?></td>                 
                                </tr>                            
                                <?php
                            }                                                
                        ?>                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php           
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>