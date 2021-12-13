<?php include 'inc/header.php'; ?>
<?php include 'inc/submenu.php'; ?>
<?php include '../classes/Course.class.php'; ?>
<?php include '../classes/Category.class.php'; ?>
<?php include '../classes/Tutor.class.php'; ?>

<?php 
    $course = new Course();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertCourse = $course->courseInsert($_POST, $_FILES); 
    }
?>


<div class="row my-5 ml-1">
    <div class="col-12 border border-dark" id="tutorAdd">
        <h1 class="my-5">Add New Course</h1>
        <?= isset($insertCourse) ? $insertCourse : ''; ?>
        
        <form action="" method="post" enctype="multipart/form-data">
            <!-- course name -->
            <div class="form-group">
                <label for="courseName">Course Name :</label><?= str_repeat('&nbsp;', 8) ?>
                <input type="text" name="courseName" placeholder="Course name" class="text-dark">
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
                            <option value="<?= $result['catId'] ?>"><?= $result['catName'] ?></option>
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
                            <option value="<?= $result['tutorId'] ?>"><?= $result['tutorName'] ?></option>
                <?php
                        }
                    }
                ?>
            </select>
            <!-- Description -->
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea class="form-control bg-dark" name="description" rows="5" cols="50"></textarea>
            </div>
            <!-- Price -->
            <div class="form-group">
                <label for="price">Price :</label>
                <input type="number" step=".01" name="price" placeholder="Enter Price" class="text-dark">
            </div>
            <!-- Upload image -->
            <label for="image">Upload Image</label>
            <input type="file" name="image" /><br>
            <!-- Type name -->
            <label for="courseType" class="mt-2">Course Type :</label>
            <select name="courseType" class="bg-dark">
                <option value="">- -Select type- -</option>
                <option value="0">Featured</option>
                <option value="1">General</option>
            </select>
            
            <input type="submit" value="Save" class="text-dark mt-2 mb-5 d-block" name="submit">
        </form>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
