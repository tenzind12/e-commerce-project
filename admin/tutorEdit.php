<?php include 'inc/header.php'; ?>
<?php include 'inc/submenu.php'; ?>
<?php include '../classes/Tutor.class.php'; ?>

<?php 
    if(!isset($_GET['id']) || $_GET['id'] == NULL) {
        echo "<script>window.location = 'tutorList.php' ;</script>";
    }
    $id = $_GET['id'];
?>
<?php
    $tutor = new Tutor(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tutorName = $_POST['tutorName'];
        $updateTutor = $tutor->updateTutor($tutorName,$id);
    }
?>
    <div class="row my-5 ml-1">
        <div class="col-md-5 border border-dark" id="tutorAdd">
            <h1 class="my-5">Update Tutor</h1>
            <?= isset($updateTutor) ? $updateTutor : "" ?>
            <?php
                $getTutor = $tutor->getTutorById($id);
                if($getTutor) $result = $getTutor->fetch(); 
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="tutorName" value="<?= $result['tutorName'] ?>" class="text-dark">
                    <input type="submit" value="Save" class="text-dark mt-2 mb-5 d-block">
                </div>
            </form>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>
