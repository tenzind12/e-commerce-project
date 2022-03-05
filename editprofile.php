<?php include 'inc/header.php'; ?>
<?php
    $loginCheck = Session::get('cusLogin');
    if($loginCheck == false) {
        header('Location: login.php');
    }

    $cusId = Session::get('cusId');
    $addId = Session::get('addId');
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $updateInfo = $user->updateCustomerInfo($_POST, $cusId, $addId);
    }
?>

    <div class="d-flex" style="height: 64vh;">
        <div class="m-auto w-75">

            <form action="" method="POST">
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
                                        <kbd>Update Personal Information </kbd>
                                    </h1>
                                </td>
                            </tr>
                            <?= isset($updateInfo) ? $updateInfo : "" ?>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="name" value="<?= $rows['customerName'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td><input type="text" name="phone" value="0<?= $rows['phone'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="email" value="<?= $rows['email'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><input type="text" name="address" value="<?= $rows['address'] ?>"></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><input type="text" name="city" value="<?= $rows['city'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Zipcode</td>
                                <td><input type="text" name="zip" value="<?= $rows['zip'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td><input type="text" name="country" value="<?= $rows['country'] ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit" value="Save Profile" class="btn btn-outline-warning"/></td>
                            </tr>
                <?php
                        }
                    }
                ?>
                </table>
            </form>

        </div>
    </div>
<?php include 'inc/footer.php'; ?>
