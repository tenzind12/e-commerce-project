<?php include 'inc/header.php'; ?>
<?php include 'inc/submenu.php'; ?>
<?php include '../classes/Tutor.class.php'; ?>

<?php
    $tutor = new Tutor();

    if(isset($_GET['delId'])) {
        $id = $_GET['delId'];
        $deleteTutor = $tutor->deleteTutorById($id);
    }
?>

<!-- main body of dashboard -->
<script type="text/javascript" src="../js/admin-datatable.js"></script>
<div class="my-5">
    <div class="tutor-list--title">
        <h1>Tutor List</h1>
        <?= isset($deleteTutor) ? $deleteTutor : ''?>
        <table class="table table-striped table-dark w-100">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tutor</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $getTutor = $tutor->getAllTutor();
                    if($getTutor) {
                        $i = 0;
                        while($result = $getTutor->fetch()) {
                            $i++;
                ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $result['tutorName'] ?></td>
                                <td>
                                    <a href="tutorEdit.php?id=<?= $result['tutorId'] ?>" class="text-primary">Edit</a> || 
                                    <a onclick="return confirm('Are you sure?')" href="?delId=<?= $result['tutorId'] ?>" class="text-primary">Delete</a>
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