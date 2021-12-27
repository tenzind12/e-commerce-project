<?php include 'inc/header.php'; ?>
<?php
    $loginCheck = Session::get('cusLogin');
    if($loginCheck == false) {
        header('Location: login.php');
    }
?>

    <div class="">
        <div class="m-sm-3">
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

        <!-- COURSES PURCHASED -->
        <div class="shadow-lg">
            <h2 class="border border-secondary py-4 pl-5 bg-dark rounded text-success">COURSES YOU PURCHASED</h2>
            <div class="row p-3 d-flex justify-content-around">

                <div class="col-sm shadow-lg p-5">
                    <img src="img/bootstrap.jpg" alt="img brkn" class="w-50">
                    <input onclick="location.href='https:\/\/www.youtube.com/results?search_query=bootstrap'" type="button" value="Start Learning" class="btn btn-lg btn-outline-success float-right mt-3 mr-3">
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit voluptates cupiditate saepe nesciunt harum tempora eveniet iure quas ex. Quod alias quam sint modi cupiditate, provident nisi maxime pariatur illo!</p>
                </div>

                <div class="col-sm shadow-lg p-5">
                    <img src="img/bootstrap.jpg" alt="img brkn" class="w-50">
                    <input onclick="location.href='https:\/\/www.youtube.com/results?search_query=html'" type="button" value="Start Learning" class="btn btn-lg btn-outline-success float-right mt-3 mr-3">
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit voluptates cupiditate saepe nesciunt harum tempora eveniet iure quas ex. Quod alias quam sint modi cupiditate, provident nisi maxime pariatur illo!</p>
                </div>

            </div>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>
