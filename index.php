<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

<!-- 6ie139d7v0ccobk84l5p3h3bcm -->
<div class="main mx-3 mx-lg-0">

    <h2 class="border border-secondary py-4 pl-5 bg-dark text-light rounded corner-design">CUSTOMER FEEDBACKS</h2>
    <!------------- SLIDER ------------>
    <div class="comment-container">
        <div class="my-4 text-center comment-slider">

            <?php 
                $comments = $cmmt->getComments();
                if($comments) {
                    $i = 0;
                    while($rows = $comments->fetch()) {
                        $i++;
            ?>
                <div class="c__slide slide--<?= $i ?>">
                    <div class="testimonial">
                        <h2 class="text-warning"><?php 
                                $rating = $rows['rating'];
                                for($i = 0; $i < $rating; $i++) {
                                    echo '★';
                                }
                        ?></h2>
                        <blockquote>
                            <?= $rows['comment'] ?>
                        </blockquote>
                        <address>
                            <p><u><?= strtoupper($rows['cus_name']) ?></u></p>
                            <!-- <p>CityName <span>country</span></p> -->
                        </address>
                    </div>
                </div>
            <?php
                    }
                }
            ?>

            <div class="dots"></div>
        </div>
    </div>

    <!----------------- FEATURED COURSES ---------------------------->
    <h2 class="border border-secondary py-4 pl-5 bg-dark text-light rounded corner-design">FEATURED PRODUCTS</h2>

    <div class="d-sm-flex my-4 text-center">

        <?php
            $featuredCourse = $course->getFeaturedCourse();
            if($featuredCourse) {
                while($rows = $featuredCourse->fetch()) {
        ?>
                    <div class="shadow-lg mx-2 pt-3 border border-dark">
                        <a href="preview.php?id=<?= $rows['courseId']?>"><img src="admin/<?= $rows['image'] ?>" alt="<?= $rows['courseName'] ?>" class="w-100 image-hover" style="max-width:269px; height:auto; max-height:151px"></a>
                        <h3 class="bg-dark text-light"><?= $rows['courseName'] ?></h3>
                        <p class="mt-5"><?= $fm->shortenText($rows['description'], 100) ?></p>
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
    <h2 class="border border-secondary py-4 pl-5 bg-dark text-light rounded corner-design">NEW PRODUCTS</h2>

    <div class="d-sm-flex my-4 text-center">

        <?php
            $newCourse = $course->getNewCourse();
            if($newCourse) {
                while($rows = $newCourse->fetch()) {
        ?>
                    <div class="shadow-lg mx-2 pt-3 border border-dark">
                        <a href="preview.php?id=<?= $rows['courseId'] ?>"><img src="admin/<?= $rows['image'] ?>" alt="<?= $rows['courseName'] ?>"  class="w-100 image-hover" style="max-width:269px; height:auto; max-height:151px"></a>
                        <h3 class="bg-dark text-light"><?= $rows['courseName'] ?></h3>
                        <p class="mt-5"><?= $fm->shortenText($rows['description'], 100) ?></p>
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