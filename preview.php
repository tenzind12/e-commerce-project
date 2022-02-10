<?php include 'inc/header.php'; ?>

<?php
    if(!isset($_GET['id']) || $_GET['id'] == NULL) 
        header('Location: 404.php');
    else $id = $_GET['id'];
?>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $quantity = $_POST['quantity'];
        $addToCart = $cart->addToCart($quantity, $id);
    }
?>

<!-- two main outer grids of 8 and 4 -->
<div class="row my-5 px-3">
    <div class="col-lg-8">
        <!-- two inner grid of 5(image) and 7(para) -->
        <div class="row mb-5">
            <div class="col-sm-5">
                <?php
                    $getOneCourse = $course->getSingleCourse($id);
                    if($getOneCourse) {
                        while($rows = $getOneCourse->fetch()) {
                ?>
                <img src="admin/<?= $rows['image'] ?>" alt="course image"/>
            </div>
            <div class="col-sm-7">
                <h3><?= $rows['courseName'] ?></h3>
                <p class="text-muted small"><?= $fm->shortenText($rows['description'], 100) ?></p>
                <p>Price: <span class="text-danger">€ <?= $rows['price'] ?> </span></p>
                <p>Category: <span class="text-success"><?= $rows['catName'] ?></span></p>
                <p>Tutor: <span class="text-success"><?= $rows['tutorName'] ?></span></p>

                <form action="" method="post" class="form-inline">
                    <input type="number" name="quantity" value="1"class="form-control"/>
                    <input type="submit" value="Buy Now" class="btn btn-outline-warning ml-sm-3">
                </form>
                <?= isset($addToCart) ? $addToCart : "" ?>
            </div>
        </div>

        <h2 class="border border-secondary p-4 bg-dark rounded text-light corner-design">PRODUCT DETAILS</h2>
        <div class="my-5">
            <p><?= $rows['description'] ?></p>
        </div>
        <?php
                }
            }
        ?>
    </div>

    <div class="col-lg-4">
        <h2 class="text-muted mb-5">COURSES</h2>
        <ul class="list-group list-group-flush" id="preview-list">
        <?php
            $getCourse = $course->getAllCourse();
            if($getCourse) {
                while($result = $getCourse->fetch()) {
        ?>
                    <a class="text-decoration-none text-muted" href="preview.php?id=<?= $result['courseId'] ?>"><li class="list-group-item"><?= $result['courseName'] ?></li></a>
        <?php
                }
            }
        ?>
        </ul>
    </div>
</div>


<?php include 'inc/footer.php'; ?>
