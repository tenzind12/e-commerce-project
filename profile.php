<?php include 'inc/header.php'; ?>
<?php
    $loginCheck = Session::get('cusLogin');
    if($loginCheck == false) {
        header('Location: login.php');
    }
?>

    <div class="d-flex" style="height: 64vh;">
        <div class="m-auto w-75">
            <table class="table table-dark">
                <?php
                $id = Session::get('cusId');
                $cusDetails = $user->getCustomerDetails($id);
                if($cusDetails) {
                    while($rows = $cusDetails->fetch()) {
                        ?>
                        <tr>
                            <td class="text-center text-uppercase" colspan="3">
                                <h1 class="my-3">
                                    <kbd>Your Personal Information </kbd>
                                </h1>
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?= $rows['customerName'] ?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td><?= $rows['phone'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $rows['email'] ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?= $rows['address'] ?></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td><?= $rows['city'] ?></td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>:</td>
                            <td><?= $rows['zip'] ?></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>:</td>
                            <td><?= $rows['country'] ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><a href="editprofile.php" class="btn btn-outline-warning">Update Profile</a></td>
                        </tr>
            <?php
                    }
                }
            ?>
            </table>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>
