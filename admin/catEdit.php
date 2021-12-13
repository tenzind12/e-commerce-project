<?php include 'inc/header.php'; ?>
<?php include 'inc/submenu.php'; ?>
<?php include '../classes/Category.class.php'; ?>

<?php
    if(!isset($_GET['id']) || $_GET['id'] == NULL) {
        echo "<script>window.location = 'catList.php'; </script>";
    }

    $id = $_GET['id'];
?>

<?php
    $cat = new Category();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['catName'];
        $updateCat = $cat->catUpdate($catName, $id);
    }
?>

    <div class="row my-5 ml-1">
        <div class="col-md-5 border border-dark" id="catAdd">
            <h1 class="my-5">Update Category</h1>
            <?= isset($updateCat) ? $updateCat : "" ?>

            <!-- to insert the name to be update in the value attribute -->
            <?php
                $getCat = $cat->getCatById($id);
                if($getCat) $result = $getCat->fetch();
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="catName" value="<?= $result['catName']?>" class="text-dark">
                    <input type="submit" value="Save" class="text-dark mt-2 mb-5 d-block">
                </div>
            </form>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>
