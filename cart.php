<?php include 'inc/header.php'; ?>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $quantity = $_POST['quantity'];
        $cartId = $_POST['cartId'];

        $updateQty = $cart->updateQty($cartId, $quantity);
    }
?>

<div class="text-center row m-5 d-flex flex-column">
    <?= isset($updateQty) ? $updateQty : "" ?>
    <table class="cart-table col table-dark table-striped">
        <thead class="bg-dark">
            <tr class="py-5">

                <th>Course</th>
                <th class="d-none d-md-block">Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th class="d-flex"><span>Total</span><small>(TVA 10%)</small></th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $getCart = $cart->getAllCart();
                $beforeTax = 0;
                if($getCart) {
                    while($rows = $getCart->fetch()) {
            ?>
                        <tr>
                            <td><?= $rows['courseName'] ?></td>
                            <td class="d-none d-md-block"d><img src="admin/<?= $rows['image'] ?>" style="width: 25px;" alt="image"></td>
                            <td>€<?= number_format($rows['amount'], 2, ',', ' ') ?></td>
                            <td>
                                <form action="" method="post" class="form-inline justify-content-center">
                                    <div class="form-group">
                                        <input type="hidden" name="cartId" value="<?= $rows['cartId'] ?>">
                                        <input type="number" name="quantity" value="<?= $rows['quantity'] ?>" class="form-control">
                                        <input type="submit" value="Update" class="btn btn-outline-warning">
                                    </div>
                                </form>
                            </td>
                            <td class="text-left pl-2">€
                                <?php
                                    $preTax = $rows['quantity'] * $rows['amount'];
                                    $beforeTax += $preTax;
                                    $tax = $preTax*0.1;
                                    echo number_format(($preTax+$tax), 2, ',', ' ');
                                ?>
                             </td>
                            <td><a href="#" class="text-warning">X</a></td>
                        </tr>
            <?php
                    }
                }
            ?>

            
        </tbody>
    </table>
    <div class="w-100">
        <div class="text-right float-right py-3 px-4 mt-4 border border-dark">
            <h3>Before TVA : <small>€<?= $beforeTax ?></small></h3>
            <small><i>TVA <small>(10%)</small> : </i>€<?= number_format(($beforeTax * 0.1), '2', ',', ' ') ?></small>
            <h3>Total Amount : <small>€<?= number_format((($beforeTax * 0.1) + $beforeTax), 2, ',', ' ') ?></small></h3>
        </div>
    </div>
</div>

    <!-- testing/ delete if not good -->
    <h2 class="text-white border bg-secondary py-4 pl-5 mt-5">RECOMMENDED PRODUCTS FOR YOU</h2>

    <div class="d-sm-flex my-4 text-center">

        <?php
            $recommendCourse = $course->getFeaturedCourse();
            if($recommendCourse) {
                while($rows = $recommendCourse->fetch()) {
        ?>
                    <div class="shadow-lg m-2 pt-3 rounded">
                        <a href="preview.php?id=<?= $rows['courseId'] ?>"><img src="admin/<?= $rows['image'] ?>" alt="html" class="w-100 border image-hover" style="max-width:269px; height:auto; max-height:151px"></a>
                        <h3 class="bg-dark"><?= $rows['courseName'] ?></h3>
                        <p><?= $fm->shortenText($rows['description'], 50) ?></p>
                        <p>
                            <span class="text-danger">€<?= $rows['price'] ?></span>
                        </p>
                        <div class="btn">
                            <a href="preview.php?id=<?= $rows['courseId'] ?>">Details</a>
                        </div>
                    </div>
        <?php
                }
            }
        ?>

    </div>

<?php include 'inc/footer.php'; ?>