<?php include 'inc/header.php'; ?>
<?php include 'inc/submenu.php'; ?>
<?php include '../classes/Category.class.php'; ?>

<?php
    $cat = new Category();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['catName'];
        $insertCat = $cat->catInsert($catName);
    }
?>
    <div class="row my-5 ml-1">
        <div class="col-md-5 border border-dark" id="catAdd">
            <h1 class="my-5">Add New Category</h1>
            <?= isset($insertCat) ? $insertCat : "" ?>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="catName" placeholder="Category name" class="text-dark">
                    <input type="submit" value="Save" class="text-dark mt-2 mb-5 d-block">
                </div>
            </form>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>
