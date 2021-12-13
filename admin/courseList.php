<?php include 'inc/header.php'; ?>
<?php include 'inc/submenu.php'; ?>
<?php include '../classes/Course.class.php'; ?>

<?php
	$course = new Course();
	$fm = new Format();
?>

<?php
    if(isset($_GET['delCourse'])) {
        $id = $_GET['delCourse'];
        $deleteCourse = $course->deleteCourse($id);
    }
?>

<!-- main body of dashboard -->
<script type="text/javascript" src="../js/admin-datatable.js"></script>
<div class="my-5">
    <div class="cat-list--title">
        <h1>Course List</h1>
        <?= isset($deleteCourse) ? $deleteCourse : "" ?>
        <table class="table table-striped table-dark w-100">
            <thead>
                <tr>
                    <th class="d-none d-md-table-cell">#</th>
                    <th>Course</th>
                    <th>Category</th>
                    <th>Tutor</th>
                    <th class="d-none d-md-table-cell">Description</th>
                    <th>Price</th>
                    <th  class="d-none d-md-table-cell">Image</th>
                    <th class="d-none d-md-table-cell">Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $course = new Course();
                    $getCourse = $course->getAllCourse();
                    if($getCourse) {
                        $i = 0;
                        while($row = $getCourse->fetch()) {
                            $i++;
                ?>
                            <tr>
                                <td class="d-none d-md-table-cell"><?= $i ?></td>
                                <td><?= $row['courseName'] ?></td>
                                <td><?= $row['catName'] ?></td>
                                <td><?= $row['tutorName'] ?></td>
                                <td class="d-none d-md-table-cell"><?= $fm->shortenText($row['description'], 100) ?></td>
                                <td><?= $row['price'] ?></td>
                                <td class="d-none d-md-table-cell"><img src="<?= $row['image'] ?>" style="width: 40px;"/></td>
                                <td class="d-none d-md-table-cell"><?= $row['courseType'] == 0 ? "Featured" : "General" ?></td>
                                <td>
                                    <a href="courseEdit.php?courseId=<?= $row['courseId'] ?>" class="text-primary">Edit</a> || 
                                    <a onclick="return confirm('Are you sure?')" href="?delCourse=<?= $row['courseId'] ?>" class="text-primary">Delete</a>
                                </td>
                            </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'inc/footer.php'; ?>