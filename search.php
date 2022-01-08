<?php include 'inc/header.php' ?>

    <div id="search-page">
        <?php
            if(isset($_GET['search']) && $_GET['search'] != null) {
                $value =  $_GET['search'];
                $result = $search->searchTutorAndCourse($value);
                if($result) {
                    while($rows = $result->fetch()) {
        ?>
            <div class="row m-5 shadow-lg bg-dark rounded p-5">
                <div class="col-sm-5">
                    <img src="admin/<?= $rows['image'] ?>" alt="course image"/>
                </div>
                <div class="col-sm-7">
                    <h3><?= $rows['courseName'] ?></h3>
                    <p class="text-muted small"><?= $rows['description'] ?></p>
                    <p>Price: <span class="text-danger">€ <?= $rows['price'] ?> </span></p>
                    <p>Tutor: <span class="text-success"><?= $rows['tutorName'] ?></span></p>

                    <form action="" method="post" class="form-inline">
                        <!-- <input type="number" name="quantity" value="1"class="form-control"/> -->
                        <a href="preview.php?id=<?= $rows['courseId'] ?>"><input type="button" value="Buy Now" class="btn btn-outline-warning ml-sm-3"></a>
                    </form>
                    <?= isset($addToCart) ? $addToCart : "" ?>
                </div>
            </div>
        <?php 
                }
            }else {
                echo "<h1 id='search-fail-msg'>We cannot find any course with that search value.<br/> Did you type it correctly?</h1>";
            }
        } 
        ?>
    </div>

<?php include 'inc/footer.php' ?>