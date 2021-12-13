<?php include 'inc/header.php'; ?>

<div class="text-center row m-5">
    <table class="cart-table col table-dark table-striped">
        <thead class="bg-dark">
            <tr class="py-5">
                <th>Course</th>
                <th class="d-none d-md-block">Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Html course</td>
                <td class="d-none d-md-block"d><img src="img/contact.png" style="width: 25px;" alt="image"></td>
                <td>€13.99</td>
                <td>
                    <form action="" method="post" class="form-inline justify-content-center">
                        <div class="form-group">
                            <input type="number" name="#" value="1" class="form-control">
                            <input type="submit" value="Update" class="btn btn-outline-warning">
                        </div>
                    </form>
                </td>
                <td>€13.99</td>
                <td><a href="#" class="text-warning">X</a></td>
            </tr>
            <tr>
                <td>Html course</td>
                <td class="d-none d-md-block"><img src="img/contact.png"  style="width: 25px;" alt="image"></td>
                <td>€13.99</td>
                <td>
                    <form action="" method="post" class="form-inline justify-content-center">
                        <div class="form-group">
                            <input type="number" name="#" value="1" class="form-control">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                </td>
                <td>€13.99</td>
                <td><a href="#">X</a></td>
            </tr>
            <tr>
                <td>Html course</td>
                <td class="d-none d-md-block"><img src="img/contact.png"  style="width: 25px;" alt="image"></td>
                <td>€13.99</td>
                <td>
                    <form action="" method="post" class="form-inline justify-content-center">
                        <div class="form-group">
                            <input type="number" name="#" value="1" class="form-control">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                </td>
                <td>€13.99</td>
                <td><a href="#">X</a></td>
            </tr>
            <tr>
                <td>Html course</td>
                <td class="d-none d-md-block"><img src="img/contact.png"  style="width: 25px;" alt="image"></td>
                <td>€13.99</td>
                <td>
                    <form action="" method="post" class="form-inline justify-content-center">
                        <div class="form-group">
                            <input type="number" name="#" value="1" class="form-control">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                </td>
                <td>€13.99</td>
                <td><a href="#">X</a></td>
            </tr>
            <tr>
                <td>Html course</td>
                <td class="d-none d-md-block"><img src="img/contact.png"  style="width: 25px;" alt="image"></td>
                <td>€13.99</td>
                <td>
                    <form action="" method="post" class="form-inline justify-content-center">
                        <div class="form-group">
                            <input type="number" name="#" value="1" class="form-control">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                </td>
                <td>€13.99</td>
                <td><a href="#">X</a></td>
            </tr>
        </tbody>
    </table>
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
                        <a href="#"><img src="admin/<?= $rows['image'] ?>" alt="html" class="w-100 border image-hover" style="max-width:269px; height:auto; max-height:151px"></a>
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