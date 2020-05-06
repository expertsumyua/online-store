<?php
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

$page = "add";

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/header.php';

if(isset($_POST["submit"])) {
    $sql_products = "INSERT INTO `products` (`title`, `description`, `content`, `category_id`) VALUES ('" . $_POST["title"] . "','" . $_POST["description"] . "', '" . $_POST["content"] . "', '" . $_POST["category_id"] . "');";
    if($conn->query($sql_products)) {
        //echo "Товар добавлен";
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
                <h4 class="card-title">Adding a product</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" type="text" class="form-control" placeholder="Enter name!">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" type="text" class="form-control" rows="1" placeholder="Enter a description!"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" type="text" class="form-control" rows="5" placeholder="Enter a content!"></textarea>
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
                                            echo "<option value=". $row['id'] .">" . $row['title'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button name="submit" value="1" type="submit" class="btn btn-success btn-fill pull-right">Add</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php           
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>