<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

<!-- 6ie139d7v0ccobk84l5p3h3bcm -->
<div class="main mx-3 mx-lg-0">

    <!----------------- FEATURED COURSES ---------------------------->
    <h2 class="border border-secondary py-4 pl-5 bg-dark rounded">FEATURED PRODUCTS</h2>

    <div class="d-sm-flex my-4 text-center">

        <?php
            $featuredCourse = $course->getFeaturedCourse();
            if($featuredCourse) {
                while($rows = $featuredCourse->fetch()) {
        ?>
                    <div class="shadow-lg mx-2 pt-3 border border-dark">
                        <a href="preview.php?id=<?= $rows['courseId']?>"><img src="admin/<?= $rows['image'] ?>" alt="<?= $rows['courseName'] ?>" class="w-100 image-hover" style="max-width:269px; height:auto; max-height:151px"></a>
                        <h3 class="bg-dark"><?= $rows['courseName'] ?></h3>
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
    <h2 class="border border-secondary py-4 pl-5 bg-dark rounded">NEW PRODUCTS</h2>

    <div class="d-sm-flex my-4 text-center">

        <?php
            $newCourse = $course->getNewCourse();
            if($newCourse) {
                while($rows = $newCourse->fetch()) {
        ?>
                    <div class="shadow-lg mx-2 pt-3 border border-dark">
                        <a href="preview.php?id=<?= $rows['courseId'] ?>"><img src="admin/<?= $rows['image'] ?>" alt="<?= $rows['courseName'] ?>"  class="w-100 image-hover" style="max-width:269px; height:auto; max-height:151px"></a>
                        <h3 class="bg-dark"><?= $rows['courseName'] ?></h3>
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

    <h2 class="border border-secondary py-4 pl-5 bg-dark rounded">CUSTOMER FEEDBACKS</h2>

    <!------------- SLIDER ------------>
    <div class="my-4 text-center comment-slider">
        <div class="c__slide slide--1">
            <div class="testimonial">
                <h2>Best decision ever</h2>
                <blockquote>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis 
                    ipsam molestiae vitae ea laudantium. Recusandae neque harum voluptatem
                    porro, error possimus voluptas atque similique dignissimos voluptates
                    quod in id fugit!
                </blockquote>
                <address>
                    <h6>Customer Name</h6>
                    <p>CityName <span>country</span></p>
                </address>
            </div>
        </div>

        <div class="c__slide slide--2">
            <div class="testimonial">
                <h2>worst decision ever</h2>
                <blockquote>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis 
                    ipsam molestiae vitae ea laudantium. Recusandae neque harum voluptatem
                    porro, error possimus voluptas atque similique dignissimos voluptates
                    quod in id fugit!
                </blockquote>
                <address>
                    <h6>Customer Name</h6>
                    <p>Paris <span>France</span></p>
                </address>
            </div>
        </div>

        <div class="c__slide slide--3">
            <div class="testimonial">
                <h2>Best decision ever</h2>
                <blockquote>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis 
                    ipsam molestiae vitae ea laudantium. Recusandae neque harum voluptatem
                    porro, error possimus voluptas atque similique dignissimos voluptates
                    quod in id fugit!
                </blockquote>
                <address>
                    <h6>Customer Name</h6>
                    <p>CityName <span>country</span></p>
                </address>
            </div>
        </div>

        <div class="dots"></div>
    </div>
    
</div>


<?php include 'inc/footer.php'; ?>