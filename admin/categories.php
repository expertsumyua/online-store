<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

$page = "categories";

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://shop.local/admin">HOME</a></li>
    <li class="breadcrumb-item active" aria-current="page">CATEGORIES</li>
  </ol>
</nav>

<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <!-- <h4 class="card-title">Products</h4> -->
                <form class="form-inline my-2 my-lg-0">
                        <h4 class="card-title">Categories</h4>
                        <a href="categories.php?addCategory" type="button" class="btn btn-secondary ml-3">Add category</a>
                </form>                                    
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Options</th>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM categories";
                            $result = $conn->query($sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['title'] ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                              <a href="categories.php?editCategory&id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Edit</a>
                                               <a href="categories.php?deleteCategory&id=<?php echo $row['id'] ?>"type="button" class="btn btn-secondary">Delete</a>
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
    <a href="categories.php?addCategory" type="button" class="btn btn-secondary ml-3">Add category</a>
</div> <!-- /.row -->

<?php           
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>
<!-- Модальное окно добавления категории! -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Adding a Product</h5>
        <a href="categories.php" type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
        </div>

        <!-- <form method="POST"> --> <!-- action="http://doska.local/board.php?board=<?php //echo $_GET["board"]?>&create"> -->
        <form action="http://shop.local/admin/modules/categories/add.php" method="POST">
            <div class="modal-body">                
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter name!">
                  </div>

            </div>
            <div class="modal-footer">
            <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>-->
             <a href="categories.php" class="btn btn-secondary">Cancel</a>
            <button name="submit" type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- Модальное окно редактирования продукта! -->
<div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Category Editing</h5>
        <a href="categories.php" type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
        </div>

        <form action="http://shop.local/admin/modules/categories/edit.php" method="POST"> <!-- action="http://doska.local/board.php?board=<?php //echo $_GET["board"]?>&create"> -->
            <div class="modal-body">
                <input type="hidden" name="сategory_id" value="<?php echo $_GET["id"]; ?>">                
                <?php
                /*=============== Вывод задания на экран  ========================*/
                if (isset($_GET["editCategory"])) {
                    $sql_categories = "SELECT * FROM `categories` WHERE id = " . $_GET["id"] . "";
                    $result = $conn->query($sql_categories);
                    $category = mysqli_fetch_assoc($result);
                    ?>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $category["title"]?>">
                    </div>
                    <?php
                }
                /*=================================================================*/
                ?>

            </div>
            <div class="modal-footer">
            <a href="categories.php" class="btn btn-secondary">Cancel</a>
            <button name="submit" type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>

    </div>
  </div>
</div>


<!-- Модальное окно удаления продукта! -->
<div class="modal fade" id="deleteCategory" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Attention!!!</h5>
        <a href="categories.php" type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
        </div>

        <form action="http://shop.local/admin/modules/categories/delete.php" method="POST"> <!-- action="http://doska.local/board.php?board=<?php //echo $_GET["board"]?>&create"> -->
            <div class="modal-body">
                <input type="hidden" name="сategory_id" value="<?php echo $_GET["id"]; ?>">                
                <?php
                /*=============== Вывод задания на экран  ========================*/
                if (isset($_GET["deleteCategory"])) {
                    $sql_categories = "SELECT * FROM `products` WHERE id = " . $_GET["id"] . "";
                    $result = $conn->query($sql_categories);
                    $category = mysqli_fetch_assoc($result);
                    ?>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Now the Category with the ID number will be deleted: <?php echo $_GET["id"]; ?></label>
                        <label for="exampleFormControlInput1">Do you agree?</label>
                    </div>
                    <?php
                }
                /*=================================================================*/
                ?>

            </div>
            <div class="modal-footer">
            <a href="categories.php" class="btn btn-secondary">Cancel</a>
            <button name="submit" type="submit" class="btn btn-primary">YES</button>
            </div>
        </form>

    </div>
  </div>
</div>


<?php
if (isset($_GET["addCategory"])) {
    ?>
        <script> $(document).ready(function() {
            $("#addCategory").modal('show');
            });
        </script>
    <?php
} 
if (isset($_GET["editCategory"])) {
    ?>
        <script> $(document).ready(function() {
            $("#editCategory").modal('show');
            });
        </script>
    <?php
}
if (isset($_GET["deleteCategory"])) {
    ?>
        <script> $(document).ready(function() {
            $("#deleteCategory").modal('show');
            });
        </script>
    <?php
}
?>