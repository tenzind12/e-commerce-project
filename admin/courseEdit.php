<?php include 'inc/header.php'; ?>
<?php include 'inc/submenu.php'; ?>
<?php include '../classes/Course.class.php'; ?>
<?php include '../classes/Category.class.php'; ?>
<?php include '../classes/Tutor.class.php'; ?>

<?php 
    if(!isset($_GET['courseId']) || $_GET['courseId'] == NULL) {
        echo "<script>window.location = 'courseList.php';</script>";
    }else {
        $id = $_GET['courseId'];
    }

    $course = new Course();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $updateCourse = $course->updateCourse($_POST, $_FILES, $id); 
    }
?>



<div class="row my-5 ml-1">
    <div class="col-12 border border-dark" id="tutorAdd">
        <h1 class="my-5">Add New Course</h1>
        <?= isset($updateCourse) ? $updateCourse : ''; ?>
        
        <?php
            $getCourse = $course->getCourseById($id);
            if($getCourse) {
                while($row = $getCourse->fetch()) {
        ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- course name -->
                        <div class="form-group">
                            <label for="courseName">Course Name :</label><?= str_repeat('&nbsp;', 8) ?>
                            <input type="text" name="courseName" value="<?= $row['courseName'] ?>" class="text-dark">
                        </div>
            
                        <!-- category drop down -->
                        <label for="catId">Choose a Category :</label>
                        <select name="catId" class="bg-dark">
                            <?php
                                $cat = new Category();
                                $getCat = $cat->getAllCat();
                                if($getCat) {
                                    while($result = $getCat->fetch()) {
                            ?>
                                        <option <?php if($row['catId'] == $result['catId']) { ?> selected = "selected" <?php } ?> value="<?= $result['catId'] ?>"><?= $result['catName'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br>
            
                        <!-- tutor drop down -->
                        <label for="tutorId">Select Tutor :</label><?= str_repeat('&nbsp;', 13) ?>
                        <select name="tutorId" class="bg-dark mt-2">
                            <?php
                                $tutor = new Tutor();
                                $getTutor = $tutor->getAllTutor();
                                if($getTutor) {
                                    while($result = $getTutor->fetch()) {
                            ?>
                                        <option <?php if($row['tutorId'] == $result['tutorId']) { ?> selected <?php } ?> value="<?= $result['tutorId'] ?>"><?= $result['tutorName'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                        
                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea class="form-control bg-dark" name="description" rows="5" cols="50"><?= $row['description'] ?></textarea>
                        </div>

                        <!-- Price -->
                        <div class="form-group">
                            <label for="price">Price :</label>
                            <input type="number" step=".01" name="price" value="<?= $row['price'] ?>" class="text-dark">
                        </div>

                        <!-- Upload image -->
                        <label for="image">Uploaded Image</label>
                        <img src="<?= $row['image'] ?>" style="width: 200px;" class="ml-5 rounded"/><br>
                        <input type="file" name="image" /><hr>

                        <!-- Type name -->
                        <label for="courseType" class="mt-2">Course Type :</label>
                        <select name="courseType" class="bg-dark">
                            <option disabled>Select type :</option>
                            <?php if($row['courseType'] == 0) { ?>
                                <option selected value="0">Featured</option>
                                <option value="1">General</option>
                            <?php }else { ?>
                               <option value="0">Featured</option>
                               <option selected value="1">General</option>
                            <?php } ?>
                        </select>
                        <input type="submit" value="Save" class="text-dark mt-5 mb-5 d-block border border-success" name="submit">
                    </form>
        <?php
                }
            }
        ?>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
