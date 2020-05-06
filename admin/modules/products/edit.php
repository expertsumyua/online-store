<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

$page = "edit";

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';

if(isset($_POST["submit"])) {
     $sql_products = "UPDATE `products` SET title = '" . $_POST["title"] . "', description = '" . $_POST["description"] . "', content = '" . $_POST["content"] . "', category_id = '" . $_POST["category_id"] . "' WHERE id =" . $_GET["id"] . ";";
    if($conn->query($sql_products)) {
        //echo "Товар Отредактирован";
        header("Location: /admin/products.php");
    } else {
        echo "Error!";
    }
}

?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Product Editing</h4>
            </div>
            <div class="card-body">
                <form method="POST">

                    <?php
                    /*=============== Вывод задания на экран  ========================*/
                    if (isset($_GET["id"])) {
                        $sql_products = "SELECT * FROM products WHERE id = " . $_GET["id"] . "";
                        $result = $conn->query($sql_products);
                        $product = mysqli_fetch_assoc($result);
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" type="text" class="form-control" placeholder="Enter name!" value="<?php echo $product["title"]?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" type="text" class="form-control" rows="1" placeholder="Enter a description!"><?php echo $product["description"]?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="content" type="text" class="form-control" rows="5" placeholder="Enter a content!"><?php echo $product["content"]?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id">
                                        <option value ="0">Не выбрано</option>
                                        <?php
                                            $sql_category = "SELECT * FROM categories";
                                            $result = $conn->query($sql_category);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                if($row['id'] == $product["category_id"]) {
                                                    echo "<option selected value=". $row['id'] .">" . $row['title'] . "</option>";
                                                } else {
                                                    echo "<option value=". $row['id'] .">" . $row['title'] . "</option>";
                                                }
                                                
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <button name="submit" value="1" type="submit" class="btn btn-success btn-fill pull-right">Edit</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php           
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>