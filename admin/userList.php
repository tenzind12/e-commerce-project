<?php include './inc/header.php' ?>
<?php include './inc/submenu.php' ?>
<?php include '../core/classes/User.class.php'; ?>

    <div class="container">
        <table class="table table-striped table-dark w-100 mt-5">
            <thead>
                <tr>
                    <th class="d-none d-md-table-cell">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th class="d-none d-md-table-cell">Address</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody>
        <?php
            $users = new User();
            $getUsers = $users->getAlluser();
            if($getUsers) {
                $i = 0;
                while($row = $getUsers->fetch()) {
                    $i++;
        ?>
                    <tr>
                        <td class="d-none d-md-table-cell"><?= $i ?></td>
                        <td><?= ucfirst($row['customerName']) ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['address'] ?></br><?= $row['zip'] ?></br><?= $row['city'] ?></td>
                        <td><?= ucfirst($row['country']) ?></td>
                    </tr>
        <?php
                }
            }
        ?>
            </tbody>
        </table>
    </div>

<?php include './inc/footer.php' ?>
