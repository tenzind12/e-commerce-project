<?php include 'inc/header.php'; ?>

<?php
    // deleting course from cart
    if(isset($_GET['delCart'])) {
        $cartId = $_GET['delCart'];
        $delCart = $cart->deleteCart($cartId);
    }
?>
<?php
    // updating the quantity of course in cart
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $quantity = $_POST['quantity'];
        $cartId = $_POST['cartId'];

        $updateQty = $cart->updateQty($cartId, $quantity);
        if($quantity <= 0) $delCart = $cart->deleteCart($cartId);
    }
?>
<?php
    if(!isset($_GET['id'])) {
        echo "<meta http-equiv='refresh'/>";
    }
?>


<div class="text-center row m-1 m-sm-5 d-flex flex-column">
    <?= isset($updateQty) ? $updateQty : "" ?>
    <?= isset($delCart) ? $delCart : "" ?>
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
                $beforeTaxAmount = 0;
                if($getCart) {
                    while($rows = $getCart->fetch()) {
                        // amount before tax --individual line
                        $preTax = $rows['quantity'] * $rows['amount'];
                        // amount of tax     --individual line
                        $tax = $preTax*0.1;
                        $total = $preTax + $tax;
                        // total before tax  --individual line
                        $beforeTaxAmount += $preTax;
                        $totalTax = $beforeTaxAmount * 0.1;
                        $totalAfterTax = $beforeTaxAmount + $totalTax;
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
                            <td class="text-left pl-2">€<?= number_format($total, 2, ',', ' ');?></td>
                            <td><a onclick="return confirm('Are you sure to delete the course?') " href="?delCart=<?= $rows['cartId'] ?>" class="text-warning">X</a></td>
                        </tr>
            <?php
                    }
                }
            ?>

        </tbody>
    </table>
    <div class="w-100">
        <div class="text-right float-right py-3 px-4 mt-4 border border-dark">
            <?php
            if(isset($totalAfterTax)) {
                Session::set('totalPrice', $totalAfterTax);
             ?>
                <h3>Before TVA : <small>€<?= $beforeTaxAmount ?></small></h3>
                <small><i>TVA <small>(10%)</small> : </i>€<?= number_format($totalTax, '2', ',', ' ') ?></small>
                <h3>Total Amount : <small>€<?= number_format($totalAfterTax, 2, ',', ' ') ?></small></h3>
                <?php
            }
            ?>
        </div>
    </div>
    <p class="text-secondary text-left"><i><small>Warning! Logging out deletes all the products</small></i></p>
    <div class="d-flex m-auto">
        <button type="submit" onclick="window.location.href='index.php'" class="btn btn-lg btn-outline-success mr-5">Continue shopping</button>
        <button type="submit" onclick="window.location.href='checkout.php'" class="btn btn-lg btn-outline-warning ml-5">Check Out</button>
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