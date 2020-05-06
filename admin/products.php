<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

$page = "products";

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">HOME</a></li>
    <li class="breadcrumb-item active" aria-current="page">PRODUCTS</li>
  </ol>
</nav>

<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <!-- <h4 class="card-title">Products</h4> -->
                <form class="form-inline my-2 my-lg-0">
                        <h4 class="card-title">Products</h4>
                        <a href="modules/products/add.php" type="button" class="btn btn-secondary ml-3">Add product</a>
                </form>                                    
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>Category</th>
                        <th>Category ID</th>
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
                                        <td><?php echo $row['content'] ?></td>
                                        <?php
                                            $sql_categories = "SELECT * FROM categories WHERE id LIKE '" . $row['category_id'] . "'";
                                            $result2 = $conn->query($sql_categories);
                                            if ($result2) {
                                                $category = mysqli_fetch_assoc($result2);
                                                ?>
                                                    <td><?php echo $category['title'] ?></td>
                                                <?php
                                            }
                                        ?>
                                        <td><?php echo $row['category_id'] ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                              <a href="modules/products/edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-secondary">Edit</a>
                                               <a href="products.php?deleteProduct&id=<?php echo $row['id'] ?>"type="button" class="btn btn-secondary">Delete</a>
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
    <a href="modules/products/add.php" type="button" class="btn btn-secondary ml-3">Add product</a>
</div> <!-- /.row -->

<?php           
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>
<!-- Модальное окно добавления продукта! -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Adding a Product</h5>
        <a href="products.php" type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
        </div>

        <!-- <form method="POST"> --> <!-- action="http://doska.local/board.php?board=<?php //echo $_GET["board"]?>&create"> -->
        <form action="http://shop.local/admin/modules/products/add.php" method="POST">
            <div class="modal-body">                
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter name!">
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" type="text" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Enter a description!"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content</label>
                    <textarea name="content" type="text" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Enter a content!"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Category</label>
                    <input name="category_id" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter a Category!">
                  </div>

            </div>
            <div class="modal-footer">
            <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>-->
             <a href="products.php" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Add product</button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- Модальное окно редактирования продукта! -->
<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Product Editing</h5>
        <a href="products.php" type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
        </div>

        <form action="http://shop.local/admin/modules/products/edit.php" method="POST"> <!-- action="http://doska.local/board.php?board=<?php //echo $_GET["board"]?>&create"> -->
            <div class="modal-body">
                <input type="hidden" name="product_id" value="<?php echo $_GET["id"]; ?>">                
                <?php
                /*=============== Вывод задания на экран  ========================*/
                if (isset($_GET["editProduct"])) {
                    $sql_product = "SELECT * FROM `products` WHERE id = " . $_GET["id"] . "";
                    mysqli_query($conn, $sql_product);
                    $product = mysqli_fetch_assoc(mysqli_query($conn, $sql_product));
                    ?>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $product["title"]?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" type="text" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Enter a description!"><?php echo $product["description"]?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Content</label>
                    <textarea name="content" type="text" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Enter a content!"><?php echo $product["content"]?></textarea>
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlTextarea1">Category</label>
                    <input name="category_id" type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $product["category_id"]?>">
                  </div>



                    <?php
                } else {
                    ?>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Название задания</label>
                        <input name="taskname" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Введите название задания">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Описание задания</label>
                        <textarea name="description" type="text" class="form-control" id="exampleFormControlTextarea1" rows="5">Здесь пока нет описания задания!</textarea>
                    </div>
                    <?php
                }
                /*=================================================================*/
                ?>

            </div>
            <div class="modal-footer">
            <a href="products.php" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Edit product</button>
            </div>
        </form>

    </div>
  </div>
</div>


<!-- Модальное окно удаления продукта! -->
<div class="modal fade" id="deleteProduct" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Attention!!!</h5>
        <a href="products.php" type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
        </div>

        <form action="http://shop.local/admin/modules/products/delete.php" method="POST"> <!-- action="http://doska.local/board.php?board=<?php //echo $_GET["board"]?>&create"> -->
            <div class="modal-body">
                <input type="hidden" name="product_id" value="<?php echo $_GET["id"]; ?>">                
                <?php
                /*=============== Вывод задания на экран  ========================*/
                if (isset($_GET["deleteProduct"])) {
                    $sql_product = "SELECT * FROM `products` WHERE id = " . $_GET["id"] . "";
                    mysqli_query($conn, $sql_product);
                    $product = mysqli_fetch_assoc(mysqli_query($conn, $sql_product));
                    ?>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Now the product with the ID number will be deleted: <?php echo $_GET["id"]; ?></label>
                        <label for="exampleFormControlInput1">Do you agree?</label>
                    </div>
                    <?php
                }
                /*=================================================================*/
                ?>

            </div>
            <div class="modal-footer">
            <a href="products.php" class="btn btn-secondary">Cancel</a>
            <button name="submit" type="submit" class="btn btn-primary">YES</button>
            </div>
        </form>

    </div>
  </div>
</div>


<?php
if (isset($_GET["addProduct"])) {
    ?>
        <script> $(document).ready(function() {
            $("#addProduct").modal('show');
            });
        </script>
    <?php
} 
if (isset($_GET["editProduct"])) {
    ?>
        <script> $(document).ready(function() {
            $("#editProduct").modal('show');
            });
        </script>
    <?php
}
if (isset($_GET["deleteProduct"])) {
    ?>
        <script> $(document).ready(function() {
            $("#deleteProduct").modal('show');
            });
        </script>
    <?php
}
?>