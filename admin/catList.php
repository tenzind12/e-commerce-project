<?php include 'inc/header.php'; ?>
<?php include 'inc/submenu.php'; ?>
<?php include '../core/classes/Category.class.php'; ?>

<?php 
    $cat = new Category();

    if(isset($_GET['delCat'])) {
        $id = $_GET['delCat'];
        $delCat = $cat->delCatById($id);
    }
?>

<!-- main body of dashboard -->
<script type="text/javascript" src="../js/admin-datatable.js"></script>
<div class="my-5">
    <div class="cat-list--title">
        <h1>Category List</h1>
        <?= isset($delCat) ? $delCat : '' ?>
        <table class="table table-striped table-dark w-100">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $getCat = $cat->getAllCat();
                    if($getCat) {
                        $i = 0;
                        while($result = $getCat->fetch()) {
                            $i++;
                ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $result['catName'] ?></td>
                                <td><a href="catEdit.php?id=<?= $result['catId'] ?>" class="text-primary">Edit</a>
                                    || <a onclick="return confirm('Are you sure?')" href="?delCat=<?= $result['catId']?>" class="text-primary">Delete</a>
                                </td>
                            </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'inc/footer.php'; ?>