<?php include 'inc/header.php'; ?>
<?php if (Session::get('cusLogin')) header('Location: profile.php'); ?>
<div class="row my-5 mx-2">

    <!----------------------------- Log in section ----------------->
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $customerLogin = $user->customerLogin($_POST);
    } ?>
    <div class="col-sm-5 border border-muted py-3 my-5">
        <h2>Existing Customers</h2>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group w-50">
                <label><small>Sign in with the forms below:</small></label>
                <input type="email" name="email" class="form-control mb-2" placeholder="Username">
                <input type="password" name="password" class="form-control" placeholder="•••••••••••••">
            </div>
            <?= isset($customerLogin) ? $customerLogin : "" ?>
            <input type="submit" name="login" value="Sign in" class="btn-lg btn-dark">
            <p class="text-muted my-5"><i><small>If you forgot your passoword just enter your email and <a href="forgotPassword.php">click here</i></small></a>.</p>
        </form>
    </div>

    <!------------------------------ Sign up section ----------------->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        $registration = $user->registration($_POST);
    }
    ?>
    <div class="col-sm-7 border border-muted py-3 my-5">
        <h2>Register New Account</h2>
        <form action="" method="POST">
            <div class="form-group">

                <div class="d-flex mb-2">
                    <input type="text" name="name" placeholder="Name*" class="form-control">
                    <input type="text" name="address" placeholder="Address*" class="form-control ml-2">
                </div>

                <div class="d-flex mb-2">
                    <input type="text" name="city" placeholder="City*" class="form-control">
                    <input type="text" name="country" placeholder="Country*" class="form-control ml-2">
                </div>

                <div class="d-flex mb-2">
                    <input type="text" name="zip" pattern="[0-9]*" placeholder="Zip-code*" class="form-control">
                    <input type="phone" name="phone" placeholder="Phone*" class="form-control ml-2">
                </div>

                <div class="d-flex mb-2">
                    <input type="text" name="email" placeholder="E-mail*" class="form-control">
                    <input type="password" name="password" placeholder="Choose a password*" class="form-control ml-2">
                </div>
                <?= isset($registration) ? $registration : "" ?>

                <input type="submit" name="register" value="Create Account" class="btn-lg btn-dark my-5">
            </div>
        </form>
        <p><i><small>By clicking 'Create Account' you agree to the <a href="#">Terms & Conditions</a>.</small></i></p>
    </div>
</div>
<div class="border-bottom mb-3"></div>

<?php include 'inc/footer.php'; ?>