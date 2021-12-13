<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

<!-- 6ie139d7v0ccobk84l5p3h3bcm -->
<div class="main mx-3 mx-lg-0">

    <!----------------- FEATURED COURSES ---------------------------->
    <h2 class="text-light shadow-lg py-4 pl-5 bg-success rounded">FEATURED PRODUCTS</h2>

    <div class="d-sm-flex my-4 text-center">

        <?php
            $featuredCourse = $course->getFeaturedCourse();
            if($featuredCourse) {
                while($rows = $featuredCourse->fetch()) {
        ?>
                    <div class="shadow-lg mx-2 pt-3 border border-light">
                        <a href="preview.php?id=<?= $rows['courseId']?>"><img src="admin/<?= $rows['image'] ?>" alt="<?= $rows['courseName'] ?>" class="w-100 image-hover" style="max-width:269px; height:auto; max-height:151px"></a>
                        <h3 class="bg-dark text-light"><?= $rows['courseName'] ?></h3>
                        <p><?= $fm->shortenText($rows['description'], 100) ?></p>
                        <p>
                            <span class="text-danger">€<?= $rows['price'] ?></span>
                        </p>
                        <div class="btn">
                            <a href="preview.php?id=<?= $rows['courseId']?>">Details</a>
                        </div>
                    </div>
        <?php
                }
            }
        ?>

    </div>

    <!----------------- NEW COURSES ---------------------------->
    <h2 class="text-light shadow-lg py-4 pl-5 bg-success rounded">NEW PRODUCTS</h2>

    <div class="d-sm-flex my-4 text-center">

        <?php
            $newCourse = $course->getNewCourse();
            if($newCourse) {
                while($rows = $newCourse->fetch()) {
        ?>
                    <div class="shadow-lg mx-2 pt-3 border border-light">
                        <a href="preview.php?id=<?= $rows['courseId'] ?>"><img src="admin/<?= $rows['image'] ?>" alt="<?= $rows['courseName'] ?>"  class="w-100 image-hover" style="max-width:269px; height:auto; max-height:151px"></a>
                        <h3 class="bg-dark text-light"><?= $rows['courseName'] ?></h3>
                        <p><?= $fm->shortenText($rows['description'], 100) ?></p>
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
</div>


<?php include 'inc/footer.php'; ?>